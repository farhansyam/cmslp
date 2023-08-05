<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session()->get('id_pengguna') and !session()->get('role') == 2){
            return redirect()->to('login-admin');
        }elseif(session()->get('id_pengguna') and session()->get('role') == 3){
            return redirect()->to('user');
        }elseif(session()->get('id_pengguna') and session()->get('role') == 1){
            return redirect()->to('superadmin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}