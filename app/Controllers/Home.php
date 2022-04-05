<?php

namespace App\Controllers;

use App\Entities\Outlet;
use App\Entities\User;
use App\Models\OutletModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public $outletModel, $userModel, $productModel, $transactionModel;

    public function __construct()
    {
        $this->outletModel = new OutletModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
    }

    public function index()
    {
        $products = $this->productModel->findAll();
        $transactionData = [];
        foreach ($products as $k=>$v) {
            array_push($transactionData,[
                "product_id"=>$v->id,
                "product_name"=>$v->nama,
                "transaction"=>$this->transactionModel->getTransactionsPerMonth($v->id,date("Y"))
            ]);
        }
        
        if (session()->get("user_id")) {
            return view("owner/index", [
                "outletCount" => count($this->outletModel->findAll()),
                "salesCount" => count($this->userModel->where("role", "sales")->findAll()),
                "transactionData" => $transactionData
            ]);
        }
        return view('auth/login');
    }
}
