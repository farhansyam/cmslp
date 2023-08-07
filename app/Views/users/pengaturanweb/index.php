<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>
 <?php if (isset($validation)): ?>
  <?= $validation->listErrors() ?>
        <?php endif; ?>
           <?php  if($role['read_data'] == "Y") { ?>
              <form action="<?= site_url('user/pengaturan/simpan')?>" method="post">
              <input type="hidden" name="id" value="<?php echo $data['id_pengaturan_website'] ?>">
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
                            value="<?php echo $data['judul_website'] ?>"
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
                            value="<?php echo $data['deskripsi_singkat'] ?>"
                            aria-describedby="basic-deskripsiSingkat" />
                          <label for="basic-deskripsiSingkat">Deskripsi Singkat</label>
                      </div>
                       <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsiLengkap"
                            placeholder="Lorem ipsum"><?php echo $data['deskripsi_lengkap'] ?></textarea>
                          <label>Deskripsi Lengkap</label>
                        </div>
                      </div>
                      <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="alamatLengkap"
                            placeholder="Lorem ipsum"><?php echo $data['alamat_lengkap'] ?></textarea>
                          <label>Alamat Lengkap</label>
                        </div>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "embededGmap"
                            id="basic-embededGmap"
                            placeholder="landingpage"
                            aria-label="embededGmap"
                            value="<?= $data['embed_google_maps'] ?>"
                            aria-describedby="basic-embededGmap" />
                          <label for="basic-embededGmap">Embeded Gmap</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "urlGmap"
                            id="basic-urlGmap"
                            placeholder="landingpage"
                            aria-label="urlGmap"
                            value="<?php echo $data['google_maps_url'] ?>"
                            aria-describedby="basic-urlGmap" />
                          <label for="basic-urlGmap">Url Gmap</label>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            class="form-control"
                            name = "namaFacebook"
                            id="basic-namaFacebook"
                            placeholder=""
                            value="<?php echo $data['nama_facebook'] ?>"
                            aria-label="namaFacebook"
                            aria-describedby="basic-namaFacebook" />
                          <label for="basic-namaFacebook">Nama Facebook</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "urlFacebook"
                            id="basic-urlFacebook"
                            placeholder=""
                            value="<?php echo $data['url_facebook'] ?>"
                            aria-label="urlFacebook"
                            aria-describedby="basic-urlFacebook" />
                          <label for="basic-urlFacebook">Url Facebook</label>
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
                            name = "namaInstagram"
                            id="basic-namaInstagram"
                            placeholder=""
                            value="<?php echo $data['nama_instagram'] ?>"
                            aria-label="namaInstagram"
                            aria-describedby="basic-namaInstagram" />
                          <label for="basic-namaInstagram">Nama Instagram</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "urlInstagram"
                            id="basic-urlInstagram"
                            placeholder=""
                            value="<?php echo $data['url_instagram'] ?>"
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
                            value="<?php echo $data['nama_twiter'] ?>"
                            aria-label="namaTwitter"
                            aria-describedby="basic-namaTwitter" />
                          <label for="basic-namaTwitter">Nama Twitter</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "urlTwitter"
                            id="basic-urlTwitter"
                            placeholder=""
                            value="<?php echo $data['url_twiter'] ?>"
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
                            value="<?php echo $data['nama_linkedin'] ?>"
                            aria-label="namaLingkedin"
                            aria-describedby="basic-namaLingkedin" />
                          <label for="basic-namaLingkedin">Nama Linkedin</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "urlLingkedin"
                            id="basic-urlLingkedin"
                            placeholder=""
                            value="<?php echo $data['url_linkedin'] ?>"
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
                            value="<?php echo $data['nama_youtube'] ?>"
                            aria-describedby="basic-namaYoutube" />
                          <label for="basic-namaYoutube">Nama Youtube</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            type="url"
                            class="form-control"
                            name = "urlYoutube"
                            id="basic-urlYoutube"
                            placeholder=""
                            aria-label="urlYoutube"
                            value="<?php echo $data['url_youtube'] ?>"
                            aria-describedby="basic-urlYoutube" />
                          <label for="basic-urlYoutube">Url Youtube</label>
                      </div>
                       <?php  if($role['update_data'] == "Y") { ?>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                        <?php }?>
                      </form>
                                <?php }?>
                         
                         
                     
                    </div>
                  </div>
                </div>
               
            </div>
<?= $this->endSection() ?>