<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Gedung extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/gedung/' . $view, $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Gedung'
        ];

        return $this->view('tambah', $data);
    }
}
