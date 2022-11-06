<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Barcode extends BaseController
{
    public function view($view = '', $data = [])
    {
        return view('pages/barcode/' . $view, $data);
    }

    public function index()
    {
        $data = [
            'title'     => 'Barcode'
        ];

        return $this->view('index', $data);
    }
}
