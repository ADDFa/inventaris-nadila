<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'style'     => [
                'dashboard'
            ],
            'script'     => []
        ];

        return view('pages/dashboard', $data);
    }

    public function gedung()
    {
        $data = [
            'title'     => 'Gedung',
            'style'     => [
                'gedung'
            ],
            'script'     => [],
            'linkAction' => [
                'create' => '/gedung/tambah'
            ]
        ];

        return view('pages/gedung', $data);
    }

    public function ruangan()
    {
        $data = [
            'title'     => 'Ruangan',
            'style'     => [],
            'script'     => [],
            'linkAction' => [
                'create' => '/ruangan/tambah'
            ]
        ];

        return view('pages/ruangan', $data);
    }

    public function barang()
    {
        $data = [
            'title'     => 'Barang',
            'style'     => [],
            'script'     => [],
            'linkAction' => [
                'create' => '/barang/tambah'
            ]
        ];

        return view('pages/barang', $data);
    }

    public function supplier()
    {
        $data = [
            'title'     => 'Suppllier',
            'style'     => [],
            'script'     => []
        ];

        return view('pages/supplier', $data);
    }

    public function penyimpanan()
    {
        $data = [
            'title'     => 'Penyimpanan',
            'style'     => [],
            'script'     => [],
            'linkAction' => [
                'create' => '/penyimpanan/tambah'
            ]
        ];

        return view('pages/penyimpanan', $data);
    }

    public function pembelian()
    {
        $data = [
            'title'     => 'Pembelian',
            'style'     => [],
            'script'     => []
        ];

        return view('pages/pembelian', $data);
    }

    public function laporan()
    {
        $data = [
            'title'     => 'Laporan',
            'style'     => [
                'table',
                'manajemen'
            ],
            'script'     => []
        ];

        return view('pages/laporan', $data);
    }

    public function barcode()
    {
        $data = [
            'title'     => 'Barcode',
            'style'     => [],
            'script'     => []
        ];

        return view('pages/barcode', $data);
    }
}
