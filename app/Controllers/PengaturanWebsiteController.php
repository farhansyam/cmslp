<?php

namespace App\Controllers;
use App\Models\PengaturanWebsite;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

class PengaturanWebsiteController extends BaseController
{
    public function __construct()
    {

    }
    public function index()
    {
        
        $Model = new PengaturanWebsite();
        $role = $this->getRoleData();
        $dataToInsert = ['id_pengguna' => session()->get('id_pengguna'),'organisasi_kode' => session()->get('organisasi_kode')];
        $existingData = $Model->where($dataToInsert)->first();
        
        if($existingData){
            return view('users/pengaturanweb/index',['data' => $existingData,'role' => $role]);
        }
        else{
            $Model->insert($dataToInsert);
            $existingData = $Model->where($dataToInsert)->first();
            return view('users/pengaturanweb/index',['data' => $existingData,'role' => $role]);
        }
    }

    function save(){
        helper(['alert_helper']);
        
         $validation = \Config\Services::validation();

        // Set the validation rules for each field
        $validationRules = [
            'judulWebsite'      => 'min_length[5]|max_length[100]',
            'deskripsiSingkat'  => 'min_length[10]|max_length[200]',
            'deskripsiLengkap'  => 'min_length[10]',
            'alamatLengkap'     => 'min_length[10]|max_length[200]',
            'namaFacebook'      => 'min_length[5]|max_length[50]',
            'namaInstagram'     => 'min_length[5]|max_length[50]',
            'namaTwitter'       => 'min_length[5]|max_length[50]',
            'namaLingkedin'     => 'min_length[5]|max_length[50]',
            'embededGmap'       => 'min_length[10]|max_length[2000]',
        ];

        // Set the validation error messages
        $validationMessages = [
            'judulWebsite' => [
                'min_length'   => 'Judul website minimal 5 karakter.',
                'max_length'   => 'Judul website maksimal 100 karakter.'
            ],
            'deskripsiSingkat' => [
                'min_length'   => 'Deskiripsi Singkat minimal 10 karakter.',
                'max_length'   => 'Deskripsi singkat maksimal 200 karakter.'
            ],
            'deskripsiLengkap' => [
                'min_length'     => 'Deskiripsi Lengkap minimal 10 karakter.',
            ],
            'alamatLengkap' => [
                'min_length'     => 'Alamat minimal 10 karakter.',
                'max_length'     => 'Alamat minimal 200 karakter.'
            ],
            'namaFacebook' => [
                'min_length'     => 'namaFacebook minimal 5 karakter.',
                'max_length'     => 'namaFacebook minimal 50 karakter.'

            ],
            'namaInstagram' => [
                'min_length'     => 'namaInstagram minimal 10 karakter.',
                'max_length'     => 'namaInstagram minimal 50 karakter.'
            ],
            'namaTwitter' => [
                'min_length'     => 'namaTwitter minimal 10 karakter.',
                'max_length'     => 'namaTwitter minimal 50 karakter.'
            ],
            'namaLingkedin' => [
                'min_length'     => 'namaLingkedin minimal 10 karakter.',
                'max_length'     => 'namaLingkedin minimal 50 karakter.'
            ],
            'embededGmap' => [
                'min_length'     => 'embededGmap minimal 10 karakter.',
                'max_length'     => 'embededGmap minimal 200 karakter.'
            ]
        ];
        $data = [
            'id_pengaturan_website' => $_POST['id'],
            'judul_website'  => $_POST['judulWebsite'],
            'deskripsi_singkat' => $_POST['deskripsiSingkat'],
            'deskripsi_lengkap' =>$_POST['deskripsiLengkap'],
            'alamat_lengkap'=>$_POST['alamatLengkap'],
            'nama_facebook'=>$_POST['namaFacebook'],
            'url_facebook'=>$_POST['urlFacebook'],
            'nama_instagram'=>$_POST['namaInstagram'],
            'url_instagram'=>$_POST['urlInstagram'],
            'nama_twiter'=>$_POST['namaTwitter'],
            'url_twiter'=>$_POST['urlTwitter'],
            'nama_linkedin'=>$_POST['namaLingkedin'],
            'url_linkedin'=>$_POST['urlLingkedin'],
            'nama_youtube'=>$_POST['namaYoutube'],
            'url_youtube'=>$_POST['urlYoutube'],
            'embed_google_maps'=>$_POST['embededGmap'],
            'google_maps_url'=>$_POST['urlGmap'],
                ];
        $Model = new PengaturanWebsite();
        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembali ke halaman form dengan pesan error
            return view('users/pengaturanweb/index', [
                'validation' => $validation,
                'data' => $data,
                'role' => $this->getRoleData()
            ]);
        } else {
            $Model->save($data);
            set_notif('success','berhasil','berhasil ubah pengaturan web');
            return redirect('user/pengaturan');
        }
      


    }
    public function SAindex()
    {
        
        $Model = new PengaturanWebsite();
        $role = $this->getRoleData();
        $existingData = $Model->findALl();
        $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($existingData as &$data) {
            $user = $ModelUser->find($data['id_pengguna']); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data['organisasi_kode'])->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data['id_pengguna'] = $user;
            $data['organisasi_kode'] = $organisasi; }
        
        return view('superAdmin/pengaturanweb/index',['data' => $existingData,'role' => $role]);
    }


    function SAedit($id) {
        $Model = new PengaturanWebsite();
        $role = $this->getRoleData();
        $existingData = $Model->where('id_pengaturan_website',$id)->first();
        
            return view('superadmin/pengaturanweb/edit',['data' => $existingData,'role' => $role]);
    }


    function SAsave(){
        helper(['alert_helper']);
        
         $validation = \Config\Services::validation();

        // Set the validation rules for each field
        $validationRules = [
            'judulWebsite'      => 'min_length[5]|max_length[100]',
            'deskripsiSingkat'  => 'min_length[10]|max_length[200]',
            'deskripsiLengkap'  => 'min_length[10]',
            'alamatLengkap'     => 'min_length[10]|max_length[200]',
            'namaFacebook'      => 'min_length[5]|max_length[50]',
            'namaInstagram'     => 'min_length[5]|max_length[50]',
            'namaTwitter'       => 'min_length[5]|max_length[50]',
            'namaLingkedin'     => 'min_length[5]|max_length[50]',
            'embededGmap'       => 'min_length[10]|max_length[2000]',
        ];

        // Set the validation error messages
        $validationMessages = [
            'judulWebsite' => [
                'min_length'   => 'Judul website minimal 5 karakter.',
                'max_length'   => 'Judul website maksimal 100 karakter.'
            ],
            'deskripsiSingkat' => [
                'min_length'   => 'Deskiripsi Singkat minimal 10 karakter.',
                'max_length'   => 'Deskripsi singkat maksimal 200 karakter.'
            ],
            'deskripsiLengkap' => [
                'min_length'     => 'Deskiripsi Lengkap minimal 10 karakter.',
            ],
            'alamatLengkap' => [
                'min_length'     => 'Alamat minimal 10 karakter.',
                'max_length'     => 'Alamat minimal 200 karakter.'
            ],
            'namaFacebook' => [
                'min_length'     => 'namaFacebook minimal 5 karakter.',
                'max_length'     => 'namaFacebook minimal 50 karakter.'

            ],
            'namaInstagram' => [
                'min_length'     => 'namaInstagram minimal 10 karakter.',
                'max_length'     => 'namaInstagram minimal 50 karakter.'
            ],
            'namaTwitter' => [
                'min_length'     => 'namaTwitter minimal 10 karakter.',
                'max_length'     => 'namaTwitter minimal 50 karakter.'
            ],
            'namaLingkedin' => [
                'min_length'     => 'namaLingkedin minimal 10 karakter.',
                'max_length'     => 'namaLingkedin minimal 50 karakter.'
            ],
            'embededGmap' => [
                'min_length'     => 'embededGmap minimal 10 karakter.',
                'max_length'     => 'embededGmap minimal 200 karakter.'
            ]
        ];
        $data = [
            'id_pengaturan_website' => $_POST['id'],
            'judul_website'  => $_POST['judulWebsite'],
            'deskripsi_singkat' => $_POST['deskripsiSingkat'],
            'deskripsi_lengkap' =>$_POST['deskripsiLengkap'],
            'alamat_lengkap'=>$_POST['alamatLengkap'],
            'nama_facebook'=>$_POST['namaFacebook'],
            'url_facebook'=>$_POST['urlFacebook'],
            'nama_instagram'=>$_POST['namaInstagram'],
            'url_instagram'=>$_POST['urlInstagram'],
            'nama_twiter'=>$_POST['namaTwitter'],
            'url_twiter'=>$_POST['urlTwitter'],
            'nama_linkedin'=>$_POST['namaLingkedin'],
            'url_linkedin'=>$_POST['urlLingkedin'],
            'nama_youtube'=>$_POST['namaYoutube'],
            'url_youtube'=>$_POST['urlYoutube'],
            'embed_google_maps'=>$_POST['embededGmap'],
            'google_maps_url'=>$_POST['urlGmap'],
                ];
        $Model = new PengaturanWebsite();
        if (!$this->validate($validationRules, $validationMessages)) {
            // Jika validasi gagal, kembali ke halaman form dengan pesan error
            return view('users/pengaturanweb/index', [
                'validation' => $validation,
                'data' => $data,
                'role' => $this->getRoleData()
            ]);
        } else {
            $Model->save($data);
            set_notif('success','berhasil','berhasil ubah pengaturan web');
            return redirect('superadmin/pengaturan');
        }
      


    }

}
