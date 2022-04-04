<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class User extends Entity
{
    
    protected $attributes = [
        'id'         => null,
        'username'   => null,
        'password'   => null,
        'role' => null,
        'created_at' => null,
        'updated_at' => null,
    ];
}