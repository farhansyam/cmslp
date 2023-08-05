<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Informasi Kontak</h4>

              <form action="<?= site_url('user/infokontak/simpan')?>" method="post">
              <input type="hidden" name="id" value="<?php echo $id_pengaturan_website ?>">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-6">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="input-group input-group-merge mb-4">
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input type="text" value="<?php echo $nomor_telepon ?>" name="noTelepon" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">No Telepn</label>
                          </div>
                        </div>
                      <div class="input-group input-group-merge mb-4">
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input type="text" value="<?php echo $nomor_handphone ?>"  name="noHandphone" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">No Handphone</label>
                          </div>
                        </div>  
                         <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaCs1"
                            id="basic-namaCs1"
                            placeholder=""
                            value="<?php echo $nama_cs_1 ?>"
                            aria-label="namaCs1"
                            aria-describedby="basic-namaCs1" />
                          <label for="basic-namaCs1">Nama CS 1</label>
                      </div> 
                        <div class="input-group input-group-merge mb-4">
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input type="text" value="<?php echo $nomor_cs_1 ?>" name="noHandphoneCs1" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">No Handphone CS 1</label>
                          </div>
                        </div> 
                        <div class="input-group input-group-merge mb-4">
                          <div class="form-floating form-floating-outline">
                            <input type="text"value="<?php echo $cs_1_sebagai ?>" name="cs1Sebagai" id="basic-icon-default-phone" class="form-control" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">CS 1 Sebagai</label>
                          </div>
                        </div>
                              <div class="input-group input-group-merge mb-4">
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-chat"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input value="<?php echo $pesan_cs ?>" type="text" name="pesanCs" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">Pesan Cs</label>
                          </div>
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
                            name = "namaCS2"
                            id="basic-namaCS2"
                            placeholder=""
                            value="<?php echo $nama_cs_2 ?>"
                            aria-label="namaCS2"
                            aria-describedby="basic-namaCS2" />
                          <label for="basic-namaCS2">Nama CS 2</label>
                      </div>
                        <div class="input-group input-group-merge mb-4">
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input type="text" value="<?php echo $nomor_cs_2 ?>" name="noHandphoneCs2" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">No Handphone CS 2</label>
                          </div>
                        </div>
                         
                        <div class="input-group input-group-merge mb-4">
                          <div class="form-floating form-floating-outline">
                            <input type="text" value="<?php echo $cs_2_sebagai ?>" name="cs2Sebagai" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">CS 2 Sebagai</label>
                          </div>
                        </div>
                         
                    <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input type="email" value="<?php echo $email_admin ?>" name="emailAdmin" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                              <label for="basic-default-email">Email Admin</label>
                            </div>
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                          </div>
                      <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input type="email" value="<?php echo $email_cs ?>" name="emailCs" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                              <label for="basic-default-email">Email Customer Service</label>
                            </div>
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                          </div>
                      <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                              <input type="email" value="<?php echo $email_support ?>" name="emailSupport" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                              <label for="basic-default-email">Email Suport</label>
                            </div>
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                          </div> 
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                         
                         
                     
                    </div>
                  </div>
                </div>
               
            </div>
<?= $this->endSection() ?>