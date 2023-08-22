<?php $this->extend('layout/superadmin'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('superadmin/role/update')?>" method="post">
              <input type="hidden" name="id" value="<?= $role['id_role'] ?>">
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
                            value="<?= $role['nama_role']?>"
                            aria-describedby="basic-nama_role" />
                          <label for="basic-nama_role">Nama Role</label>
                      </div>
                        <label class="switch switch-success">
                            <input type="hidden" name="create_data"  value="N">
                            <input type="checkbox" name="create_data"<?=  $role['create_data'] == "Y" ?  'checked': '' ?>  class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Create Data (Y/N)</span>
                          </label>  <label class="switch switch-success">
                            <input type="hidden" name="read_data"  value="N">
                            <input type="checkbox" name="read_data" <?=  $role['read_data'] == "Y" ?  'checked': '' ?> class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Read Data (Y/N)</span>
                          </label>  <label class="switch switch-success">
                            <input type="hidden" name="update_data"  value="N">
                            <input type="checkbox" name="update_data"  <?=  $role['update_data'] == "Y" ?  'checked': '' ?> class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Update Data (Y/N)</span>
                          </label>  <label class="switch switch-success">
                            <input type="hidden" name="delete_data"  value="N">
                            <input type="checkbox" name="delete_data"  <?=  $role['delete_data'] == "Y" ?  'checked': '' ?> class="switch-input" value="Y">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Delete Data (Y/N)</span>
                          </label>
                        <div class="form-floating form-floating-outline">
                          <select name="all_organisasi" id="" class="form-control">
                            <option value="Y">Y</option>
                            <option value="N">N</option>
                          </select>
                          <label for="basic-all_organisasi">All Organisasi</label>
                      </div>
                        <div class="form-floating form-floating-outline">
                    <select id="organisasi" name="paket[]" class="form-control js-example-basic-multiple" multiple="multiple">

                    <option value=""></option>
                          
                      <?php foreach($organisasi as $org) { ?>
                        <option value="<?=$org['organisasi_kode']?>"><?= $org['nama_organisasi']?></option>
                        <?php } ?>


                </select>

                          <label for="basic-list_organisasi">List Organisasi</label>
                      </div>

                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" class="switch-input" <?=  $role['status'] == 1 ?  'checked': '' ?>  value="1">
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
                    <script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

        </script>
<?= $this->endSection() ?>