<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('user/paket/update')?>" method="post">
              <input type="hidden" name="id" value="<?= $id_paket?>">
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
                            name = "judul_paket"
                            id="basic-judul_paket"
                            placeholder="landingpage"
                            aria-label="judul_paket"
                            value="<?= $judul_paket ?>"
                            aria-describedby="basic-judul_paket" />
                          <label for="basic-judul_paket">Judul Paket</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="jenis_paket"
                            type="text"
                            class="form-control"
                            id="basic-jenis_paket"
                            placeholder="landingpage"
                            aria-label="jenis_paket"
                            value="<?= $jenis_paket ?>"
                            aria-describedby="basic-jenis_paket" />
                          <label for="basic-jenis_paket">Jenis paket</label>
                      </div>
                        <div class="input-group input-group-merge">
                        <div class="form-floating form-floating-outline">
                          <textarea
                            class="form-control h-px-75"
                            name ="deskripsi_paket"
                            placeholder="Lorem ipsum"><?php echo $deskripsi ?></textarea>
                          <label>Deskripsi Paket</label>
                        </div>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            name="harga"
                            type="text"
                            class="form-control"
                            id="basic-harga"
                            placeholder="landingpage"
                            aria-label="harga"
                            value="<?= $harga ?>"
                            aria-describedby="basic-harga" />
                          <label for="basic-harga">Harga paket</label>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            name="fasilitas"
                            type="text"
                            class="form-control"
                            id="basic-fasilitas"
                            placeholder="landingpage"
                            aria-label="fasilitas"
                            value="<?= $fasilitas ?>"
                            aria-describedby="basic-fasilitas" />
                          <label for="basic-fasilitas">Fasilitas paket</label>
                      </div>
                       <div class="form-floating form-floating-outline">
                          <input
                            name="kalimat_pada_tombol"
                            type="text"
                            class="form-control"
                            id="basic-kalimat_pada_tombol"
                            placeholder="landingpage"
                            aria-label="kalimat_pada_tombol"
                            value="<?= $kalimat_pada_tombol ?>"
                            aria-describedby="basic-kalimat_pada_tombol" />
                          <label for="basic-kalimat_pada_tombol">Kalimat Pada Tombol</label>
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