<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Products extends BaseController
{
    public function index()
    {
        if (session()->get("user_id")) {
            return view("pages/products");
        }
        return view('auth/login');
    }
}
