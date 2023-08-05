<?php

namespace App\Controllers;
use App\Models\Portofolio;
use App\Models\Gambar;

class PortofolioController extends BaseController
{
    public function __construct()
    {
        helper(['alert_helper']);
    }
    public function index()
    {
        
        $Model = new Portofolio();
        $protofolio = $Model->findAll();
        return view('users/portofolio/index',['portofolio' => $protofolio]);
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
     $data = [
                            'id_pengguna' => session()->get('id_pengguna'),
                            'organisasi_kode' => session()->get('organisasi_kode'),
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
                        return redirect('user/portofolio');

     
        } 

      



    function tambah() {
        $randomCodeLength = 16;
        $randomCode = bin2hex(random_bytes($randomCodeLength));
        $session = session();
        $session->set('random_code', $randomCode);
        return view('users/portofolio/tambah');
    }

    public function hapus($id)
    {
        $Model = new Portofolio();
        $protofolio = $Model->where('id_portofolio',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus portofolio');
        return redirect('user/portofolio');
    }
    public function hapusgambar($id)
    {
        $Model = new Gambar();
        $protofolio = $Model->where('id_gambar',$id)->delete();
        // Tampilkan pesan sukses atau lakukan redirect ke halaman lain
        set_notif('success','berhasil','berhasil hapus portofolio');

    // Get the previous URL
    $previousURL = previous_url();

    // Redirect the user back to the previous page
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
        $data2 = $porto->where('id_pengguna',session()->get('id_pengguna'))->where('id_portofolio',$id)->first();
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
                        return redirect('user/portofolio');
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
