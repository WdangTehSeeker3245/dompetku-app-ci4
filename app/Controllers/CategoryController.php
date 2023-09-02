<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelCategory;
class CategoryController extends BaseController
{
    public function __construct() 
    {
        $this->ModelCategory = new ModelCategory();
    }
    public function index()
    {
        $data = [
            'categoryData' => $this->ModelCategory->findAll(),
        ];
        return view('v_category', $data);
    }

    public function show($id)
    {
        
    }

    public function create()
    {
        // Display a form to add a new balance
        return view('category/v_form_category');
    }

    public function store()
    {
        $data = [
            'name_category' => $this->request->getPost('name_category'),
        ];

        $this->ModelCategory->insert($data);
        session()->setFlashdata('message', 'Category added successfully.');
        return redirect()->to(base_url('admin/category')); 
    }

    public function edit($id)
    {
        $data['category'] = $this->ModelCategory->find($id);
        return view('category/v_form_category', $data);
    }

    public function update($id)
    {
        $data = [
            'name_category' => $this->request->getPost('name_category'),
        ];

        $this->ModelCategory->update($id, $data);
        session()->setFlashdata('message', 'Category updated successfully.');
        return redirect()->to(base_url('admin/category')); 
    }

    public function delete($id)
    {
        $this->ModelCategory->delete($id);
        session()->setFlashdata('message', 'Category deleted successfully.');
        return redirect()->to(base_url('admin/category')); 
    }
}
