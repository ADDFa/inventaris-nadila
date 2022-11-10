<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Penyimpanan as Table;

class Penyimpanan extends BaseController
{
    private $table;

    public function __construct()
    {
        $this->table = new Table();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/penyimpanan/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'         => 'Penyimpanan',
            'linkAction'    => [
                'create'    => '/penyimpanan/tambah',
                'next'      => '/penyimpanan?page=2',
                'prev'      => '/penyimpanan?page=2'
            ],
            'penyimpanan'   => $this->table->findAll()
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
