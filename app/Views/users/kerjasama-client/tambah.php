<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>
<?php if(session()->get('role_baku') == 1){ ?>

  <form action="<?= site_url('superadmin/kerjasama-client/simpan')?>" enctype="multipart/form-data" method="post">

<?php }elseif(session()->get('role_baku') == 2){ ?>

  <form action="<?= site_url('admins/kerjasama-client/simpan')?>" enctype="multipart/form-data" method="post">

<?php }else{ ?>

  <form action="<?= site_url('user/kerjasama-client/simpan')?>" enctype="multipart/form-data" method="post">
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
                      <div class="form-floating form-floating-outline">
                          <input
                          requited
                            type="text"
                            class="form-control"
                            name = "nama_client"
                            id="basic-nama_client"
                            placeholder="landingpage"
                            aria-label="nama_client"
                            aria-describedby="basic-nama_client" />
                          <label for="basic-nama_client">Nama Client</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="logo_client"
                            type="file"
                            class="form-control"
                            id="basic-logo_client"
                            placeholder="landingpage"
                            aria-label="logo_client"
                            aria-describedby="basic-logo_client" />
                          <label for="basic-logo_client">Logo</label>
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