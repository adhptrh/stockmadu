<?php

namespace App\Controllers;

use App\Entities\Outlet;
use App\Entities\User;
use App\Models\OutletModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use Config\Database;

class Home extends BaseController
{
    public $outletModel, $userModel, $productModel, $transactionModel, $db;

    public function __construct()
    {
        $this->outletModel = new OutletModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->db = Database::connect();
    }

    public function index()
    {
        $products = $this->productModel->findAll();
        $transactionData = [];

        foreach ($products as $k=>$v) {
            array_push($transactionData,[
                "product_id"=>$v->id,
                "product_name"=>$v->nama,
                "transaction"=>$this->transactionModel->getTransactionsPerMonth($v->id,intval($this->request->getGet("year")?? date("Y")))
            ]);
        }
;
        $outletsKV = [];
        $outlets = $this->db->query("SELECT o.*,u.username FROM outlets AS o INNER JOIN users AS u ON u.id = o.user_id")->getResult();
        $i = 0;
        foreach ($outlets as $k=>$v) {
            array_push($outletsKV, [
                "nama_outlet" => $v->nama,
                "nama_user" => $v->username,
                "products" => [],
                "total"=>0
            ]);
            foreach ($products as $kk=>$vv) {
                $getTotal = $this->transactionModel->selectSum("count")->where("product_id",$vv->id)->where("outlet_id",$v->id)->where("count <",0)->first();
                $outletsKV[$i]["total"] += abs($getTotal->count);
                array_push($outletsKV[$i]["products"], [
                    "nama"=>$vv->nama,
                    "total"=>abs($getTotal->count)
                ]);
            }
            $i++;
        }
        
        if ($this->isRole("owner") || $this->isRole("admin")) {
            return view("owner/index", [
                "outletCount" => count($this->outletModel->findAll()),
                "salesCount" => count($this->userModel->where("role", "sales")->findAll()),
                "productCount" => count($products),
                "products" => $products,
                "transactionData" => $transactionData,
                "outletsData" => $outletsKV,
                "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
                "year" => intval($this->request->getGet("year") ?? date("Y")) 
            ]);
        } elseif ($this->isRole("sales")) {
            return view('sales/index',[
                "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
            ]);
        } else {
            session()->destroy();
            return view('auth/login');
        }
    }
}
