<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ruangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ruangan' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],

            'id_user' => [
                'type'             => 'INT',
                'constraint'       => 11
            ],

            'id_gedung' => [
                'type'              => 'INT',
                'constraint'        =>  11
            ],

            'nama_ruangan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'gambar_ruangan' => [
                'type'          => 'VARCHAR',
                'constraint'     => '255',
                'null'          => false
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

        $this->forge->addPrimaryKey('id_ruangan');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_gedung', 'gedung', 'id_gedung', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ruangan', true);
    }

    public function down()
    {
        $this->forge->dropTable('ruangan', true);
    }
}
