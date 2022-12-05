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
        'item_total',
        'item_brand',
        'item_condition',
        'item_price',
        'record_date'
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

    public function getLimit($limit, $offset = 0)
    {
        $result = $this->db->table('items')
            ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
            ->join('item_types', 'items.type_id = item_types.id', 'INNER')
            ->get($limit, $offset)->getResultObject();

        return $result;
    }

    public function get($id)
    {
        $result = $this->db->table('items')
            ->where('items.id', $id)
            ->join('item_categories', 'items.category_id = item_categories.id', 'INNER')
            ->join('item_types', 'items.type_id = item_types.id', 'INNER')
            ->join('rooms', 'items.room_id = items.id', 'INNER')
            ->join('users', 'items.user_id = users.id', 'INNER')
            ->get()->getFirstRow();

        return $result;
    }
}
