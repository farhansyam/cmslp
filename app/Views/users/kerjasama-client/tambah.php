<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('user/kerjasama-client/simpan')?>" enctype="multipart/form-data" method="post">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
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