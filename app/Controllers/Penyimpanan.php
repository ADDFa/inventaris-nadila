<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penyimpanan extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/penyimpanan/' . $view, $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Penyimpanan'
        ];

        return $this->view('tambah', $data);
    }
}
