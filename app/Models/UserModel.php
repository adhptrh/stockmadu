<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $returnType    = \App\Entities\User::class;
    protected $useTimestamps = true;
    protected $allowedFields = ["id","username","password","role"];
}