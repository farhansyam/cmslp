<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Banners</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data Banners</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                        <a href="<?= site_url('user/banners/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                      </div>
                    </div>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>banners</th>
                        <th>judul</th>
                        <th>deskripsi</th>
                        <th>link</th>
                        <th>kategori</th>
                        <th>status</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                      <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($banners as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><a href="<?= site_url('user/banners/detail/'.$d['id_banner'] )?>"><button>View</button></a></td>
                        <td><?= $d['judul']?></td>
                        <td><?= $d['deskripsi']?></td>
                        <td><?= $d['link']?></td>
                        <td><?= $d['kategori']?></td>
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
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/banners/edit/')?><?=$d['id_banner']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/banners/hapus/')?><?=$d['id_banner']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
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