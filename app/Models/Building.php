<?php

namespace App\Models;

use CodeIgniter\Model;

class Building extends Model
{
    protected $table            = 'buildings';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'user_id',
        'gedung_name',
        'bulding_size',
        'total_room',
        'building_registration_date',
        'building_image'
    ];
}
