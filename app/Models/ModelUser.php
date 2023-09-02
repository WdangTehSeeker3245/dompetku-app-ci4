<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username', 
        'fullname', 
        'email', 
        'password',
        'role_level',
        'last_date_visit',
        'last_hour_visit'
    ];
}
