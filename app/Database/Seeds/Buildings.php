<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Buildings extends Seeder
{
    public function run()
    {
        $buldings = [
            [
                'user_id'                       => 1,
                'building_name'                 => 'Gedung A',
                'building_size'                 => '20 X 20',
                'room_total'                    => 5,
                'building_registration_date'    => '1670067568',
                'building_image'                => 'sample.jpg'
            ],

            [
                'user_id'                       => 2,
                'building_name'                 => 'Gedung B',
                'building_size'                 => '50 X 50',
                'room_total'                    => 15,
                'building_registration_date'    => '1670067569',
                'building_image'                => 'sample.jpg'
            ]
        ];

        for ($i = 0; $i < count($buldings); $i++) {
            $this->db->table('buildings')->insert($buldings[$i]);
        }
    }
}
