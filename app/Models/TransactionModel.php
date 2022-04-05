<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model {
    protected $table = 'transactions';
    protected $returnType    = \App\Entities\Transaction::class;
    protected $useTimestamps = true;
    protected $allowedFields = ["id","product_id","outlet_id","count"];

    public function getTransactionsPerMonth($product_id, $year) {
        $dates = [
            "jan"=>1,
            "feb"=>2,
            "mar"=>3,
            "apr"=>4,
            "may"=>5,
            "jun"=>6,
            "jul"=>7,
            "aug"=>8,
            "sep"=>9,
            "oct"=>10,
            "nov"=>11,
            "dec"=>12,
        ];
        $result = [];
        foreach ($dates as $k=>$v) {
            $data = $this
                ->where("product_id", $product_id)
                ->where("count <",0)
                ->where("created_at >=", "$year-$v-00 00:00:00")
                ->where("created_at <","$year-".($v+1)."-00 00:00:00")
                ->findAll();
            $total_sales = 0;
            foreach ($data as $kk=>$vc) {
                $total_sales += abs($vc->count);
            }
            $result[$k] = [
                "data"=>$data,
                "total_sales"=>$total_sales
            ];
        }

        return $result;
    }
}