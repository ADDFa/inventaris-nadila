<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemStore extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'item_id' => [
                'type'              => 'INT'
            ],

            'storage_id' => [
                'type'              => 'INT'
            ],

            'item_brand' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'item_condition' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'item_price' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ]
        ]);

        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('storage_id', 'storages', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('item_stores');
    }

    public function down()
    {
        $this->forge->dropTable('item_stores');
    }
}
