<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Items extends Seeder
{
    public function run()
    {
        $items = [
            [
                'user_id'           => 1,
                'category_id'       => 1,
                'type_id'           => 1,
                'item_name'         => 'HP IPONG 14 PRO MAX',
                'slug_name'         => 'hpipong14promax',
                'item_total'        => 6,
                'item_brand'        => 'Apel Manis',
                'item_condition'    => 'Bagus',
                'item_price'        => 20000
            ],

            [
                'user_id'           => 2,
                'category_id'       => 2,
                'type_id'           => 1,
                'item_name'         => 'Macbook Pro Max 70 Jeti',
                'slug_name'         => 'macbookpromax70juta',
                'item_total'        => 4,
                'item_brand'        => 'Apel Manis',
                'item_condition'    => 'Bagus',
                'item_price'        => 20000
            ]
        ];

        $itemCategory = [
            ['category_name'        => 'Handphone'],
            ['category_name'        => 'Laptop']
        ];

        $itemType = ['type_name'           => 'Elektronik'];

        $this->db->table('item_types')->insert($itemType);

        for ($i = 0; $i < count($items); $i++) {
            $this->db->table('item_categories')->insert($itemCategory[$i]);
            $this->db->table('items')->insert($items[$i]);
        }
    }
}
