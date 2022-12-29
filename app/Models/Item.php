<?php

namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table            = 'items';
    protected $returnType       = 'object';
    protected $allowedFields    = [
        'item_category',
        'item_type',
        'item_name',
        'item_total'
    ];

    // public function getAll($limit = null, $offset = 0)
    // {
    //     $result = $this->db->table('items')
    //         ->select('*, items.id AS item_id')
    //         ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
    //         ->join('item_types', 'items.type_id = item_types.id', 'INNER')
    //         ->join('rooms', 'items.room_id = rooms.id', 'INNER')
    //         ->join('users', 'items.user_id = users.id', 'INNER')
    //         ->get($limit, $offset)->getResultObject();

    //     return $result;
    // }

    // public function getWhere($key, $value)
    // {
    //     $result = $this->db->table('items')
    //         ->select('*, items.id AS item_id')
    //         ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
    //         ->join('item_types', 'items.type_id = item_types.id', 'INNER')
    //         // ->where($key, $value)
    //         ->get()->getResultObject();

    //     return $result;
    // }

    // public function getLimit($limit, $offset = 0)
    // {
    //     $result = $this->db->table('items')
    //         ->select('*, items.id AS item_id')
    //         ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
    //         ->join('item_types', 'items.type_id = item_types.id', 'INNER')
    //         ->get($limit, $offset)->getResultObject();

    //     return $result;
    // }
}
