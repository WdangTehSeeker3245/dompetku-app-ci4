<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
                'null' => FALSE,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'unique' => true,
                'null' => FALSE,
            ],
            'fullname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => FALSE,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
                'null' => FALSE,
            ],
            'password'   => [
                'type' => 'VARCHAR',
                'constraint' => 225,
                'null' => FALSE,
            ],
            'role_level' => [
                'type' => 'INT',
                'constraint' => 1,
                'null' => FALSE,
            ],
            'last_date_visit' => [
                'type' => 'DATE',
                'null' => TRUE,
            ],
            'last_hour_visit' => [
                'type' => 'TIME',
                'null' => TRUE,
            ],
        ]);

        // Define 'id' as the primary key
        $this->forge->addPrimaryKey('id');

        // Create the table
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
