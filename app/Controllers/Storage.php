<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Validator\StorageValidator;
use App\Controllers\Helper\Messages;

class Storage extends BaseController
{
    private $table, $itemStore, $item, $room;

    public function __construct()
    {
        $this->table = new \App\Models\Storage();
        $this->itemStore = new \App\Models\ItemStore();
        $this->item = new \App\Models\Item();
        $this->room = new \App\Models\Room();

        Messages::setName('Penyimpanan');
    }

    private function getStorageData(array $req, array $room, array $item): array
    {
        $roomFiled = $room['filed'] + $req['qty'];

        return [
            'storage'   => [
                'room_id'       => $req['room_id'],
                'item_id'       => $req['item_id'],
                'user_id'       => session('users')->id,
                'record_date'   => time(),
                'qty'           => $req['qty']
            ],

            'itemStore' => [
                'item_id'           => $req['item_id'],
                'item_brand'        => $req['item_brand'],
                'item_condition'    => $req['item_condition'],
                'item_price'        => $req['item_price']
            ],

            'room' => [
                'filed'             => $roomFiled,
                'available'         => $room['room_capacity'] - $roomFiled
            ],

            'item' => [
                'item_total'        => $item['item_total'] + $req['qty']
            ]
        ];
    }

    public function index()
    {
        $limit = 10;
        $pages = $this->request->getGet('pages');
        $offset = $pages ? (int) $pages * $limit - $limit : 0;

        $data = [
            'title'     => 'Manajemen Penyimpanan',
            'storages'   => $this->table->getAll($limit, $offset),
            'pages'     => ceil($this->table->countAllResults() / $limit)
        ];

        return view('storages/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'     => 'Detail Penyimpanan',
            'storage'   => $this->table->get($id)
        ];

        return view('storages/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'     => 'Tambah Data Penyimpanan',
            'rooms'     => $this->room->getAnyColumn('id, room_name'),
            'items'     => $this->item->getAnyColumn('id, item_name')
        ];

        return view('storages/new', $data);
    }

    public function edit()
    {
        $data = [
            'title'     => 'Ubah Data Penyimpanan'
        ];

        return view('storages/edit', $data);
    }

    public function create()
    {
        $valid = $this->validate(StorageValidator::getValidator());
        if (!$valid) return redirect()->to("storage/new")->withInput()->with('errors', $this->validator->getErrors());

        $req = $this->request->getPost();
        $room = $this->room->select(['filed', 'available', 'room_capacity'])->find($req['room_id']);
        $item = $this->item->find($req['item_id']);
        // $roomAvailable = $room->room_capacity - $roomFiled;

        if (($room->filed + $req['qty']) > $room->room_capacity) {
            $this->validator->setError('qty', 'Jumlah Barang Melebihi Kapasitas');
            return redirect()->to("storage/new")->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->getStorageData($req, (array) $room, (array) $item);
        $this->table->insertStorage($data);

        $message = Messages::getInsert();
        session()->setFlashdata($message);

        return redirect()->to('storage');
    }

    public function update($id = null)
    {
        $valid = $this->validate(StorageValidator::getValidator());
        if (!$valid) return redirect()->to("storage/$id/edit")->withInput()->with('errors', $this->validator->getErrors());

        $data = [];
        $this->table->insert($data);

        $message = Messages::getInsert();
        session()->setFlashdata($message);

        return redirect()->to('storage');
    }

    public function delete($id = null)
    {
        $this->table->deleteStorage($id);

        $message = Messages::getInsert();
        session()->setFlashdata($message);

        return redirect()->to('storage');
    }
}
