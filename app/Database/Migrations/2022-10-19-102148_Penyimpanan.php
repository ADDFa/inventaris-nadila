<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyimpanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyimpanan' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],

            'id_user' => [
                'type'             => 'INT',
                'constraint'       => 11
            ],

            'id_ruangan' => [
                'type'              => 'INT',
                'constraint'        =>  11
            ],

            'id_barang' => [
                'type'              => 'INT',
                'constraint'        =>  11
            ],

            'jumlah_penyimpanan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'tgl_penyimpanan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '2'
            ],

            'bulan_penyimpanan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '2'
            ],

            'tahun_penyimpanan' => [
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

        $this->forge->addPrimaryKey('id_penyimpanan');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_ruangan', 'ruangan', 'id_ruangan', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('penyimpanan', true);
    }

    public function down()
    {
        // $this->forge->dropTable('penyimpanan', true);
    }
}
