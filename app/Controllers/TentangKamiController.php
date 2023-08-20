<?php

namespace App\Controllers;
use App\Models\TentangKami;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

class TentangKamiController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new TentangKami();
        $dataToInsert = ['id_pengguna' => session()->get('id_pengguna'),'organisasi_kode' => session()->get('organisasi_kode')];
        $existingData = $Model->where($dataToInsert)->first();
        if($existingData){
            return view('users/tentangkami/index',['existingData'=>$existingData,'role'=>$role]);
        }
        else{
            $Model->insert($dataToInsert);
            $existingData = $Model->where($dataToInsert)->first();
            return view('users/tentangkami/index',['existingData'=>$existingData,'role'=>$role]);
        }
    }
    public function SAindex()
    {
        $Model = new TentangKami();
        $role = $this->getRoleData();
        $existingData = $Model->findAll();
        $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($existingData as &$data) {
            $user = $ModelUser->find($data['id_pengguna']); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data['organisasi_kode'])->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data['id_pengguna'] = $user;
            $data['organisasi_kode'] = $organisasi;
        }

        return view('superadmin/tentangkami/index',['data'=>$existingData,'role'=>$role]);
    }
    function SAedit($id) {
        $Model = new TentangKami();
        $role = $this->getRoleData();
        $existingData = $Model->where('id_tentang_kami',$id)->first();
        
            return view('superadmin/tentangkami/edit',['existingData' => $existingData,'role' => $role]);
    }

    function save(){
        helper(['alert_helper']);
        $data = [
            'id_tentang_kami' => $_POST['id'],
            'visi'  => $_POST['visi'],
            'misi' => $_POST['misi'],
            'motto' =>$_POST['motto'],
            'deskripsi_1'=>$_POST['deskripsi_1'],
            'deskripsi_2'=>$_POST['deskripsi_2'],
            'deskripsi_portofolio'=>$_POST['deskripsi_portofolio'],
            'status'=>$_POST['status'],
            'waktu_simpan_data'=> date('y-m-d')

                ];
        $Model = new TentangKami();
        $Model->save($data);
        set_notif('success','berhasil','berhasil ubah Tentang');
        return redirect('user/tentang-kami');


    }
    function SAsave(){
        helper(['alert_helper']);
        $data = [
            'id_tentang_kami' => $_POST['id'],
            'visi'  => $_POST['visi'],
            'misi' => $_POST['misi'],
            'motto' =>$_POST['motto'],
            'deskripsi_1'=>$_POST['deskripsi_1'],
            'deskripsi_2'=>$_POST['deskripsi_2'],
            'deskripsi_portofolio'=>$_POST['deskripsi_portofolio'],
            'status'=>$_POST['status'],
            'waktu_simpan_data'=> date('y-m-d')

                ];
        $Model = new TentangKami();
        $Model->save($data);
        set_notif('success','berhasil','berhasil ubah Tentang');
        return redirect('superadmin/tentang-kami');


    }

}
