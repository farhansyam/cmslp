<?php

namespace App\Controllers;
use App\Models\Paket;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;
class PaketController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        $role =  $this->getRoleData();
        $Model = new Paket();
        $role =  $this->getRoleData();
        $Model = new Paket();
        if(session()->get('role_baku') == 1){
            $paket = $Model->get()->getResult();
            
        }else{
            $paket = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();

        }
        $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($paket as &$data) {
            $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data->id_pengguna = $user;
            $data->organisasi_kode = $organisasi; }
        return view('users/paket/index',['paket' => $paket,'role'=>$role]);
    }

    function simpan()
    {
         if(session()->get('role_baku') == 1){
              $modelOrganisasi = new ModelOrganisasi();
              $modelPengguna = new ModelPengguna();
              $organisasi = $modelOrganisasi->where('organisasi_kode',$_POST['organisasi_kode'])->first();
        $pengguna = $organisasi['id_pengguna_owner'];
        $organisasinya = $_POST['organisasi_kode'];
    }else{
        $pengguna = $this->getuser();
        $pengguna = $pengguna['id_pengguna'];
        $organisasinya = session()->get('organisasi_kode');
    }

        $data = [
            'id_pengguna' => $pengguna,
            'organisasi_kode' => $organisasinya,
            'judul_paket'  => $_POST['judul_paket'],
            'jenis_paket'  => $_POST['jenis_paket'],
            'deskripsi'  => $_POST['deskripsi_paket'],
            'harga'  => $_POST['harga'],
            'fasilitas'  => $_POST['fasilitas'],
            'kalimat_pada_tombol' => $_POST['kalimat_pada_tombol'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Paket();
        $Model->save($data);
        set_notif('success','berhasil','berhasil tambah Paket');

            if(session()->get('role_baku') == 1){
                return redirect('superadmin/paket');
            }elseif(session()->get('role_baku') == 2){
                return redirect('admins/paket');
            }else{
                return redirect('user/paket');
            }

    }

    function tambah() {
           $ModelOrganisasi = new ModelOrganisasi;
        $data1 = $ModelOrganisasi->findAll();
        if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2){
        return view('users/paket/tambah',['data1'=>$data1]);

        }else{
        return view('users/paket/tambah');

        }
    }

    public function hapus($id)
    {
        $Model = new Paket();
        $paket = $Model->where('id_paket',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus Paket');
         if(session()->get('role_baku') == 1){
                return redirect('superadmin/paket');
            }elseif(session()->get('role_baku') == 2){
                return redirect('admins/paket');
            }else{
                return redirect('user/paket');
            }
    }

      public function edit($id)
    {
        $Model = new Paket();
        $paket = $Model->where('id_paket',$id)->first();
        return view('users/paket/edit',$paket);
    }

    function update(){
        $data = [
            'id_paket'  => $_POST['id'],
            'judul_paket'  => $_POST['judul_paket'],
            'jenis_paket'  => $_POST['jenis_paket'],
            'deskripsi'  => $_POST['deskripsi_paket'],
            'harga'  => $_POST['harga'],
            'fasilitas'  => $_POST['fasilitas'],
            'kalimat_pada_tombol' => $_POST['kalimat_pada_tombol'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Paket();
        $Model->save($data);
        set_notif('success','berhasil','berhasil update Paket');
         if(session()->get('role_baku') == 1){
                return redirect('superadmin/paket');
            }elseif(session()->get('role_baku') == 2){
                return redirect('admins/paket');
            }else{
                return redirect('user/paket');
            }


    }

}
