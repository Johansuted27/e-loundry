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

        // $trxTable = $this->db->table("transactions");
        // $trxTable->select('count(id) as total_transaksi, Month(created_at) as month');
        // $trxTable->groupBy("Month(created_at)");
        // $data['dataTrx'] = $trxTable->get();

        $builder = $this->db->table('transactions');

        $query = $builder->select("COUNT(id) as count, MONTHNAME(created_at) as day");
        $query = $builder->where("DAY(created_at) GROUP BY MONTHNAME(created_at)")->orderBy('MONTHNAME(created_at)', 'DESC')->get();
        $record = $query->getResult();

        $dtTrx = [];

        foreach($record as $row) {
            $dtTrx[] = array(
                'day'   => $row->day,
                'count'   => $row->count
            );
        }
        
        $data['dtTrx'] = ($dtTrx);    

        // echo json_encode($data['dtTrx']);
        return view('/dashboard/pages/index', $data);
    }

}
