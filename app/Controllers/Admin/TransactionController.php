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

    public function index()
    {
        $trx = new TransactionModel();
        $data['trx'] = $trx->findAll();
        return view('dashboard/pages/transaksi/index', $data);
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

    public function edit($id)
    {
        $trx = new TransactionModel();
        $data['trx'] = $trx->where('id', $id)->first();
        return view('dashboard/pages/transaksi/edit', $data);
    }

    public function update($id)
    {
        $trx = new TransactionModel();
        $data = $trx->where('id', $id)->first();
        
        $trx->update($id, [
            "total_price" => $this->request->getPost('total_price'),
            "tgl_pengambilan" => $this->request->getPost('tgl_pengambilan'),
            "status" => $this->request->getPost('status')
        ]);
        return redirect()->route('transactionIndex');
    }
    
    public function delete($id)
    {
        $trx = new TransactionModel();
        $data['trx'] = $trx->where('id', $id)->first();
        
        $trx->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->route('transactionIndex');
    }
    
    public function updateStatus($id)
    {
        $trx = new TransactionModel();
        $data = $trx->where('id', $id)->first();

        if ($data['status'] == "Belum di Bayar" || $data['status'] == "Sedang di Konfirmasi") {
            $trx->update($id, [
                "status" => "Sudah di Bayar",
            ]);
        } else {
            $trx->update($id, [
                "status" => "Belum di Bayar",
            ]);
        }
        session()->setFlashdata('success', 'Berhasil ubah status!');
        return redirect()->route('transactionIndex');
    }

    public function uploadPickUp()
    {
        $trans = new TransactionModel();
        $dataBerkas = $this->request->getFile('img_pick_up');
        
        $data['trans'] = $trans->where('id', $this->request->getPost('id'))->first();
        $fileName = $dataBerkas->getRandomName();
    
        // return $this->request->getPost('id');
    
        $trans->update($this->request->getPost('id'),[
            'img_pick_up' => $fileName,
            'status' => "Pengambilan Barang"
        ]);
        $dataBerkas->move('uploads/bukti/pick-up/', $fileName);
        return redirect()->route('transactionIndex');
    }

    public function uploadDropOff()
    {
        $trans = new TransactionModel();
        $dataBerkas = $this->request->getFile('img_drop_off');
    
        $data['trans'] = $trans->where('id', $this->request->getPost('id'))->first();
        $fileName = $dataBerkas->getRandomName();
        // return $this->request->getPost('id');
    
        $trans->update($this->request->getPost('id'),[
            'img_drop_off' => $fileName,
            'status' => "Pengembalian Barang"
        ]);
        $dataBerkas->move('uploads/bukti/drop-off/', $fileName);
        return redirect()->route('transactionIndex');
    }

}
