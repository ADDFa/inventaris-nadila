<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Item extends BaseController
{
    private $table, $rooms, $category, $type, $storage;

    public function __construct()
    {
        $this->table = new \App\Models\Item();
        $this->rooms = new \App\Models\Room();
        $this->storage = new \App\Models\Storage();
    }

    public function index()
    {
        $limit = 10;

        $items = $this->table->findAll($limit);

        $pages = $this->request->getGet('pages');

        if ($pages) {
            $offset = (int) $pages * $limit - $limit;
            $items = $this->table
                ->select('*, items.id AS item_id')
                ->findAll($limit, $offset);
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
        $data = [
            'title'     => 'Detail Barang',
            // 'item'      => $this->table->get($id),
            'storages'  => $this->storage->where('item_id', $id)
                ->join('rooms', 'room_id = rooms.id')
                ->findAll()
        ];

        return view('items/detail', $data);
    }

    public function findItem()
    {
        $items = $this->table->like('item_name', $this->request->getGet('v'))
            ->select('*, items.id AS item_id')
            ->join('rooms', 'items.room_id = rooms.id', 'INNER')
            ->findAll(10);

        return $this->response->setJSON(['data' => $items]);
    }

    public function new()
    {
        $data = [
            'title'             => 'Tambah Data Barang',
            'validation'        => $this->validation,
            'categories'        => $this->category->findAll(),
            'types'             => $this->type->findAll(),
            'rooms'             => $this->rooms->findAll()
        ];

        return view('items/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'             => 'Ubah Data Barang',
            'item'              => $this->table->get($id),
            'validation'        => $this->validation,
            'categories'        => $this->category->findAll(),
            'types'             => $this->type->findAll(),
            'rooms'             => $this->rooms->findAll()
        ];

        return view('items/edit', $data);
    }

    public function parsingData()
    {
        $data = $this->request->getPost();
        $data += ['user_id' => session('users')->id];

        $data = array_replace($data, [
            'item_total'    => $this->getPositifNumber($this->request->getPost('item_total')),
            'item_price'    => $this->getPositifNumber($this->request->getPost('item_price')),
            'record_date'   => strtotime($data['record_date'])
        ]);

        return (object) $data;
    }

    public function roomAvailable($itemTotal, $room)
    {
        $total = $itemTotal + $room->filed;
        if ($total > $room->room_capacity) {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Total Barang Melebihi Kapasitas Ruangan, Barang Tidak Ditambahkan'
            ]);

            return false;
        }

        return true;
    }

    public function updateRoom($itemTotal, $room)
    {
        $this->rooms->update($room->id, [
            'filed'         => $room->filed + $itemTotal,
            'available'     => $room->available - $itemTotal
        ]);
    }

    public function create()
    {
        // validasi
        if (!$this->dataItemValid()) return redirect()->to('item/new')->withInput();

        $data = $this->parsingData();

        // cek apakah total barang cukup untuk ruangan yang dipilih
        $room = $this->rooms->find($this->request->getPost('room_id'));
        if (!$this->roomAvailable($data->item_total, $room)) return redirect()->to('item/new')->withInput();

        // update room dan insert data
        $this->updateRoom($data->item_total, $room);
        $this->table->insert($data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Barang Berhasil Ditambahkan'
        ]);
        return redirect()->to('item');
    }

    public function update($id = null)
    {
        // validasi
        if (!$this->dataItemValid()) return redirect()->to("item/{$id}/edit")->withInput();

        $data = $this->parsingData();

        $item = $this->table->find($id);
        $room = $this->rooms->find($item->room_id);

        // jika barang berpindah ruangan
        if ($room->id != $data->room_id) {
            // apakah tersedia ruang di room baru
            $newRoom = $this->rooms->find($data->room_id);
            if (!$this->roomAvailable($data->item_total, $newRoom)) return redirect()->to("item/${id}/edit")->withInput();

            // update room lama dan update room baru
            $this->updateRoom(-$item->item_total, $room);
            $this->updateRoom($data->item_total, $newRoom);
        } else {
            $itemTotal = $data->item_total - $item->item_total;
            if (!$this->roomAvailable($itemTotal, $room)) return redirect()->to("item/${id}/edit")->withInput();
            $this->updateRoom($itemTotal, $room);
        }

        $this->table->update($id, $data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Barang Berhasil Diubah'
        ]);

        return redirect()->to('item');
    }

    public function delete($id = null)
    {
        $item = $this->table->find($id);
        $room = $this->rooms->find($item->room_id);

        // update tabel room
        $this->updateRoom(-$item->item_total, $room);
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

    public function category()
    {
        $result = $this->category->findAll();
        echo json_encode($result);
    }

    public function newCategory()
    {
        if (!$this->categoryValid()) {
            $response = [
                'status'    => 400,
                'ok'        => false,
                'message'   => $this->validation->getError('name')
            ];

            echo json_encode($response);
            return;
        }

        $this->category->insert(['category_name' => $this->request->getPost('name')]);

        $response = [
            'status'    => 200,
            'ok'        => true,
            'message'   => 'Category Berhasil Ditambahkan'
        ];

        echo json_encode($response);
        return;
    }

    public function deleteCategory($id = null)
    {
        $items = $this->table->where('category_id', $id)->findAll();
        $category = $this->category->find($id);

        if (count($items) > 0) {
            $response = [
                'status'    => 409,
                'ok'        => false,
                'message'   => 'Tidak Dapat Menghapus Kategori, Terdapat Item Dengan Kategori ' . $category->category_name
            ];

            echo json_encode($response);
            return;
        }

        $this->category->delete($id);

        $response = [
            'status'    => 200,
            'ok'        => true,
            'message'   => 'Categori Berhasil Dihapus'
        ];

        echo json_encode($response);
        return;
    }

    public function categoryValid()
    {
        return $this->validate([
            'name'  => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => 'Nama Kategori Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40 Karakter'
                ]
            ]
        ]);
    }

    public function type()
    {
        $result = $this->type->findAll();
        echo json_encode($result);
    }

    public function newType()
    {
        if (!$this->typeValid()) {
            $response = [
                'status'    => 400,
                'ok'        => false,
                'message'   => $this->validation->getError('name')
            ];

            echo json_encode($response);
            return;
        }

        $this->type->insert(['type_name' => $this->request->getPost('name')]);

        $response = [
            'status'    => 200,
            'ok'        => true,
            'message'   => 'Jenis Barang Berhasil Ditambahkan'
        ];

        echo json_encode($response);
        return;
    }

    public function deleteType($id = null)
    {
        $items = $this->table->where('type_id', $id)->findAll();
        $type = $this->type->find($id);

        if (count($items) > 0) {
            $response = [
                'status'    => 409,
                'ok'        => false,
                'message'   => 'Tidak Dapat Menghapus Kategori, Terdapat Item Dengan Jenis ' . $type->type_name
            ];

            echo json_encode($response);
            return;
        }

        $this->type->delete($id);

        $response = [
            'status'    => 200,
            'ok'        => true,
            'message'   => 'Jenis Barang Berhasil Dihapus'
        ];

        echo json_encode($response);
        return;
    }

    public function typeValid()
    {
        return $this->validate([
            'name'  => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => 'Jenis Barang Harus Diisi',
                    'max_length'    => 'Panjang Karakter Maksimal 40 Karakter'
                ]
            ]
        ]);
    }
}
