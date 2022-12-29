<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemStores extends Seeder
{
    public function run()
    {
        $itemStores = [
            [
                'item_id'           => 1,
                'storage_id'        => 1,
                'item_brand'        => 'Merk 1',
                'item_condition'    => 'Baik',
                'item_price'        => '20000'
            ],
            [
                'item_id'       => 2,
                'storage_id'    => 2,
                'item_brand'        => 'Merk 2',
                'item_condition'    => 'Baik',
                'item_price'        => '40000'
            ]
        ];

        foreach ($itemStores as $store) {
            $this->db->table('item_stores')->insert($store);
        }
    }
}
