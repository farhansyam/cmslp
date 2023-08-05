<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tambah Banner Baru</h4>
 <?php if (isset($validation)): ?>
            <?= $validation ?>
        <?php endif; ?>
              <form action="<?= site_url('user/portofolio/update/'.$portofolio['id_portofolio'])?>" method="post" enctype="multipart/form-data">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <label for="basic-judul">Gambar Portofolio</label>
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
                              <td><img width="180" height="100" src="<?php echo base_url('uploads/banners/'.$d->gambar)?>" alt="" srcset=""></td>
                              <td>
                                <div class="dropdown">
                                    <a class="waves-effect" href="<?= site_url('user/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                          </tbody>
                        </table>
                      <div id="myDropzone" class="dropzone"></div>
                      
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "judul_portofolio"
                            id="basic-judul_portofolio"
                            placeholder="landingpage"
                            aria-label="judul_portofolio"
                            value="<?= $portofolio['judul_portofolio']?>"
                            aria-describedby="basic-judul_portofolio" />
                          <label for="basic-judul_portofolio">Judul Portofolio</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="kategori_portofolio"
                            type="text"
                            class="form-control"
                            id="basic-kategori_portofolio"
                            placeholder="landingpage"
                            value="<?= $portofolio['kategori_portofolio']?>"
                            aria-label="kategori_portofolio"
                            aria-describedby="basic-kategori_portofolio" />
                          <label for="basic-kategori_portofolio">kategori_portofolio</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="deskripsi"
                            type="text"
                            class="form-control"
                            id="basic-deskripsi"
                            placeholder="landingpage"
                            aria-label="deskripsi"
                            value="<?= $portofolio['deskripsi'] ?>"
                            aria-describedby="basic-deskripsi" />
                          <label for="basic-deskripsi">Deskripsi</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="spesifikasi_project"
                            type="text"
                            class="form-control"
                            id="basic-spesifikasi_project"
                            placeholder="landingpage"
                            value="<?= $portofolio['spesifikasi_project']?>"
                            aria-label="spesifikasi_project"
                            aria-describedby="basic-spesifikasi_project" />
                          <label for="basic-spesifikasi_project">Spesifikasi Project</label>
                      </div>
                  
                      <div class="form-floating form-floating-outline">
                          <input
                            name="client"
                            type="text"
                            class="form-control"
                            id="basic-client"
                            value="<?= $portofolio['client']?>"
                            placeholder="landingpage"
                            aria-label="client"
                            aria-describedby="basic-client" />
                          <label for="basic-client">Client</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="url_website"
                            type="text"
                            class="form-control"
                            id="basic-url_website"
                            value="<?= $portofolio['url_website']?>"
                            placeholder="landingpage"
                            aria-label="url_website"
                            aria-describedby="basic-url_website" />
                          <label for="basic-url_website">Url website</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="lokasi"
                            type="text"
                            class="form-control"
                            id="basic-lokasi"
                            value="<?= $portofolio['lokasi']?>"
                            placeholder="landingpage"
                            aria-label="lokasi"
                            aria-describedby="basic-lokasi" />
                          <label for="basic-lokasi">lokasi</label>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" <?php echo $portofolio['status'] == 1 ? 'checked':''?> class="switch-input" value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                          <button type="submit" class="btn btn-primary" id="">Simpan Data</button>
                      </form>
                         
                    </div>
                    
                  </div>
                </div>
               
            </div>
 <script>
        // Konfigurasi Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "<?= base_url('user/portofolio/update/'.$portofolio['id_portofolio']) ?>",
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