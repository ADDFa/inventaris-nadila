<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ruangan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ruangan'=> [
                'type'              => 'INT',
                'constraint'        =>  11,
                'auto_increment'    => true
            ],
    
            'nama_ruangan'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '40'
            ],

            'tgl_pencatatan'=>[
                'type'          => 'VARCHAR',
                'constraint'    => '2'
            ],

            'bulan_pencatatan'=>[
                'type'              => 'VARCHAR',
                'constraint'        => '2'
            ],

            'tahun_pencatatan'=>[
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
        $this->forge->addPrimaryKey('id_ruangan');
        $this->forge->createTable('ruangan', true);
    }

    public function down()
    {
        $this->forge->dropTable('ruangan', true);
    }
}
