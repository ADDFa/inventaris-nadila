<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembelian' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],

            'id_barang' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'null'             => false
            ],

            'id_user' => [
                'type'             => 'INT',
                'constraint'       => 11,
                'null'             => false
            ],

            'jumlah_pembelian' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'harga_pembelian' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'tgl_pembelian' => [
                'type'          => 'VARCHAR',
                'constraint'    => '2',
                'null'             => false
            ],

            'bulan_pembelian' => [
                'type'              => 'VARCHAR',
                'constraint'        => '2',
                'null'             => false
            ],

            'tahun_pembelian' => [
                'type'              => 'YEAR',
                'null'             => false
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

        $this->forge->addPrimaryKey('id_pembelian');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_barang', 'barang', 'id_barang', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembelian', true);
    }

    public function down()
    {
        $this->forge->dropTable('pembelian', true);
    }
}
