<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use PHPUnit\Framework\Constraint\Constraint;

class Gedung extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gedung' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],

            'id_user' => [
                'type'             => 'INT',
                'constraint'       => 11
            ],

            'nama_gedung' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'tgl_pencatatan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '2'
            ],

            'bulan_pencatatan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '2'
            ],

            'tahun_pencatatan' => [
                'type'              => 'YEAR'
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

        $this->forge->addPrimaryKey('id_gedung');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->createTable('gedung', true);
    }

    public function down()
    {
        // $this->forge->dropTable('gedung', true);
    }
}