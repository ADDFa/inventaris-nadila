<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    private $building, $room, $item, $storage;

    public function __construct()
    {
        $this->building = new \App\Models\Building();
        $this->room = new \App\Models\Room();
        $this->item = new \App\Models\Item();
        $this->storage = new \App\Models\Storage();
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
        $limit = 100;
        $pages = $this->request->getGet('pages');
        $offset = $pages ? (int) $pages * $limit - $limit : 0;

        $data = [
            'title'     => 'Laporan Manajemen',
            'reports'   => $this->storage->getReport($limit, $offset),
            'pages'     => ceil($this->item->countAllResults() / $limit)
        ];

        return view('report', $data);
    }

    public function printReport()
    {
        $data = [
            'title'     => 'Laporan Manajemen Barang',
            'reports'   => $this->storage->getReport(1000)
        ];

        return view('report-print', $data);
    }
}
