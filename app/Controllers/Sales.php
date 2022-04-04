<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Sales extends BaseController
{
    public function index()
    {
        if (session()->get("user_id")) {
            return view("owner/sales");
        }
        return view('auth/login');
    }
}
