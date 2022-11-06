<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ruangan extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/ruangan/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'     => 'Ruangan',
            'linkAction' => [
                'create' => '/ruangan/tambah'
            ]
        ];

        return $this->view('index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Ruangan'
        ];

        return $this->view('tambah', $data);
    }
}
