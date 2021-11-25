<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LayananModel;

class PaketLayananController extends BaseController
{
    public function index()
    {
        $layananModel = new LayananModel();
        $data['layanans'] = $layananModel->findAll();
        return view('dashboard/pages/data_master/paket_layanan/index', $data);
    }

    public function create()
    {
        return view('dashboard/pages/data_master/paket_layanan/create');
    }

    public function store()
    {

        $layanans = new LayananModel();

        $layanans->insert([
            "nama_paket" => $this->request->getPost('nama_paket'),
            "description" => $this->request->getPost('description')
        ]);

        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->route('p_layananIndex');
    }

    public function edit($id)
    {
        $layanan = new LayananModel();
        $data['layanan'] = $layanan->where('id', $id)->first();
        return view('dashboard/pages/data_master/paket_layanan/edit', $data);
    }

    public function update($id)
    {
        $layanan = new LayananModel();
        $data['layanan'] = $layanan->where('id', $id)->first();

        $layanan->update($id, [
            "nama_paket" => $this->request->getPost('nama_paket'),
            "description" => $this->request->getPost('description')
        ]);

        session()->setFlashdata('success', 'Berhasil mengubah data!');
        return redirect()->route('p_layananIndex');
    }

    public function delete($id)
    {
        $layanan = new LayananModel();
        $data['layanan'] = $layanan->where('id', $id)->first();
        
        // Delete
        $layanan->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->route('p_layananIndex');
    }
}
