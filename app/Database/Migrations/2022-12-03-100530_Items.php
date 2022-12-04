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

            'user_id' => [
                'type'              => 'INT'
            ],

            'room_id' => [
                'type'              => 'INT'
            ],

            'category_id' => [
                'type'              => 'INT'
            ],

            'type_id' => [
                'type'              => 'INT'
            ],

            'item_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'item_total' => [
                'type'              => 'INT'
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
