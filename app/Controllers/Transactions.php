<?php

namespace App\Controllers;

use App\Entities\Transaction;
use App\Entities\User;
use App\Models\TransactionModel;
use App\Models\UserModel;

class Transactions extends BaseController
{

    function __construct()
    {
        $this->transactionModel = new TransactionModel();
    }

    public function add($outletId)
    {
        $count = $this->request->getPost("count");
        $currentStock = $this->transactionModel->selectSum("count")->where("outlet_id",$outletId)->where("product_id",$this->request->getPost("product_id"))->first()->count;
        
        if ($currentStock < $count) {
            session()->set("fail", "transaction_count_greater_than_stock");
            return redirect()->back();
        }

        $trans = new Transaction();
        $trans->outlet_id = $outletId;
        $trans->product_id = $this->request->getPost("product_id");
        $trans->count = -$count;

        $this->transactionModel->save($trans);
        session()->set("success", "transaction_added");
        return redirect()->back();
    }
}