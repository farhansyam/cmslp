<?php

namespace App\Controllers;
use App\Models\Faq;

class FaqController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        
        $Model = new Faq();
        $data = $Model->findAll();
        return view('users/faq/index',$data);
    }
    public function update()
    {
        
        $Model = new Faq();
        $dataToInsert = ['id_pengguna' => session()->get('id_pengguna'),'organisasi_kode' => session()->get('organisasi_kode')];
        $existingData = $Model->where($dataToInsert)->first();
        if($existingData){
            return view('users/faq/index',$existingData);
        }
        else{
            $Model->insert($dataToInsert);
            $existingData = $Model->where($dataToInsert)->first();
            return view('users/faq/index',$existingData);
        }
    }

    function simpan($id){
        helper(['alert_helper']);
        $data = [
            'id_tentang_kami' => $_POST['id'],
            'pertanyaan'  => $_POST['pertanyaan'],
            'jawaban' => $_POST['jawaban'],
            'waktu_simpan_data'=> date('y-m-d'),
            'status'=>$_POST['status']

                ];
        $Model = new Faq();
        $Model->save($data);
        set_notif('success','berhasil','berhasil ubah Tentang');
        return redirect('user/faq');


    }

}
