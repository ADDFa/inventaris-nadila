<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'             => 'INT',
                'auto_increment'   => true
            ],

            'name' => [
                'type'             => 'VARCHAR',
                'constraint'       => 40
            ],

            'profile_picture' => [
                'type'             => 'VARCHAR',
                'constraint'       => 255,
                'default'          => 'default.jpg'
            ],

            'role' => [
                'type'             => 'VARCHAR',
                'constraint'       => 10,
                'default'          => 'officer'
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
