<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Product extends Entity
{
    
    protected $attributes = [
        'id'         => null,
        'nama'   => null,
    ];
}