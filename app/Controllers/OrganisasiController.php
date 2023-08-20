<?php

namespace App\Controllers;
use App\Models\ModelOrganisasi;
use App\Models\ModelPengguna;

class OrganisasiController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }



    public function index()
    {
        
        $Model = new ModelOrganisasi;
        $organisasi = $Model->findAll();
        return view('admin/organisasi/index',['organisasi' => $organisasi]);
    }

    function simpan(){
                // Ambil data dari form
                $nama_organisasi = $this->request->getPost('nama_organisasi');
                $alamat_organisasi = $this->request->getPost('alamat_organisasi');
                $no_telepon = $this->request->getPost('no_telepon');
                $no_handphone = $this->request->getPost('no_handphone');
                $logo = $this->request->getFile('logo');
                $status = $this->request->getPost('status');
                $name = $logo->getName();
                 $logo->move('uploads/organisasi', $name);

                // Simpan data ke database menggunakan model
                $organisasiClientModel = new ModelOrganisasi;
                $organisasiClientModel->save([
                    'organisasi_kode' => mt_rand(111111,999999),
                    'id_pengguna_owner' => $this->request->getPost('id_owner'),
                    'nama_organisasi' => $nama_organisasi,
                    'alamat_organisasi' => $alamat_organisasi,
                    'no_telepon' => $no_telepon,
                    'no_handphone' => $no_handphone,
                    'logo' => $name,
                    'status' => $status,
                ]);
                  set_notif('success','berhasil','berhasil tambah organisasi');
                  return redirect('admins/organisasi');
      


    }

    function tambah() {
        $model = new ModelPengguna();
        $data = $model->findAll();
        return view('admin/organisasi/tambah',['data'=>$data]);
    }

    public function hapus($id)
    {
        $Model = new ModelOrganisasi;
        $organisasi = $Model->where('id',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus organisasi');
        return redirect('admins/organisasi');
    }

      public function edit($id)
    { $model2 = new ModelPengguna();
        $data = $model2->findAll();
        $Model = new ModelOrganisasi;
        $organisasi = $Model->where('id',$id)->first();
        return view('admin/organisasi/edit',['organisasi' => $organisasi,'data' => $data]);
    }

    function update(){
         $Model = new ModelOrganisasi;

        $logoClient = $this->request->getFile('logo');
        $id = $this->request->getPost('id');

        if($logoClient->isValid())
        {   

                 $nama_organisasi = $this->request->getPost('nama_organisasi');
                $alamat_organisasi = $this->request->getPost('alamat_organisasi');
                $no_telepon = $this->request->getPost('no_telepon');
                $no_handphone = $this->request->getPost('no_handphone');
                $logo = $this->request->getFile('logo');
                $status = $this->request->getPost('status');
                $name = $logo->getName();
                 $logo->move('uploads/organisasi', $name);
                // Simpan data ke database menggunakan model
                $Model->save([
                    'id' => $id,
                    'id_pengguna_owner' => $this->request->getPost('id_owner'),
                    'organisasi_kode' => mt_rand(111111,999999),
                    'nama_organisasi' => $nama_organisasi,
                    'alamat_organisasi' => $alamat_organisasi,
                    'no_telepon' => $no_telepon,
                    'no_handphone' => $no_handphone,
                    'logo' => $name,
                    'status' => $status,
                ]);
                
            

        }
        else{
                 $nama_organisasi = $this->request->getPost('nama_organisasi');
                $alamat_organisasi = $this->request->getPost('alamat_organisasi');
                $no_telepon = $this->request->getPost('no_telepon');
                $no_handphone = $this->request->getPost('no_handphone');
                $status = $this->request->getPost('status');

                // Simpan data ke database menggunakan model
               $Model->save([
                    'id' => $id,
                    'nama_organisasi' => $nama_organisasi,
                    'alamat_organisasi' => $alamat_organisasi,
                    'no_telepon' => $no_telepon,
                    'no_handphone' => $no_handphone,
                    'status' => $status,
                ]);
        }
    
        set_notif('success','berhasil','berhasil edit data organisasi');
        return redirect('admins/organisasi');


    }

}
