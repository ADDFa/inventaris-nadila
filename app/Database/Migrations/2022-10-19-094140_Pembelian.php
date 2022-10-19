<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembelian extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pembelian'=> [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],
    
            'jumlah_pembelian'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'harga_pembelian'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'tgl_pembelian'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '2'
            ],

            'bulan_pembelian'=>[
                'type'              => 'VARCHAR',
                'constraint'        => '2'
            ],

            'tahun_pembelian'=>[
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
        $this->forge->addPrimaryKey('id_pembelian');
        $this->forge->createTable('pembelian', true);
    }

    public function down()
    {
        $this->forge->dropTable('pembelian', true);
    }
}
