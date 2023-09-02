<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBalance extends Model
{
    protected $table = 'balance';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title_balance', 
        'amount',
        'description_balance',  
    ];
}
