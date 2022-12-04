<?php

namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table            = 'items';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'user_id',
        'room_id',
        'category_id',
        'type_id',
        'item_name',
        'total_item'
    ];

    public function getAll()
    {
        $result = $this->db->table('items')
            ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
            ->join('item_types', 'items.type_id = item_types.id', 'INNER')
            ->get()->getResultObject();

        return $result;
    }

    public function getWhere($key, $value)
    {
        $result = $this->db->table('items')
            ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
            ->join('item_types', 'items.type_id = item_types.id', 'INNER')
            ->where($key, $value)
            ->get()->getResultObject();

        return $result;
    }
}
