<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

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
    }

    public function index()
    {
        return view('/dashboard/pages/index');
    }
}
