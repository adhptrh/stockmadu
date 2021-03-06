<?php

namespace App\Controllers;

use App\Entities\Outlet;
use App\Entities\Product;
use App\Entities\User;
use App\Models\OutletModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\UserModel;
use Config\Database;
use Exception;

class Outlets extends BaseController
{

    function __construct()
    {
        $this->outletModel = new OutletModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
        $this->db = Database::connect();
    }

    public function new() {
        return view("pages/outlets_add",[
            "user"=>$this->userModel->where("id",session()->get("user_id"))->first()
        ]);
    }

    public function modify($id) {
        return view("pages/outlets_edit",[
            "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
            "outlet"=>$this->outletModel->where("id", $id)->first()
        ]);
    }

    public function add() {
        $photo = $this->request->getFile("photo");
        $randname = "";
        if (!$photo->getError()) {
            $randname = $photo->getRandomName();
            $filePath = "uploads";
            $photo->move($filePath, $randname);
        }
        

        $outlet = new Outlet();
        $outlet->nama = $this->request->getPost("nama");
        $outlet->alamat = $this->request->getPost("alamat");
        $outlet->longitude = $this->request->getPost("longitude");
        $outlet->latitude = $this->request->getPost("latitude");
        $outlet->photo = $randname;
        $outlet->user_id = session()->get("user_id");

        $this->outletModel->save($outlet);
        session()->setFlashdata("success","outlet_added");
        return redirect()->to(base_url("/"));
    }

    public function delete($id) {
        $isOwner = count($this->outletModel->where("id",$id)->where("user_id",session()->get("user_id"))->findAll()) > 0;
        if (!$isOwner) {
            session()->setFlashdata("fail","outlet_not_owner");
            return redirect()->to(base_url("/"));;
        }
        $this->outletModel->delete($id);
        session()->setFlashdata("success","outlet_deleted");
        return redirect()->to(base_url("/"));;
    }

    public function edit($id) {
        $isOwner = count($this->outletModel->where("id",$id)->where("user_id",session()->get("user_id"))->findAll()) > 0;
        if (!$isOwner) {
            session()->setFlashdata("fail","outlet_not_owner");
            return redirect()->back();
        }
        $outlet = $this->outletModel->where("id",$id)->first();
        $photo = $this->request->getFile("photo");
        if (!$photo->getError()) {
            try{
                unlink("uploads/".$outlet->photo);
            }catch(Exception $e){}
            $randname = $photo->getRandomName();
            $filePath = "uploads";
            $photo->move($filePath, $randname);
        } else {
            $randname = $this->outletModel->where("id",$id)->first()->photo;
        }

        $data = [
            "nama"=>$this->request->getPost("nama"),
            "alamat"=>$this->request->getPost("alamat"),
            "longitude"=>$this->request->getPost("longitude"),
            "latitude"=>$this->request->getPost("latitude"),
            "photo"=>$randname,
        ];

        $this->outletModel->where("id",$id)->set($data)->update();
        session()->setFlashdata("success","outlet_edited");
        return redirect()->to(base_url("/outlets/modify/".$id));
    }

    public function manage($id) {
        $products = $this->productModel->findAll();
        $productStocks = [];
        $outlet = $this->outletModel->where("id",$id)->first();
        //$transactions = $this->transactionModel->where("outlet_id", $outlet->id)->where("count <",0)->orderBy("created_at","DESC")->findAll();
        $transactions = $this->db->query("SELECT t.*, p.nama FROM transactions t INNER JOIN products p ON p.id = t.product_id WHERE count < 0 ORDER BY created_at DESC")->getResult();
        foreach ($products as $k=>$v) {
            $stock = $this->transactionModel->selectSum("count")->where("outlet_id",$id)->where("product_id", $v->id)->findAll();
            $prod = [
                "nama"=>$v->nama,
                "stock"=>$stock[0]->count ?? 0
            ];
            array_push($productStocks,$prod);
        }
        return view("pages/outlet_manage",[
            "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
            "products"=>$products,
            "productStocks"=>$productStocks,
            "outlet"=>$outlet,
            "transactions"=>$transactions
        ]);
    }

}