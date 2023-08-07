<?php

namespace App\Controllers;
use App\Models\ModelPengguna;
use App\Models\ModelRole;
use App\Models\ModelOrganisasi;

class PenggunaController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
         $adminModel = new ModelPengguna;
        $pengguna = $adminModel->findAll(); // Mengambil semua data admin

        $roleModel = new ModelRole();
        $organisasiModel = new ModelOrganisasi();

        // Mengumpulkan data role untuk setiap admin
        foreach ($pengguna as &$admin) {
              $role = $roleModel->where('id_role',$admin['sebagai'])->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel admin
            $organisasi = $organisasiModel->where('organisasi_kode',$admin['organisasi_kode'])->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel admin
            $admin['sebagai'] = $role;
            $admin['organisasi_kode'] = $organisasi;}


        return view('admin/pengguna/index',['pengguna' => $pengguna]);
    }

    function simpan(){
        $data = [
            'username' => $_POST['username'],
            'password' => md5($_POST['passsword']),
            'nama_depan' => $_POST['nama_depan'],
            'nama_belakang' => $_POST['nama_belakang'],
            'nama_belakang' => $_POST['nama_belakang'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'alamat' => $_POST['alamat'],
            'kecamatan' => $_POST['kecamatan'],
            'kota' => $_POST['kota'],
            'email' => $_POST['email'],
            'provinsi' => $_POST['provinsi'],
            'nomor_telepon' => $_POST['nomor_telepon'],
            'organisasi_kode' => $_POST['organisasi_kode'],
            'sebagai' => $_POST['sebagai'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new ModelPengguna;
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah admin');
        return redirect('admins/pengguna');


    }

    function tambah() {
        $Role = new ModelRole();
        $organisasi = new ModelOrganisasi();
        $data = $Role->where('id_role !=', 1)->get()->getResult();
        $data2 = $organisasi->findAll();
       
        return view('admin/pengguna/tambah',['data' => $data,
                                             'data2' => $data2]);
    }

    public function hapus($id)
    {
        $Model = new ModelPengguna;
        $admin = $Model->where('id_pengguna',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus pengguna');
        return redirect('admins/pengguna');
    }

      public function edit($id)
    {
        $Model = new ModelPengguna;
        $Role = new ModelRole();
        $organisasi = new ModelOrganisasi();
        $data2 = $organisasi->findAll();
       
        $data = $Role->where('id_role !=', 1)->get()->getResult();
        $pengguna = $Model->where('id_pengguna',$id)->first();
        return view('admin/pengguna/edit',['pengguna' => $pengguna,'data' => $data,'data2'=>$data2]);
    }

    function update(){
        $data = [
            'id_pengguna'  => $_POST['id'],
            'username' => $_POST['username'],
            'password' => md5($_POST['passsword']),
            'nama_depan' => $_POST['nama_depan'],
            'tempat_lahir' => $_POST['tempat_lahir'],
            'nama_belakang' => $_POST['nama_belakang'],
            'jenis_kelamin' => $_POST['jenis_kelamin'],
            'alamat' => $_POST['alamat'],
            'kecamatan' => $_POST['kecamatan'],
            'kota' => $_POST['kota'],
            'email' => $_POST['email'],
            'provinsi' => $_POST['provinsi'],
            'nomor_telepon' => $_POST['nomor_telepon'],
            'organisasi_kode' => $_POST['organisasi_kode'],
            'sebagai' => $_POST['sebagai'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']
                ];
        $Model = new ModelPengguna;
        $Model->save($data);
        set_notif('success','berhasil','berhasil edit admin');
        return redirect('admins/pengguna');


    }

}
