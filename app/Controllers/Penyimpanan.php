<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Penyimpanan extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/penyimpanan/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'     => 'Penyimpanan',
            'linkAction' => [
                'create'    => '/penyimpanan/tambah',
                'next'      => '/penyimpanan?page=2',
                'prev'      => '/penyimpanan?page=2'
            ]
        ];

        return $this->view('index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Penyimpanan'
        ];

        return $this->view('tambah', $data);
    }

    public function insert()
    {
        return redirect()->to('/penyimpanan');
    }

    public function update()
    {
        return redirect()->to('/penyimpanan');
    }

    public function delete()
    {
        return redirect()->to('/penyimpanan');
    }
}
