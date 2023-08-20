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
        <?php endif; ?>
                <?php if(session()->get('role_baku') == 1) {?>
              <form action="<?= site_url('superadmin/layanan/update/'.$layanan['id_layanan'])?>" method="post" enctype="multipart/form-data">

<?php }elseif(session()->get('role_baku') == 2){ ?>
              <form action="<?= site_url('admin/layanan/update/'.$layanan['id_layanan'])?>" method="post" enctype="multipart/form-data">

<?php  }else{?>
              <form action="<?= site_url('user/layanan/update/'.$layanan['id_layanan'])?>" method="post" enctype="multipart/form-data">
  
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
                            name = "judul_layanan"
                            id="basic-judul_layanan"
                            placeholder="landingpage"
                            aria-label="judul_layanan"
                            value="<?= $layanan['judul_layanan']?>"
                            aria-describedby="basic-judul_layanan" />
                          <label for="basic-judul_layanan">Judul Layanan</label>
                      </div>
                      <label for="basic-deskripsi_1">Deskripsi 1</label>
                      <div class="form-floating form-floating-outline">
                          <textarea
                            name="deskripsi_1"
                            type="text"
                            class="form-control"
                            id="basic-deskripsi_1"
                            placeholder="landingpage"
                            aria-label="deskripsi_1"
                            aria-describedby="basic-deskripsi_1" /><?= $layanan['deskripsi_1'] ?></textarea>
                      </div>
                      <label for="basic-deskripsi_2">Deskripsi 2</label>
                      <div class="form-floating form-floating-outline">
                          <textarea
                            name="deskripsi_2"
                            type="text"
                            class="form-control"
                            id="basic-deskripsi_2"
                            placeholder="landingpage"
                            aria-label="deskripsi_2"
                            aria-describedby="basic-deskripsi_2" /><?= $layanan['deskripsi_2']?></textarea>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" <?php echo $layanan['status'] == 1 ? 'checked':''?> class="switch-input" value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                          <div id="myDropzone" class="dropzone"></div>
                          <button type="submit" class="btn btn-primary" id="">Simpan Data</button>
                          <table class="table">
                            <thead class="table-light">
                              <tr>
                               <th>No</th>
                               <th>Gambar</th>
                               <th>Opsi</th>
                             </tr>
                           </thead>
                           <tbody class="table-border-bottom-0">
                           <?php 
                           $no = 1;
                           foreach($dataGambar as $d) { ?>
                                  <tr>
                                    <td><?= $no++?></td>
                                    <td><img width="180" height="100" src="<?php echo base_url('uploads/layanan/'.$d->gambar)?>" alt="" srcset=""></td>
                               <td>
                                 <div class="dropdown">
                                  <?php  if(session()->get('role_baku') == 1){  ?>
        <a class="waves-effect" href="<?= site_url('superadmin/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>

 <?php }elseif(session()->get('role_baku') == 2){ ?>

        <a class="waves-effect" href="<?= site_url('admin/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>

 <?php }else{ ?>

        <a class="waves-effect" href="<?= site_url('user/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
<?php } ?>
                                 </div>
                               </td>
                             </tr>
                           <?php } ?>
                           </tbody>
                          </table>
                      </form>
                         
                    </div>
                  </div>
                </div>
               
            </div>
 <script>
        // Konfigurasi Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
             url: "<?php if(session()->get('role_baku') == 1 ){
                echo base_url('superadmin/layanan/update/'.$layanan['id_layanan']); 
            }elseif(session()->get('role_baku') == 2){
                echo base_url('admin/layanan/update/'.$layanan['id_layanan']); 
            }else{
                echo base_url('user/layanan/update/'.$layanan['id_layanan']); 
            }
            ?>",
            autoProcessQueue: false,
            parallelUploads: 1, // Jumlah file yang diunggah secara bersamaan (opsional)
            maxFiles: 5, // Jumlah file maksimum yang diizinkan (opsional)
            acceptedFiles: "image/*", // Jenis file yang diizinkan (opsional)
            addRemoveLinks: true // Menampilkan tombol hapus pada setiap gambar (opsional)
        });

        // Event saat tombol submit diklik
        document.querySelector("form").addEventListener("submit", function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (myDropzone.getQueuedFiles().length > 0) {
                myDropzone.processQueue(); // Proses unggahan jika ada file di antrian
            } else {
                this.submit(); // Klik submit form langsung jika tidak ada file di antrian
            }
        });

        // Event saat unggahan berhasil
        myDropzone.on("success", function (file, response) {
            // Tangkap response dari server jika diperlukan
        });

        // Event saat unggahan gagal
        myDropzone.on("error", function (file, errorMessage) {
            // Tangkap pesan kesalahan dari server jika diperlukan
        });
    </script>

<?= $this->endSection() ?>