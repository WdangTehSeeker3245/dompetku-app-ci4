<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelIncome;
use App\Models\ModelBalance;
use App\Models\ModelCategory;
use App\Models\ModelUnit;
use App\Models\ModelType;

class IncomeController extends BaseController
{
    public function __construct() 
    {
        $this->ModelIncome = new ModelIncome();
        $this->ModelBalance = new ModelBalance();
        $this->ModelCategory = new ModelCategory();
        $this->ModelUnit = new ModelUnit();
        $this->ModelType = new ModelType();
    }
    public function index()
    {
        $query = $this->ModelIncome
        ->select('income.id, income.date, balance.title_balance, category.name_category, income.amount, unit.name_unit, type.name_type, income.name_income')
        ->join('balance', 'balance.id = income.balance_id')
        ->join('category', 'category.id = income.category_id')
        ->join('unit', 'unit.id = income.unit_id')
        ->join('type', 'type.id = income.type_id')
        ->findAll();

        $data = [
            'incomeData' => $query,
        ];
        return view('v_income', $data);
    }
    public function show($id)
    {   
        $query = $this->ModelIncome
        ->select('income.id, income.date, income.hour, balance.title_balance, category.name_category, income.amount, unit.name_unit, type.name_type, income.name_income, income.income_detail')
        ->join('balance', 'balance.id = income.balance_id')
        ->join('category', 'category.id = income.category_id')
        ->join('unit', 'unit.id = income.unit_id')
        ->join('type', 'type.id = income.type_id')
        ->find($id);

        $data['income'] = $query;
        return view('income/v_detail_income', $data);
    }   
    public function create()
    {
        $data = [
            "balanceData" => $this->ModelBalance->findAll(),
            "categoryData" => $this->ModelCategory->findAll(),
            "unitData" => $this->ModelUnit->findAll(),
            "typeData" => $this->ModelType->findAll(),
        ];
        return view('income/v_form_income', $data);
    }
    public function store()
    {
        $data = [
            'date' => $this->request->getPost('date'),
            'hour' => $this->request->getPost('hour'),
            'balance_id' => $this->request->getPost('balance_id'),
            'category_id' => $this->request->getPost('category_id'),
            'amount' => $this->request->getPost('amount'),
            'unit_id' => $this->request->getPost('unit_id'),
            'type_id' => $this->request->getPost('type_id'),
            'name_income' => $this->request->getPost('name_income'),
            'income_detail' => $this->request->getPost('income_detail'),
        ];

        $balance = $this->ModelBalance->find($data['balance_id']);
        $trigger_amount['amount'] = $balance['amount'] + $data['amount'];
        $this->ModelIncome->insert($data);
        $this->ModelBalance->update($data['balance_id'],$trigger_amount);
        session()->setFlashdata('message', 'Income added successfully.');
        return redirect()->to(base_url('admin/income')); 
    }

    public function edit($id)
    {
        $data = [
            "balanceData" => $this->ModelBalance->findAll(),
            "categoryData" => $this->ModelCategory->findAll(),
            "unitData" => $this->ModelUnit->findAll(),
            "typeData" => $this->ModelType->findAll(),
            "income" => $this->ModelIncome->find($id),
        ];
        return view('income/v_form_income', $data);
    }
    public function update($id)
    {
        $data = [
            'date' => $this->request->getPost('date'),
            'hour' => $this->request->getPost('hour'),
            'balance_id' => $this->request->getPost('balance_id'),
            'category_id' => $this->request->getPost('category_id'),
            'amount' => $this->request->getPost('amount'),
            'unit_id' => $this->request->getPost('unit_id'),
            'type_id' => $this->request->getPost('type_id'),
            'name_income' => $this->request->getPost('name_income'),
            'income_detail' => $this->request->getPost('income_detail'),
        ];
        
        $income = $this->ModelIncome->find($id);

        if ($income['balance_id'] == $data['balance_id']) {
            $balance = $this->ModelBalance->find($data['balance_id']);
            if ($income['amount'] > $data['amount']){
                $trigger_amount['amount'] = $balance['amount'] - ($income['amount'] - $data['amount']);
            }
            elseif($income['amount'] < $data['amount']){
                $trigger_amount['amount'] = $balance['amount'] + ( $data['amount'] - $income['amount']);
            } 
            elseif($income['amount'] == $data['amount']){
                $trigger_amount['amount'] = $balance['amount'];
            }
        }
        else {
            $balance = $this->ModelBalance->find($data['balance_id']);
            $balance2 = $this->ModelBalance->find($income['balance_id']);
            $remove_trigger['amount'] = $balance2['amount'] - $income['amount'];
            $this->ModelBalance->update($income['balance_id'],$remove_trigger);
            $trigger_amount['amount'] = $balance['amount'] + $data['amount'];
        }

        $this->ModelIncome->update($id, $data);
        $this->ModelBalance->update($data['balance_id'],$trigger_amount);
        session()->setFlashdata('message', 'Income updated successfully.');
        return redirect()->to(base_url('admin/income')); 
    }
    public function delete($id)
    {
        $income = $this->ModelIncome->find($id);
        $balance = $this->ModelBalance->find($income['balance_id']);
        $trigger_amount['amount'] = $balance['amount'] - $income['amount'];
        $this->ModelBalance->update($income['balance_id'],$trigger_amount);
        $this->ModelIncome->delete($id);
        session()->setFlashdata('message', 'Income deleted successfully.');
        return redirect()->to(base_url('admin/income')); 
    }
}
