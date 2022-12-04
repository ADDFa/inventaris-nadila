<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Room extends BaseController
{
    private $table;

    public function __construct()
    {
        $this->table = new \App\Models\Room();
    }

    public function index()
    {
        $limit = 10;

        $rooms = $this->table->findAll($limit);
        $pages = $this->request->getGet('pages');

        if ($pages) {
            $offset = (int) $pages * $limit - $limit;
            $rooms = $this->table->findAll($limit, $offset);
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
        if (is_null($id)) return redirect()->to('room');

        $data = [
            'title'         => 'Detail Ruangan',
            'room'          => $this->table->getWhere('users.id', $id)[0],
            'items'          => (new \App\Models\Item())->getWhere('room_id', $id)
        ];

        return view('rooms/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'         => 'Tambah Data Ruangan',
            'validation'    => $this->validation,
            'buildings'      => (new \App\Models\Building())->findAll()
        ];

        return view('rooms/new', $data);
    }

    public function edit($id = null)
    {
        if (is_null($id)) return redirect()->to('room');

        $data = [
            'title'         => 'Ubah Data Ruangan',
            'validation'    => $this->validation,
            'room'          => $this->table->find($id),
            'buildings'     => (new \App\Models\Building())->findAll()
        ];

        return view('rooms/edit', $data);
    }

    public function create()
    {
        // validasi ruangan
        if (!$this->checkValid()) return redirect()->to('room/new')->withInput();

        // validasi gambar
        $imageName = $this->checkImageValid('room_image');
        if (!$imageName) return redirect()->to('room/new')->withInput();

        $data = $this->request->getPost();
        $data += ['room_image'  => $imageName];

        // uplaod gambar dan masukkan data kedalam database
        $this->request->getFile('room_image')->move('images/rooms', $imageName);
        $this->table->insert($data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Ruangan Berhasil Ditambahkan'
        ]);

        return redirect()->to('room');
    }

    public function update($id = null)
    {
        if (is_null($id)) return redirect()->to('room');

        // validasi ruangan
        if (!$this->checkValid()) return redirect()->to("room/{$id}/edit")->withInput();

        $room = $this->table->find($id);
        $data = $this->request->getPost();

        // cek apakah gambar diubah
        if ($this->request->getFile('room_image')->getError() === 0) {
            // validasi gambar
            $imageName = $this->checkImageValid('room_image');
            if (!$imageName) return redirect()->to('room/new')->withInput();

            $data += ['room_image'  => $imageName];

            // hapus gambar dan upload gambar
            if (file_exists("images/rooms/{$room->room_image}")) unlink("images/rooms/{$room->room_image}");
            $this->request->getFile('room_image')->move('images/rooms', $imageName);
        }

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
        if (is_null($id)) return redirect()->to('room');

        $room = $this->table->find($id);

        // hapus gambar jika ada dan hapus data dari database
        if (file_exists("images/rooms/{$room->room_image}")) unlink("images/rooms/{$room->room_image}");
        $this->table->delete($id);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Ruangan Berhasil Dihapus'
        ]);

        return redirect()->to('room');
    }

    public function checkValid()
    {
        return  $this->validate([
            'room_name' => [
                'rules'             => 'required|max_length[40]',
                'errors'            => [
                    'required'      => 'Nama Ruangan Harus Diisi',
                    'max_length'    => 'Nama Ruangan Maksimal 40 Karakter'
                ]
            ],
            'room_capacity' => [
                'rules'             => 'required|max_length[11]',
                'errors'            => [
                    'required'      => 'Kapasitas Ruangan Ruangan Harus Diisi'
                ]
            ],
            'room_size' => [
                'rules'             => 'required|max_length[10]',
                'errors'            => [
                    'required'      => 'Ukuran Ruangan Harus Diisi',
                    'max_length'    => 'Ukuran Ruangan Maksimal 10 Karakter'
                ]
            ]
        ]);
    }
}
