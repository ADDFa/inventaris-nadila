<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ItemCategories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'auto_increment'    => true
            ],

            'category_name' => [
                'type'              => 'VARCHAR',
                'constraint'        => 40
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('item_categories');
    }

    public function down()
    {
        $this->forge->dropTable('item_categories');
    }
}
