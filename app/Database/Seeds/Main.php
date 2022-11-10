<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Main extends Seeder
{
    public function run()
    {
        $this->call('Users');
        $this->call('Gedung');
        $this->call('Ruangan');
        $this->call('Barang');
        $this->call('Penyimpanan');
    }
}
