<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function __construct()
    {
        //membuat user model untuk konek ke database 
        $this->userModel = new UserModel();
        
        //meload validation
        $this->validation = \Config\Services::validation();
        
        //meload session
        $this->session = \Config\Services::session();
        
    }

    public function testPass()
    {
        //buat salt
        $salt = uniqid('', true);
        
        //hash password digabung dengan salt
        $password = md5("admin123").$salt;

        return $password;
    }
    
    public function login()
    {
        //menampilkan halaman login
        return view('auth/login');
    }
    
    public function register()
    {
        //menampilkan halaman register
        return view('auth/register');
    }
    
    public function valid_register()
    {
        //tangkap data dari form 
        $data = $this->request->getPost();
        
        //jalankan validasi
        $this->validation->run($data, 'register');
        
        //cek errornya
        $errors = $this->validation->getErrors();
        
        //jika ada error kembalikan ke halaman register
        if($errors){
            session()->setFlashdata('error', $errors);
            return redirect()->to(base_url('register'));
        }
        
        //jika tdk ada error 
        
        //buat salt
        $salt = uniqid('', true);
        
        //hash password digabung dengan salt
        $password = md5($data['password']).$salt;
        
        //masukan data ke database
        $this->userModel->save([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            'address' => $data['address'],
            'email' => $data['email'],
            'password' => $password,
            'salt' => $salt
            ]);
        
        //arahkan ke halaman login
        session()->setFlashdata('login', 'Anda berhasil mendaftar, silahkan login');
        return redirect()->to(base_url('login'));
    }
    
    public function valid_login()
    {
        //ambil data dari form
        $data = $this->request->getPost();
        
        //ambil data user di database yang emailnya sama 
        $user = $this->userModel->where('email', $data['email'])->first();
        //cek apakah email ditemukan
        if($user){
            //cek password
            //jika salah arahkan lagi ke halaman login
            // return md5($data['password']).$user['salt'];
            if($user['password'] != md5($data['password']).$user['salt']){
                session()->setFlashdata('password', 'Password salah');
                return redirect()->to(base_url('login'));
            }
            else{
                //jika benar, arahkan user masuk ke aplikasi 
                $sessLogin = [
                    'isLogin' => true,
                    'email' => $user['email'],
                    'role' => $user['role_id']
                    ];
                $this->session->set($sessLogin);
                if($user['role_id'] == "1"){

                    return redirect()->to(base_url('admin'));

                }elseif($user['role_id'] == "2"){

                    return redirect()->to(base_url());
                }
            }
        }
        else{
            //jika email tidak ditemukan, balikkan ke halaman login
            session()->setFlashdata('email', 'email tidak ditemukan');
            return redirect()->to(base_url('login'));
        }
    }
    
    public function logout()
    {
        //hancurkan session 
        //balikan ke halaman login
        $this->session->destroy();
        return redirect()->to(base_url());

    }
    
}