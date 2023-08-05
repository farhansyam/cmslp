<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Pengaturan Website</h4>

              <form action="<?= site_url('user/testimoni/simpan')?>" enctype="multipart/form-data" method="post">
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
                            name = "nama"
                            id="basic-nama"
                            placeholder="jono"
                            aria-label="nama"
                            aria-describedby="basic-nama" />
                          <label for="basic-nama">Nama</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                          requited
                            type="text"
                            class="form-control"
                            name = "instansi"
                            id="basic-instansi"
                            placeholder="IPB"
                            aria-label="instansi"
                            aria-describedby="basic-instansi" />
                          <label for="basic-instansi">Instansi</label>
                      </div>
                      <div class="form-floating form-floating-outline">
                          <input
                          requited
                            type="text"
                            class="form-control"
                            name = "testimoni"
                            id="basic-testimoni"
                            placeholder="Bagus sekali"
                            aria-label="testimoni"
                            aria-describedby="basic-testimoni" />
                          <label for="basic-testimoni">Testimoni</label>
                      </div>
                      
                      <label for="select2Basic">Rating</label>
                     <div class="form-floating form-floating-outline" data-select2-id="45">
                            <div class="position-relative" data-select2-id="44">
                              <select name="rating" id="select2Basic" class="select2 form-select form-select-lg select2-hidden-accessible" data-allow-clear="true" data-select2-id="select2Basic" tabindex="-1" aria-hidden="true">
                              <option value="&#11088;" data-select2-id="92">&#11088;</option>
                              <option value="&#11088;&#11088;" data-select2-id="93">&#11088;&#11088;</option>
                              <option value="&#11088;&#11088;&#11088;" data-select2-id="94">&#11088;&#11088;&#11088;</option>
                              <option value="&#11088;&#11088;&#11088;&#11088;" data-select2-id="95">&#11088;&#11088;&#11088;&#11088;</option>
                              <option value="&#11088;&#11088;&#11088;&#11088;&#11088;" data-select2-id="95">&#11088;&#11088;&#11088;&#11088;&#11088;</option>
                            </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" data-select2-id="1" style="width: 664px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-select2Basic-container"><span class="select2-selection__rendered" id="select2-select2Basic-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder"></span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                        </div>
                      <div class="form-floating form-floating-outline">
                          <input
                            name="foto"
                            type="file"
                            class="form-control"
                            id="basic-foto"
                            placeholder="landingpage"
                            aria-label="foto"
                            aria-describedby="basic-foto" />
                          <label for="basic-foto">Foto</label>
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