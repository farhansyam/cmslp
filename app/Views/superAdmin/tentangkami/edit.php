<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tentang Kami</h4>
            <?php if($role['read_data'] == 'Y') {?>
              <form action="<?= site_url('superadmin/tentang-kami/simpan')?>" method="post">
              <input type="hidden" name="id" value="<?php echo $existingData['id_tentang_kami'] ?>">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <label>Visi</label>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="visi"
                            placeholder="Lorem ipsum"><?php echo $existingData['visi'] ?></textarea>
                        </div>
                      </div>
                      <label>Misi</label>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="misi"
                            placeholder="Lorem ipsum"><?php echo $existingData['misi'] ?></textarea>
                        </div>
                      </div>
                      <label>Motto</label>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="motto"
                            placeholder="Lorem ipsum"><?php echo $existingData['motto'] ?></textarea>
                        </div>
                      </div>
                      <label>Deskripsi 1</label>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_1"
                            placeholder="Lorem ipsum"><?php echo $existingData['deskripsi_1'] ?></textarea>
                        </div>
                      </div>
                      <label>Deskripsi 2</label>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_2"
                            placeholder="Lorem ipsum"><?php echo $existingData['deskripsi_2'] ?></textarea>
                        </div>
                      </div>
                      <label>Deskripsi Portofolio</label>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_portofolio"
                            placeholder="Lorem ipsum"><?php echo $existingData['deskripsi_portofolio'] ?></textarea>
                        </div>
                      </div>
                     <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" class="switch-input" <?=  $existingData['status'] == 1 ?  'checked': '' ?> value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                    <?php if($role['update_data'] == 'Y') {?>
                        
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <?php }?>
                      </form>
                         <?php }?>
                    </div>
                  </div>
                </div>
               
            </div>
<?= $this->endSection() ?>