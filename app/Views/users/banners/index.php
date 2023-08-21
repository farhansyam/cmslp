<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Banners</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data Banners</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                   <?php  if($role['create_data'] == "Y") { ?>
                    <div class="demo-inline-spacing">
                              <?php if(session()->get('role_baku') == 1) {?>
                      <a href="<?= site_url('superadmin/banners/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
           

<?php }elseif(session()->get('role_baku') == 2){ ?>
                      <a href="<?= site_url('admins/banners/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
            

<?php  }else{?>
                      <a href="<?= site_url('user/banners/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
             
  
<?php  }?>
                    </div>
                              <?php }?>
                    </div>
 <?php  if($role['read_data'] == "Y") { ?>
                              <?php }?>
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>banners</th>
                        <th>judul</th>
                        <th>deskripsi</th>
                        <?php if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2) {?>
                        <th>Owner</th>
                        <th>Organisasi</th>
                        <?php } else { ?>
                          <th>link</th>
                        <th>kategori</th>
                          <?php } ?>
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
                           <?php if(session()->get('role_baku') == 1 ){?>
                            <td><a href="<?= site_url('superadmin/banners/detail/'.$d->id_banner )?>"><button>View</button></a></td>
                           <?php } elseif(session()->get('role_baku') == 2) {?>
                            <td><a href="<?= site_url('admins/banners/detail/'.$d->id_banner )?>"><button>View</button></a></td>

                        <?php } else { ?>
                          <td><a href="<?= site_url('user/banners/detail/'.$d->id_banner )?>"><button>View</button></a></td>
                          <?php } ?>
                        <td><?= $d->judul?></td>
                        <td><?= $d->deskripsi?></td>
                        <?php if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2) {?>
                        <th><?= $d->id_pengguna['username']?></th>
                        <th><?= $d->organisasi_kode['nama_organisasi'] ?></th>
                        <?php } else { ?>
                          <td><?= $d->link?></td>
                          <td><?= $d->kategori?></td>
                          <?php } ?>
                        <td><?php if($d->status == 1) {?>
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
                              
                        <?php if(session()->get('role_baku') == 1) {?>
                                                        <?php  if($role['update_data'] == "Y") { ?>
                                <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/banners/edit/')?><?=$d->id_banner?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/banners/hapus/')?><?=$d->id_banner?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                            
                                <?php }?>

                        <?php }elseif(session()->get('role_baku') == 2){ ?>
<?php  if($role['delete_data'] == "Y") { ?>
                                <a class="dropdown-item waves-effect" href="<?= site_url('admins/banners/edit/')?><?=$d->id_banner?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                <a class="dropdown-item waves-effect" href="<?= site_url('admins/banners/hapus/')?><?=$d->id_banner?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                              <?php }?>
                      <?php  }else { ?>
                              <?php  if($role['delete_data'] == "Y") { ?>
                                <a class="dropdown-item waves-effect" href="<?= site_url('user/banners/edit/')?><?=$d->id_banner?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                <a class="dropdown-item waves-effect" href="<?= site_url('user/banners/hapus/')?><?=$d->id_banner?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                              <?php }?>

                          <?php } ?>
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