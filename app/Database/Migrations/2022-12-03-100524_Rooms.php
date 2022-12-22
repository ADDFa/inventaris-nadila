<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Rooms extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'auto_increment'    => true
            ],

            'room_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40,
                'unique'            => true
            ],

            'room_capacity' => [
                'type'              => 'INT'
            ],

            'filed' => [
                'type'              => 'INT',
                'default'           => 0
            ],

            'available' => [
                'type'              => 'INT',
                'default'           => 0
            ],

            'room_size' => [
                'type'              => 'VARCHAR',
                'constraint'        => 20
            ],

            'description' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'building_id' => [
                'type'              => 'INT'
            ],

            'user_id' => [
                'type'              => 'INT'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('building_id', 'buildings', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rooms');
    }

    public function down()
    {
        $this->forge->dropTable('rooms');
    }
}
