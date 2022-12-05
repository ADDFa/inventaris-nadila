<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Rooms extends Seeder
{
    public function run()
    {
        $rooms = [
            [
                'user_id'       => 1,
                'building_id'   => 1,
                'room_name'     => 'Ruangan Makan',
                'room_capacity' => 200,
                'filed'         => 0,
                'available'     => 200,
                'room_size'     => '5 X 5',
                'room_image'    => 'sample.jpg'
            ],

            [
                'user_id'       => 2,
                'building_id'   => 2,
                'room_name'     => 'Ruangan Minum',
                'room_capacity' => 100,
                'filed'         => 10,
                'available'     => 90,
                'room_size'     => '5 X 5',
                'room_image'    => 'sample.jpg'
            ]
        ];

        for ($i = 0; $i < count($rooms); $i++) {
            $this->db->table('rooms')->insert($rooms[$i]);
        }
    }
}
