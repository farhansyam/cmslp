<?php $this->extend('layout/superadmin'); ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Role</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data role</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                        <a href="<?= site_url('superadmin/role/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                      </div>
                    </div>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>nama role</th>
                        <th>Create Data</th>
                        <th>Read Data</th>
                        <th>Update Data</th>
                        <th>Delete Data</th>
                        <!-- <th>All Organisasi</th> -->
                        <!-- <th>List Organisasi</th> -->
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($role as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><?= $d['nama_role']?></td>
                          <td><?php if($d['create_data'] == 'Y') {?>
                        <span class="badge bg-label-success me-1">Y</span>
                          <?php } else{?>
                        <span class="badge bg-label-danger me-1">N</span>
                         <?php } ?>
                        </td>
                          <td><?php if($d['read_data'] == 'Y') {?>
                        <span class="badge bg-label-success me-1">Y</span>
                          <?php } else{?>
                        <span class="badge bg-label-danger me-1">N</span>
                         <?php } ?>
                        </td>
                          <td><?php if($d['update_data'] == 'Y') {?>
                        <span class="badge bg-label-success me-1">Y</span>
                          <?php } else{?>
                        <span class="badge bg-label-danger me-1">N</span>
                         <?php } ?>
                        </td>
                          <td><?php if($d['delete_data'] == 'Y') {?>
                        <span class="badge bg-label-success me-1">Y</span>
                          <?php } else{?>
                        <span class="badge bg-label-danger me-1">N</span>
                         <?php } ?>
                        </td>
                        <!-- <td>< //?= $d['all_organisasi']?></td> -->
                        <!-- <td><//?= $d['list_organisasi']?></td> -->
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
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/role/edit/')?><?=$d['id_role']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/role/hapus/')?><?=$d['id_role']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
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