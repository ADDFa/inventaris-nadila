<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Credentials extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'user_id' => [
                'type'          => 'INT'
            ],

            'username' => [
                'type'          => 'VARCHAR',
                'constraint'    => 40
            ],

            'password' => [
                'type'          => 'VARCHAR',
                'constraint'    => 255
            ]
        ]);

        $this->forge->createTable('credentials');
    }

    public function down()
    {
        $this->forge->dropTable('credentials');
    }
}
