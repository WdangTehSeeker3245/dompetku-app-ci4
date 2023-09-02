<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // return view('welcome_message');
        // return view('v_admin');
        return redirect()->to(base_url('login'));
    }
}
