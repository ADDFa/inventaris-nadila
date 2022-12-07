<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table            = 'users';
    protected $returnType       = 'object';
    protected $allowedFields    = ['name', 'profile_picture'];

    public function getAll($limit, $offset = 0)
    {
        $result = $this->db->table('users')
            ->join('credentials', 'credentials.user_id = users.id', 'INNER')
            ->select('name, username, profile_picture, id')
            ->get($limit, $offset)->getResultObject();

        return $result;
    }

    public function get($id)
    {
        $result = $this->db->table('users')
            ->where('id', $id)
            ->join('credentials', 'credentials.user_id = users.id', 'INNER')
            ->select('name, username, profile_picture, id')
            ->get()->getFirstRow();

        return $result;
    }

    public function getPassword($id)
    {
        $result = $this->db->table('credentials')
            ->select('user_id, password')
            ->where('user_id', $id)
            ->get()->getFirstRow();

        return $result;
    }
}
