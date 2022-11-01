<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/barang/' . $view, $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Barang'
        ];

        return $this->view('tambah', $data);
    }
}
