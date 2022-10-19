<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_barang' => [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],

            'id_ruangan' => [
                'type'              => 'INT',
                'constraint'        =>  11
            ],

            'id_user' => [
                'type'             => 'INT',
                'constraint'       => 11
            ],

            'nama_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'kategori_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'jumlah_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'merk_barang' => [
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

            'ketersediaan_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'harga_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40'
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

        // $this->forge->addPrimaryKey('id_barang');
        // $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('id_ruangan', 'ruangan', 'id_ruangan', 'CASCADE', 'CASCADE');
        // $this->forge->createTable('barang', true);
    }

    public function down()
    {
        // $this->forge->dropTable('barang', true);
    }
}
