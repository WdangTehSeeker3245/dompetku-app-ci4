<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => FALSE,
            ],
            'name_type' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'level' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => FALSE,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('type');
    }

    public function down()
    {
        $this->forge->dropTable('type');
    }
}
