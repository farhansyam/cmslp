<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tambah Pengguna</h4>
 <?php if (isset($validation)): ?>
  <?= $validation->listErrors() ?>
        <?php endif; ?>
              <form action="<?= site_url('admins/pengguna/update')?>" method="post">
              <input type="hidden" name="id" value="<?= $pengguna['id_pengguna']?>">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-6">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "username"
                            id="basic-username"
                            value="<?= $pengguna['username'] ?>"
                            aria-label="username"
                            aria-describedby="basic-username" />
                          <label for="basic-username">Username</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="password"
                            type="passsword"
                            class="form-control"
                            id="basic-passsword"
                            placeholder="landingpage"
                            aria-label="passsword"
                            aria-describedby="basic-passsword" />
                          <label for="basic-passsword">password</label>
                      </div>
                        <div class="form-floating form-floating-outline">
                          <input
                            name="nama_depan"
                            type="text"
                            class="form-control"
                            id="basic-nama_depan"
                            placeholder="landingpage"
                            value="<?= $pengguna['nama_depan'] ?>"
                            aria-label="nama_depan"
                            aria-describedby="basic-nama_depan" />
                          <label for="basic-nama_depan">nama depan</label>
                      </div>
                        <div class="form-floating form-floating-outline">
                          <input
                            name="nama_belakang"
                            type="text"
                            class="form-control"
                            id="basic-nama_belakang" value="<?= $pengguna['nama_belakang'] ?>"
                            placeholder="landingpage"
                            aria-label="nama_belakang"
                            aria-describedby="basic-nama_belakang" />
                          <label for="basic-nama_belakang">nama belakang</label>
                      </div>
                 
                      <label for="basic-embededGmap">Jenis Kelamin</label>
                      <div class="form-floating form-floating-outline">
                          <select name="jenis_kelamin" id="">
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                          </select>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "tempat_lahir"
                            value="<?= $pengguna['tempat_lahir'] ?>"
                            id="basic-tempat_lahir" 
                            placeholder="landingpage"
                            
                            aria-label="tempat_lahir"
                            aria-describedby="basic-tempat_lahir" />
                          <label for="basic-tempat_lahir">tempat lahir</label>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            type="date"
                            class="form-control"
                            name = "tanggal_lahir"
                            id="basic-tanggal_lahir"
                            placeholder=""
                            value="<?= $pengguna['tanggal_lahir'] ?>"
                            aria-label="tanggal_lahir"
                            aria-describedby="basic-tanggal_lahir" />
                          <label for="basic-tanggal_lahir">tangal lahir</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "nomor_telepon"
                            id="basic-nomor_telepon"
                            placeholder="" value="<?= $pengguna['nomor_telepon'] ?>"
                            aria-label="nomor_telepon"
                            aria-describedby="basic-nomor_telepon" />
                          <label for="basic-nomor_telepon">no telepon</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="email"
                            class="form-control"
                            name = "email"
                            id="basic-email"
                            placeholder=""
                            value="<?= $pengguna['email'] ?>"
                            aria-label="email"
                            aria-describedby="basic-email" />
                          <label for="basic-email">email</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "alamat"
                            id="basic-alamat"
                            placeholder=""
                            value="<?= $pengguna['alamat'] ?>"
                            aria-label="alamat"
                            aria-describedby="basic-alamat" />
                          <label for="basic-alamat">alamat</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">2</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                   
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "kecamatan"
                            id="basic-kecamatan"
                            placeholder="" value="<?= $pengguna['kecamatan'] ?>"
                            aria-label="kecamatan"
                            aria-describedby="basic-kecamatan" />
                          <label for="basic-kecamatan">kecamatan</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "kota"
                            id="basic-kota"
                            placeholder=""
                            aria-label="kota"
                            value="<?= $pengguna['kota'] ?>"
                            aria-describedby="basic-kota" />
                          <label for="basic-kota">kota</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "provinsi"
                            id="basic-provinsi"
                            placeholder=""
                            value="<?= $pengguna['provinsi'] ?>"
                            aria-label="provinsi"
                            aria-describedby="basic-provinsi" />
                          <label for="basic-provinsi">provinsi</label>
                      </div>
                          <label for="select2Basic">Role</label>
                     <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="sebagai" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data as $d) { ?>
                                <option value="<?= $d->id_role?>" data-select2-id="95"><?= $d->nama_role ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                            <label for="select2Basic">Organisasi</label>
                     <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="organisasi_kode" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data2 as $d2) { ?>
                                <option value="<?= $d2['organisasi_kode']?>" data-select2-id="95"><?= $d2['nama_organisasi'] ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" class="switch-input" <?=  $pengguna['status'] == 1 ? 'checked': '' ?> value="1">
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