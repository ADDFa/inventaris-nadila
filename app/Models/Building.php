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

    public function get($id)
    {
        $result = $this->db->table('buildings')
            ->where('buildings.id', $id)->join('users', 'buildings.user_id = users.id', 'INNER')
            ->get()->getFirstRow();

        return $result;
    }
}
