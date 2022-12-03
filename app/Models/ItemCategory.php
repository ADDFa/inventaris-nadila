<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemCategory extends Model
{
    protected $table            = 'item_categories';
    protected $returnType       = 'object';
    protected $allowedFields    = ['category_name'];
}
