<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $ModelPengguna = new \App\Models\ModelPengguna();
        $ModelOrganisasi = new \App\Models\ModelOrganisasi();

        $login = $this->request->getPost('login');

        if($login)
        {
            $ModelRole = new \App\Models\ModelRole();
            $ModelOrganisasi = new \App\Models\ModelOrganisasi();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $kode_organisasi = $this->request->getPost('kode-organisasi');
            $dataPengguna = $ModelPengguna->where('username',$username)->first();
          
            if(!$dataPengguna){
                $err = "Username tidak ditemukan !";

            }else{
                  $organisasi = $ModelOrganisasi->where('id_pengguna_owner',$dataPengguna['id_pengguna'])->where('organisasi_kode',$kode_organisasi)->first();
            $role = $ModelRole->where('id_role',$dataPengguna['sebagai'])->first();

                if($organisasi == NULL){
                $err = "Kode Organisasi Salah !";
                session()->setFlashdata('username',$username);


            }else{
                if($dataPengguna['password'] != md5($password)){
                $err = "Password Salah !";
                session()->setFlashdata('kode_organisasi',$kode_organisasi);
                session()->setFlashdata('username',$username);
            }else{
                if($dataPengguna['status'] == 0){
                $err = "Akun belum aktif hubungi admin !";
                session()->setFlashdata('kode_organisasi',$kode_organisasi);
                session()->setFlashdata('username',$username);
                }
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
                    'organisasi_kode' => $kode_organisasi,
                    'role_baku' => $dataPengguna['role_baku'],
                    'role' => $dataPengguna['sebagai'],
                    'create' => $role['create_data'],
                    'read' => $role['read_data'],
                    'update' => $role['update_data'],
                    'delete' => $role['delete_data'],
                ];

                session()->set($dataSesi);
                return redirect('user/pengaturan');
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
            
            if(!$dataPengguna){
                $err = "Username tidak ditemukan !";
                
            }else{
                $role = $ModelRole->where('id_role',$dataPengguna['role'])->first();
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
                    'role_baku' => $dataPengguna['role_baku'],
                    'create' => $role['create_data'],
                    'read' => $role['read_data'],
                    'update' => $role['update_data'],
                    'delete' => $role['delete_data'],
                ];

                session()->set($dataSesi);
                return redirect('superadmin/admin');
                }

                else
                {
                         $model = new \App\Models\ModelRole();
                          $modelOrganisasi = new \App\Models\ModelOrganisasi();

                          // Panggil metode di model untuk mendapatkan data
                          $data = $model->where('id_role',$dataPengguna['role'])->first();

                         foreach(json_decode($data['list_organisasi']) as $d){ 
                              $org = $modelOrganisasi->where('organisasi_kode',$d)->first();
                              $a = $org['nama_organisasi'];
                         }
                    $dataSesi = [
                    'id_admin' => $dataPengguna['id_admin'],
                    'username' => $dataPengguna['username'],
                    'organisasi_kode' => $a[0],
                    'role' => $dataPengguna['role'],
                    'role_baku' => $dataPengguna['role_baku'],
                    'create' => $role['create_data'],
                    'read' => $role['read_data'],
                    'update' => $role['update_data'],
                    'delete' => $role['delete_data'],
                ];

                session()->set($dataSesi);
                return redirect('admins/organisasi');
                }
            }


            
        }

        return view('login_admin');
    }
}
