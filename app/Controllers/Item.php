<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Validator\ItemValidator;

class Item extends BaseController
{
    private $table, $storage;

    public function __construct()
    {
        $this->table = new \App\Models\Item();
        $this->rooms = new \App\Models\Room();
        $this->storage = new \App\Models\Storage();
    }

    public function index()
    {
        $limit = 10;
        $offset = 0;
        $pages = $this->request->getGet('pages');

        $offset = $pages ? $offset = (int) $pages * $limit - $limit : 0;
        $items = $this->table->findAll($limit, $offset);

        $data = [
            'title'     => 'Manajemen Data Barang',
            'items'     => $items,
            'pages'     => ceil($this->table->countAllResults() / $limit)
        ];

        return view('items/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'     => 'Detail Barang',
            'item'      => $this->table->find($id),
            'storages'  => $this->storage->getWhere('item_id', $id)
        ];

        return view('items/detail', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('v');

        return $this->response->setJSON([
            'data' => $this->table->searchItem($keyword)
        ]);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Data Barang'
        ];

        return view('items/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'             => 'Ubah Data Barang',
            'item'              => $this->table->find($id)
        ];

        return view('items/edit', $data);
    }

    public function create()
    {
        $valid = $this->validate(ItemValidator::getValidator());
        if (!$valid) return redirect()->to('item')->withInput()->with('errors', $this->validator->getErrors());

        $data = $this->request->getPost();

        if ($this->table->insert($data) > 0) {
            session()->setFlashdata([
                'status'    => 'success',
                'message'   => 'Data Barang Berhasil Ditambahkan'
            ]);
        } else {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Data Barang Gagal Ditambahkan, Harap Ulangi!'
            ]);
        }

        return redirect()->to('item');
    }

    public function update($id = null)
    {
        $valid = $this->validate(ItemValidator::getValidator());
        if (!$valid) return redirect()->to('item')->withInput()->with('errors', $this->validator->getErrors());

        $data = $this->request->getPost();
        if ($this->table->update($id, $data)) {
            session()->setFlashdata([
                'status'    => 'success',
                'message'   => 'Data Barang Berhasil Diubah'
            ]);
        } else {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Data Barang Gagal Diubah, Harap Ulangi!'
            ]);
        }

        return redirect()->to('item');
    }

    public function delete($id = null)
    {
        if ($this->table->delete($id)) {
            session()->setFlashdata([
                'status'    => 'success',
                'message'   => 'Data Barang Berhasil Dihapus'
            ]);
        } else {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Data Barang Gagal Dihapus, Harap Ulangi!'
            ]);
        }

        return redirect()->to('item');
    }
}
