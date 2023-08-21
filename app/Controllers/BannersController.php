<?php

namespace App\Controllers;
use App\Models\banners;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;
use App\Models\Gambar;

class BannersController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new banners();
        if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2){
            $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        $banners = $Model->get()->getResult();
        foreach ($banners as &$data) {
            $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data->id_pengguna = $user;
            $data->organisasi_kode = $organisasi;
       
                }
        }else{

            $banners = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
        }
        return view('users/banners/index',['banners' => $banners,'role' => $role]);
    }

    function tambah() {

        $ModelOrganisasi = new ModelOrganisasi();
        $data1 = $ModelOrganisasi->findAll();
        $randomCodeLength = 16;
        $randomCode = bin2hex(random_bytes($randomCodeLength));
        session()->set('random_code', $randomCode);
        return view('users/banners/tambah',['data1'=>$data1]);
    }

    function simpan(){
      
    $ban  = new banners();
    $image = $this->request->getFile('file');
    
    $TenDigitRandomNumber = session()->get('random_code');
    
    if($image)
    {

        $name = $image->getName();
        $image->move('uploads/banners', $name);
		$imageUpload = new Gambar();
		$data = [
			"random_code" =>$TenDigitRandomNumber,
			"gambar" => $name,
            "nama_sumber" => 'banner',
		];
        
        $imageUpload->save($data);
        return json_encode(array(
            "status" => 1,
			"gambar" => $name
		));
                } 

             $ModelOrganisasi = new ModelOrganisasi();  
        if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2){
            $organisasi = $ModelOrganisasi->where('organisasi_kode' ,$_POST['organisasi_kode'])->first();
            $pengguna = $organisasi['id_pengguna_owner'];
            $organisasinya = $_POST['organisasi_kode'];
    }else{
        $pengguna = session()->get('id_pengguna');
        $organisasinya = session()->get('organisasi_kode');
    }
    
     $data = [
                            'id_pengguna' => $pengguna,
                            'organisasi_kode' => $organisasinya,
                            'judul'  => $_POST['judul'],
                            'deskripsi' => $_POST['deskripsi'],
                            'link' => $_POST['link'],
                            'kategori' => $_POST['kategori'],
                            'random_code' => $TenDigitRandomNumber,
                            'waktu_simpan_data'=> date('y-m-d'),
                            'status'=>$_POST['status']

                                ];
                        $Model = new banners();
                        $Model->save($data);
                        
                    set_notif('success','berhasil','berhasil tambah banners');
                                 if(session()->get('role_baku') == 1){
                        return redirect('superadmin/banners');
                                }elseif(session()->get('role_baku') == 2){
                        return redirect('admins/banners');

                                }else{
                        return redirect('user/banners');

                                }

     
        } 

      




    public function hapus($id)
    {
        $Model = new banners();
        $banners = $Model->where('id_banner',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus banner');
          if(session()->get('role_baku') == 1){
                        return redirect('superadmin/banners');
                                }elseif(session()->get('role_baku') == 2){
                        return redirect('admins/banners');

                                }else{
                        return redirect('user/banners');

                                }

    }
    public function hapusgambar($id)
    {
        $Model = new Gambar();
        $banners = $Model->where('id_gambar',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus banner');

    // Get the previous URL
    $previousURL = previous_url();

    // Redirect the user back to the previous page
    return redirect()->to($previousURL);
    }

      public function edit($id)
    {
        $Model = new banners();
         $gambar = new Gambar();
         $banners = $Model->where('id_banner',$id)->first();
         session()->set('random_code',$banners['random_code']);
       $dataGambar = $gambar->where('random_code',$banners['random_code'])->get()->getResult();
        return view('users/banners/edit',[
            'banners' => $banners,
            'dataGambar' => $dataGambar
        ]);
    }

    function update($id){
        $TenDigitRandomNumber = session()->get('random_code');
        $image = $this->request->getFile('file');
        if($image)
        {
            $name = $image->getName();
            $image->move('uploads/banners', $name);

		$imageUpload = new Gambar();
		$data = [
			"random_code" =>$TenDigitRandomNumber,
			"gambar" => $name,
            "nama_sumber" => 'banner',
		];
        
        $imageUpload->save($data);
        return json_encode(array(
            "status" => 1,
			"gambar" => $name
		));
    }
        $ban  = new banners();
        $data2 = $ban->where('id_banner',$_POST['id_banner'])->first();
        
     $data = [
                            'id_banner' => $_POST['id_banner'],
                            'judul'  => $_POST['judul'],
                            'deskripsi' => $_POST['deskripsi'],
                            'link' => $_POST['link'],
                            'kategori' => $_POST['kategori'],
                            'random_code' => $TenDigitRandomNumber,
                            'waktu_simpan_data'=> date('y-m-d'),
                            'status'=>$_POST['status']

                                ];
                        $Model = new banners();
                        $Model->save($data);
                        
                    set_notif('success','berhasil','berhasil edit banners');
                                if(session()->get('role_baku') == 1){
                        return redirect('superadmin/banners');
                                }elseif(session()->get('role_baku') == 2){
                        return redirect('admins/banners');

                                }else{
                        return redirect('user/banners');

                                }
                }
    public function detail($id)
    {
       $model = new banners();
       $data1 = $model->where('id_banner',$id)->first();
       $gambar = new Gambar();
       $dataGambar = $gambar->where('random_code',$data1['random_code'])->get()->getResult();

       return view('users/banners/detail',['data1' => $data1,'dataGambar' => $dataGambar]);
      
    }
    

}
