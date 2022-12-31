<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\BaseModel;

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
        'description'
    ];

    public function searchRoom(string $keyword): array
    {
        return $this->like('room_name', $keyword)
            ->select('*, rooms.id AS room_id')
            ->join('buildings', 'buildings.id = rooms.building_id')->findAll(10);
    }

    public function getRoom($id)
    {
        return $this->select('*, rooms.id AS room_id')
            ->join('users', 'users.id = rooms.user_id', 'INNER')
            ->join('buildings', 'rooms.building_id = buildings.id', 'INNER')
            ->find($id);
    }

    public function getAnyColumn(string $columns)
    {
        return $this->select($columns)->findAll();
    }

    public function insertRoom(array $roomData): bool
    {
        $buildingId = $roomData['building_id'];
        $data = BaseModel::getKeysVals($roomData);
        $query = "INSERT INTO rooms ($data->keys) VALUES ($data->vals)";

        $this->db->transStart();
        $this->db->query("UPDATE buildings SET room_total = room_total + 1 WHERE id = $buildingId");
        $this->db->query($query);
        return $this->db->transComplete();
    }

    public function updateRoom(bool $isMoveBuilding, array $data, int $roomId): bool
    {
        $vals = BaseModel::getValsUpdate($data);

        $this->db->transStart();
        $buildingId = $this->db->query("SELECT building_id FROM rooms WHERE id = $roomId")->getFirstRow()->building_id;
        if ($isMoveBuilding) {
            $this->db->query("UPDATE buildings SET room_total = room_total - 1 WHERE id = $buildingId");
            $this->db->query("UPDATE buildings SET room_total = room_total + 1 WHERE id = {$data['building_id']}");
        }
        $this->db->query("UPDATE rooms SET $vals WHERE id = $roomId");
        return $this->db->transComplete();
    }

    public function deleteRoom(int $roomTotal, int $roomId): bool
    {
        $this->db->transStart();
        $this->db->query("UPDATE buildings SET room_total = $roomTotal");
        $this->db->query("DELETE FROM rooms WHERE id = $roomId");
        return $this->db->transComplete();
    }
}
