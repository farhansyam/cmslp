<?php $this->extend('layout/SuperAdmin'); ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> kategori</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data kategori</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
            <?php if($role['create_data'] == 'Y') {?>
                      <div class="demo-inline-spacing">
                        <a href="<?= site_url('superadmin/kategori/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                      </div>
            <?php }?>
                    </div>
            <?php if($role['read_data'] == 'Y') {?>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($kategori as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
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
                              <?php if($role['update_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/kategori/edit/')?><?=$d['id_kategori']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <?php } ?>
                            <?php if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/kategori/hapus/')?><?=$d['id_kategori']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                              <?php } ?>
                           
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                  <?php }?>
                </div>
              </div>

          
              <!--/ Responsive Table -->
            </div>

<?= $this->endSection() ?>