<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = [
            'current_page' => 'dashboard'
        ];
        return view('users/index',$data);
    }

    function logout(){
        session()->destroy();
        return redirect()->to('login');
    }
}
