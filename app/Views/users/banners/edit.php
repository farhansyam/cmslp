<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tambah Banner Baru</h4>
 <?php if (isset($validation)): ?>
            <?= $validation ?>
        <?php endif; ?>
              <form action="<?= site_url('user/banners/update/'.$banners['id_banner'])?>" method="post" enctype="multipart/form-data">
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
                            name="kategori"
                            type="text"
                            class="form-control"
                            id="basic-kategori"
                            value="<?= $banners['kategori'] ?>"
                            placeholder="landingpage"
                            aria-label="kategori"
                            aria-describedby="basic-kategori" />
                          <label for="basic-kategori">Kategori</label>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" <?php echo $banners['status'] == 1 ? 'checked':''?> class="switch-input" value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                          <button type="submit" class="btn btn-primary" id="">Simpan Data</button>
                          <div id="myDropzone" class="dropzone"></div>
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
                      </form>
                         
                    </div>
                  </div>
                </div>
               
            </div>
 <script>
        // Konfigurasi Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "<?= base_url('user/banners/update/'.$banners['id_banner']) ?>",
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