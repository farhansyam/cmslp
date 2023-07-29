<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class BelumLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->get('id_pengguna') and session()->get('role') == 'user'){
            return redirect()->to('user');
        }else if(session()->get('id_pengguna') and session()->get('role') == 'admin'){
            return redirect()->to('admin');
        }else if(session()->get('id_pengguna') and session()->get('role') == 'superadmin'){
            return redirect()->to('superadmin');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}