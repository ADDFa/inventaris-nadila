<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Building;
use App\Models\Room;
use App\Models\Item;

class Home extends BaseController
{
    public function index()
    {
        $numberOfBuilding = (new Building())->countAllResults();
        $numberOfRoom = (new Room())->countAllResults();
        $numberOfItem = (new Item())->countAllResults();

        $data = [
            'title'         => 'Dashboard',
            'style'         => 'dashboard',
            'numberOf'     => [
                'building'   => $numberOfBuilding,
                'room'      => $numberOfRoom,
                'item'      => $numberOfItem
            ]
        ];

        return view('dashboard', $data);
    }

    public function report()
    {
        echo 'report';
    }
}
