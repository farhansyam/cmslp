<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> portofolio</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data portofolio</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                    <?php if($role['create_data'] == 'Y') {?>
                      <div class="demo-inline-spacing">
                        <?php if(session()->get('role_baku') == 1){ ?>

                        <a href="<?= site_url('superadmin/portofolio/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>

<?php }elseif(session()->get('role_baku') == 2){ ?>

                        <a href="<?= site_url('admins/portofolio/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>

<?php }else{ ?>
                        <a href="<?= site_url('user/portofolio/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>

<?php } ?>
                      </div>
                    <?php } ?>
                    </div>
            <?php if($role['read_data'] == 'Y') {?>
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                                                 <?php if(session()->get('role_baku') == 1 ) {?>
                        <th>Owner</th>
                        <th>Organisasi</th>
                        <?php }  ?>
                        <th>Gambar Portofolio</th>
                        <th>judul protofolio</th>
                        <th>Kategori</th>
                        <th>spesifikasi</th>
                        <th>client</th>
                        <th>url_web</th>
                        <th>lokasi</th>
                        <th>status</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                      <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($portofolio as $d) { ?>
                           <tr>
                             <td><?= $no++?></td>
                        <td>
                      <?php if(session()->get('role_baku') == 1){ ?>

                        <a href="<?= site_url('superadmin/portofolio/detail/'.$d->id_portofolio )?>"><button>View</button></a>

<?php }elseif(session()->get('role_baku') == 2){ ?>

                        <a href="<?= site_url('admins/portofolio/detail/'.$d->id_portofolio )?>"><button>View</button></a>

<?php }else{ ?>
                        <a href="<?= site_url('user/portofolio/detail/'.$d->id_portofolio )?>"><button>View</button></a>

<?php } ?>    
                      
                      
                      </td>
                       <?php if(session()->get('role_baku') == 1) {?>
                        <th><?= $d->id_pengguna['username']?></th>
                        <th><?= $d->organisasi_kode['nama_organisasi'] ?></th>
                        <?php } ?>
                        <td><?= $d->judul_portofolio?></td>
                        <td><?= $d->kategori_portofolio?></td>
                        <td><?= $d->spesifikasi_project?></td>
                        <td><?= $d->client?></td>
                        <td><?= $d->url_website?></td>
                        <td><?= $d->lokasi?></td>
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
                              <?php if(session()->get('role_baku') == 1){ ?>

<?php if($role['update_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/portofolio/edit/')?><?=$d->id_portofolio?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                             <?php } if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/portofolio/hapus/')?><?=$d->id_portofolio?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                             <?php } ?>
<?php }elseif(session()->get('role_baku') == 2){ ?>

<?php if($role['update_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('admins/portofolio/edit/')?><?=$d->id_portofolio?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                             <?php } if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('admins/portofolio/hapus/')?><?=$d->id_portofolio?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                             <?php } ?>
<?php }else{ ?>
<?php if($role['update_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/portofolio/edit/')?><?=$d->id_portofolio?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                             <?php } if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/portofolio/hapus/')?><?=$d->id_portofolio?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                             <?php } ?>
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