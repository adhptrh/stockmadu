<?php

namespace App\Controllers;

use App\Entities\Outlet;
use App\Entities\User;
use App\Models\OutletModel;
use App\Models\UserModel;

class Home extends BaseController
{
    public $outletModel, $userModel;

    public function __construct()
    {
        $this->outletModel = new OutletModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if (session()->get("user_id")) {
            return view("owner/index", [
                "outletCount"=>count($this->outletModel->findAll()),
                "salesCount"=>count($this->userModel->where("role","sales")->findAll())
            ]);
        }
        return view('auth/login');
    }
}
