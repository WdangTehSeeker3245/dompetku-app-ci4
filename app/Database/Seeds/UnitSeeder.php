<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UnitSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name_unit'         => 'KG',
            ],
            [
                'name_unit'         => 'Goods',
            ],
            [
                'name_unit'         => 'Bottle',
            ],
            [
                'name_unit'         => 'Liter',
            ],
            [
                'name_unit'         => 'Pack',
            ],
            [
                'name_unit'         => 'Each Price',
            ],
            [
                'name_unit'         => 'Virtual Money',
            ],
            [
                'name_unit'         => 'Cash Money',
            ],
        ];

        $this->db->table('unit')->insertBatch($data); 
    }
}
