<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class Users extends BaseController
{
    public $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        if ($this->isRole("owner")) {
            $users = $this->userModel->where("id !=",session()->get("user_id"))->findAll();
            return view("pages/users", [
                "users"=>$users
            ]);
        }
        return view('auth/login');
    }

    public function add()
    {
        $user = new User();
        $user->username = $this->request->getPost("username");
        $user->role = $this->request->getPost("role");
        $user->password = password_hash($this->request->getPost("password"),PASSWORD_BCRYPT);
        $this->userModel->save($user);
        return redirect()->to(base_url("/users"));
    }

    public function delete($id) {
        $this->userModel->delete($id);
        session()->setFlashdata("success","user_deleted");
        return redirect()->to(base_url("/users"));;
    }
}
