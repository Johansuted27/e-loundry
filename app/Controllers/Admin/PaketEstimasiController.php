<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\EstimasiModel;

class PaketEstimasiController extends BaseController
{
    public function index()
    {
        $estimasiModel = new EstimasiModel();
        $data['estimasis'] = $estimasiModel->findAll();
        return view('dashboard/pages/data_master/paket_estimasi/index', $data);
    }

    public function create()
    {
        return view('dashboard/pages/data_master/paket_estimasi/create');
    }

    public function store()
    {

        $estimasis = new EstimasiModel();

        $estimasis->insert([
            "nama_estimasi" => $this->request->getPost('nama_estimasi'),
            "harga_estimasi" => $this->request->getPost('harga_estimasi')
        ]);

        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->route('p_estimasiIndex');
    }

    public function edit($id)
    {
        $estimasi = new EstimasiModel();
        $data['estimasi'] = $estimasi->where('id', $id)->first();
        return view('dashboard/pages/data_master/paket_estimasi/edit', $data);
    }

    public function update($id)
    {
        $estimasi = new EstimasiModel();
        $data['estimasi'] = $estimasi->where('id', $id)->first();

        $estimasi->update($id, [
            "nama_estimasi" => $this->request->getPost('nama_estimasi'),
            "harga_estimasi" => $this->request->getPost('harga_estimasi')
        ]);

        session()->setFlashdata('success', 'Berhasil mengubah data!');
        return redirect()->route('p_estimasiIndex');
    }

    public function delete($id)
    {
        $estimasi = new EstimasiModel();
        $data['estimasi'] = $estimasi->where('id', $id)->first();
        
        // Delete
        $estimasi->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->route('p_estimasiIndex');
    }
}
