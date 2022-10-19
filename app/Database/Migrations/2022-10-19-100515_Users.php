<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'             => 'INT',
                'constraint'       => 11,
                'auto_increment'   => true
            ],

            'username' => [
                'type'             => 'VARCHAR',
                'constraint'       => '40'
            ],

            'password' => [
                'type'             => 'VARCHAR',
                'constraint'       => '255'
            ],

            'creaed_at' => [
                'type'              => 'DATETIME',
                'null'              => true
            ],

            'updated_at' => [
                'type'              => 'DATETIME',
                'null'              => true
            ]
        ]);

        $this->forge->addPrimaryKey('id_user');
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        // $this->forge->dropTable('users', true);
    }
}
