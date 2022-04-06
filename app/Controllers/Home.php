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

        $outletsKV = [];
        $outlets = $this->db->query("SELECT o.*,u.username FROM outlets AS o INNER JOIN users AS u ON u.id = o.user_id")->getResult();
        $i = 0;
        foreach ($outlets as $k=>$v) {
            array_push($outletsKV, [
                "nama_outlet" => $v->nama,
                "nama_user" => $v->username,
                "products" => [],
            ]);
            return json_encode($v->id);
            foreach ($products as $kk=>$vv) {
                $total = 0;
                $getTotal = $this->transactionModel->where("outlet_id",$v->id)->where("count <",0)->findAll();
                return json_encode($getTotal);
                array_push($outletsKV[$i]["products"], [
                    "nama"=>$vv->nama,
                    "total"=>0
                ]);
            }
            $i++;
        }

        return json_encode($outletsKV);
        
        if (session()->get("user_id")) {
            return view("owner/index", [
                "outletCount" => count($this->outletModel->findAll()),
                "salesCount" => count($this->userModel->where("role", "sales")->findAll()),
                "productCount" => count($products),
                "products" => $products,
                "transactionData" => $transactionData,
                "year" => intval($this->request->getGet("year") ?? date("Y")) 
            ]);
        }
        return view('auth/login');
    }
}
