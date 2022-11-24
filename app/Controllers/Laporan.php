<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\Barang;

class Laporan extends BaseController
{
    private $barang;

    public function __construct()
    {
        $this->barang = new Barang();
    }

    public function view($view = '', $data = [])
    {
        return view('pages/laporan/' . $view, $data);
    }

    public function index()
    {
        $page = $this->request->getGet('page') ?? 1;

        $data = [
            'title'     => 'Laporan',
            'style'     => 'laporan',
            'linkAction'    => [
                'next'      => '/laporan?page=' . $page + 1,
                'prev'      => ($page == '2') ? '/laporan' : '/laporan?page=' . $page - 1
            ],
            'page'      => $page,
            'barang'    => $this->barang->getBarang(),
            'bulan'     => $this->getDataBulan()
        ];

        return $this->view('index', $data);
    }

    public function print()
    {
        return 'print';
    }
}
