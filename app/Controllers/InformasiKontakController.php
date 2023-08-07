<?php

namespace App\Controllers;
use App\Models\PengaturanWebsite;

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

}
