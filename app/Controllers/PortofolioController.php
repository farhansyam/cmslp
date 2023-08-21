<?php

namespace App\Controllers;
use App\Models\Portofolio;
use App\Models\Gambar;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

class PortofolioController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
        $role = $this->getRoleData();
        $Model = new Portofolio();
        
        if(session()->get('role_baku') == 1){ 
            $protofolio = $Model->get()->getResult();
               $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($protofolio as &$data) {
            $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data->id_pengguna = $user;
            $data->organisasi_kode = $organisasi; }


        }elseif(session()->get('role_baku') == 2){ 
            $protofolio = $Model->get()->getResult();
               $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($protofolio as &$data) {
            $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data->id_pengguna = $user;
            $data->organisasi_kode = $organisasi; }
            
        }else{ 
            
            $protofolio = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
        } 
        return view('users/portofolio/index',['portofolio' => $protofolio,'role'=>$role]);
    }

    function simpan(){
 $image = $this->request->getFile('file');
        
        $TenDigitRandomNumber = session()->get('random_code');
        
        if($image)
        {

            $name = $image->getName();
            $image->move('uploads/portofolio', $name);

		$imageUpload = new Gambar();
		$data = [
			"random_code" =>$TenDigitRandomNumber,
			"gambar" => $name,
            "nama_sumber" => 'portofolio',
		];
        
        $imageUpload->save($data);
        return json_encode(array(
            "status" => 1,
			"gambar" => $name
		));
    }
        if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2){
              $modelPengguna = new ModelPengguna;
        $pengguna = $modelPengguna->where('organisasi_kode',$_POST['organisasi_kode'])->first();
        $pengguna = $pengguna['id_pengguna'];
        $organisasinya = $_POST['organisasi_kode'];
    }else{
        $pengguna = session()->get('id_pengguna');
        $organisasinya = session()->get('organisasi_kode');
    }
       
     $data = [
                            'id_pengguna' => $pengguna,
                            'organisasi_kode' => $organisasinya,
                            'judul_portofolio'  => $_POST['judul_portofolio'],
                            'kategori_portofolio' => $_POST['kategori_portofolio'],
                            'deskripsi' => $_POST['deskripsi'],
                            'spesifikasi_project' => $_POST['spesifikasi_project'],
                            'client' => $_POST['client'],
                            'url_website' => $_POST['url_website'],
                            'lokasi' => $_POST['lokasi'],
                            'random_code' => $TenDigitRandomNumber,
                            'waktu_simpan_data'=> date('y-m-d'),
                            'status'=>$_POST['status']

                                ];
                        $Model = new Portofolio();
                        $Model->save($data);
                        
                    set_notif('success','berhasil','berhasil tambah portofolio');
                     if(session()->get('role_baku') == 1){ 

                            return redirect('superadmin/portofolio');

                        }elseif(session()->get('role_baku') == 2){ 

                            return redirect('admins/portofolio');

                        }else{ 

                            return redirect('user/portofolio');
                        } 


     
        } 

      



    function tambah() {
        $randomCodeLength = 16;
        $randomCode = bin2hex(random_bytes($randomCodeLength));
        $session = session();
         $ModelOrganisasi = new ModelOrganisasi;
        $data1 = $ModelOrganisasi->findAll();

        $session->set('random_code', $randomCode);
        return view('users/portofolio/tambah',['data1'=>$data1]);
    }

    public function hapus($id)
    {
        $Model = new Portofolio();
        $protofolio = $Model->where('id_portofolio',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus portofolio');
        if(session()->get('role_baku') == 1){ 
             return redirect('superadmin/portofolio');

 }elseif(session()->get('role_baku') == 2){ 
        return redirect('admins/portofolio');

 }else{ 
        return redirect('user/portofolio');
 } 
    }
    public function hapusgambar($id)
    {
        $Model = new Gambar();
        $protofolio = $Model->where('id_gambar',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus gambar');

    // Get the previous URL
    $previousURL = previous_url();
    return redirect()->to($previousURL);
    }

      public function edit($id)
    {
        $Model = new Portofolio();
         $gambar = new Gambar();
         $protofolio = $Model->where('id_portofolio',$id)->first();
       $dataGambar = $gambar->where('random_code',$protofolio['random_code'])->get()->getResult();
        return view('users/portofolio/edit',[
            'portofolio' => $protofolio,
            'dataGambar' => $dataGambar
        ]);
    }

    function update($id){
        $porto  = new Portofolio();
        $data2 = $porto->where('id_portofolio',$id)->first();
        $image = $this->request->getFile('file');
        $gambar1 = new Gambar();
        $gambar2 = $gambar1->where('random_code',$data2['random_code'])->first();
        $TenDigitRandomNumber = $data2['random_code'];
        
        if($image)
        {

            $name = $image->getName();
            $image->move('uploads/portofolio', $name);

		$imageUpload = new Gambar();
		$data = [
			"random_code" =>$TenDigitRandomNumber,
			"gambar" => $name,
            "nama_sumber" => 'portofolio',
		];
        
        $imageUpload->save($data);
        return json_encode(array(
            "status" => 1,
			"gambar" => $name
		));
    }
     $data = [
                            'id_portofolio' => $id,
                            'judul_portofolio'  => $_POST['judul_portofolio'],
                            'kategori_portofolio' => $_POST['kategori_portofolio'],
                            'deskripsi' => $_POST['deskripsi'],
                            'spesifikasi_project' => $_POST['spesifikasi_project'],
                            'client' => $_POST['client'],
                            'url_website' => $_POST['url_website'],
                            'lokasi' => $_POST['lokasi'],
                            'random_code' => $TenDigitRandomNumber,
                            'waktu_simpan_data'=> date('y-m-d'),
                            'status'=>$_POST['status']

                                ];
                        $Model = new Portofolio();
                        $Model->save($data);
                        
                    set_notif('success','berhasil','berhasil edit portofolio');
                           if(session()->get('role_baku') == 1){ 

                            return redirect('superadmin/portofolio');

                        }elseif(session()->get('role_baku') == 2){ 

                            return redirect('admins/portofolio');

                        }else{ 

                            return redirect('user/portofolio');
                        } 
        }
    public function detail($id)
    {
       $model = new Portofolio();
       $data1 = $model->where('id_portofolio',$id)->first();
       $gambar = new Gambar();
       $dataGambar = $gambar->where('random_code',$data1['random_code'])->get()->getResult();

       return view('users/portofolio/detail',['data1' => $data1,'dataGambar' => $dataGambar]);
      
    }
   
    

}
