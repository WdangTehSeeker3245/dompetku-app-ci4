<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TypeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_type'         => 'Urgent',
                'level'             => '1',
            ],
            [
                'name_type'         => 'Important',
                'level'             => '2',
            ],
            [
                'name_type'         => 'Normal',
                'level'             => '3',
            ],
            [
                'name_type'         => 'Minimal',
                'level'             => '4',
            ],
        ];

        $this->db->table('type')->insertBatch($data); 
    }
}
