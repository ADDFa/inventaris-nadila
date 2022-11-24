<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Gedung;
use App\Models\Ruangan;
use App\Models\Barang;

class Home extends BaseController
{
    public function index()
    {
        $gedung = (new Gedung())->findAll();
        $ruangan = (new Ruangan())->findAll();
        $barang = (new Barang())->findAll();

        $data = [
            'title'         => 'Dashboard',
            'style'         => 'dashboard',
            'jumlahData'   => (object) [
                'gedung'    => count($gedung),
                'ruangan'   => count($ruangan),
                'barang'    => count($barang)
            ]
        ];

        return view('pages/dashboard', $data);
    }
}
