<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('user/faq/update')?>" method="post">
              <input type="hidden" name="id" value="<?= $id_faq?>">
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
                            name = "pertanyaan"
                            id="basic-pertanyaan"
                            placeholder="landingpage"
                            aria-label="pertanyaan"
                            value="<?= $pertanyaan ?>"
                            aria-describedby="basic-pertanyaan" />
                          <label for="basic-pertanyaan">Pertanyaan</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="Jawaban"
                            type="text"
                            class="form-control"
                            id="basic-Jawaban"
                            placeholder="landingpage"
                            aria-label="Jawaban"
                            value="<?= $jawaban ?>"
                            aria-describedby="basic-Jawaban" />
                          <label for="basic-Jawaban">Jawaban</label>
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