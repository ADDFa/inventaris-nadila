<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Item extends BaseController
{
    private $table, $rooms;

    public function __construct()
    {
        $this->table = new \App\Models\Item();
        $this->rooms = new \App\Models\Room();
    }

    public function index()
    {
        $limit = 10;

        $items = $this->table->findAll($limit);
        $pages = $this->request->getGet('pages');

        if ($pages) {
            $offset = (int) $pages * $limit - $limit;
            $items = $this->table->findAll($limit, $offset);
        }

        $data = [
            'title'     => 'Manajemen Data Barang',
            'items'     => $items,
            'pages'     => ceil($this->table->countAllResults() / $limit)
        ];

        return view('items/index', $data);
    }

    public function show($id = null)
    {
        if (is_null($id)) return redirect()->to('item');

        $data = [
            'title'     => 'Detail Barang',
            'item'      => $this->table->get($id)
        ];

        return view('items/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'             => 'Tambah Data Barang',
            'validation'        => $this->validation,
            'categories'        => (new \App\Models\ItemCategory())->findAll(),
            'types'             => (new \App\Models\ItemType())->findAll(),
            'rooms'             => (new \App\Models\Room())->findAll()
        ];

        return view('items/new', $data);
    }

    public function edit($id = null)
    {
        if (is_null($id)) return redirect()->to('item');

        $data = [
            'title'     => 'Ubah Data Barang'
        ];

        return view('items/edit', $data);
    }

    public function create()
    {
        // validasi
        if (!$this->dataItemValid()) return redirect()->to('item/new')->withInput();

        $data = $this->request->getPost();
        $data += ['user_id' => session('users')->id];
        $itemTotal = $this->getPositifNumber($this->request->getPost('item_total'));

        $data = array_replace($data, ['item_total' => $itemTotal]);
        $room = $this->rooms->find($data['room_id']);

        // cek apakah total barang cukup untuk ruangan yang dipilih
        $itemsTotal = $data['item_total'] + $room->filed;

        if ($itemsTotal > $room->room_capacity) {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Total Barang Melebihi Kapasitas Ruangan, Barang Tidak Ditambahkan'
            ]);
            return redirect()->to('item/new')->withInput();
        }

        // ambil sisa dari pengurangan (kapasitas - filed | terisi) update table ruangan
        $roomAvailable = $room->room_capacity - $itemsTotal;
        $updateRoom = [
            'filed'         => $itemsTotal,
            'available'     => $roomAvailable
        ];
        $this->rooms->update($room->id, $updateRoom);
        $this->table->insert($data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Barang Berhasil Ditambahkan'
        ]);
        return redirect()->to('item');
    }

    public function update()
    {
        // 
    }

    public function delete($id = null)
    {
        if (is_null($id)) return redirect()->to('item');

        $item = $this->table->find($id);
        $room = $this->rooms->find($item->room_id);
        // update data filed dan available di tabel room
        $filed = $room->filed - $item->item_total;
        $roomUpdate = [
            'filed'         => $filed,
            'available'     => $room->room_capacity - $filed
        ];

        $this->rooms->update($room->id, $roomUpdate);
        $this->table->delete($id);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Barang Berhasil Dihapus'
        ]);
        return redirect()->to('item');
    }

    public function dataItemValid()
    {
        return $this->validate([
            'item_name' => [
                'rules'             => 'required|max_length[40]',
                'errors' => [
                    'required'      => 'Nama Barang Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],

            'item_total' => [
                'rules'             => 'required|max_length[11]',
                'errors' => [
                    'required'      => 'Jumlah Barang Harus Diisi'
                ]
            ],

            'item_brand' => [
                'rules'             => 'required|max_length[40]',
                'errors' => [
                    'required'      => 'Merk Barang Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],

            'item_condition' => [
                'rules'             => 'required|max_length[40]',
                'errors' => [
                    'required'      => 'Kondisi Barang Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],

            'item_price' => [
                'rules'             => 'required|max_length[40]',
                'errors' => [
                    'required'      => 'Harga Barang Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],

            'record_date' => [
                'rules'             => 'required|max_length[40]',
                'errors' => [
                    'required'      => 'Tanggal Pencatatan Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ]
        ]);
    }
}
