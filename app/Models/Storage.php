<?php

namespace App\Models;

use CodeIgniter\Model;

class Storage extends Model
{
    protected $table            = 'storages';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'room_id',
        'item_id',
        'user_id',
        'record_date',
        'qty'
    ];

    public function getWhere($key, $val)
    {
        return $this->db->table('storages')
            ->where($key, $val)
            ->join('rooms', 'storages.room_id = rooms.id', 'INNER')
            ->join('items', 'storages.item_id = items.id', 'INNER')
            ->join('users', 'storages.user_id = users.id', 'INNER')
            ->select([
                'room_name',
                'item_name',
                'users.name',
                'record_date',
                'qty'
            ])
            ->get()->getResultObject();
    }
}
