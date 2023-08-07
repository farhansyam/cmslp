<?php

namespace App\Controllers;
use App\Models\Testimoni;

class TestimoniController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new Testimoni();
        $testimoni = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
        return view('users/testimoni/index',['testimoni' => $testimoni,'role'=>$role]);
    }

    function simpan(){
                // Ambil data dari form
                $foto = $this->request->getFile('foto');
                $nama = $this->request->getPost('nama');
                $instansi = $this->request->getPost('instansi');
                $testimoni = $this->request->getPost('testimoni');
                $rating = $this->request->getPost('rating');
                $status = $this->request->getPost('status');
                $namegambar = $foto->getName();
                 $foto->move('uploads/testimoni', $namegambar);
                // Simpan data ke database menggunakan model
                $testimoniClientModel = new Testimoni();
                $testimoniClientModel->save([
                    'nama' => $nama,
                    'instansi' => $instansi,
                    'testimoni' => $testimoni,
                    'rating' => $rating,
                    'foto' => $namegambar,
                    'status' => $status,
                    'organisasi_kode' => session()->get('organisasi_kode'),
                ]);
                  set_notif('success','berhasil','berhasil tambah testimoni');
                  return redirect('user/testimoni');
      


    }

    function tambah() {
        return view('users/testimoni/tambah');
    }

    public function hapus($id)
    {
        $Model = new Testimoni();
        $testimoni = $Model->where('id_testimoni',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus testimoni');
        return redirect('user/testimoni');
    }

      public function edit($id)
    {
        $Model = new Testimoni();
        $testimoni = $Model->where('id_testimoni',$id)->first();
        return view('users/testimoni/edit',$testimoni);
    }

    function update(){
        $logoClient = $this->request->getFile('foto');
        $id = $this->request->getPost('id');
        
        if($logoClient->isValid())
        {   

                $foto = $this->request->getFile('foto');
                $nama = $this->request->getPost('nama');
                $instansi = $this->request->getPost('instansi');
                $testimoni = $this->request->getPost('testimoni');
                $rating = $this->request->getPost('rating');
                $status = $this->request->getPost('status');
                $namegambar = $foto->getName();
                
                 $logoClient->move('uploads/client', $namegambar);
                
                // Simpan data ke database menggunakan model
                $testimoniClientModel = new Testimoni();
                $testimoniClientModel->save([
                    'id_testimoni' => $id,
                      'nama' => $nama,
                    'instansi' => $instansi,
                    'testimoni' => $testimoni,
                    'rating' => $rating,
                    'foto' => $namegambar,
                    'status' => $status,
                ]);
                
            

        }
        else{
                $nama = $this->request->getPost('nama');
                $instansi = $this->request->getPost('instansi');
                $testimoni = $this->request->getPost('testimoni');
                $rating = $this->request->getPost('rating');
                $status = $this->request->getPost('status');
                
                
                // Simpan data ke database menggunakan model
                $testimoniClientModel = new Testimoni();
                $testimoniClientModel->save([
                    'id_testimoni' => $id,
                      'nama' => $nama,
                    'instansi' => $instansi,
                    'testimoni' => $testimoni,
                    'rating' => $rating,
                    'status' => $status,
                ]);
        }
    
        set_notif('success','berhasil','berhasil edit data testimoni');
        return redirect('user/testimoni');


    }

}
