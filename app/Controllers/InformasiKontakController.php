<?php

namespace App\Controllers;
use App\Models\PengaturanWebsite;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;


class InformasiKontakController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new PengaturanWebsite();
        $dataToInsert = ['id_pengguna' => session()->get('id_pengguna'),'organisasi_kode' => session()->get('organisasi_kode')];
        $existingData = $Model->where($dataToInsert)->first();
        
        if($existingData){
            return view('users/infokontak/index',['existingData' => $existingData ,'role'=>$role]);
        }
        else{
            $Model->insert($dataToInsert);
            $existingData = $Model->where($dataToInsert)->first();
            return view('users/infokontak/index',['existingData' => $existingData,'role'=>$role]);
        }
    }
    public function SAindex()
    {
    
        $Model = new PengaturanWebsite();
        $role = $this->getRoleData();
        $existingData = $Model->findALl();
        $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($existingData as &$data) {
            $user = $ModelUser->find($data['id_pengguna']); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data['organisasi_kode'])->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data['id_pengguna'] = $user;
            $data['organisasi_kode'] = $organisasi; }
        
        return view('superAdmin/infokontak/index',['data' => $existingData,'role' => $role]);
    }
    function save(){
        helper(['alert_helper']);

        $data = [
            'id_pengaturan_website' => $_POST['id'],
            'email_admin'=>$_POST['emailAdmin'],
            'email_cs'=>$_POST['emailCs'],
            'email_support'=>$_POST['emailSupport'],
            'nomor_telepon'=>$_POST['noTelepon'],
            'nomor_handphone'=>$_POST['noTelepon'],
            'nama_cs_1'=>$_POST['namaCs1'],
            'nama_cs_2'=>$_POST['namaCS2'],
            'nomor_cs_1'=>$_POST['noHandphoneCs2'],
            'nomor_cs_2'=>$_POST['noHandphoneCs2'],
            'cs_1_sebagai'=>$_POST['cs1Sebagai'],
            'cs_2_sebagai'=>$_POST['cs2Sebagai'],
            'pesan_cs'=>$_POST['pesanCs']
                ];
        $Model = new PengaturanWebsite();
        $Model->save($data);
        set_notif('success','berhasil','berhasil ubah informasi kontak');
        return redirect('user/infokontak');


    }
    function SAsave(){
        helper(['alert_helper']);

        $data = [
            'id_pengaturan_website' => $_POST['id'],
            'email_admin'=>$_POST['emailAdmin'],
            'email_cs'=>$_POST['emailCs'],
            'email_support'=>$_POST['emailSupport'],
            'nomor_telepon'=>$_POST['noTelepon'],
            'nomor_handphone'=>$_POST['noTelepon'],
            'nama_cs_1'=>$_POST['namaCs1'],
            'nama_cs_2'=>$_POST['namaCS2'],
            'nomor_cs_1'=>$_POST['noHandphoneCs2'],
            'nomor_cs_2'=>$_POST['noHandphoneCs2'],
            'cs_1_sebagai'=>$_POST['cs1Sebagai'],
            'cs_2_sebagai'=>$_POST['cs2Sebagai'],
            'pesan_cs'=>$_POST['pesanCs']
                ];
        $Model = new PengaturanWebsite();
        $Model->save($data);
        set_notif('success','berhasil','berhasil ubah informasi kontak');
        if(session()->get('role_baku') == 1){ 
             return redirect('superadmin/infokontak');


 }elseif(session()->get('role_baku') == 2){ 
             return redirect('admins/infokontak');


 }


    }


    function SAedit($id) {
        $Model = new PengaturanWebsite();
        $role = $this->getRoleData();
        $existingData = $Model->where('id_pengaturan_website',$id)->first();
        
            return view('superadmin/infokontak/edit',['existingData' => $existingData,'role' => $role]);
    }

}
