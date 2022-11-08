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
        $page = $this->request->getGet('page') ?? 1;

        $data = [
            'title'     => 'Laporan',
            'style'     => 'laporan',
            'linkAction'    => [
                'next'      => '/laporan?page=' . $page + 1,
                'prev'      => ($page == '2') ? '/laporan' : '/laporan?page=' . $page - 1
            ],
            'page'      => $page
        ];

        return $this->view('index', $data);
    }

    public function print()
    {
        return 'print';
    }
}
