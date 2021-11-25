<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProdukSatuanModel;

class PaketProdukController extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukSatuanModel();
        $data['produks'] = $produkModel->findAll();
        return view('dashboard/pages/data_master/paket_produk/index', $data);
    }

    public function create()
    {
        return view('dashboard/pages/data_master/paket_produk/create');
    }

    public function store()
    {

        $produks = new ProdukSatuanModel();

        $produks->insert([
            "product_name" => $this->request->getPost('product_name'),
            "product_price" => $this->request->getPost('product_price'),
            "product_category" => $this->request->getPost('product_category')
        ]);

        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->route('p_produkIndex');
    }

    public function edit($id)
    {
        $produk = new ProdukSatuanModel();
        $data['produk'] = $produk->where('id', $id)->first();
        return view('dashboard/pages/data_master/paket_produk/edit', $data);
    }

    public function update($id)
    {
        $produk = new ProdukSatuanModel();
        $data['produk'] = $produk->where('id', $id)->first();

        $produk->update($id, [
            "product_name" => $this->request->getPost('product_name'),
            "product_price" => $this->request->getPost('product_price'),
            "product_category" => $this->request->getPost('product_category')
        ]);

        session()->setFlashdata('success', 'Berhasil mengubah data!');
        return redirect()->route('p_produkIndex');
    }

    public function delete($id)
    {
        $produk = new ProdukSatuanModel();
        $data['produk'] = $produk->where('id', $id)->first();
        
        // Delete
        $produk->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->route('p_produkIndex');
    }
}
