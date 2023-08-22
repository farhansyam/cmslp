<?php

namespace App\Controllers;
use App\Models\Testimoni;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

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
         if(session()->get('role_baku') == 1){ 
     $testimoni = $Model->get()->getResult();
    $ModelUser = new ModelPengguna();
            $ModelOrganisasi = new ModelOrganisasi();
            foreach ($testimoni as $data) {
                $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
                $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
                $data->id_pengguna = $user;
                $data->organisasi_kode = $organisasi;
        }

 }else{ 

     $testimoni = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
 } 
        return view('users/testimoni/index',['testimoni' => $testimoni,'role'=>$role]);
    }

    function simpan(){
                // Ambil data dari form
                $user = new ModelOrganisasi();
                
                if(session()->get('role_baku') == 1){ 
                    
                    $idp = $u['id_pengguna_owner'];
                    $ok = $this->request->getPost('organisasi_kode');

 }elseif(session()->get('role_baku') == 2){ 

                    $idp = $this->getuser();
                    $idp = $idp['id_pengguna'];
                    $ok = session()->get('organisasi_kode');


 }else{ 
                    $idp = session()->get('id_pengguna');
                    $ok = session()->get('organisasi_kode');


 } 
                $foto = $this->request->getFile('foto');
                $nama = $this->request->getPost('nama');
                $instansi = $this->request->getPost('instansi');
                $testimoni = $this->request->getPost('testimoni');
                $rating = $this->request->getPost('rating');
                $status = $this->request->getPost('status');
                $namegambar = $foto->getName();
                 $foto->move('uploads/testimoni', $namegambar);
                // Simpan data ke database menggunakan model
                $model = new ModelOrganisasi();
                $user = $model->where('organisasi_kode',$this->request->getPost('organisasi_kode'))->first();
                $testimoniClientModel = new Testimoni();
                $testimoniClientModel->save([
                    'nama' => $nama,
                    'instansi' => $instansi,
                    'testimoni' => $testimoni,
                    'rating' => $rating,
                    'foto' => $namegambar,
                    'status' => $status,
                    'organisasi_kode' => $ok,
                    'id_pengguna' => $idp,
                ]);
                  set_notif('success','berhasil','berhasil tambah testimoni');
                   if(session()->get('role_baku') == 1){ 

                  return redirect('superadmin/testimoni');

 }elseif(session()->get('role_baku') == 2){ 
                  return redirect('admins/testimoni');


 }else{ 
                  return redirect('user/testimoni');

 } 
      


        return redirect()->back();
    }

    function tambah() {
         $ModelOrganisasi = new ModelOrganisasi;
        $data1 = $ModelOrganisasi->findAll();
        return view('users/testimoni/tambah',['data1'=>$data1]);
    }

    public function hapus($id)
    {
        $Model = new Testimoni();
        $testimoni = $Model->where('id_testimoni',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus testimoni');
                   if(session()->get('role_baku') == 1){ 

                  return redirect('superadmin/testimoni');

 }elseif(session()->get('role_baku') == 2){ 
                  return redirect('admins/testimoni');


 }else{ 
                  return redirect('user/testimoni');

 } 
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
                
                 $logoClient->move('uploads/testimoni', $namegambar);
                
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
                   if(session()->get('role_baku') == 1){
                        return redirect('superadmin/testimoni');
                                }elseif(session()->get('role_baku') == 2){
                        return redirect('admins/testimoni');

                                }else{
                        return redirect('user/testimoni');

                                }


    }

}
