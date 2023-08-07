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
    public function index3()
    {
        return view('admin/index');
    }

    function logout(){
        session()->destroy();
        return redirect()->to('login');
    }
    function logoutA(){
        session()->destroy();
        return redirect()->to('login-admin');
    }
}
