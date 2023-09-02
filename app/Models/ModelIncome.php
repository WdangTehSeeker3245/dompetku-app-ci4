<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelIncome extends Model
{
    protected $table = 'income';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'date',
        'hour',
        'balance_id',
        'category_id',
        'amount',
        'unit_id',
        'type_id',
        'name_income',
        'income_detail',
    ];
}
