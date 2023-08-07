<?php

namespace App\Controllers;
use App\Models\ModelAdmin;
use App\Models\ModelRole;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
         $adminModel = new ModelAdmin();
        $admins = $adminModel->findAll(); // Mengambil semua data admin

        $roleModel = new ModelRole();

        // Mengumpulkan data role untuk setiap admin
        foreach ($admins as &$admin) {
            $role = $roleModel->find($admin['role']); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel admin
            $admin['role'] = $role;}

        return view('superadmin/admin/index',['admins' => $admins]);
    }

    function simpan(){
        $data = [
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'nama_depan' => $_POST['nama_depan'],
            'nama_belakang' => $_POST['nama_belakang'],
            'role' => $_POST['role'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new ModelAdmin();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah admin');
        return redirect('superadmin/admin');


    }

    function tambah() {
        $Role = new ModelRole();
        $data = $Role->where('id_role !=', 1)->get()->getResult();
        return view('superadmin/admin/tambah',['data' => $data]);
    }

    public function hapus($id)
    {
        $Model = new ModelAdmin();
        $admin = $Model->where('id_admin',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus admin');
        return redirect('user/admin');
    }

      public function edit($id)
    {
        $Model = new ModelAdmin();
        $Role = new ModelRole();
        $data = $Role->where('id_role !=', 1)->get()->getResult();
        $admin = $Model->where('id_admin',$id)->first();
        return view('superadmin/admin/edit',['admin' => $admin,'data' => $data]);
    }

    function update(){
        $data = [
            'id_admin'  => $_POST['id'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
            'nama_depan' => $_POST['nama_depan'],
            'nama_belakang' => $_POST['nama_belakang'],
            'role' => $_POST['role'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']
                ];
        $Model = new ModelAdmin();
        $Model->save($data);
        set_notif('success','berhasil','berhasil edit admin');
        return redirect('superadmin/admin');


    }

}
