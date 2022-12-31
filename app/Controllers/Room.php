<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Controllers\Validator\RoomValidator;
use App\Controllers\Helper\Messages;

class Room extends BaseController
{
    private $table, $building, $item;

    public function __construct()
    {
        $this->table = new \App\Models\Room();
        $this->building = new \App\Models\Building();
        $this->item = new \App\Models\Item();

        Messages::setName('Ruangan');
    }

    private function getDataRoom(bool $isUpdate = false, ?object $room = null): array
    {
        $request = $this->request->getPost();
        $prepareData = [
            'available'     => 0,
            'user_id'       => session('users')->id
        ];

        $available = $isUpdate ? $available = $request['room_capacity'] - $room->filed : $request['room_capacity'];
        $prepareData['available'] = $available;
        if ($request['room_capacity'] < 0) $request['room_capacity'] *= -1;

        if ($isUpdate) {
            unset($request['_method']);

            $isOldName = $request['room_name'] === $room->room_name;
            if ($isOldName) unset($request['room_name']);
        }

        return $request + $prepareData;
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
            'buildings'     => $this->building->getAnyColumn('id, building_name')
        ];

        return view('rooms/new', $data);
    }

    public function edit($id = null)
    {
        $data = [
            'title'         => 'Ubah Data Ruangan',
            'room'          => $this->table->find($id),
            'buildings'     => $this->building->getAnyColumn('id, building_name')
        ];

        return view('rooms/edit', $data);
    }

    public function search()
    {
        $keyword = $this->request->getGet('v');

        return $this->response->setJSON([
            'data' => $this->table->searchRoom($keyword)
        ]);
    }

    public function create()
    {
        // validasi ruangan
        $valid = $this->validate(RoomValidator::getValidator());
        if (!$valid) return redirect()->to('room/new')->withInput()
            ->with('errors', $this->validator->getErrors());

        // insert ruangan
        $data = $this->getDataRoom();
        $this->table->insertRoom($data);

        // pesan ruangan
        $message = Messages::getInsert();
        session()->setFlashdata($message);

        return redirect()->to('room');
    }

    public function update($id = null)
    {
        $room = $this->table->find($id);
        $req = (object) $this->request->getPost();
        $isRoomMove = $room->building_id != $req->building_id;
        $isOldName = $req->room_name === $room->room_name;

        // validasi ruangan
        $valid = $this->validate(RoomValidator::getValidator($isOldName));
        if (!$valid) return redirect()->to("room/{$id}/edit")->withInput()
            ->with('errors', $this->validator->getErrors());

        // validasi kapasitas ruangan
        if ($req->room_capacity < $room->filed) return redirect()->to("room/{$id}/edit")->withInput()
            ->with('errors', [
                'room_capacity'  => "Gagal Update, Ruangan Sudah Terisi Sebanyak $room->filed.<br />Kapasiteas Harus Lebih Atau Sama Dengan Jumlah Terisi"
            ]);

        $data = $this->getDataRoom(true, $room);

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
}
