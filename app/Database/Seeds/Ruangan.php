<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Ruangan extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($data, [
                'id_user'           => 1,
                'id_gedung'         => '1',
                'nama_ruangan'       => 'Ruangan ' . $i,
                'gambar_ruangan'     => 'sample.jpg'
            ]);
        }

        foreach ($data as $data) {
            $this->db->table('ruangan')->insert($data);
        }
    }
}
