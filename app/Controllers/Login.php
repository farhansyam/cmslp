<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $ModelPengguna = new \App\Models\ModelPengguna();

        $login = $this->request->getPost('login');

        if($login)
        {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $kode_organisasi = $this->request->getPost('kode-organisasi');

            $dataPengguna = $ModelPengguna->where('username',$username)->first();

            if(!$dataPengguna){
                $err = "Username tidak ditemukan !";

            }else{
                if($dataPengguna['organisasi_kode'] != $kode_organisasi){
                $err = "Kode Organisasi Salah !";
                session()->setFlashdata('username',$username);


            }else{
                if($dataPengguna['password'] != md5($password)){
                $err = "Password Salah !";
                session()->setFlashdata('kode_organisasi',$kode_organisasi);
                session()->setFlashdata('username',$username);
            }
            }

            
            }
            if(!empty($err)){
                session()->setFlashdata('error',$err);
                return redirect('login');

            }else{
                $dataSesi = [
                    'id_pengguna' => $dataPengguna['id_pengguna'],
                    'username' => $dataPengguna['username'],
                    'organisasi_kode' => $dataPengguna['organisasi_kode'],
                    'role' => $dataPengguna['sebagai'],
                ];

                session()->set($dataSesi);
                return redirect('user');
            }


            
        }

        return view('login_view');
    }
    public function index2()
    {
        $ModelAdmin = new \App\Models\ModelAdmin();
        $ModelRole = new \App\Models\ModelRole();

        $login = $this->request->getPost('login-admin');

        if($login)
        {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $dataPengguna = $ModelAdmin->where('username',$username)->first();
            $role = $ModelRole->where('id_role',$dataPengguna['role'])->first();

            if(!$dataPengguna){
                $err = "Username tidak ditemukan !";

            }else{
                if($dataPengguna['password'] != md5($password)){
                $err = "Password Salah !";
                session()->setFlashdata('username',$username);
            }

            
            }
            if(!empty($err)){
                session()->setFlashdata('error',$err);
                return redirect('login-admin');

            }else{
                if($role['nama_role'] == 'Super Admin')
                {
                    $dataSesi = [
                    'id_admin' => $dataPengguna['id_admin'],
                    'username' => $dataPengguna['username'],
                    'role' => $dataPengguna['role'],
                    'create' => $role['create_data'],
                    'read' => $role['read_data'],
                    'update' => $role['update_data'],
                    'delete' => $role['delete_data'],
                ];

                session()->set($dataSesi);
                return redirect('superadmin');
                }

                else
                {
                    $dataSesi = [
                    'id_admin' => $dataPengguna['id_admin'],
                    'username' => $dataPengguna['username'],
                    'role' => $dataPengguna['role'],
                    'create' => $role['create_data'],
                    'read' => $role['read'],
                    'update' => $role['update'],
                    'delete' => $role['delete'],
                ];

                session()->set($dataSesi);
                return redirect('admin');
                }
            }


            
        }

        return view('login_admin');
    }
}
