<?php

namespace App\Controllers;
use App\Models\ModelRole;

class RoleController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
        $Model = new ModelRole();
        $role = $Model->findAll();
        return view('superadmin/role/index',['role' => $role]);
    }

    function simpan(){
        $data = [
            'nama_role'  => $_POST['nama_role'],
            'create_data'  => $_POST['create_data'],
            'read_data'  => $_POST['read_data'],
            'update_data'  => $_POST['update_data'],
            'delete_data'  => $_POST['delete_data'],
            'all_organisasi'  => $_POST['all_organisasi'],
            'list_organisasi'  => $_POST['list_organisasi'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new ModelRole();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah role');
        return redirect('superadmin/role');


    }

    function tambah() {
        return view('superadmin/role/tambah');
    }

    public function hapus($id)
    {
        $Model = new ModelRole();
        $role = $Model->where('id_role',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus role');
        return redirect('superadmin/role');
    }

      public function edit($id)
    {
        $Model = new ModelRole();
        $role = $Model->where('id_role',$id)->first();
        return view('superadmin/role/edit',$role);
    }

    function update(){
        $data = [
            'id_role'  => $_POST['id'],
            'nama_role'  => $_POST['nama_role'],
            'create_data'  => $_POST['create_data'],
            'read_data'  => $_POST['read_data'],
            'update_data'  => $_POST['update_data'],
            'delete_data'  => $_POST['delete_data'],
            'all_organisasi'  => $_POST['all_organisasi'],
            'list_organisasi'  => $_POST['list_organisasi'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new ModelRole();
        $Model->save($data);
        set_notif('success','berhasil','berhasil edit role');
        return redirect('superadmin/role');


    }

}
