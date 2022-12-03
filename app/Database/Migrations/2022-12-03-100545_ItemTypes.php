<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemTypes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'auto_increment'    => true
            ],

            'type_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('item_types');
    }

    public function down()
    {
        $this->forge->dropTable('item_types');
    }
}
