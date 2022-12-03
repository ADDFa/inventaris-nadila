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

            'user_id' => [
                'type'              => 'INT'
            ],

            'building_id' => [
                'type'              => 'INT'
            ],

            'room_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'room_capacity' => [
                'type'              => 'INT'
            ],

            'filed' => [
                'type'              => 'INT'
            ],

            'available' => [
                'type'              => 'INT'
            ],

            'room_size' => [
                'type'              => 'VARCHAR',
                'constraint'        => 10
            ],

            'room_image' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('rooms');
    }

    public function down()
    {
        $this->forge->dropTable('rooms');
    }
}
