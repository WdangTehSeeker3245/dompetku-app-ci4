<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengeluaranTable extends Migration
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
            'date' => [
                'type' => 'DATE',
                'null' => FALSE,
            ],
            'hour' => [
                'type' => 'TIME',
                'null' => FALSE,
            ],
            'balance_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => FALSE,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => FALSE,
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => FALSE,
            ],
            'unit_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => FALSE,
            ],
            'type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => FALSE,
            ],
            'name_expense' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'expense_detail' => [
                'type' => 'TEXT',
                'null' => TRUE,
            ],
        ]);

        // Add foreign key relationships
        $this->forge->addForeignKey('balance_id', 'balance', 'id');
        $this->forge->addForeignKey('category_id', 'category', 'id');
        $this->forge->addForeignKey('unit_id', 'unit', 'id');
        $this->forge->addForeignKey('type_id', 'type', 'id');

        // Define 'id' as the primary key
        $this->forge->addPrimaryKey('id');

        // Create the table
        $this->forge->createTable('expense');
    }

    public function down()
    {
        $this->forge->dropTable('expense');
    }
}
