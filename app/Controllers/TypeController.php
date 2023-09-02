<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelType;

class TypeController extends BaseController
{
    public function __construct() 
    {
        $this->ModelType = new ModelType();
    }
    public function index()
    {
        $data = [
            'typeData' => $this->ModelType->orderBy('level', 'ASC')->findAll(),
        ];
        return view('v_type', $data);
    }
    public function show($id)
    {
        
    }

    public function create()
    {
        // Display a form to add a new balance
        return view('type/v_form_type');
    }

    public function store()
    {
        if ($this->request->getMethod() === 'post') {
            $existingType = $this->ModelType->where('level', $this->request->getPost('level'))->first();
    
            if ($existingType) {
                session()->setFlashdata('message', 'A type with the same level already exists.');
                return redirect()->to(base_url('admin/type/add'));
            }
    
            $data = [
                'name_type' => $this->request->getPost('name_type'),
                'level' => $this->request->getPost('level')
            ];
            $this->ModelType->insert($data);
    
            session()->setFlashdata('message', 'Type added successfully.');
            return redirect()->to(base_url('admin/type'));
        } else {
            session()->setFlashdata('message', 'Method is not Post');
            return redirect()->to(base_url('admin/type'));
        }
    }

    public function edit($id)
    {
        $data['type'] = $this->ModelType->find($id);
        return view('type/v_form_type', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'post') {
            $existingType = $this->ModelType->where('level', $this->request->getPost('level'))->first();
    
            if ($existingType) {
                session()->setFlashdata('error', 'A type with the same level already exists.');
                return redirect()->to(base_url('admin/type'));
            }
    
            $data = [
                'name_type' => $this->request->getPost('name_type'),
                'level' => $this->request->getPost('level')
            ];
            $this->ModelType->update($id, $data);
    
            session()->setFlashdata('message', 'Type updated successfully.');
            return redirect()->to(base_url('admin/type'));
        } else {
            session()->setFlashdata('error', 'Method is not Post');
            return redirect()->to(base_url('admin/type'));
        }
    }

    public function delete($id)
    {
        $this->ModelType->delete($id);
        session()->setFlashdata('message', 'Type deleted successfully.');
        return redirect()->to(base_url('admin/type')); 
    }
}
