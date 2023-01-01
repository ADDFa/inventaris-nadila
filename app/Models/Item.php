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
        'item_total',
        'administrator'
    ];

    public function getItem(int $id)
    {
        return $this->select([
            'id',
            'item_name',
            'item_category',
            'item_type',
            'item_total',
            'administrator'
        ])->find($id);
    }

    public function searchItem(string $keyword)
    {
        return $this->like('item_name', $keyword)
            ->orLike('item_Category', $keyword)
            ->orLike('item_type', $keyword)
            ->get(10)
            ->getResultObject();
    }

    public function getAnyColumn(string $columns)
    {
        return $this->select($columns)->findAll();
    }

    public function getDistinctColumn(string $column): array
    {
        return $this->db->query("SELECT DISTINCT $column FROM items")->getResultObject();
    }
}
