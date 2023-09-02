<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUnit;

class UnitController extends BaseController
{
    public function __construct() 
    {
        $this->ModelUnit = new ModelUnit();
    }
    public function index()
    {
        $data = [
            'unitData' => $this->ModelUnit->findAll(),
        ];
        return view('v_unit', $data);
    }

    public function show($id)
    {
        
    }

    public function create()
    {
        // Display a form to add a new balance
        return view('unit/v_form_unit');
    }

    public function store()
    {
        $data = [
            'name_unit' => $this->request->getPost('name_unit'),
        ];

        $this->ModelUnit->insert($data);
        session()->setFlashdata('message', 'Unit added successfully.');
        return redirect()->to(base_url('admin/unit')); 
    }

    public function edit($id)
    {
        $data['unit'] = $this->ModelUnit->find($id);
        return view('unit/v_form_unit', $data);
    }

    public function update($id)
    {
        $data = [
            'name_unit' => $this->request->getPost('name_unit'),
        ];

        $this->ModelUnit->update($id, $data);
        session()->setFlashdata('message', 'Unit updated successfully.');
        return redirect()->to(base_url('admin/unit')); 
    }

    public function delete($id)
    {
        $this->ModelUnit->delete($id);
        session()->setFlashdata('message', 'Unit deleted successfully.');
        return redirect()->to(base_url('admin/unit')); 
    }
}
