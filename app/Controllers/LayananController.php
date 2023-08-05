<?php

namespace App\Controllers;
use App\Models\Layanan;
use App\Models\Gambar;

class LayananController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
        $Model = new Layanan();
        $layanan = $Model->findAll();
        return view('users/layanan/index',['layanan' => $layanan]);
    }

    function simpan(){

        
        $ban  = new Layanan();
        $image = $this->request->getFile('file');
        
        $TenDigitRandomNumber = session()->get('random_code');
        
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
                            'id_pengguna' => session()->get('id_pengguna'),
                            'organisasi_kode' => session()->get('organisasi_kode'),
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
                        return redirect('user/layanan');

     
        } 

      



    function tambah() {
        $randomCodeLength = 16;
        $randomCode = bin2hex(random_bytes($randomCodeLength));
        $session = session();
        $session->set('random_code', $randomCode);
        return view('users/layanan/tambah');
    }

    public function hapus($id)
    {
        $Model = new Layanan();
        $layanan = $Model->where('id_layanan',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus layanan');
        return redirect('user/layanan');
    }
    public function hapusgambar($id)
    {
        $Model = new Gambar();
        $layanan = $Model->where('id_gambar',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus layanan');

    // Get the previous URL
    $previousURL = previous_url();

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
        $data2 = $ban->where('id_pengguna',session()->get('id_pengguna'))->where('id_layanan',$id)->first();
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
                            'id_pengguna' => session()->get('id_pengguna'),
                            'organisasi_kode' => session()->get('organisasi_kode'),
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
                        return redirect('user/layanan');
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
