<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Room extends BaseController
{
    private $table, $building, $item;

    public function __construct()
    {
        $this->table = new \App\Models\Room();
        $this->building = new \App\Models\Building();
        $this->item = new \App\Models\Item();
    }

    public function index()
    {
        $limit = 10;

        $rooms = $this->table->getAll($limit);
        $pages = $this->request->getGet('pages');

        if ($pages) {
            $offset = (int) $pages * $limit - $limit;
            $rooms = $this->table->getAll($limit, $offset);
        }


        $data = [
            'title'         => 'Manajemen Data Ruangan',
            'rooms'         => $rooms,
            'pages'         => ceil($this->table->countAllResults() / $limit)
        ];

        return view('rooms/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'         => 'Detail Ruangan',
            'room'          => $this->table->getFirstWhere('rooms.id', $id),
            'items'          => $this->item->getWhere('room_id', $id)
        ];

        return view('rooms/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'         => 'Tambah Data Ruangan',
            'buildings'      => $this->building->findAll(),
            'validation'    => $this->validation
        ];

        return view('rooms/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Ubah Data Ruangan',
            'room'          => $this->table->find($id),
            'buildings'     => $this->building->findAll(),
            'validation'    => $this->validation
        ];

        return view('rooms/edit', $data);
    }

    public function create()
    {
        // validasi ruangan
        if (!$this->checkValid()) return redirect()->to('room/new')->withInput();

        $building = $this->building->where('id', $this->request->getPost('building_id'))->first();

        $data = $this->request->getPost();
        $data += [
            'available'     => $data['room_capacity'],
            'user_id'       => session('users')->id
        ];

        // insert jumlah ruangan kedalam data gedung
        $this->building->update($data['building_id'], [
            'room_total'    => $building->room_total + 1
        ]);
        $this->table->insert($data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Ruangan Berhasil Ditambahkan'
        ]);

        return redirect()->to('room');
    }

    public function update($id = null)
    {
        $room = $this->table->find($id);
        $oldName = $this->request->getPost('room_name') === $room->room_name;

        // validasi ruangan
        if (!$this->checkValid($oldName)) return redirect()->to("room/{$id}/edit")->withInput();

        $data = $this->request->getPost();

        // cek apakah ruangan memenuhi syarat untuk update (kapasitas ruangan harus lebih besar dari jumlah ruangan terisi)
        if ($data['room_capacity'] < $room->filed) {
            session()->setFlashdata([
                'status'    => 'error',
                'message'   => 'Gagal Update, Kapasitas Ruangan Harus Lebih Dari Jumlah Barang Saat Ini.'
            ]);

            return redirect()->to("room/{$id}/edit")->withInput();
        }

        // cek apakah ruangan berpindah gedung atau tidak
        if ($room->building_id != $data['building_id']) {
            // jika berpindah gedung, update isi gedung
            $oldBuilding = $this->building->find($room->building_id);
            $newBuilding = $this->building->find($data['building_id']);
            $this->building->update($data['building_id'], [
                'room_total'    => $newBuilding->room_total + 1
            ]);
            $this->building->update($room->building_id, [
                'room_total'    => $oldBuilding->room_total - 1
            ]);
        }

        // tambahkan kolom available terupdate ke data
        $available = (int) $data['room_capacity'] - $room->filed;
        $data += ['available' => $available];

        // update data di database
        $this->table->update($id, $data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Ruangan Berhasil Diubah'
        ]);

        return redirect()->to("room/{$id}/edit");
    }

    public function delete($id = null)
    {
        $room = $this->table->find($id);

        // hapus jumlah ruangan di tabel gedung
        $building = $this->building->find($room->building_id);
        $this->building->update($room->building_id, [
            'room_total'    => $building->room_total - 1
        ]);

        // hapus seluruh data item yang bersangkutan
        $items = $this->item->where('room_id', $id)->findAll();
        foreach ($items as $item) {
            $this->item->delete($item->id);
        }

        $this->table->delete($id);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Ruangan Berhasil Dihapus'
        ]);

        return redirect()->to('room');
    }

    public function checkValid($oldName = false)
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
