<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelType extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name_type',
        'level',
    ];
}
