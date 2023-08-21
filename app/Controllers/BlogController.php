<?php
namespace App\Controllers;

use App\Models\BlogArtikelModel;
use App\Models\Kategori;
use CodeIgniter\Controller;
use App\Models\ModelPengguna;
use App\Models\ModelOrganisasi;

class BlogController extends BaseController
{
    function __construct()
    {
        helper(['alert_helper']);

    }
    function tambah() {
        $kategorimodel = new Kategori();
        $kategori = $kategorimodel->where('status',1)->get()->getResult();
        
        return view('users/blog/tambah',['kategori'=>$kategori]);
    }
       public function index()
    {
        $role = $this->getRoleData();
        $blogModel = new BlogArtikelModel();
        $kategorimodel = new Kategori();
        $blogs =  $blogModel->where('organisasi_kode',session()->get('organisasi_kode'))->get()->getResult();
        
        return view('users/blog/index',['blogs' => $blogs,'role'=>$role]);
    }

    public function simpan()
    {
        $model = new BlogArtikelModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'judul_artikel' => 'required|min_length[5]',
            'isi_artikel' => 'required'
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ])) {

            
            $foto = $this->request->getFile('foto_artikel');
                    $name = $foto->getName();
                 $foto->move('uploads/blog', $name);

             $slug = $this->request->getPost('judul_artikel');
              $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);
            $model->save([
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'id_pengguna' => session()->get('id_pengguna'), // contoh mengambil id_pengguna dari sesi
                'organisasi_kode' => session()->get('organisasi_kode'),
                'jenis_artikel' => $this->request->getPost('jenis_artikel'),
                'url_artikel' => $slug,
                'id_kategori_artikel' => $this->request->getPost('id_kategori'),
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'status_artikel' => 'published',
                'foto_artikel' => $name,
                'waktu_terakhir_update' => date('Y-m-d H:i:s'),
                'waktu_simpan_data' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status'),
            ]);
                

            // Redirect atau berikan respons sukses
        }

        // Tampilkan formulir input
        if(session()->get('role_baku') == 1){ 
     return redirect('superadmin/blog');
            
            
        }elseif(session()->get('role_baku') == 2){ 
            
     return redirect('admins/blog');
            
        }else{ 
     return redirect('user/blog');

 } 
    }

     public function edit($id)
    {
        
        $kategorimodel = new Kategori();
        $kategori = $kategorimodel->where('status',1)->get()->getResult();
        $Model = new BlogArtikelModel();
        $blog = $Model->where('id_blog_artikel',$id)->first();
        return view('users/blog/edit',['blog'=>$blog,'kategori'=>$kategori]);
    }

    public function hapus($id)
    {
        $model = new BlogArtikelModel();
        $model->delete($id);
        return redirect()->back();
        // Redirect atau berikan respons sukses
    }


    function update(){
        $model = new BlogArtikelModel();
         $logoClient = $this->request->getFile('foto_artikel');
        $id = $this->request->getPost('id');

        if($logoClient->isValid())
        {   

                              $foto = $this->request->getFile('foto_artikel');
                              $maxWidth = 350;
                    $name = $foto->getName();
                $name = $foto->getName();
                 $foto->move('uploads/blog', $name);

             $slug = $this->request->getPost('judul_artikel');
              $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);
            $model->save([
                'id_blog_artikel' => $id,
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'id_pengguna' => session()->get('id_pengguna'), // contoh mengambil id_pengguna dari sesi
                'organisasi_kode' => session()->get('organisasi_kode'),
                'jenis_artikel' => $this->request->getPost('jenis_artikel'),
                'url_artikel' => $slug,
                'id_kategori_artikel' => $this->request->getPost('id_kategori'),
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'status_artikel' => 'published',
                'foto_artikel' => $name,
                'waktu_terakhir_update' => date('Y-m-d H:i:s'),
                'waktu_simpan_data' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status'),
            ]);
                
            

        return redirect()->back();
        }
        else{
              $slug = $this->request->getPost('judul_artikel');
              $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);
            $model->save([
                'id_blog_artikel' => $id,
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'id_pengguna' => session()->get('id_pengguna'), // contoh mengambil id_pengguna dari sesi
                'organisasi_kode' => session()->get('organisasi_kode'),
                'jenis_artikel' => $this->request->getPost('jenis_artikel'),
                'url_artikel' => $slug,
                'id_kategori_artikel' => 1,
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'status_artikel' => 'published',
                'waktu_terakhir_update' => date('Y-m-d H:i:s'),
                'waktu_simpan_data' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status'),
            ]);
        }
    
        set_notif('success','berhasil','berhasil edit data blog');
        return redirect('user/blog');

        
    }
    function SAtambah() {

        $ModelOrganisasi = new ModelOrganisasi;
        $data1 = $ModelOrganisasi->findAll();
        $kategorimodel = new Kategori();
        $kategori = $kategorimodel->where('status',1)->get()->getResult();
        
        return view('superadmin/blog/tambah',['kategori'=>$kategori,'data1'=> $data1]);
    }
       public function SAindex()
    {
        $role = $this->getRoleData();
        $blogModel = new BlogArtikelModel();
        $kategorimodel = new Kategori();
        $blogs =  $blogModel->get()->getResult();
        $ModelUser = new ModelPengguna();
        $ModelOrganisasi = new ModelOrganisasi();
        foreach ($blogs as $data) {
            $user = $ModelUser->find($data->id_pengguna); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $organisasi = $ModelOrganisasi->where('organisasi_kode',$data->organisasi_kode)->first(); // Ganti 'role_id' dengan kolom yang menunjukkan ID role pada tabel data
            $data->id_pengguna = $user;
            $data->organisasi_kode = $organisasi;
        }
        return view('superadmin/blog/index',['blogs' => $blogs,'role'=>$role]);
    }

    public function SAsimpan()
    {
        $model = new BlogArtikelModel();
        if ($this->request->getMethod() === 'post' && $this->validate([
            'judul_artikel' => 'required|min_length[5]',
            'isi_artikel' => 'required'
            // Tambahkan aturan validasi lainnya sesuai kebutuhan
        ])) {

            
            $foto = $this->request->getFile('foto_artikel');
                    $name = $foto->getName();
                 $foto->move('uploads/blog', $name);
  $modelPengguna = new ModelPengguna;
        $pengguna = $modelPengguna->where('organisasi_kode',$_POST['organisasi_kode'])->first();
                 $slug = $this->request->getPost('judul_artikel');
              $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);
            $model->save([
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'id_pengguna' => $pengguna['id_pengguna'], // contoh mengambil id_pengguna dari sesi
                'organisasi_kode' => $this->request->getPost('organisasi_kode'),
                'jenis_artikel' => $this->request->getPost('jenis_artikel'),
                'url_artikel' => $slug,
                'id_kategori_artikel' => $this->request->getPost('id_kategori'),
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'status_artikel' => 'published',
                'foto_artikel' => $name,
                'waktu_terakhir_update' => date('Y-m-d H:i:s'),
                'waktu_simpan_data' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status'),
            ]);
                

            // Redirect atau berikan respons sukses
        }

        // Tampilkan formulir input
            if(session()->get('role_baku') == 1){ 
     return redirect('superadmin/blog');
            
            
        }elseif(session()->get('role_baku') == 2){ 
            
     return redirect('admins/blog');
            
        }else{ 
     return redirect('user/blog');

 } 
    }

     public function SAedit($id)
    {
        
        $kategorimodel = new Kategori();
        $kategori = $kategorimodel->where('status',1)->get()->getResult();
        $Model = new BlogArtikelModel();
        $blog = $Model->where('id_blog_artikel',$id)->first();
        return view('superadmin/blog/edit',['blog'=>$blog,'kategori'=>$kategori,'id_blog_artikel' => $id]);
    }

    public function SAhapus($id)
    {
        $model = new BlogArtikelModel();
        $model->delete($id);
        return redirect()->back();
        // Redirect atau berikan respons sukses
    }


    function SAupdate(){
        $model = new BlogArtikelModel();
         $logoClient = $this->request->getFile('foto_artikel');
        $id = $this->request->getPost('id');

        if($logoClient->isValid())
        {   

                              $foto = $this->request->getFile('foto_artikel');
                    $name = $foto->getName();
                $name = $foto->getName();
                 $foto->move('uploads/blog', $name);

             $slug = $this->request->getPost('judul_artikel');
              $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);
            $model->save([
                'id_blog_artikel' => $id,
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'jenis_artikel' => $this->request->getPost('jenis_artikel'),
                'url_artikel' => $slug,
                'id_kategori_artikel' => $this->request->getPost('id_kategori'),
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'status_artikel' => 'published',
                'foto_artikel' => $name,
                'waktu_terakhir_update' => date('Y-m-d H:i:s'),
                'waktu_simpan_data' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status'),
            ]);
                
            

          if(session()->get('role_baku') == 1){ 
     return redirect('superadmin/blog');
            
            
        }elseif(session()->get('role_baku') == 2){ 
            
     return redirect('admins/blog');
            
        }else{ 
     return redirect('user/blog');

 } 
        }
        else{
              $slug = $this->request->getPost('judul_artikel');
              $slug = str_replace(' ', '-', $slug);
        $slug = strtolower($slug);
            $model->save([
                'id_blog_artikel' => $id,
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'isi_artikel' => $this->request->getPost('isi_artikel'),
                'jenis_artikel' => $this->request->getPost('jenis_artikel'),
                'url_artikel' => $slug,
                'id_kategori_artikel' => 1,
                'tag_artikel' => $this->request->getPost('tag_artikel'),
                'status_artikel' => 'published',
                'waktu_terakhir_update' => date('Y-m-d H:i:s'),
                'waktu_simpan_data' => date('Y-m-d H:i:s'),
                'status' => $this->request->getPost('status'),
            ]);
        }
    
        set_notif('success','berhasil','berhasil edit data blog');
              if(session()->get('role_baku') == 1){ 
     return redirect('superadmin/blog');
            
            
        }elseif(session()->get('role_baku') == 2){ 
            
     return redirect('admins/blog');
            
        }else{ 
     return redirect('user/blog');

 } 

        
    }
}
