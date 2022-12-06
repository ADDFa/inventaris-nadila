<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    private $building, $room, $item;

    public function __construct()
    {
        $this->building = new \App\Models\Building();
        $this->room = new \App\Models\Room();
        $this->item = new \App\Models\Item();
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'style'         => 'dashboard',
            'numberOf'     => [
                'building'   => $this->building->countAllResults(),
                'room'      => $this->room->countAllResults(),
                'item'      => $this->item->countAllResults()
            ]
        ];

        return view('dashboard', $data);
    }

    public function report()
    {
        $data = [
            'title'     => 'Laporan Manajemen',
            'data'      => $this->item->getAll()
        ];

        return view('report', $data);
    }
}
