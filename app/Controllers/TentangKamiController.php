<?php

namespace App\Controllers;
use App\Models\TentangKami;

class TentangKamiController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        
        $Model = new TentangKami();
        $dataToInsert = ['id_pengguna' => session()->get('id_pengguna'),'organisasi_kode' => session()->get('organisasi_kode')];
        $existingData = $Model->where($dataToInsert)->first();
        if($existingData){
            return view('users/tentangkami/index',$existingData);
        }
        else{
            $Model->insert($dataToInsert);
            $existingData = $Model->where($dataToInsert)->first();
            return view('users/tentangkami/index',$existingData);
        }
    }

    function save(){
        helper(['alert_helper']);
        $data = [
            'id_tentang_kami' => $_POST['id'],
            'visi'  => $_POST['visi'],
            'misi' => $_POST['misi'],
            'motto' =>$_POST['motto'],
            'deksripsi_1'=>$_POST['deskripsi_1'],
            'deksripsi_2'=>$_POST['deskripsi_2'],
            'deksripsi_portofolio'=>$_POST['deskripsi_portofolio'],
            'status'=>$_POST['status'],
            'waktu_simpan_data'=> date('y-m-d')

                ];
        $Model = new TentangKami();
        $Model->save($data);
        set_notif('success','berhasil','berhasil ubah Tentang');
        return redirect('user/tentang-kami');


    }

}
