<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model {
    protected $table = 'products';
    protected $returnType    = \App\Entities\Product::class;
    protected $useTimestamps = true;
    protected $allowedFields = ["id","nama"];
}