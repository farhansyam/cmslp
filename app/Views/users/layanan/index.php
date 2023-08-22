<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Layanan</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data Layanan</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <?php  if($role['create_data'] == "Y") { ?>
                      <div class="demo-inline-spacing">
                                       <?php if(session()->get('role_baku') == 1) {?>
                      <a href="<?= site_url('superadmin/layanan/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
           

<?php }elseif(session()->get('role_baku') == 2){ ?>
                      <a href="<?= site_url('admins/layanan/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
            

<?php  }else{?>
                      <a href="<?= site_url('user/layanan/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
             
  
<?php  }?>
                    </div>
                      <?php } ?>
                    </div>
                  <?php  if($role['read_data'] == "Y") { ?>
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>judul</th>
                        <th>deskripsi 1</th>
                         <?php if(session()->get('role_baku') == 1 || session()->get('role_baku') == 2) {?>
                        <th>Owner</th>
                        <th>Organisasi</th>
                        <?php } else { ?>
                        <th>deskripsi 2</th>
                          <?php } ?>
                        <th>Status</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                      <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($layanan as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                       
                          <?php if(session()->get('role_baku') == 1 ){?>
                            <td><a href="<?= site_url('superadmin/layanan/detail/'.$d->id_layanan )?>"><button>View</button></a></td>
                          
                            <?php }elseif(session()->get('role_baku') == 2) { ?>
                          <td><a href="<?= site_url('admins/layanan/detail/'.$d->id_layanan )?>"><button>View</button></a></td>
                          <?php }else{ ?>
                            <td><a href="<?= site_url('user/layanan/detail/'.$d->id_layanan )?>"><button>View</button></a></td>
                            <?php } ?>
                        <td><?= $d->judul_layanan?></td>
                        <td><?= $d->deskripsi_1?></td>
                              <?php if(session()->get('role_baku') == 1) {?>
                        <td><?= $d->id_pengguna['username']?></td>
                        <td><?= $d->organisasi_kode['nama_organisasi']?></td>
                        <?php } else { ?>
                        <td><?= $d->deskripsi_2?></td>
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
                                <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/layanan/edit/')?><?=$d->id_layanan?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/layanan/hapus/')?><?=$d->id_layanan?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                            
                                <?php }?>

                        <?php }elseif(session()->get('role_baku') == 2){ ?>
<?php  if($role['delete_data'] == "Y") { ?>
                                <a class="dropdown-item waves-effect" href="<?= site_url('admins/layanan/edit/')?><?=$d->id_layanan?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                <a class="dropdown-item waves-effect" href="<?= site_url('admins/layanan/hapus/')?><?=$d->id_layanan?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                              <?php }?>
                      <?php  }else { ?>
                              <?php  if($role['delete_data'] == "Y") { ?>
                                <a class="dropdown-item waves-effect" href="<?= site_url('user/layanan/edit/')?><?=$d->id_layanan?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                                <a class="dropdown-item waves-effect" href="<?= site_url('user/layanan/hapus/')?><?=$d->id_layanan?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                              <?php }?>

                          <?php } ?>
                                
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                      <?php } ?>

                </div>
              </div>

          
              <!--/ Responsive Table -->
            </div>

<?= $this->endSection() ?>