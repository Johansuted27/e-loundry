<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TransactionModel;
use App\Models\TransactionDetailModel;

class TransactionController extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->TransactionModel = new TransactionModel();
        $this->TransactionDetailModel = new TransactionDetailModel();
    }

    function generateRandomString($length = 10) {
	    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}

    public function createTransaction()
    {
        $user = $this->UserModel->where('id', session()->get('id'))->first();
        $row = $this->request->getPost();

        // Simpan ke table transactions
        $this->TransactionModel->insert([
            'code_trx' => $this->generateRandomString(),
            'user_id' => $user['id'],
            'paket_id' => $row['paket_id'],
            'estimasi_id' => $row['estimasi'],
            'total_price' => $row['total'],
            'tgl_pengambilan' => $row['tgl_pengambilan'],
            'type' => $row['type_paket'],
            'status' => "Belum di Bayar"
        ]);

        if ($row['type_paket'] == 'satuan') {
            $db = db_connect();
            $query = $db->query("SELECT id FROM transactions ORDER BY id DESC LIMIT 1");
            $result = $query->getRow();

            if ($row['product']) {
                $jumlah = count($row['product']);
                for($i=0;$i<$jumlah;$i++){
                    $this->TransactionDetailModel->insert([
                        'transaction_id' => $result->id,
                        'produk_satuan_id' => $row['product'][$i],
                        'jumlah' => $row['qty'][$i],
                    ]);
                } 
            }
        }

        return redirect()->to(base_url('/tansaction/success'));

    }
}
