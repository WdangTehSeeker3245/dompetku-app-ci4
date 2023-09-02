<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBalance;

class AdminController extends BaseController
{
    public function __construct() 
    {
        $this->ModelBalance = new ModelBalance();
    }
    public function index()
    {
        $data = [
            'balanceData' => $this->ModelBalance->whereIn('id', [1, 2])->findAll(),
        ];
        return view('v_admin', $data);
    }
}
