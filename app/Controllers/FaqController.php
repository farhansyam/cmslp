<?php

namespace App\Controllers;
use App\Models\Faq;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

class FaqController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new Faq();
        $faq = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
        return view('users/faq/index',['faq' => $faq,'role'=>$role]);
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
        set_notif('success','berhasil','berhasil edit Faq');
        return redirect('user/faq');


    }
    function SAsimpan(){
        $modelPengguna = new ModelPengguna;
        $pengguna = $modelPengguna->where('organisasi_kode',$_POST['organisasi_kode'])->first();
        $data = [
            'id_pengguna' => $pengguna['id_pengguna'],
            'organisasi_kode' => $_POST['organisasi_kode'],
            'pertanyaan'  => $_POST['pertanyaan'],
            'jawaban' => $_POST['Jawaban'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Faq();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah Faq');
        return redirect('superadmin/faq');


    }

    function SAtambah() {
        $ModelOrganisasi = new ModelOrganisasi;

        $data1 = $ModelOrganisasi->findAll();
        return view('superadmin/faq/tambah',['data1'=>$data1]);
    }

    public function SAhapus($id)
    {
        $Model = new Faq();
        $faq = $Model->where('id_faq',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus Faq');
        return redirect('superadmin/faq');
    }

      public function SAedit($id)
    {
        $Model = new Faq();
        $faq = $Model->where('id_faq',$id)->first();
        return view('superadmin/faq/edit',$faq);
    }

    function SAupdate(){
        $data = [
            'id_faq'  => $_POST['id'],
            'pertanyaan'  => $_POST['pertanyaan'],
            'jawaban' => $_POST['Jawaban'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Faq();
        $Model->save($data);
        set_notif('success','berhasil','berhasil edit Faq');
        return redirect('superadmin/faq');


    }
     public function SAindex()
    {
        $role = $this->getRoleData();
        $Model = new Faq();
        $existingData = $Model->findAll();
        $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($existingData as &$data) {
            $user = $ModelUser->find($data['id_pengguna']); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data['organisasi_kode'])->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data['id_pengguna'] = $user;
            $data['organisasi_kode'] = $organisasi;
       
                }        $faq = $Model->get()->getResult();
        return view('superadmin/faq/index',['faq' => $existingData,'role'=>$role]);
    }

}
