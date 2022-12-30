<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Items extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'auto_increment'    => true
            ],

            'item_category' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'item_type' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'item_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'item_total' => [
                'type'              => 'INT',
                'default'           => 0
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
