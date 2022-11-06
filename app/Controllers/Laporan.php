<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/laporan/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'     => 'Laporan',
            'style'     => 'laporan'
        ];

        return $this->view('index', $data);
    }

    public function print()
    {
        return 'print';
    }
}
