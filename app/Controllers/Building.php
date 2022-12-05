<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Building extends BaseController
{
    private $table, $room;

    public function __construct()
    {
        $this->table = new \App\Models\Building();
        $this->room = new \App\Models\Room();
    }

    public function index()
    {
        $limit = 10;
        $buildings = $this->table->findAll($limit);
        $pages = $this->request->getGet('pages');

        if ($pages) {
            $offset = (int) $pages * $limit - $limit;
            $buildings = $this->table->findAll($limit, $offset);
        }

        $data = [
            'title'         => 'Manajemen Data Gedung',
            'buildings'     => $buildings,
            'pages'         => ceil($this->table->countAllResults() / $limit)
        ];

        return view('buildings/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'         => 'Detail Gedung',
            'building'      => $this->table->get($id)
        ];

        return view('buildings/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'         => 'Tambah Data Gedung',
            'validation'    => $this->validation
        ];

        return view('buildings/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Ubah Data Gedung',
            'building'      => $this->table->find($id),
            'validation'    => $this->validation
        ];

        return view('buildings/edit', $data);
    }

    public function create()
    {
        // validasi
        if (!$this->checkValid()) return redirect()->to('building/new')->withInput();

        // validasi gambar
        $imageName = $this->checkImageValid('building_image');
        if (!$imageName) return redirect()->to('building/new')->withInput();

        $this->request->getFile('building_image')->move('images/building', $imageName);
        $this->table->insert($this->getDataBuilding($imageName));

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Gedung Berhasil Ditambahkan'
        ]);
        return redirect()->to('building');
    }

    public function update($id = null)
    {
        // validasi
        if (!$this->checkValid()) return redirect()->to("building/{$id}/edit")->withInput();

        $data = $this->getDataBuilding();
        $building = $this->table->find($id);

        if ($this->request->getFile('building_image')->getError() === 0) {
            // validasi gambar
            $imageName = $this->checkImageValid('building_image');
            if (!$imageName) return redirect()->to("building/{$id}/edit")->withInput();

            // upload gambar
            $this->request->getFile('building_image')->move('images/building', $imageName);
            $data = $this->getDataBuilding($imageName);

            // hapus gambar
            if (file_exists("images/building/{$building->building_image}")) unlink("images/building/{$building->building_image}");
        }

        $this->table->update($id, $data);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Gedung Berhasil Diubah'
        ]);

        return redirect()->to("building/{$id}/edit");
    }

    public function delete($id = null)
    {
        // hapus semua ruangan
        $rooms = $this->room->where('building_id', $id)->findAll();
        foreach ($rooms as $room) {
            $this->room->delete($room->id);
        }

        $building = $this->table->find($id);

        // hapus gambar dan data di database
        if (file_exists("images/building/{$building->building_image}")) unlink("images/building/{$building->building_image}");
        $this->table->delete($id);

        session()->setFlashdata([
            'status'    => 'success',
            'message'   => 'Data Gedung Berhasil Dihapus'
        ]);

        return redirect()->to('building');
    }

    public function checkValid()
    {
        return $this->validate([
            'building_name'          => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'      => 'Nama Gedung Tidak Boleh Kosong',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],
            'building_size'          => [
                'rules'     => 'required|max_length[40]',
                'errors'    => [
                    'required'      => 'Ukuran Gedung Tidak Boleh Kosong',
                    'max_length'    => 'Panjang Karakter Maksimal 40'
                ]
            ],
            'building_registration_date'          => [
                'rules'     => 'required',
                'errors'    => [
                    'required'      => 'Tanggal Pendaftaran Tidak Boleh Kosong'
                ]
            ]
        ]);
    }

    private function getDataBuilding($image = null)
    {
        $data = [
            'user_id'                       => session('users')->id,
            'building_name'                 => $this->request->getPost('building_name'),
            'building_size'                 => $this->request->getPost('building_size'),
            'building_registration_date'    => strtotime($this->request->getPost('building_registration_date'))
        ];
        if ($image) $data += ['building_image' => $image];

        return $data;
    }
}
