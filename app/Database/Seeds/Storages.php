<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Storages extends Seeder
{
    public function run()
    {
        $storages = [
            [
                'room_id'       => 1,
                'item_id'       => 1,
                'user_id'       => 1,
                'record_date'   => time(),
                'qty'           => 6
            ],
            [
                'room_id'       => 2,
                'item_id'       => 2,
                'user_id'       => 2,
                'record_date'   => time(),
                'qty'           => 4
            ]
        ];

        foreach ($storages as $storage) {
            $this->db->table('storages')->insert($storage);
        }
    }
}
