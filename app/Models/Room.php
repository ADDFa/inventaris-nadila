<?php

namespace App\Models;

use CodeIgniter\Model;

class Room extends Model
{
    protected $table            = 'rooms';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'user_id',
        'building_id',
        'room_name',
        'room_capacity',
        'filed',
        'available',
        'room_size',
        'room_image'
    ];
}
