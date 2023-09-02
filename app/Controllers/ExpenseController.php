<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelExpense;
use App\Models\ModelBalance;
use App\Models\ModelCategory;
use App\Models\ModelUnit;
use App\Models\ModelType;
class ExpenseController extends BaseController
{
    public function __construct() 
    {
        $this->ModelExpense = new ModelExpense();
        $this->ModelBalance = new ModelBalance();
        $this->ModelCategory = new ModelCategory();
        $this->ModelUnit = new ModelUnit();
        $this->ModelType = new ModelType();
    }
    public function index()
    {
        $query = $this->ModelExpense
        ->select('expense.id, expense.date, balance.title_balance, category.name_category, expense.amount, unit.name_unit, type.name_type, expense.name_expense')
        ->join('balance', 'balance.id = expense.balance_id')
        ->join('category', 'category.id = expense.category_id')
        ->join('unit', 'unit.id = expense.unit_id')
        ->join('type', 'type.id = expense.type_id')
        ->findAll();

        $data = [
            'expenseData' => $query,
        ];
        return view('v_expense', $data);
    }
    public function show($id)
    {   
        $query = $this->ModelExpense
        ->select('expense.id, expense.date, expense.hour, balance.title_balance, category.name_category, expense.amount, unit.name_unit, type.name_type, expense.name_expense, expense.expense_detail')
        ->join('balance', 'balance.id = expense.balance_id')
        ->join('category', 'category.id = expense.category_id')
        ->join('unit', 'unit.id = expense.unit_id')
        ->join('type', 'type.id = expense.type_id')
        ->find($id);

        $data['expense'] = $query;
        return view('expense/v_detail_expense', $data);
    }   
    public function create()
    {
        $data = [
            "balanceData" => $this->ModelBalance->findAll(),
            "categoryData" => $this->ModelCategory->findAll(),
            "unitData" => $this->ModelUnit->findAll(),
            "typeData" => $this->ModelType->findAll(),
        ];
        return view('expense/v_form_expense', $data);
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
            'name_expense' => $this->request->getPost('name_expense'),
            'expense_detail' => $this->request->getPost('expense_detail'),
        ];

        $balance = $this->ModelBalance->find($data['balance_id']);
        $trigger_amount['amount'] = $balance['amount'] - $data['amount'];
        $this->ModelExpense->insert($data);
        $this->ModelBalance->update($data['balance_id'],$trigger_amount);
        session()->setFlashdata('message', 'Expense added successfully.');
        return redirect()->to(base_url('admin/expense')); 
    }

    public function edit($id)
    {
        $data = [
            "balanceData" => $this->ModelBalance->findAll(),
            "categoryData" => $this->ModelCategory->findAll(),
            "unitData" => $this->ModelUnit->findAll(),
            "typeData" => $this->ModelType->findAll(),
            "expense" => $this->ModelExpense->find($id),
        ];
        return view('expense/v_form_expense', $data);
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
            'name_expense' => $this->request->getPost('name_expense'),
            'expense_detail' => $this->request->getPost('expense_detail'),
        ];
        
        $expense = $this->ModelExpense->find($id);

        if ($expense['balance_id'] == $data['balance_id']) {
            $balance = $this->ModelBalance->find($data['balance_id']);
            if ($expense['amount'] > $data['amount']){
                $trigger_amount['amount'] = $balance['amount'] + ($expense['amount'] - $data['amount']);
            }
            elseif($expense['amount'] < $data['amount']){
                $trigger_amount['amount'] = $balance['amount'] - ( $data['amount'] - $expense['amount']);
            } 
            elseif($expense['amount'] == $data['amount']){
                $trigger_amount['amount'] = $balance['amount'];
            }
        }
        else {
            $balance = $this->ModelBalance->find($data['balance_id']);
            $balance2 = $this->ModelBalance->find($expense['balance_id']);
            $remove_trigger['amount'] = $balance2['amount'] + $expense['amount'];
            $this->ModelBalance->update($expense['balance_id'],$remove_trigger);
            $trigger_amount['amount'] = $balance['amount'] - $data['amount'];
        }

        $this->ModelExpense->update($id, $data);
        $this->ModelBalance->update($data['balance_id'],$trigger_amount);
        session()->setFlashdata('message', 'Expense updated successfully.');
        return redirect()->to(base_url('admin/expense')); 
    }
    public function delete($id)
    {
        $expense = $this->ModelExpense->find($id);
        $balance = $this->ModelBalance->find($expense['balance_id']);
        $trigger_amount['amount'] = $balance['amount'] + $expense['amount'];
        $this->ModelBalance->update($expense['balance_id'],$trigger_amount);
        $this->ModelExpense->delete($id);
        session()->setFlashdata('message', 'Expense deleted successfully.');
        return redirect()->to(base_url('admin/expense')); 
    }
}
