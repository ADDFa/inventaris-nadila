<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ruangan extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/ruangan/' . $view, $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Ruangan'
        ];

        return $this->view('tambah', $data);
    }
}
