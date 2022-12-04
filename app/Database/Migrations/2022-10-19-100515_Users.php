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
                'constraint'       => '40'
            ],

            'role' => [
                'type'              => 'VARCHAR',
                'constraint'        => '10'
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
