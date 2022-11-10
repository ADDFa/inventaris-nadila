<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Gedung extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($data, [
                'id_user'           => 1,
                'nama_gedung'       => 'Gedung ' . $i,
                'tgl_pencatatan'    => '10',
                'bulan_pencatatan'  => '11',
                'tahun_pencatatan'  => '2022',
                'gambar_gedung'     => 'sample.jpg'
            ]);
        }

        foreach ($data as $data) {
            $this->db->table('gedung')->insert($data);
        }
    }
}
