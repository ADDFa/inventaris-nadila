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

    public function getFirstWhere($key, $value)
    {
        $result = $this->db->table('rooms')
            ->select('*, rooms.id AS room_id')
            ->where($key, $value)
            ->join('users', 'users.id = rooms.user_id', 'INNER')
            ->join('buildings', 'rooms.building_id = buildings.id', 'INNER')
            ->get()->getFirstRow();

        return $result;
    }
}
