<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Validator\ItemValidator;
use App\Controllers\Helper\Messages;

class Item extends BaseController
{
    private $table, $storage;

    public function __construct()
    {
        $this->table = new \App\Models\Item();
        $this->rooms = new \App\Models\Room();
        $this->storage = new \App\Models\Storage();

        Messages::setName('Barang');
    }

    public function index()
    {
        $limit = 10;
        $pages = $this->request->getGet('pages');
        $offset = $pages ? $offset = (int) $pages * $limit - $limit : 0;

        $data = [
            'title'     => 'Manajemen Data Barang',
            'items'     => $this->table->findAll($limit, $offset),
            'pages'     => ceil($this->table->countAllResults() / $limit)
        ];

        return view('items/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'     => 'Detail Barang',
            'item'      => $this->table->getItem($id),
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
        if (!$valid) return redirect()->to('item/new')->withInput()->with('errors', $this->validator->getErrors());

        $data = $this->request->getPost();
        $this->table->insert($data);

        $message = Messages::getInsert();
        session()->setFlashdata($message);

        return redirect()->to('item');
    }

    public function update($id = null)
    {
        $valid = $this->validate(ItemValidator::getValidator());
        if (!$valid) return redirect()->to("item/$id/edit")->withInput()->with('errors', $this->validator->getErrors());

        $data = $this->request->getPost();
        $this->table->update($id, $data);

        $message = Messages::getUpdate();
        session()->setFlashdata($message);

        return redirect()->to('item');
    }

    public function delete($id = null)
    {
        $this->table->delete($id);

        $message = Messages::getDelete();
        session()->setFlashdata($message);

        return redirect()->to('item');
    }
}
