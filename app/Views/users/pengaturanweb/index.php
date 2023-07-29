<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('user/pengaturan/simpan')?>" method="post">
              <input type="hidden" name="id" value="<?php echo $id_pengaturan_website ?>">
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
                            name = "judulWebsite"
                            id="basic-judulWebsite"
                            placeholder="landingpage"
                            aria-label="judulWebsite"
                            value="<?php echo $judul_website ?>"
                            aria-describedby="basic-judulWebsite" />
                          <label for="basic-judulWebsite">Judul Website</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="deskripsiSingkat"
                            type="text"
                            class="form-control"
                            id="basic-deskripsiSingkat"
                            placeholder="landingpage"
                            aria-label="deskripsiSingkat"
                            value="<?php echo $deskripsi_singkat ?>"
                            aria-describedby="basic-deskripsiSingkat" />
                          <label for="basic-deskripsiSingkat">Deskripsi Singkat</label>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsiLengkap"
                            placeholder="Lorem ipsum"><?php echo $deskripsi_lengkap ?></textarea>
                          <label>Deskripsi Lengkap</label>
                        </div>
                      </div>
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
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input type="text"value="<?php echo $cs_1_sebagai ?>" name="cs1Sebagai" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">CS 1 Sebagai</label>
                          </div>
                        </div> 
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
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input type="text" value="<?php echo $cs_2_sebagai ?>" name="cs2Sebagai" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">CS 2 Sebagai</label>
                          </div>
                        </div>
                         
                        <div class="input-group input-group-merge mb-4">
                          <span id="basic-icon-default-phone2" class="input-group-text"><i class="mdi mdi-phone"></i></span>
                          <div class="form-floating form-floating-outline">
                            <input value="<?php echo $pesan_cs ?>" type="text" name="pesanCs" id="basic-icon-default-phone" class="form-control phone-mask" placeholder="658 799 8941" aria-label="658 799 8941" aria-describedby="basic-icon-default-phone2">
                            <label for="basic-icon-default-phone">Pesan Cs</label>
                          </div>
                        </div> 
                      <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="alamatLengkap"
                            placeholder="Lorem ipsum"><?php echo $alamat_lengkap ?></textarea>
                          <label>Alamat Lengkap</label>
                        </div>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "embededGmap"
                            id="basic-embededGmap"
                            placeholder="landingpage"
                            aria-label="embededGmap"
                            value="<?php echo $embed_google_maps ?>"
                            aria-describedby="basic-embededGmap" />
                          <label for="basic-embededGmap">Embeded Gmap</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "urlGmap"
                            id="basic-urlGmap"
                            placeholder="landingpage"
                            aria-label="urlGmap"
                            value="<?php echo $google_maps_url ?>"
                            aria-describedby="basic-urlGmap" />
                          <label for="basic-urlGmap">Url Gmap</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">2</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
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
                    <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaFacebook"
                            id="basic-namaFacebook"
                            placeholder=""
                            value="<?php echo $nama_facebook ?>"
                            aria-label="namaFacebook"
                            aria-describedby="basic-namaFacebook" />
                          <label for="basic-namaFacebook">Nama Facebook</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "urlFacebook"
                            id="basic-urlFacebook"
                            placeholder=""
                            value="<?php echo $url_facebook ?>"
                            aria-label="urlFacebook"
                            aria-describedby="basic-urlFacebook" />
                          <label for="basic-urlFacebook">Url Facebook</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaInstagram"
                            id="basic-namaInstagram"
                            placeholder=""
                            value="<?php echo $nama_instagram ?>"
                            aria-label="namaInstagram"
                            aria-describedby="basic-namaInstagram" />
                          <label for="basic-namaInstagram">Nama Instagram</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "urlInstagram"
                            id="basic-urlInstagram"
                            placeholder=""
                            value="<?php echo $url_instagram ?>"
                            aria-label="urlInstagram"
                            aria-describedby="basic-urlInstagram" />
                          <label for="basic-urlInstagram">Url Instagram</label>
                      </div>
                      
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaTwitter"
                            id="basic-namaTwitter"
                            placeholder=""
                            value="<?php echo $nama_twiter ?>"
                            aria-label="namaTwitter"
                            aria-describedby="basic-namaTwitter" />
                          <label for="basic-namaTwitter">Nama Twitter</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "urlTwitter"
                            id="basic-urlTwitter"
                            placeholder=""
                            value="<?php echo $url_twiter ?>"
                            aria-label="urlTwitter"
                            aria-describedby="basic-urlTwitter" />
                          <label for="basic-urlTwitter">Url Twitter</label>
                      </div>
                      
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaLingkedin"
                            id="basic-namaLingkedin"
                            placeholder=""
                            value="<?php echo $nama_linkedin ?>"
                            aria-label="namaLingkedin"
                            aria-describedby="basic-namaLingkedin" />
                          <label for="basic-namaLingkedin">Nama Linkedin</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "urlLingkedin"
                            id="basic-urlLingkedin"
                            placeholder=""
                            value="<?php echo $url_linkedin ?>"
                            aria-label="urlLingkedin"
                            aria-describedby="basic-urlLingkedin" />
                          <label for="basic-urlLingkedin">Url Lingkedin</label>
                      </div>
                      
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaYoutube"
                            id="basic-namaYoutube"
                            placeholder=""
                            aria-label="namaYoutube"
                            value="<?php echo $nama_youtube ?>"
                            aria-describedby="basic-namaYoutube" />
                          <label for="basic-namaYoutube">Nama Youtube</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "urlYoutube"
                            id="basic-urlYoutube"
                            placeholder=""
                            aria-label="urlYoutube"
                            value="<?php echo $url_youtube ?>"
                            aria-describedby="basic-urlYoutube" />
                          <label for="basic-urlYoutube">Url Youtube</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                         
                         
                     
                    </div>
                  </div>
                </div>
               
            </div>
<?= $this->endSection() ?>