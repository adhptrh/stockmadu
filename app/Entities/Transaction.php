<?php
namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Transaction extends Entity
{
    
    protected $attributes = [
        'id'         => null,
        'product_id'   => null,
        'outlet_id'   => null,
        'count'   => null,
    ];
}