<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['users'] = $userModel->where('role_id', 2)->orderBy('created_at', 'DESC')->findAll();
        return view('dashboard/pages/data_master/user/index', $data);
    }

    public function create()
    {
        return view('dashboard/pages/data_master/user/create');
    }

    public function store()
    {

        $validation =  \Config\Services::validation();

        $isDataValid = $validation->run($this->request->getPost(), 'register');

        $errors = $validation->getErrors();
        
        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('/admin/master/user/create'));
        }

        if($isDataValid){

            $salt = uniqid('', true);
            $password = md5($this->request->getPost('password')).$salt;

            $users = new UserModel();

            $cek_email = $users->where('email',$this->request->getPost('email'))->first();

            if ($cek_email) {
                session()->setFlashdata('email', 'Email telah digunakan!');
                return view('dashboard/pages/data_master/user/create');
            } else {
                $users->insert([
                    "name" => $this->request->getPost('name'),
                    "dob" => $this->request->getPost('dob'),
                    "gender" => $this->request->getPost('gender'),
                    "address" => $this->request->getPost('address'),
                    "email" => $this->request->getPost('email'),
                    "password" => $password,
                    "salt" => $salt
                ]);
    
                session()->setFlashdata('success', 'Berhasil menyimpan data!');
                return redirect()->route('userIndex');
            }
        }
    }

    public function edit($id)
    {
        $user = new UserModel();
        $data['user'] = $user->where('id', $id)->first();
        return view('dashboard/pages/data_master/user/edit', $data);
    }

    public function update($id)
    {
        $user = new UserModel();
        $data['user'] = $user->where('id', $id)->first();

        $cek_email = $user->where('email',$this->request->getPost('email'))->first();
        
        if ($cek_email) {
            if ($data['user']['id'] == $cek_email['id']) {
                // echo 1;
                if ($this->request->getPost('password')) {
                    
                    $validation =  \Config\Services::validation();
        
                    $isDataValid = $validation->run($this->request->getPost(), 'register');
        
                    $errors = $validation->getErrors();
                    
                    if($errors){
                        session()->setFlashdata('error', $errors);
                        return view('dashboard/pages/data_master/user/edit', $data);
                    }
                    
                    if($isDataValid){             
                        $salt = uniqid('', true);
                        $password = md5($this->request->getPost('password')).$salt;    
                    }
                    
                } else {
                    $salt = $data['user']['salt'];
                    $password = $data['user']['password'];   
                }
    
                // echo $password;
        
                $user->update($id, [
                    "name" => $this->request->getPost('name'),
                    "dob" => $this->request->getPost('dob'),
                    "gender" => $this->request->getPost('gender'),
                    "address" => $this->request->getPost('address'),
                    "email" => $this->request->getPost('email'),
                    "password" => $password,
                    "salt" => $salt
                ]);
                session()->setFlashdata('success', 'Berhasil edit data!');
                return redirect()->route('userIndex');
    
            } else {
                session()->setFlashdata('email', 'Email telah digunakan!');
                return view('dashboard/pages/data_master/user/edit', $data);
            }
        } else {
            if ($this->request->getPost('password')) {
                    
                $validation =  \Config\Services::validation();
    
                $isDataValid = $validation->run($this->request->getPost(), 'register');
    
                $errors = $validation->getErrors();
                
                if($errors){
                    session()->setFlashdata('error', $errors);
                    return view('dashboard/pages/data_master/user/edit', $data);
                }
                
                if($isDataValid){             
                    $salt = uniqid('', true);
                    $password = md5($this->request->getPost('password')).$salt;    
                }
                
            } else {
                $salt = $data['user']['salt'];
                $password = $data['user']['password'];   
            }

            // echo $password;
    
            $user->update($id, [
                "name" => $this->request->getPost('name'),
                "dob" => $this->request->getPost('dob'),
                "gender" => $this->request->getPost('gender'),
                "address" => $this->request->getPost('address'),
                "email" => $this->request->getPost('email'),
                "password" => $password,
                "salt" => $salt
            ]);
            session()->setFlashdata('success', 'Berhasil edit data!');
            return redirect()->route('userIndex');
        }

    }

    public function delete($id)
    {
        $user = new UserModel();
        $data['user'] = $user->where('id', $id)->first();
        
        // Delete
        $user->delete($id);
        session()->setFlashdata('success', 'Berhasil hapus data!');
        return redirect()->route('userIndex');
    }
}
