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
                'constraint'    => '40',
                'null'             => false
            ],

            'kategori_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'jumlah_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'merk_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],
            'tgl_pencatatan' => [
                'type'          => 'VARCHAR',
                'constraint'    => '2',
                'null'             => false
            ],

            'bulan_pencatatan' => [
                'type'              => 'VARCHAR',
                'constraint'        => '2',
                'null'             => false
            ],

            'tahun_pencatatan' => [
                'type'              => 'YEAR',
                'null'             => false
            ],

            'ketersediaan_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'harga_barang' => [
                'type'          => 'VARCHAR',
                'constraint'    => '40',
                'null'             => false
            ],

            'gambar_barang' => [
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

        $this->forge->addPrimaryKey('id_barang');
        $this->forge->addForeignKey('id_user', 'users', 'id_user', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_ruangan', 'ruangan', 'id_ruangan', 'CASCADE', 'CASCADE');
        $this->forge->createTable('barang', true);
    }

    public function down()
    {
        $this->forge->dropTable('barang', true);
    }
}
