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
              <form action="<?= site_url('superadmin/banners/simpan')?>" method="post" enctype="multipart/form-data">
  
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <?php    if(session()->get('role_baku') == 1){ ?>
                              <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="organisasi_kode" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data1 as $d2) { ?>
                                <option value="<?= $d2['organisasi_kode']?>" data-select2-id="95"><?= $d2['nama_organisasi'] ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                        <?php } elseif(session()->get('role_baku') ==2 ) { ?>
                          <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="organisasi_kode" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data1 as $d2) { ?>
                                <option value="<?= $d2['organisasi_kode']?>" data-select2-id="95"><?= $d2['nama_organisasi'] ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                      <?php } ?>
                      <div class="form-floating form-floating-outline">

                          <input
                            type="text"
                            class="form-control"
                            name = "judul"
                            id="basic-judul"
                            placeholder="landingpage"
                            aria-label="judul"
                            value="<?= session()->getFlashdata('judul')?>"
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
                            value="<?= session()->getFlashdata('deskripsi')?>"
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
                            value="<?= session()->getFlashdata('link')?>"
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
                            value="<?= session()->getFlashdata('kategori')?>"
                            placeholder="landingpage"
                            aria-label="kategori"
                            aria-describedby="basic-kategori" />
                          <label for="basic-kategori">Kategori</label>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" <?php echo session()->getFlashdata('status') == 1 ? 'checked':''?> class="switch-input" value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                          <button type="submit" class="btn btn-primary" id="">Simpan Data</button>
                          <div id="myDropzone" class="dropzone"></div>
                      </form>
                         
                    </div>
                  </div>
                </div>
               
            </div>
 <script>
        // Konfigurasi Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#myDropzone", {
            url: "<?= base_url('superadmin/banners/simpan') ?>",
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