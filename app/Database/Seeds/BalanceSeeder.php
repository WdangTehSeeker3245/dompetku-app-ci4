<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BalanceSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title_balance'         => 'Uang Di Dompet Fisik',
                'amount'                => '500000',
                'description_balance'   => 'Uang di dompet fisik yang sudah digenapkan',
            ],
            [
                'title_balance'         => 'Uang Di Akun Bank BRI',
                'amount'                => '300000',
                'description_balance'   => 'Uang di akun bank BRI yang sudah digenapkan',
            ],
        ];

        $this->db->table('balance')->insertBatch($data); 
    }
}
