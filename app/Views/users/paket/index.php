<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Paket Paket anda</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data Paket</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
            <?php if($role['create_data'] == 'Y') {?>
                      <div class="demo-inline-spacing">
                      <?php if(session()->get('role_baku') == 1){ ?>
                        <a href="<?= site_url('superadmin/paket/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                        
                     <?php }elseif(session()->get('role_baku') == 2){ ?>
                        <a href="<?= site_url('admin/paket/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                     <?php }else{ ?>
                        <a href="<?= site_url('user/paket/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
                      
                        <?php }?>
                      </div>
                      <?php }?>
                    </div>
            <?php if($role['read_data'] == 'Y') {?>
                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>deskripsi</th>
                        <th>harga</th>
                        <th>fasilitas</th>
                        <th>tombol</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($paket as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><?= $d->judul_paket?></td>
                        <td><?= $d->jenis_paket?></td>
                        <td><?= $d->harga?></td>
                        <td><?= $d->deskripsi?></td>
                        <td><?= $d->fasilitas?></td>
                        <td><?= $d->kalimat_pada_tombol?></td>
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
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/paket/edit/')?><?=$d->id_paket?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
            <?php } if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/paket/hapus/')?><?=$d->id_paket?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                    <?php } ?>
                     <?php }elseif(session()->get('role_baku') == 2){ ?>
                      
                         <?php if($role['update_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('admin/paket/edit/')?><?=$d->id_paket?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
            <?php } if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('admin/paket/hapus/')?><?=$d->id_paket?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                    <?php } ?>
                    <?php }else{ ?>
                         <?php if($role['update_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/paket/edit/')?><?=$d->id_paket?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
            <?php } if($role['delete_data'] == 'Y') {?>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/paket/hapus/')?><?=$d->id_paket?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                    <?php } ?>
                        <?php }?>
         
                           
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