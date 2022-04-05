<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Outlet extends Entity
{
    
    protected $attributes = [
        'id'         => null,
        'nama'   => null,
        'alamat'   => null,
        'longitude' => null,
        'latitude' => null,
        'photo' => null,
        'user_id' => null,
    ];
}