<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemStore extends Model
{
    protected $table            = 'item_tores';
    protected $primaryKey       = 'item_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'item_id',
        'storage_id',
        'item_brand',
        'item_condition',
        'item_price'
    ];
}
