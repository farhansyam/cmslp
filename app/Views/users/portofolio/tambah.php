<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tambah Porto Baru</h4>
 <?php if (isset($validation)): ?>
            <?= $validation ?>
        <?php endif; ?>
        <?php if(session()->get('role_baku') == 1){ ?>

  <form action="<?= site_url('superadmin/portofolio/simpan')?>" method="post" enctype="multipart/form-data">

<?php }elseif(session()->get('role_baku') == 2){ ?>

  <form action="<?= site_url('admins/portofolio/simpan')?>" method="post" enctype="multipart/form-data">

<?php }else{ ?>

  <form action="<?= site_url('user/portofolio/simpan')?>" method="post" enctype="multipart/form-data">
<?php } ?>
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
                      <label for="basic-judul">Gambar Portofolio</label>
                      <div id="myDropzone" class="dropzone"></div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "judul_portofolio"
                            id="basic-judul_portofolio"
                            placeholder="landingpage"
                            aria-label="judul_portofolio"
                            value="<?= session()->getFlashdata('judul_portofolio')?>"
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
                            value="<?= session()->getFlashdata('kategori_portofolio')?>"
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
                            value="<?= session()->getFlashdata('deskripsi')?>"
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
                            value="<?= session()->getFlashdata('spesifikasi_project')?>"
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
                            value="<?= session()->getFlashdata('client')?>"
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
                            value="<?= session()->getFlashdata('url_website')?>"
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
                            value="<?= session()->getFlashdata('lokasi')?>"
                            placeholder="landingpage"
                            aria-label="lokasi"
                            aria-describedby="basic-lokasi" />
                          <label for="basic-lokasi">lokasi</label>
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
                echo base_url('superadmin/portofolio/simpan'); 
            }elseif(session()->get('role_baku') == 2){
                echo base_url('admins/portofolio/simpan'); 
            }else{
                echo base_url('user/portofolio/simpan'); 
            
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