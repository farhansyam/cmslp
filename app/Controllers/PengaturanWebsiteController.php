<?php

namespace App\Controllers;
use App\Models\PengaturanWebsite;

class PengaturanWebsiteController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        
        $Model = new PengaturanWebsite();
        $dataToInsert = ['id_pengguna' => session()->get('id_pengguna'),'organisasi_kode' => session()->get('organisasi_kode')];
        $existingData = $Model->where($dataToInsert)->first();
        
        if($existingData){
            return view('users/pengaturanweb/index',$existingData);
        }
        else{
            $Model->insert($dataToInsert);
            $existingData = $Model->where($dataToInsert)->first();
            return view('users/pengaturanweb/index',$existingData);
        }
    }

    function save(){
        helper(['alert_helper']);

        $data = [
            'id_pengaturan_website' => $_POST['id'],
            'judul_website'  => $_POST['judulWebsite'],
            'deskripsi_singkat' => $_POST['deskripsiSingkat'],
            'deskripsi_lengkap' =>$_POST['deskripsiLengkap'],
            'email_admin'=>$_POST['emailAdmin'],
            'email_cs'=>$_POST['emailCs'],
            'email_support'=>$_POST['emailSupport'],
            'nomor_telepon'=>$_POST['noTelepon'],
            'nomor_handphone'=>$_POST['noTelepon'],
            'alamat_lengkap'=>$_POST['alamatLengkap'],
            'nama_facebook'=>$_POST['namaFacebook'],
            'url_facebook'=>$_POST['urlFacebook'],
            'nama_instagram'=>$_POST['namaInstagram'],
            'url_instagram'=>$_POST['urlInstagram'],
            'nama_twiter'=>$_POST['namaTwitter'],
            'url_twiter'=>$_POST['urlTwitter'],
            'nama_linkedin'=>$_POST['namaLingkedin'],
            'url_linkedin'=>$_POST['urlLingkedin'],
            'nama_youtube'=>$_POST['namaYoutube'],
            'url_youtube'=>$_POST['urlYoutube'],
            'embed_google_maps'=>$_POST['embededGmap'],
            'google_maps_url'=>$_POST['urlGmap'],
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
        set_notif('success','berhasil','berhasil ubah pengaturan web');
        return redirect('user/pengaturan');


    }

}
