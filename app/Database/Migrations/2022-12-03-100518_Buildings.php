<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Buildings extends Migration
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

            'building_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'building_size' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'room_total' => [
                'type'              => 'INT'
            ],

            'building_registration_date' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ],

            'building_image' => [
                'type'              => 'VARCHAR',
                'constraint'        => 255
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('buildings');
    }

    public function down()
    {
        $this->forge->dropTable('buildings');
    }
}
