<?php
namespace App\Models;

use CodeIgniter\Model;

class BlogArtikelModel extends Model
{
    protected $table = 'tb_blog_artikel';
    protected $primaryKey = 'id_blog_artikel';
    protected $allowedFields = [
        'id_pengguna', 'organisasi_kode', 'jenis_artikel', 'url_artikel',
        'judul_artikel', 'isi_artikel', 'id_kategori_artikel', 'tag_artikel',
        'status_artikel', 'foto_artikel', 'waktu_terakhir_update',
        'waktu_simpan_data', 'status'
    ];
}
