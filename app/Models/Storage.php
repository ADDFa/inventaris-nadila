<?php

namespace App\Models;

use CodeIgniter\Model;

class Storage extends Model
{
    protected $table            = 'storages';
    protected $primaryKey       = 'item_id';
    protected $useAutoIncrement = false;
    protected $returnType       = 'object';
    protected $allowedFields    = ['room_id', 'item_id', 'record_date', 'qty'];
}
