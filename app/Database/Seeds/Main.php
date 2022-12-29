<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Main extends Seeder
{
    public function run()
    {
        $this->call('Users');
        $this->call('Buildings');
        $this->call('Rooms');
        $this->call('Items');
        $this->call('Storages');
    }
}
