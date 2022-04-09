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
        if ($this->isRole("owner") || $this->isRole("admin")) {
            $users = $this->userModel->where("id !=",session()->get("user_id"))->findAll();
            return view("pages/users", [
                "users"=>$users,
                "user"=>$this->userModel->where("id",session()->get("user_id"))->first(),
            ]);
        }
        session()->destroy();
        return redirect()->to(base_url("/"));
    }

    public function add()
    {
        if (!$this->isRole("owner") && !$this->isRole("admin")) {
            session()->setFlashdata("fail","user_not_added");
            return redirect()->back();
        }
        $user = new User();
        $user->username = $this->request->getPost("username");
        $user->role = $this->request->getPost("role");
        $user->password = password_hash($this->request->getPost("password"),PASSWORD_BCRYPT);
        $this->userModel->save($user);
        session()->setFlashdata("success","user_added");
        return redirect()->to(base_url("/users"));
    }

    public function delete($id) {
        if (!$this->isRole("owner") && !$this->isRole("admin")) {
            session()->setFlashdata("fail","user_not_deleted");
            return redirect()->back();
        }

        $this->userModel->delete($id);
        session()->setFlashdata("success","user_deleted");
        return redirect()->to(base_url("/users"));;
    }

    public function modify($id) {
        $user = $this->userModel->find(session()->get("user_id"));
        $userToEdit = $this->userModel->find($id);

        return view("pages/users_edit", [
            "user"=>$user,
            "userToEdit"=>$userToEdit,
            "session"=>session()
        ]);
    }

    public function edit($id) {
        $user = $this->userModel->where("id",session()->get('user_id'))->first();
        
        if (!$this->isRole("owner") && !$this->isRole("admin") && $user->id != session()->get("user_id")) {
            session()->setFlashdata("fail","user_not_edited");
            return redirect()->back();
        }

        $data = [
            "username"=>$this->request->getPost("username"),
            "role"=>$this->request->getPost("role") ?? $user->role,
        ];

        if ($this->request->getPost("password")) {

            if ($this->request->getPost("password") != $this->request->getPost("confirmation_password")) {
                session()->setFlashdata("fail","user_fail_password");
                return redirect()->to(base_url("/users/modify/".$id));
            }

            $data = [
                "username"=>$this->request->getPost("username"),
                "password"=>password_hash($this->request->getPost("password"),PASSWORD_BCRYPT),
                "role"=>$this->request->getPost("role")  ?? $user->role,
            ];

        }

        $this->userModel->where("id",$id)->set($data)->update();
        session()->setFlashdata("success","user_edited");
        return redirect()->to(base_url("/users/modify/".$id));
    }
}
