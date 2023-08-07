<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class BelumLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('id_pengguna') and session()->get('role_baku') == 2){
            return redirect()->to('user');
        }else if(session()->get('id_admin') and session()->get('role_baku') == 2){
            return redirect()->to('admins');
        }else if(session()->get('id_admin') and session()->get('role_baku') == 1){
            return redirect()->to('superadmin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}