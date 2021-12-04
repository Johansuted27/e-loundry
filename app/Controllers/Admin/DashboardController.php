<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProdukSatuanModel;
use App\Models\LayananModel;
use App\Models\TransactionModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != 1) {
            header('Location: ' . base_url());
            // echo base_url();
            exit;
            // return view('/dashboard/pages/index');
        }
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $userModel = new UserModel();
        $paketProduk = new ProdukSatuanModel();
        $layananModel = new LayananModel();
        $transaksi = new TransactionModel();
        $data['users'] = $userModel->countAll();
        $data['products'] = $paketProduk->countAll();
        $data['layanans'] = $layananModel->countAll();
        $data['transactions'] = $transaksi->countAll();
        // echo $userModel->countAll();
        return view('/dashboard/pages/index', $data);
    }
}
