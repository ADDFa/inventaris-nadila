<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'style'     => [],
            'script'     => []
        ];

        return view('pages/dashboard', $data);
    }

    public function gedung()
    {
        $data = [
            'title'     => 'Gedung',
            'style'     => [],
            'script'     => []
        ];

        return view('pages/gedung', $data);
    }

    public function ruangan()
    {
        $data = [
            'title'     => 'Ruangan',
            'style'     => [],
            'script'     => []
        ];

        return view('pages/ruangan', $data);
    }

    public function barang()
    {
        $data = [
            'title'     => 'Barang',
            'style'     => [],
            'script'     => []
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
            'script'     => []
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
