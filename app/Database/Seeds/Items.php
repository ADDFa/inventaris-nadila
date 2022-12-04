<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Items extends Seeder
{
    public function run()
    {
        $items = [
            [
                'user_id'       => 1,
                'room_id'       => 1,
                'category_id'   => 1,
                'type_id'       => 1,
                'item_name'     => 'HP IPONG 14 PRO MAX',
                'item_total'    => 2
            ],

            [
                'user_id'       => 2,
                'room_id'       => 2,
                'category_id'   => 2,
                'type_id'       => 1,
                'item_name'     => 'Macbook Pro Max 70 Juta',
                'item_total'    => 2
            ]
        ];

        $itemCategory = [
            ['category_name'        => 'Handphone'],
            ['category_name'        => 'Laptop']
        ];

        $itemType = ['type_name'           => 'Elektronik'];

        for ($i = 0; $i < count($items); $i++) {
            $this->db->table('items')->insert($items[$i]);
            $this->db->table('item_categories')->insert($itemCategory[$i]);
        }

        $this->db->table('item_types')->insert($itemType);
    }
}
