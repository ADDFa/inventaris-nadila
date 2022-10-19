<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Penyimpanan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_penyimpanan'=> [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],
    
            'jumlah_penyimpanan'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'tgl_penyimpanan'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '2'
            ],

            'bulan_penyimpanan'=>[
                'type'              => 'VARCHAR',
                'constraint'        => '2'
            ],

            'tahun_penyimpanan'=>[
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
        $this->forge->createTable('penyimpanan', true);
    }

    public function down()
    {
        $this->forge->dropTable('penyimpanan', true);
    }
}