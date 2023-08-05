<?php

namespace App\Controllers;
use App\Models\Faq;

class FaqController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
        $Model = new Faq();
        $faq = $Model->findAll();
        return view('users/faq/index',['faq' => $faq]);
    }

    function simpan(){
        $data = [
            'id_pengguna' => session()->get('id_pengguna'),
            'organisasi_kode' => session()->get('organisasi_kode'),
            'pertanyaan'  => $_POST['pertanyaan'],
            'jawaban' => $_POST['Jawaban'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Faq();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah Faq');
        return redirect('user/faq');


    }

    function tambah() {
        return view('users/faq/tambah');
    }

    public function hapus($id)
    {
        $Model = new Faq();
        $faq = $Model->where('id_faq',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus Faq');
        return redirect('user/faq');
    }

      public function edit($id)
    {
        $Model = new Faq();
        $faq = $Model->where('id_faq',$id)->first();
        return view('users/faq/edit',$faq);
    }

    function update(){
        $data = [
            'id_faq'  => $_POST['id'],
            'pertanyaan'  => $_POST['pertanyaan'],
            'jawaban' => $_POST['Jawaban'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Faq();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah Faq');
        return redirect('user/faq');


    }

}
