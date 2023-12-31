<?php

namespace App\Controllers;
use App\Models\Kategori;

class kategoriController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new Kategori();
        $kategori = $Model->findAll();
        return view('users/kategori/index',['kategori' => $kategori,'role'=>$role]);
    }

    function simpan(){
        $data = [
            'kategori' => $_POST['kategori'],
            'bagian' => $_POST['bagian'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Kategori();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah kategori');
         if(session()->get('role_baku') == 2){
                return redirect('admins/kategori');
            }else{
                return redirect('user/kategori');
            }


    }

    function tambah() {
        return view('users/kategori/tambah');
    }

    public function hapus($id)
    {
        $Model = new Kategori();
        $kategori = $Model->where('id_kategori',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus kategori');
        if(session()->get('role_baku') == 2){
                return redirect('admins/kategori');
            }else{
                return redirect('user/kategori');
            }
    }

      public function edit($id)
    {
        $Model = new Kategori();
        $kategori = $Model->where('id_kategori',$id)->first();
        return view('users/kategori/edit',$kategori);
    }

    function update(){
        $data = [
            'id_kategori'  => $_POST['id'],
            'kategori'  => $_POST['kategori'],
            'bagian'  => $_POST['bagian'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Kategori();
        $Model->save($data);
        set_notif('success','berhasil','berhasil edit kategori');
         if(session()->get('role_baku') == 2){
                return redirect('admins/kategori');
            }else{
                return redirect('user/kategori');
            }


    }
    public function SAindex()
    {
        $role = $this->getRoleData();
        $Model = new Kategori();
        $kategori = $Model->findAll();
        return view('superadmin/kategori/index',['kategori' => $kategori,'role'=>$role]);
    }

    function SAsimpan(){
        $data = [
            'kategori' => $_POST['kategori'],
            'bagian' => $_POST['bagian'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Kategori();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah kategori');
               if(session()->get('role_baku') == 1){ 
             return redirect('superadmin/kategori');


 }elseif(session()->get('role_baku') == 2){ 
             return redirect('admins/kategori');


 }


    }

    function SAtambah() {
        return view('superadmin/kategori/tambah');
    }

    public function SAhapus($id)
    {
        $Model = new Kategori();
        $kategori = $Model->where('id_kategori',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus kategori');
                       if(session()->get('role_baku') == 1){ 
             return redirect('superadmin/kategori');


 }elseif(session()->get('role_baku') == 2){ 
             return redirect('admins/kategori');


 };
    }

      public function SAedit($id)
    {
        $Model = new Kategori();
        $kategori = $Model->where('id_kategori',$id)->first();
        return view('superadmin/kategori/edit',$kategori);
    }

    function SAupdate(){
        $data = [
            'id_kategori'  => $_POST['id'],
            'kategori'  => $_POST['kategori'],
            'bagian'  => $_POST['bagian'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Kategori();
        $Model->save($data);
        set_notif('success','berhasil','berhasil edit kategori');
                       if(session()->get('role_baku') == 1){ 
             return redirect('superadmin/kategori');


 }elseif(session()->get('role_baku') == 2){ 
             return redirect('admins/kategori');


 }

    }

}
