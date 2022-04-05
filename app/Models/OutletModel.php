<?php

namespace App\Models;

use CodeIgniter\Model;

class OutletModel extends Model {
    protected $table = 'outlets';
    protected $returnType    = \App\Entities\Outlet::class;
    protected $useTimestamps = true;
    protected $allowedFields = ["id","nama","alamat","latitude","longitude","photo","user_id"];
}