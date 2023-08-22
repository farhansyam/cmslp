<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tambah Banner Baru</h4>
 <?php if (isset($validation)): ?>
            <?= $validation ?>
        <?php endif;  ?>
        <?php if(session()->get('role_baku') == 1) {?>
              <form action="<?= site_url('superadmin/banners/update/'.$banners['id_banner'])?>" method="post" enctype="multipart/form-data">

<?php }elseif(session()->get('role_baku') == 2){ ?>
              <form action="<?= site_url('admins/banners/update/'.$banners['id_banner'])?>" method="post" enctype="multipart/form-data">

<?php  }else{?>
              <form action="<?= site_url('user/banners/update/'.$banners['id_banner'])?>" method="post" enctype="multipart/form-data">
  
<?php  }?>
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "judul"
                            id="basic-judul"
                            placeholder="landingpage"
                            aria-label="judul"
                            value="<?= $banners['judul'] ?>"
                            aria-describedby="basic-judul" />
                          <label for="basic-judul">Judul</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="deskripsi"
                            type="text"
                            class="form-control"
                            id="basic-deskripsi"
                            placeholder="landingpage"
                            aria-label="deskripsi"
                            value="<?= $banners['deskripsi'] ?>"
                            aria-describedby="basic-deskripsi" />
                          <label for="basic-deskripsi">Deskripsi</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="link"
                            type="text"
                            class="form-control"
                            id="basic-link"
                            placeholder="landingpage"
                            value="<?= $banners['link'] ?>"
                            aria-label="link"
                            aria-describedby="basic-link" />
                          <label for="basic-link">Link</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="gambar"
                            type="file"
                            class="form-control"
                            id="basic-Gambar"
                            placeholder="landingpage"
                            aria-label="Gambar"
                            aria-describedby="basic-Gambar" />
                          <label for="basic-Gambar">Gambar Baru</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <select name="kategori" id="" class="form-control">
                            <?php foreach($kategori as $kat) {?>
                              <option value="<?= $kat->kategori ?>" <?= $kat->kategori==$banners['kategori'] ? 'selected':'' ?>><?= $kat->kategori ?></option>
                          <?php } ?>
                          </select>
                          <label for="basic-kategori">Kategori</label>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="hidden" name="id_banner"  value="<?=$banners['id_banner']?>">
                            <input type="checkbox" name="status" <?php echo $banners['status'] == 1 ? 'checked':''?> class="switch-input" value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                          <button type="submit" class="btn btn-primary" id="">Simpan Data</button>
                          <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>Gambar Lama</th>
                      </tr>
                    </thead>
                      <tbody class="table-border-bottom-0">
                        <td><img width="200" height="100" src="<?php echo base_url('uploads/banners/'.$banners['gambar'])?>" alt="" srcset=""></td>
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                      </form>
                         
                    </div>
                  </div>
                </div>
               
            </div>

<?= $this->endSection() ?>