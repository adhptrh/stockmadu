<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Auth extends BaseController
{
    public $userModel;
    public $user;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->user = new User();
    }

    public function login()
    {
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");
        $res = $this->userModel->where("username",$username)->first();
        if ($res && password_verify($password, $res->password)) {
            session()->set("user_id",$res->id);
        } else {
            session()->setFlashdata("fail","incorrect_creds");
        }
        return redirect()->to(base_url("/"));
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url("/"));
    }
}
