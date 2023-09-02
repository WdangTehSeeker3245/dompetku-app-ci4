<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;

class AuthController extends BaseController
{
    public function index()
    {
        return view('v_login');
    }
    
    public function login()
    {
        // Load necessary helpers and libraries
        helper(['form', 'url']);
        $validation = \Config\Services::validation();

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Validate input data
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]'
            ];

            if (!$this->validate($rules)) {
                session()->setFlashdata('error', implode('<br>',$this->validator->getErrors()));
                return redirect()->to(base_url('login'));
            }

            // Retrieve user by email
            $model = new \App\Models\ModelUser(); // Replace with your actual model
            $user = $model->where('email', $this->request->getPost('email'))->first();

            if (!$user) {
                session()->setFlashdata('error','Invalid email');
                return redirect()->to(base_url('login'));
            }

            // Verify password using bcrypt hash
            $password = $this->request->getPost('password');
            if (password_verify($password, $user['password'])) {
                // Password is correct, proceed to login
                // Update last visit information
                $nowJakarta = Time::now('Asia/Jakarta');
                $model->update($user['id'], [
                    'last_date_visit' => $nowJakarta->format('Y-m-d'),
                    'last_hour_visit' => $nowJakarta->format('H:i') // Extract hour and minute
                ]);

                // You can now set user sessions, generate tokens, etc.
                session()->set('id_user', $user['id']);
                session()->set('username', $user['username']);
                session()->set('fullname', $user['fullname']);
                session()->set('role_level', $user['role_level']);
                if ($user['role_level'] == 1){
                    return redirect()->to(base_url('admin/dashboard'));
                } else {
                    // return redirect()->to(base_url('Penjualan'));
                }
            } else {
                // Password is incorrect
                session()->setFlashdata('error','Invalid password');
                return redirect()->to(base_url('login'));
            }
        } else {
            session()->setFlashdata('error','Method is not post');
            return redirect()->to(base_url('login'));
        }
    }
    public function logout()
    {
        session()->remove('id_user');
        session()->remove('username');
        session()->remove('fullname');
        session()->remove('role_level');
        session()->setFlashdata('message','Logout Successfully !');
        return redirect()->to(base_url('login'));
    }

    // public function checktime(){
    //     $myTime = Time::now('Asia/Jakarta');
    //     echo $myTime->format('Y-m-d');
    //     echo $myTime->format('H:i');
    // }
}
