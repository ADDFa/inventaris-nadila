<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title'     => 'Dashboard',
            'style'     => 'dashboard'
        ];

        return view('pages/dashboard', $data);
    }
}
