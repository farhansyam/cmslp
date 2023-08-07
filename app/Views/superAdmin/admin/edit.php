<?php $this->extend('layout/superadmin'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Edit Administrator</h4>

              <form action="<?= site_url('superadmin/admin/update')?>" method="post">
              <input type="hidden" name="id" value="<?= $admin['id_admin'] ?>>
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
                            name = "username"
                            id="basic-username"
                            placeholder="landingpage"
                            aria-label="username"
                            value="<?= $admin['username'] ?>"
                            aria-describedby="basic-username" />
                          <label for="basic-username">username</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="password"
                            type="password"
                            class="form-control"
                            id="basic-password"
                            placeholder="landingpage"
                            aria-label="password"
                            aria-describedby="basic-password" />
                          <label for="basic-password">password</label>
                      </div>
                          <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "nama_depan"
                            id="basic-nama_depan"
                            placeholder="landingpage"
                            aria-label="nama_depan"
                            value="<?= $admin['nama_depan'] ?>"
                            aria-describedby="basic-nama_depan" />
                          <label for="basic-nama_depan">nama_depan</label>
                      </div>
                          <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "nama_belakang"
                            id="basic-nama_belakang"
                            value="<?= $admin['nama_belakang'] ?>"
                            placeholder="landingpage"
                            aria-label="nama_belakang"
                            aria-describedby="basic-nama_belakang" />
                          <label for="basic-nama_belakang">nama_belakang</label>
                      </div>
                           <label for="select2Basic">Role</label>
                     <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="role" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <?php foreach($data as $d) { ?>
                                <option <?= $admin['role'] == $d->id_role ? "selected" :"" ?> value="<?= $d->id_role?>" data-select2-id="95"><?= $d->nama_role ?></option>
                              <?php } ?>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
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