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
            ],

            'record_date' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('room_id', 'rooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'item_categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('type_id', 'item_types', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('items');
    }

    public function down()
    {
        $this->forge->dropTable('items');
    }
}
