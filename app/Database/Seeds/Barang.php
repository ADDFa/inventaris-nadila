<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        $data = [];

        for ($i = 0; $i < 10; $i++) {
            array_push($data, [
                'id_user'               => 1,
                'id_ruangan'            => 1,
                'nama_barang'           => $i * 10,
                'kategori_barang'       => 'Kategori ' . $i,
                'jenis_barang'          => 'Jenis ' . $i,
                'jumlah_barang'         => $i * 10,
                'merk_barang'           => 'Merk ' . $i,
                'tgl_pencatatan'        => '10',
                'bulan_pencatatan'      => '11',
                'tahun_pencatatan'      => '2022',
                'ketersediaan_barang'   => 'Ada',
                'harga_barang'          => $i * 10000,
                'gambar_barang'         => 'sample.jpg'
            ]);
        }

        foreach ($data as $data) {
            $this->db->table('barang')->insert($data);
        }
    }
}
