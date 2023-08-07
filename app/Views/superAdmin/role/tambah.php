<?php $this->extend('layout/superadmin'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('superadmin/role/simpan')?>" method="post">
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
                            name = "nama_role"
                            id="basic-nama_role"
                            placeholder="landingpage"
                            aria-label="nama_role"
                            aria-describedby="basic-nama_role" />
                          <label for="basic-nama_role">Nama Role</label>
                      </div>
                        <label class="switch switch-success">
                            <input type="hidden" name="create_data"  value="N">
                            <input type="checkbox" name="create_data" class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Create Data (Y/N)</span>
                          </label>  <label class="switch switch-success">
                            <input type="hidden" name="read_data"  value="N">
                            <input type="checkbox" name="read_data" class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Read Data (Y/N)</span>
                          </label>  <label class="switch switch-success">
                            <input type="hidden" name="update_data"  value="N">
                            <input type="checkbox" name="update_data" class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Update Data (Y/N)</span>
                          </label>  <label class="switch switch-success">
                            <input type="hidden" name="delete_data"  value="N">
                            <input type="checkbox" name="delete_data" class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Delete Data (Y/N)</span>
                          </label>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "all_organisasi"
                            id="basic-all_organisasi"
                            placeholder="landingpage"
                            aria-label="all_organisasi"
                            aria-describedby="basic-all_organisasi" />
                          <label for="basic-all_organisasi">All Organisasi</label>
                      </div>
                        <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "list_organisasi"
                            id="basic-list_organisasi"
                            placeholder="landingpage"
                            aria-label="list_organisasi"
                            aria-describedby="basic-list_organisasi" />
                          <label for="basic-list_organisasi">List Organisasi</label>
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