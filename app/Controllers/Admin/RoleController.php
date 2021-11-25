<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class RoleController extends BaseController
{
    public function index()
    {
        $roleModel = new RoleModel();
        $data['roles'] = $roleModel->findAll();
        return view('dashboard/pages/data_master/role/index', $data);
    }

    public function create()
    {
        return view('dashboard/pages/data_master/role/create');
    }

    public function store()
    {

        $roles = new RoleModel();

        $roles->insert([
            "role_name" => $this->request->getPost('role_name'),
        ]);

        session()->setFlashdata('success', 'Berhasil menyimpan data!');
        return redirect()->route('roleIndex');
    }

    public function edit($id)
    {
        $role = new RoleModel();
        $data['role'] = $role->where('id', $id)->first();
        return view('dashboard/pages/data_master/role/edit', $data);
    }

    public function update($id)
    {
        $role = new RoleModel();
        $data['role'] = $role->where('id', $id)->first();

        $role->update($id, [
            "role_name" => $this->request->getPost('role_name'),
        ]);

        session()->setFlashdata('success', 'Berhasil mengubah data!');
        return redirect()->route('roleIndex');
    }

    public function delete($id)
    {
        $role = new RoleModel();
        $data['role'] = $role->where('id', $id)->first();
        
        // Delete
        $role->delete($id);
        session()->setFlashdata('success', 'Berhasil menghapus data!');
        return redirect()->route('roleIndex');
    }
}
