<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBalanceTable extends Migration
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
            'title_balance' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => TRUE,
            ],
            'description_balance' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('balance');
    }

    public function down()
    {
        $this->forge->dropTable('balance');
    }
}
