<?php

namespace App\Controllers;

use App\Entities\Product;
use App\Entities\User;
use App\Models\ProductModel;
use App\Models\UserModel;

class Products extends BaseController
{
    public $productModel;

    function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        if (session()->get("user_id")) {

            return view("pages/products",[
                "products"=>$this->productModel->findAll()
            ]);
        }
        return view('auth/login');
    }

    public function add() {
        $nama = $this->request->getPost("nama");
        $product = new Product();
        $product->nama = $nama;
        $this->productModel->save($product);
        session()->setFlashdata("success","product_added");
        return redirect()->to(base_url("/products"));
    }

    public function delete($id) {
        $this->productModel->delete($id);
        session()->setFlashdata("success","product_deleted");
        return redirect()->to(base_url("/products"));;
    }

    public function modify($id) {
        $product = $this->productModel->find($id);

        return view("pages/products_edit", [
            "product"=>$product,
            "id"=>$id
        ]);
    }

    public function edit($id) {
        $data = [
            "nama"=>$this->request->getPost("nama")
        ];

        $this->productModel->where("id",$id)->set($data)->update();
        session()->setFlashdata("success","product_edited");
        return redirect()->to(base_url("/products"));
    }
}
