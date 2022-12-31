<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Validator\BuildingValidator;
use App\Controllers\Helper\Messages;

class Building extends BaseController
{
    private $table, $room;

    public function __construct()
    {
        $this->table = new \App\Models\Building();
        $this->room = new \App\Models\Room();

        Messages::setName('Gedung');
    }

    private function getDataBuilding($image = null): array
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

    public function index()
    {
        $limit = 10;
        $pages = $this->request->getGet('pages');
        $offset = $pages ? (int) $pages * $limit - $limit : 0;

        $data = [
            'title'         => 'Manajemen Data Gedung',
            'buildings'     => $this->table->findAll($limit, $offset),
            'pages'         => ceil($this->table->countAllResults() / $limit)
        ];

        return view('buildings/index', $data);
    }

    public function show($id = null)
    {
        $data = [
            'title'         => 'Detail Gedung',
            'building'      => $this->table->getBuilding($id),
            'rooms'         => $this->room->where('building_id', $id)->findAll()
        ];

        return view('buildings/detail', $data);
    }

    public function new()
    {
        $data = [
            'title'         => 'Tambah Data Gedung'
        ];

        return view('buildings/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Ubah Data Gedung',
            'building'      => $this->table->find($id)
        ];

        return view('buildings/edit', $data);
    }

    public function create()
    {
        // validasi
        $valid = $this->validate(BuildingValidator::getValidator());
        $imageName = $this->checkImageValid('building_image');
        if (!$valid || !$imageName) return redirect()->to('building/new')->withInput()
            ->with('errors', $this->validator->getErrors());

        // insert gambar
        $this->request->getFile('building_image')->move('images/building', $imageName);
        $this->table->insert($this->getDataBuilding($imageName));

        // pesan berhasil
        $message = Messages::getInsert();
        session()->setFlashdata($message);

        return redirect()->to('building');
    }

    public function update($id = null)
    {
        // validasi
        $valid = $this->validate(BuildingValidator::getValidator());
        if (!$valid) return redirect()->to('building/new')->withInput()->with('errors', $this->validator->getErrors());

        // prepare data
        $data = $this->getDataBuilding();
        $building = $this->table->find($id);
        $buildingImage = $this->request->getFile('building_image');

        // upload gambar, jika ada
        if ($buildingImage->getError() === 0) {
            // validasi gambar
            $imageName = $this->checkImageValid('building_image');
            if (!$imageName) return redirect()->to("building/{$id}/edit")->withInput()
                ->with('errors', $this->validator->getErrors());

            // upload gambar
            $buildingImage->move('images/building', $imageName);
            $data = $this->getDataBuilding($imageName);

            // hapus gambar
            $fileIsset = file_exists("images/building/{$building->building_image}");
            if ($fileIsset) unlink("images/building/{$building->building_image}");
        }

        $this->table->update($id, $data);

        $message = Messages::getUpdate();
        session()->setFlashdata($message);

        return redirect()->to("building/{$id}/edit");
    }

    public function delete($id = null)
    {
        $building = $this->table->find($id);

        // hapus gambar dan data di database
        $fileIsset = file_exists("images/building/{$building->building_image}");
        if ($fileIsset) unlink("images/building/{$building->building_image}");
        $this->table->delete($id);

        $message = Messages::getDelete();
        session()->setFlashdata($message);

        return redirect()->to('building');
    }
}
