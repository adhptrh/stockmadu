<?php

namespace App\Controllers;

use App\Models\TransactionModel;
use App\Models\UserModel;
use Config\Database;

class Logs extends BaseController {

    function __construct()
    {
        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->db = Database::connect();
    }

    public function index() {
        $transactions = $this->db->query("SELECT t.*, o.nama AS nama_outlet FROM transactions t LEFT JOIN outlets o ON o.id = t.outlet_id ORDER BY created_at DESC")->getResult();
        return view("owner/logs", [
            "user"=>$this->userModel->where("id", session()->get("user_id"))->first(),
            "transactions"=>$transactions,
        ]);
    }

}