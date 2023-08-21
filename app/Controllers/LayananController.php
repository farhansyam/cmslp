<?php

namespace App\Controllers;
use App\Models\Layanan;
use App\Models\Gambar;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

class LayananController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        $role = $this->getRoleData();
        $Model = new Layanan();
        if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2){
            $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        $layanan = $Model->get()->getResult();
        foreach ($layanan as &$data) {
            $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data->id_pengguna = $user;
            $data->organisasi_kode = $organisasi;
            
        }
    }else{
        
        $layanan = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
    }
    return view('users/layanan/index',['layanan' => $layanan,'role'=>$role]);
}

function simpan(){
        $image = $this->request->getFile('file');
        if($image)
                {

                    $name = $image->getName();
                    $image->move('uploads/layanan', $name);

                $imageUpload = new Gambar();
                $data = [
                    "random_code" =>session()->get('random_code'),
                    "gambar" => $name,
                    "nama_sumber" => 'layanan',
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
        
        $ban  = new Layanan();
        
        $TenDigitRandomNumber = session()->get('random_code');
        
        
     $data = [
                            'id_pengguna' => $pengguna,
                            'organisasi_kode' => $organisasinya,
                            'judul_layanan'  => $_POST['judul_layanan'],
                            'deskripsi_1' => $_POST['deskripsi_1'],
                            'deskripsi_2' => $_POST['deskripsi_2'],
                            'random_code' => session()->get('random_code'),
                            'waktu_simpan_data'=> date('y-m-d'),
                            'status'=>$_POST['status']

                                ];
                        $Model = new Layanan();
                        $Model->save($data);
                        
                    set_notif('success','berhasil','berhasil tambah layanan');
                                    if(session()->get('role_baku') == 1){
                        return redirect('superadmin/layanan');
                                }elseif(session()->get('role_baku') == 2){
                        return redirect('admins/layanan');

                                }else{
                        return redirect('user/layanan');

                                }

     
        } 

      



    function tambah() {
        $ModelOrganisasi = new ModelOrganisasi;
        $randomCodeLength = 16;
        $randomCode = bin2hex(random_bytes($randomCodeLength));
        session()->set('random_code', $randomCode);
        $data1 = $ModelOrganisasi->findAll();
        return view('users/layanan/tambah',['data1'=>$data1]);
    }

    public function hapus($id)
    {
        $Model = new Layanan();
        $layanan = $Model->where('id_layanan',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus layanan');
         if(session()->get('role_baku') == 1){ 
        return redirect('superadmin/layanan');


 }elseif(session()->get('role_baku') == 2){ 

        return redirect('admins/layanan');

 }else{ 
        return redirect('user/layanan');

 } 
    }
    public function hapusgambar($id)
    {
        $Model = new Gambar();
        $layanan = $Model->where('id_gambar',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus layanan');

    // Get the previous URL
   if(session()->get('role_baku') == 1){ 
        return redirect('superadmin/layanan');


 }elseif(session()->get('role_baku') == 2){ 

        return redirect('admin/layanan');

 }else{ 
        return redirect('user/layanan');

 } 

    // Redirect the user back to the previous page
    return redirect()->to($previousURL);
    }

      public function edit($id)
    {
        $Model = new Layanan();
         $gambar = new Gambar();
         $layanan = $Model->where('id_layanan',$id)->first();
       $dataGambar = $gambar->where('random_code',$layanan['random_code'])->get()->getResult();
        return view('users/layanan/edit',[
            'layanan' => $layanan,
            'dataGambar' => $dataGambar
        ]);
    }

    function update($id){
        $ban  = new Layanan();
        $data2 = $ban->where('id_layanan',$id)->first();
        $image = $this->request->getFile('file');
        $gambar1 = new Gambar();
        $gambar2 = $gambar1->where('random_code',$data2['random_code'])->first();
        $TenDigitRandomNumber = $data2['random_code'];
        if($image)
        {

            $name = $image->getName();
            $image->move('uploads/layanan', $name);

		$imageUpload = new Gambar();
		$data = [
			"random_code" =>$TenDigitRandomNumber,
			"gambar" => $name,
            "nama_sumber" => 'layanan',
		];
        
        $imageUpload->save($data);
        return json_encode(array(
            "status" => 1,
			"gambar" => $name
		));
    }
     $data = [
                            'id_layanan' => $id,
                            'judul_layanan'  => $_POST['judul_layanan'],
                            'deskripsi_1' => $_POST['deskripsi_1'],
                            'deskripsi_2' => $_POST['deskripsi_2'],
                            'random_code' => $TenDigitRandomNumber,
                            'waktu_simpan_data'=> date('y-m-d'),
                            'status'=>$_POST['status']

                                ];
                        $Model = new Layanan();
                        $Model->save($data);
                        
                    set_notif('success','berhasil','berhasil edit layanan');
                              if(session()->get('role_baku') == 1){
                        return redirect('superadmin/layanan');
                                }elseif(session()->get('role_baku') == 2){
                        return redirect('admins/layanan');

                                }else{
                        return redirect('user/layanan');

                                }
        }
    public function detail($id)
    {
       $model = new Layanan();
       $data1 = $model->where('id_layanan',$id)->first();
       $gambar = new Gambar();
       $dataGambar = $gambar->where('random_code',$data1['random_code'])->get()->getResult();

       return view('users/layanan/detail',['data1' => $data1,'dataGambar' => $dataGambar]);
      
    }
    

}
