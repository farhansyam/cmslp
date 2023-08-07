<?php $this->extend('layout/admin'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('admins/organisasi/update')?>" enctype="multipart/form-data" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
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
                            name = "nama_organisasi"
                            id="basic-nama_organisasi"
                            aria-label="nama_organisasi"
                            value = "<?= $nama_organisasi ?>"
                            aria-describedby="basic-nama_organisasi" />
                          <label for="basic-nama_organisasi">Nama Organisasi</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                          requited
                            type="text"
                            class="form-control"
                            name = "alamat_organisasi"
                            id="basic-alamat_organisasi"
                            aria-label="alamat_organisasi"
                            value = "<?= $alamat_organisasi ?>"
                            aria-describedby="basic-alamat_organisasi" />
                          <label for="basic-alamat_organisasi">Alamat Organisasi</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                          requited
                            type="text"
                            class="form-control"
                            name = "no_telepon"
                            id="basic-no_telepon"
                            aria-label="no_telepon"
                            value = "<?= $no_telepon ?>"
                            aria-describedby="basic-no_telepon" />
                          <label for="basic-no_telepon">No Telepon</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                          requited
                            type="text"
                            class="form-control"
                            name = "no_handphone"
                            id="basic-no_handphone"
                            value = "<?= $no_handphone ?>"
                            aria-label="no_handphone"
                            aria-describedby="basic-no_handphone" />
                          <label for="basic-no_handphone">No Handphone</label>
                      </div>
                           <div class="form-floating form-floating-outline">
                            Logo Lama
                        <td><img width="180" height="180" src="<?php echo base_url('uploads/client/'.$logo)?>" alt="" srcset=""></td>
                         
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="logo"
                            type="file"
                            class="form-control"
                            id="basic-logo"
                            placeholder="landingpage"
                            aria-label="logo"
                            aria-describedby="basic-logo" />
                          <label for="basic-logo">Logo</label>
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