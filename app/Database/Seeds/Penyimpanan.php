<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Penyimpanan extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($data, [
                'id_user'               => 1,
                'id_ruangan'            => 1,
                'id_barang'             => 1,
                'jumlah_penyimpanan'    => $i * 10,
                'tgl_penyimpanan'       => '10',
                'bulan_penyimpanan'     => '11',
                'tahun_penyimpanan'     => '2022'
            ]);
        }

        foreach ($data as $data) {
            $this->db->table('penyimpanan')->insert($data);
        }
    }
}
