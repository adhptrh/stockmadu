<?php

namespace App\Controllers;

use App\Entities\Outlet;
use App\Entities\Product;
use App\Entities\User;
use App\Models\OutletModel;
use App\Models\ProductModel;
use App\Models\TransactionModel;
use App\Models\UserModel;

class Outlets extends BaseController
{

    function __construct()
    {
        $this->outletModel = new OutletModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->transactionModel = new TransactionModel();
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
        $randname = $photo->getRandomName();
        $filePath = "uploads";
        $photo->move($filePath, $randname);
        

        $outlet = new Outlet();
        $outlet->nama = $this->request->getPost("nama");
        $outlet->alamat = $this->request->getPost("alamat");
        $outlet->longitude = $this->request->getPost("longitude");
        $outlet->latitude = $this->request->getPost("latitude");
        $outlet->photo = $randname;
        $outlet->user_id = session()->get("user_id");

        $this->outletModel->save($outlet);
        session()->set("success","outlet_added");
        return redirect()->to(base_url("/"));
    }

    public function delete($id) {
        $this->outletModel->delete($id);
        session()->setFlashdata("success","outlet_deleted");
        return redirect()->to(base_url("/"));;
    }

    public function edit($id) {

        $photo = $this->request->getFile("photo");
        if (!$photo->getError()) {
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
        foreach ($products as $k=>$v) {
            $stock = $this->transactionModel->selectSum("count")->where("product_id", $v->id)->findAll();
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
            "outlet"=>$this->outletModel->where("id",$id)->first(),
        ]);
    }

}