<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_category'         => 'Food and Drink',
            ],
            [
                'name_category'         => 'Writing Tools',
            ],
            [
                'name_category'         => 'Tools',
            ],
            [
                'name_category'         => 'Electronics',
            ],
            [
                'name_category'         => 'Life Necessities',
            ],
            [
                'name_category'         => 'Side Needs',
            ],
            [
                'name_category'         => 'Transfer',
            ],
            [
                'name_category'         => 'Withdraw',
            ],
            [
                'name_category'         => 'Cash',
            ],
        ];

        $this->db->table('category')->insertBatch($data); 
    }
}
