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

    public function searchItem(string $keyword)
    {
        return $this->like('item_name', $keyword)
            ->orLike('item_Category', $keyword)
            ->orLike('item_type', $keyword)
            ->get(10)
            ->getResultObject();
    }

    public function getByRoom(int $roomId)
    {
        return $this->join('storages', 'items.id = storages.item_id', 'INNER')
            ->where('storages.room_id', $roomId)
            ->get()->getResultObject();
    }

    public function getAnyColumn(string $columns)
    {
        return $this->select($columns)->findAll();
    }
}
