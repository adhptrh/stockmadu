<?php

namespace App\Controllers;

use App\Entities\Product;
use App\Entities\User;
use App\Models\ProductModel;
use App\Models\UserModel;

class Products extends BaseController
{
    public $productModel, $userModel;

    function __construct()
    {
        $this->productModel = new ProductModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if ($this->isRole("owner") || $this->isRole("admin")) {

            return view("pages/products",[
                "products"=>$this->productModel->findAll(),
                "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
            ]);
        }
        session()->destroy();
        return redirect()->to(base_url("/"));
    }

    public function add() {
        if (!$this->isRole("owner") && !$this->isRole("admin")) {
            session()->setFlashdata("fail","product_permission_denied");
            return redirect()->to(base_url("/"));
        }
        $nama = $this->request->getPost("nama");
        $product = new Product();
        $product->nama = $nama;
        $this->productModel->save($product);
        session()->setFlashdata("success","product_added");
        return redirect()->to(base_url("/products"));
    }

    public function delete($id) {
        if (!$this->isRole("owner") && !$this->isRole("admin")) {
            session()->setFlashdata("fail","product_permission_denied");
            return redirect()->to(base_url("/"));
        }
        $this->productModel->delete($id);
        session()->setFlashdata("success","product_deleted");
        return redirect()->to(base_url("/products"));;
    }

    public function modify($id) {
        $product = $this->productModel->find($id);

        return view("pages/products_edit", [
            "product"=>$product,
            "id"=>$id,
            "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
        ]);
    }

    public function edit($id) {
        
        if (!$this->isRole("owner") && !$this->isRole("admin")) {
            session()->setFlashdata("fail","product_permission_denied");
            return redirect()->to(base_url("/"));
        }
        $data = [
            "nama"=>$this->request->getPost("nama")
        ];

        $this->productModel->where("id",$id)->set($data)->update();
        session()->setFlashdata("success","product_edited");
        return redirect()->to(base_url("/products"));
    }
}
