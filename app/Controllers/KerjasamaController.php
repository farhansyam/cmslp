<?php

namespace App\Controllers;
use App\Models\KerjasamaClient;

class KerjasamaController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
        $Model = new KerjasamaClient();
        $kerjasama = $Model->findAll();
        return view('users/kerjasama-client/index',['kerjasama' => $kerjasama]);
    }

    function simpan(){
         $rules = [
                'nama_client' => 'required',
                'logo_client' => 'uploaded[logo_client]|max_size[logo_client,1024]|mime_in[logo_client,image/png,image/jpg,image/jpeg]',
            ];

            if ($this->validate($rules)) {
                // Ambil data dari form
                $namaClient = $this->request->getPost('nama_client');
                $logoClient = $this->request->getFile('logo_client');
                $status = $this->request->getPost('status');
                
                $name = $logoClient->getName();
                 $logoClient->move('uploads/client', $name);

                // Simpan data ke database menggunakan model
                $kerjasamaClientModel = new KerjasamaClient();
                $kerjasamaClientModel->save([
                    'nama_client' => $namaClient,
                    'logo_client' => $name,
                    'status' => $status,
                ]);
                  set_notif('success','berhasil','berhasil tambah client work');
                  return redirect('user/kerjasama-client');
            } else {
                // Jika validasi gagal, kirim pesan error
            }
      


    }

    function tambah() {
        return view('users/kerjasama-client/tambah');
    }

    public function hapus($id)
    {
        $Model = new KerjasamaClient();
        $kerjasama = $Model->where('id_kerjasama_client',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus client work');
        return redirect('user/kerjasama-client');
    }

      public function edit($id)
    {
        $Model = new KerjasamaClient();
        $kerjasama = $Model->where('id_kerjasama_client',$id)->first();
        return view('users/kerjasama-client/edit',$kerjasama);
    }

    function update(){
        $logoClient = $this->request->getFile('logo_client');
        $id = $this->request->getPost('id');

        if($logoClient->isValid())
        {   

                $namaClient = $this->request->getPost('nama_client');
                $status = $this->request->getPost('status');
                
                $name = $logoClient->getName();
                 $logoClient->move('uploads/client', $name);
                
                // Simpan data ke database menggunakan model
                $kerjasamaClientModel = new KerjasamaClient();
                $kerjasamaClientModel->save([
                    'id_kerjasama_client' => $id,
                    'nama_client' => $namaClient,
                    'logo_client' => $name,
                    'status' => $status,
                ]);
                
            

        }
        else{
                $namaClient = $this->request->getPost('nama_client');
                $status = $this->request->getPost('status');

                // Simpan data ke database menggunakan model
                $kerjasamaClientModel = new KerjasamaClient();
                $kerjasamaClientModel->save([
                    'id_kerjasama_client' => $id,
                    'nama_client' => $namaClient,
                    'status' => $status,
                ]);
        }
    
        set_notif('success','berhasil','berhasil edit data client work');
        return redirect('user/kerjasama-client');


    }

}
