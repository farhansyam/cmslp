<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Tentang Kami</h4>

              <form action="<?= site_url('user/tentang-kami/simpan')?>" method="post">
              <input type="hidden" name="id" value="<?php echo $id_tentang_kami ?>">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="visi"
                            placeholder="Lorem ipsum"><?php echo $visi ?></textarea>
                          <label>Visi</label>
                        </div>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="misi"
                            placeholder="Lorem ipsum"><?php echo $misi ?></textarea>
                          <label>Misi</label>
                        </div>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="motto"
                            placeholder="Lorem ipsum"><?php echo $motto ?></textarea>
                          <label>Motto</label>
                        </div>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_1"
                            placeholder="Lorem ipsum"><?php echo $deskripsi_1 ?></textarea>
                          <label>Deskripsi 1</label>
                        </div>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_2"
                            placeholder="Lorem ipsum"><?php echo $deskripsi_2 ?></textarea>
                          <label>Deskripsi 2</label>
                        </div>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_portofolio"
                            placeholder="Lorem ipsum"><?php echo $deskripsi_portofolio ?></textarea>
                          <label>Deskripsi Portofolio</label>
                        </div>
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