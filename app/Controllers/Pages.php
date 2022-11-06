<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'style'     => 'dashboard'
        ];

        return view('pages/dashboard', $data);
    }

    public function gedung()
    {
        $data = [
            'title'     => 'Gedung',
            'style'     => 'gedung',
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
            'linkAction' => [
                'create' => '/barang/tambah'
            ]
        ];

        return view('pages/barang', $data);
    }

    public function supplier()
    {
        $data = [
            'title'     => 'Suppllier'
        ];

        return view('pages/supplier', $data);
    }

    public function penyimpanan()
    {
        $data = [
            'title'     => 'Penyimpanan',
            'linkAction' => [
                'create' => '/penyimpanan/tambah'
            ]
        ];

        return view('pages/penyimpanan', $data);
    }

    public function pembelian()
    {
        $data = [
            'title'     => 'Pembelian'
        ];

        return view('pages/pembelian', $data);
    }

    public function laporan()
    {
        $data = [
            'title'     => 'Laporan',
            'style'     => 'laporan'
        ];

        return view('pages/laporan', $data);
    }

    public function barcode()
    {
        $data = [
            'title'     => 'Barcode'
        ];

        return view('pages/barcode', $data);
    }
}
