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

    public function show($id)
    {
        $data = [
            'title'     => 'Detail Ruangan',
            'barang'   => $this->table->find($id)
        ];

        return $this->view('detail', $data);
    }

    public function create($id = null)
    {
        $data = [
            'title'     => $id ? 'Ubah' : 'Tambah',
            'path'      => $id ? 'update' : 'insert',
            'id'        => $id
        ];

        return $this->view('manage', $data);
    }

    public function insert()
    {
        dd($this->request->getPost());

        return redirect()->to('/barang');
    }

    public function update()
    {
        dd($this->request->getPost('id'));

        return redirect()->to('/barang');
    }

    public function delete()
    {
        dd($this->request->getPost('id'));

        return redirect()->to('/barang');
    }
}
