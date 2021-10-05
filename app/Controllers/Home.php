<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('/main_page/pages/index');
    }

    public function dashboard()
    {
        return view('/dashboard/pages/index');
    }
}
