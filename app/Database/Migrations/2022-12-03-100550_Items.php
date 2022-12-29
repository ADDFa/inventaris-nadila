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
                'type'              => 'INT'
            ],

            'item_type' => [
                'type'              => 'INT'
            ],

            'item_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
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
