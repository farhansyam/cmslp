<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('users/index');
    }
    public function index2()
    {
        return view('superadmin/index');
    }

    function logout(){
        session()->destroy();
        return redirect()->to('login');
    }
}
