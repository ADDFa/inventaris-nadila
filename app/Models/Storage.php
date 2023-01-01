<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

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
                'users.name',
                'record_date',
                'qty'
            ])
            ->get()->getResultObject();
    }

    public function getStorage(int $id)
    {
        return $this->join('users', 'users.id = storages.user_id', 'INNER')
            ->join('rooms', 'rooms.id = storages.room_id', 'INNER')
            ->join('items', 'items.id = storages.item_id', 'INNER')
            ->join('item_stores', 'item_stores.storage_id = storages.id', 'INNER')
            ->select([
                'storages.id',
                'record_date',
                'qty',
                'item_category',
                'item_type',
                'item_name',
                'item_brand',
                'item_condition',
                'item_price',
                'users.name',
                'users.role',
                'room_name',
                'storages.room_id',
                'storages.item_id'
            ])
            ->find($id);
    }

    public function getAll(int $limit = 0, int $offset = 0)
    {
        return $this->join('users', 'users.id = storages.user_id', 'INNER')
            ->join('rooms', 'rooms.id = storages.room_id', 'INNER')
            ->join('items', 'items.id = storages.item_id', 'INNER')
            ->select([
                'storages.id',
                'record_date',
                'qty',
                'room_name',
                'item_name',
                'users.name',
            ])
            ->findAll($limit, $offset);
    }

    public function insertStorage(array $data): bool
    {
        $keyVals = BaseModel::getKeysVals($data['storage']);
        $valsUpdateRoom = BaseModel::getValsUpdate($data['room']);
        $valsUpdateItems = BaseModel::getValsUpdate($data['item']);

        $this->db->transStart();
        // masukkan data kedalam table storages
        $this->db->query("INSERT INTO storages ($keyVals->keys) VALUES ($keyVals->vals)");

        // ambil id storage terbaru
        $storage_id = $this->db->insertID();
        $keyVals = BaseModel::getKeysVals($data['itemStore'] + ['storage_id' => $storage_id]);
        // masukkan kedalam table item_stores
        $this->db->query("INSERT INTO item_stores ($keyVals->keys) VALUES ($keyVals->vals)");

        // update table rooms
        $this->db->query("UPDATE rooms SET $valsUpdateRoom WHERE id = {$data['storage']['room_id']}");

        // update table items
        $this->db->query("UPDATE items SET $valsUpdateItems WHERE id = {$data['storage']['item_id']}");
        return $this->db->transComplete();
    }

    public function updateStorage(array $data, int $id): bool
    {
        $storage = $data['storage'];
        $itemStore = $data['itemStore'];
        $storageVals = BaseModel::getValsUpdate($storage);
        $itemVals = BaseModel::getValsUpdate($itemStore);

        $this->db->transStart();

        $oldStorage = $this->where('storages.id', $id)->join('rooms', 'storages.room_id = rooms.id')
            ->join('items', 'storages.item_id = items.id')
            ->select([
                'qty',
                'rooms.filed',
                'rooms.available',
                'item_total',
                'item_id',
                'room_id'
            ])
            ->first();

        if ($oldStorage->qty != $storage['qty']) {
            // update rooms
            $filed = $oldStorage->filed - $oldStorage->qty + $storage['qty'];
            $available = $oldStorage->available + $oldStorage->qty - $storage['qty'];
            $this->db->query("UPDATE rooms SET filed = $filed, available = $available WHERE id = {$oldStorage->room_id}");

            // update items
            $itemTotal = $oldStorage->item_total - $oldStorage->qty + $storage['qty'];
            $this->db->query("UPDATE items SET item_total = $itemTotal WHERE id = {$oldStorage->item_id}");
        }

        // update item_stores
        $this->db->query("UPDATE item_stores SET $itemVals WHERE storage_id = $id");

        // update storages
        $this->db->query("UPDATE storages SET $storageVals WHERE id = $id");

        return $this->db->transComplete();
    }

    public function deleteStorage(int $id): bool
    {
        $this->db->transStart();

        $storage = $this->find($id);

        // update table rooms
        $this->db->query("UPDATE rooms SET filed = filed - {$storage->qty}, available = available + {$storage->qty}
            WHERE id = {$storage->room_id}");

        // update table items
        $this->db->query("UPDATE items SET item_total = item_total - {$storage->qty} WHERE id = {$storage->item_id}");

        // delete data storage
        $this->db->query("DELETE FROM storages WHERE id = $id");

        return $this->db->transComplete();
    }

    public function filterStorage(array $filters, string $search): array
    {
        $result = $this->select([
            'storages.id',
            'record_date',
            'qty',
            'room_name',
            'item_name',
            'users.name',
        ])
            ->join('items', 'items.id = storages.item_id')
            ->join('rooms', 'rooms.id = storages.room_id')
            ->join('users', 'users.id = storages.user_id')
            ->like('item_name', $search);

        foreach ($filters as $column => $filter) {
            if ($column !== 's') $result->where($column, $filter);
        }

        return $result->findAll();
    }
}
