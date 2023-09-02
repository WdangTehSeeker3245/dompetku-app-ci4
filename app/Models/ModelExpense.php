<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelExpense extends Model
{
    protected $table = 'expense';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'date',
        'hour',
        'balance_id',
        'category_id',
        'amount',
        'unit_id',
        'type_id',
        'name_expense',
        'expense_detail',
    ];
}
