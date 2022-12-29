<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Room extends BaseController
{
    private $table, $building, $item, $db;

    public function __construct()
    {
        $this->table = new \App\Models\Room();
        $this->building = new \App\Models\Building();
        $this->item = new \App\Models\Item();
    }

    public function index()
    {
        $limit = 10;
        $pages = $this->request->getGet('pages');
        $offset = $pages ? (int) $pages * $limit - $limit : 0;

        $data = [
            'title'         => 'Manajemen Data Ruangan',
            'rooms'         => $this->table->findAll($limit, $offset),
            'pages'         => ceil($this->table->countAllResults() / $limit)
        ];

        return view('rooms/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'         => 'Detail Ruangan',
            'room'          => $this->table->getRoom($id),
            'items'         => $this->item->getByRoom($id)
        ];

        return view('rooms/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'         => 'Tambah Data Ruangan',
            'buildings'     => $this->building->getAnyColumn('id, building_name'),
            'validation'    => $this->validation
        ];

        return view('rooms/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Ubah Data Ruangan',
            'room'          => $this->table->find($id),
            'buildings'     => $this->building->getAnyColumn('id, building_name'),
            'validation'    => $this->validation
        ];

        return view('rooms/edit', $data);
    }

    public function search()
    {
        $rooms = $this->table->like('room_name', $this->request->getGet('v'))
            ->select('*, rooms.id AS room_id')
            ->join('buildings', 'buildings.id = rooms.building_id')->findAll(10);
        return $this->response->setJSON(['data' => $rooms]);
    }

    public function create()
    {
        // validasi ruangan
        if (!$this->checkValid()) return redirect()->to('room/new')->withInput();

        $data = $this->request->getPost() + [
            'available'     => $this->request->getPost('room_capacity'),
            'user_id'       => session('users')->id
        ];

        // cek apakah kapasitas ruangan minus
        if ($data['room_capacity'] < 0) $data['room_capacity'] *= -1;

        $roomTotal = $this->building->where('id', $data['building_id'])->findColumn('room_total')[0] + 1;

        // insert jumlah ruangan kedalam data gedung
        if ($this->table->insertRoom($roomTotal, $data)) {
            session()->setFlashdata([
                'status'    => 'success',
                'message'   => 'Data Ruangan Berhasil Ditambahkan'
            ]);
        } else {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Gagal Menambahkan, Harap Ulangi Lagi!'
            ]);
        }

        return redirect()->to('room');
    }

    public function update($id = null)
    {
        $room = $this->table->find($id);
        $req = (object) $this->request->getPost();
        $isOldName = $this->request->getPost('room_name') === $room->room_name;
        $isRoomMove = $room->building_id != $req->building_id;

        // validasi ruangan
        if (!$this->checkValid($isOldName)) return redirect()->to("room/{$id}/edit")->withInput();

        // cek apakah ruangan memenuhi syarat untuk update (kapasitas ruangan harus lebih besar dari jumlah ruangan terisi)
        if ($req->room_capacity < $room->filed) {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Gagal Update, Kapasitas Ruangan Harus Lebih Dari Jumlah Barang Saat Ini.'
            ]);

            return redirect()->to("room/{$id}/edit")->withInput();
        }

        $available = $req->room_capacity - $room->filed;
        $data = [
            'building_id'   => $req->building_id,
            'room_capacity' => $req->room_capacity,
            'room_size'     => $req->room_size,
            'description'   => $req->description,
            'available'     => $available
        ];

        if (!$isOldName) {
            $data += ['room_name' => $req->room_name,];
        }

        // update data di database
        if ($this->table->updateRoom($isRoomMove, $data, $id)) {
            session()->setFlashdata([
                'status'    => 'success',
                'message'   => 'Data Ruangan Berhasil Diubah'
            ]);
        } else {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Gagal Update, Harap Ulangi Lagi!'
            ]);
        }

        return redirect()->to("room/{$id}/edit");
    }

    public function delete($id = null)
    {
        $room = $this->table->find($id);

        // hapus ruangan
        $roomTotal = $this->building->where('id', $room->building_id)->findColumn('room_total')[0] - 1;
        if ($this->table->deleteRoom($roomTotal, $id)) {
            session()->setFlashdata([
                'status'    => 'success',
                'message'   => 'Data Ruangan Berhasil Dihapus'
            ]);
        } else {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Gagal Menghapus, Harap Ulangi Lagi!'
            ]);
        }

        return redirect()->to('room');
    }

    public function checkValid(bool $oldName = false): bool
    {
        $validation = [
            'building_id' => [
                'rules'             => 'required',
                'errors'            => [
                    'required'      => 'Gedung Wajib Diisi'
                ]
            ],
            'room_capacity' => [
                'rules'             => 'required|max_length[11]',
                'errors'            => [
                    'required'      => 'Kapasitas Ruangan Ruangan Harus Diisi'
                ]
            ],
            'room_size' => [
                'rules'             => 'required|max_length[20]',
                'errors'            => [
                    'required'      => 'Ukuran Ruangan Harus Diisi',
                    'max_length'    => 'Ukuran Ruangan Maksimal 20 Karakter'
                ]
            ],
            'description'           => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => 'Deskripsi Ruangan Harus Diisi',
                    'max_length'    => 'Panjang Maksimal 40 Karakter'
                ]
            ]
        ];

        if (!$oldName) {
            $validation += [
                'room_name' => [
                    'rules'             => 'required|max_length[40]|is_unique[rooms.room_name]',
                    'errors'            => [
                        'required'      => 'Nama Ruangan Harus Diisi',
                        'max_length'    => 'Nama Ruangan Maksimal 40 Karakter',
                        'is_unique'     => 'Nama Ruangan Telah Ada, Masukkan Nama Ruangan Yang Lain'
                    ]
                ]
            ];
        }

        return  $this->validate($validation);
    }
}
