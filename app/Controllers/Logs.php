<?php

namespace App\Controllers;

use App\Models\UserModel;

class Logs extends BaseController {

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index() {
        return view("owner/logs", [
            "user"=>$this->userModel->where("id", session()->get("user_id"))->first()
        ]);
    }

}