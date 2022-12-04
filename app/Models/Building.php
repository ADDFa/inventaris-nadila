<?php

namespace App\Models;

use CodeIgniter\Model;

class Building extends Model
{
    protected $table            = 'buildings';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'user_id',
        'building_name',
        'building_size',
        'room_total',
        'building_registration_date',
        'building_image'
    ];
}
