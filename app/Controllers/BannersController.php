<?php

namespace App\Controllers;
use App\Models\banners;
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
        $banners = $Model->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
        return view('users/banners/index',['banners' => $banners,'role' => $role]);
    }

    function tambah() {

        $randomCodeLength = 16;
        $randomCode = bin2hex(random_bytes($randomCodeLength));
        $session = session();
        $session->set('random_code', $randomCode);
        return view('users/banners/tambah');
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
     $data = [
                            'id_pengguna' => session()->get('id_pengguna'),
                            'organisasi_kode' => session()->get('organisasi_kode'),
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
                        return redirect('user/banners');

     
        } 

      




    public function hapus($id)
    {
        $Model = new banners();
        $banners = $Model->where('id_banner',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus banner');
        return redirect('user/banners');
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
       $dataGambar = $gambar->where('random_code',$banners['random_code'])->get()->getResult();
        return view('users/banners/edit',[
            'banners' => $banners,
            'dataGambar' => $dataGambar
        ]);
    }

    function update($id){
               $ban  = new banners();
        $data2 = $ban->where('id_pengguna',session()->get('id_pengguna'))->where('id_banner',$id)->first();
        $image = $this->request->getFile('file');
        $gambar1 = new Gambar();
        $gambar2 = $gambar1->where('random_code',$data2['random_code'])->first();
        $TenDigitRandomNumber = $data2['random_code'];
        
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
     $data = [
                            'id_banner' => $id,
                            'id_pengguna' => session()->get('id_pengguna'),
                            'organisasi_kode' => session()->get('organisasi_kode'),
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
                        return redirect('user/banners');
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
