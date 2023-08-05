<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Clien Work</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data Client Work</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                        <a href="<?= site_url('user/testimoni/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                      </div>
                    </div>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Testimoni</th>
                        <th>Rating</th>
                        <th>Foto</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($testimoni as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><?= $d['nama']?></td>
                        <td><?= $d['instansi']?></td>
                        <td><?= $d['testimoni']?></td>
                        <td><?= $d['rating']?></td>
                        <td><img width="100" height="100" src="<?php echo base_url('uploads/testimoni/'.$d['foto'])?>" alt="" srcset=""></td>
                        <td><?php if($d['status'] == 1) {?>
                        <span class="badge bg-label-success me-1">Active</span>
                          <?php } else{?>
                        <span class="badge bg-label-danger me-1">Deactive</span>
                         <?php } ?>
                        </td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/testimoni/edit/')?><?=$d['id_testimoni']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/testimoni/hapus/')?><?=$d['id_testimoni']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

          
              <!--/ Responsive Table -->
            </div>

<?= $this->endSection() ?>