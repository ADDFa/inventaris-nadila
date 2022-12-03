<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemType extends Model
{
    protected $table            = 'item_types';
    protected $returnType       = 'object';
    protected $allowedFields    = ['type_name'];
}
