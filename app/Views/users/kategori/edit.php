<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Edit Kategori</h4>

              <?php if(session()->get('role_baku') == 2){ ?>
                <form action="<?= site_url('admins/kategori/update')?>" method="post">
                <?php }else{ ?>
                  <form action="<?= site_url('user/kategori/update')?>" method="post">
              <?php } ?>
              <input type="hidden" name="id" value="<?= $id_kategori?>">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                          <div class="form-floating form-floating-outline">
                        <select name="bagian" id="" class="form-control">
                          <option <?= $bagian == 1 ? 'selected':''?> value="1">Blog</option>
                          <option <?= $bagian == 2 ? 'selected':''?> value="2">Banner</option>
                        </select>
                          <label for="basic-kategori">Bagian</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "kategori"
                            id="basic-kategori"
                            placeholder="landingpage"
                            aria-label="kategori"
                            value="<?= $kategori ?>"
                            aria-describedby="basic-kategori" />
                          <label for="basic-kategori">kategori</label>
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" class="switch-input" <?=  $status == 1 ?  'checked': '' ?> value="1">
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