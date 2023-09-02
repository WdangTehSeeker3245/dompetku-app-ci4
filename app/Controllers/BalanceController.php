<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBalance;

class BalanceController extends BaseController
{
    public function __construct() 
    {
        $this->ModelBalance = new ModelBalance();
    }
    public function index()
    {
        $data = [
            'balanceData' => $this->ModelBalance->findAll(),
        ];
        return view('v_balance', $data);
    }

    public function show($id)
    {
        $data['balance'] = $this->ModelBalance->find($id);
        return view('balance/v_detail_balance', $data);
    }

    public function create()
    {
        // Display a form to add a new balance
        return view('balance/v_form_balance');
    }

    public function store()
    {
        $data = [
            'title_balance' => $this->request->getPost('title_balance'),
            'amount' => $this->request->getPost('amount'),
            'description_balance' => $this->request->getPost('description_balance')
        ];

        $this->ModelBalance->insert($data);
        session()->setFlashdata('message', 'Balance added successfully.');
        return redirect()->to(base_url('admin/balance')); 
    }

    public function edit($id)
    {
        $data['balance'] = $this->ModelBalance->find($id);
        return view('balance/v_form_balance', $data);
    }

    public function update($id)
    {
        $data = [
            'title_balance' => $this->request->getPost('title_balance'),
            'amount' => $this->request->getPost('amount'),
            'description_balance' => $this->request->getPost('description_balance')
        ];

        $this->ModelBalance->update($id, $data);
        session()->setFlashdata('message', 'Balance updated successfully.');
        return redirect()->to(base_url('admin/balance')); 
    }

    public function delete($id)
    {
        $this->ModelBalance->delete($id);
        session()->setFlashdata('message', 'Balance deleted successfully.');
        return redirect()->to(base_url('admin/balance')); 
    }
}
