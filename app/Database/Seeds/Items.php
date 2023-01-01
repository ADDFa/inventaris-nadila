<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Items extends Seeder
{
    public function run()
    {
        $items = [
            [
                'item_category'     => 'Kategori 1',
                'item_type'         => 'Tipe 1',
                'item_name'         => 'HP IPONG 14 PRO MAX',
                'item_total'        => 6,
                'administrator'     => 'Nadila Zumitia Putri'
            ],

            [
                'item_category'     => 'Kategori 2',
                'item_type'         => 'Tipe 2',
                'item_name'         => 'Macbook Pro Max 70 Jeti',
                'item_total'        => 4,
                'administrator'     => 'Nadila Zumitia Putri'
            ]
        ];

        for ($i = 0; $i < count($items); $i++) {
            $this->db->table('items')->insert($items[$i]);
        }
    }
}
