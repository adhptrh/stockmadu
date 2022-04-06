<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        if (session()->get("user_id")) {
            return view("pages/users");
        }
        return view('auth/login');
    }
}
