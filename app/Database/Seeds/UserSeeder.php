<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'admin',
            'fullname'      => 'Faizal Nurul Firdaus',
            'email'         => 'faizalnf1800@gmail.com',
            'password'      => '$2y$10$ea3ki6Kb5DeaUBNNofNrze23fkG9qlS/zYlIK.Es3d7SC.ErsMGVW', //admin123
            'role_level'    => '1',
        ];

        $this->db->table('users')->insert($data);
    }
}
