<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Barang as Table;

class Barang extends BaseController
{
    private $table;

    public function __construct()
    {
        $this->table = new Table();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/barang/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'         => 'Barang',
            'linkAction'    => [
                'create'    => '/barang/tambah',
                'next'      => '/barang?page=2',
                'prev'      => '/barang?page=2'
            ],
            'barang'        => $this->table->findAll()
        ];

        return $this->view('index', $data);
    }

    public function create()
    {
        $data = [
            'title'     => 'Tambah Barang'
        ];

        return $this->view('tambah', $data);
    }

    public function insert()
    {
        return redirect()->to('/barang');
    }

    public function update()
    {
        return redirect()->to('/barang');
    }

    public function delete()
    {
        return redirect()->to('/barang');
    }
}
