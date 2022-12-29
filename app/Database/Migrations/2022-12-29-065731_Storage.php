<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Storage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'auto_increment'    => true
            ],

            'room_id' => [
                'type'      => 'INT'
            ],

            'item_id' => [
                'type'      => 'INT'
            ],

            'user_id' => [
                'type'      => 'INT'
            ],

            'record_date' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'qty' => [
                'type'      => 'INT'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('room_id', 'rooms', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('item_id', 'items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('storages');
    }

    public function down()
    {
        $this->forge->dropTable('storages');
    }
}
