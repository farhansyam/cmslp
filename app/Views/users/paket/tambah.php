<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <?php if(session()->get('role_baku') == 1){?> 
              <form action="<?= site_url('superadmin/paket/simpan')?>" method="post">
              <?php }elseif(session()->get('role_baku') == 2) { ?>
              <form action="<?= site_url('admins/paket/simpan')?>" method="post">
              <?php } else {?>
              <form action="<?= site_url('user/paket/simpan')?>" method="post">
              <?php } ?>
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <?php    if(session()->get('role_baku') == 1){ ?>
                        <div class="form-floating form-floating-outline">
                          <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="organisasi_kode" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data1 as $d2) { ?>
                                <option value="<?= $d2['organisasi_kode']?>" data-select2-id="95"><?= $d2['nama_organisasi'] ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                        </div>
                      <?php } ?>
                      <?php    if(session()->get('role_baku') == 2){ ?>
                        <div class="form-floating form-floating-outline">
                          <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="organisasi_kode" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data1 as $d2) { ?>
                                <option value="<?= $d2['organisasi_kode']?>" data-select2-id="95"><?= $d2['nama_organisasi'] ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                        </div>
                      <?php } ?>
                          <div class="form-floating form-floating-outline" data-select2-id="45">

                          <input
                            type="text"
                            class="form-control"
                            name = "judul_paket"
                            id="basic-judul_paket"
                            placeholder="landingpage"
                            aria-label="judul_paket"
                            aria-describedby="basic-judul_paket" />
                          <label for="basic-judul_paket">Judul Paket</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="jenis_paket"
                            type="text"
                            class="form-control"
                            id="basic-jenis_paket"
                            placeholder="landingpage"
                            aria-label="jenis_paket"
                            aria-describedby="basic-jenis_paket" />
                          <label for="basic-jenis_paket">Jenis paket</label>
                      </div>
                        <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_paket"
                            placeholder="Lorem ipsum"></textarea>
                          <label>Deskripsi Paket</label>
                        </div>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            name="harga"
                            type="text"
                            class="form-control"
                            id="basic-harga"
                            placeholder="landingpage"
                            aria-label="harga"
                            aria-describedby="basic-harga" />
                          <label for="basic-harga">Harga paket</label>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            name="fasilitas"
                            type="text"
                            class="form-control"
                            id="basic-fasilitas"
                            placeholder="landingpage"
                            aria-label="fasilitas"
                            aria-describedby="basic-fasilitas" />
                          <label for="basic-fasilitas">Fasilitas paket</label>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            name="kalimat_pada_tombol"
                            type="text"
                            class="form-control"
                            id="basic-kalimat_pada_tombol"
                            placeholder="landingpage"
                            aria-label="kalimat_pada_tombol"
                            aria-describedby="basic-kalimat_pada_tombol" />
                          <label for="basic-kalimat_pada_tombol">Kalimat Pada Tombol</label>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" class="switch-input" value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                         
                         
                     
                    </div>
                  </div>
                </div>
               
            </div>
<?= $this->endSection() ?>