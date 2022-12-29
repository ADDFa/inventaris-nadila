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

    public function getBuilding($id)
    {
        return $this->select('*, buildings.id AS building_id')
            ->join('users', 'buildings.user_id = users.id', 'INNER')
            ->find($id);
    }

    public function getAnyColumn(string $columns): array
    {
        return $this->select($columns)
            ->get()->getResultObject();
    }
}
