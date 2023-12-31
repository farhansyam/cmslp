<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Organisasi</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data Organisasi</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                                              <?php if(session()->get('role_baku') == 1) {?>
                      <a href="<?= site_url('superadmin/organisasi/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
           

<?php }elseif(session()->get('role_baku') == 2){ ?>
                      <a href="<?= site_url('admins/organisasi/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
            

<?php  }else{?>
                      <a href="<?= site_url('user/organisasi/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>
             
  
<?php  }?>
                      </div>
                    </div>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>nama</th>
                        <th>alamat</th>
                        <th>no telepon</th>
                        <th>no handphone</th>
                        <th>Logo</th>
                        <!-- <th>Status</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($organisasi as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><?= $d['organisasi_kode']?></td>
                        <td><?= $d['nama_organisasi']?></td>
                        <td><?= $d['alamat_organisasi']?></td>
                        <td><?= $d['no_telepon']?></td>
                        <td><?= $d['no_handphone']?></td>
                        <td><img width="50" height="50" src="<?php echo base_url('uploads/organisasi/'.$d['logo'])?>" alt="" srcset=""></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="mdi mdi-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                              <?php if(session()->get('role_baku') == 1){ ?>
 <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/organisasi/edit/')?><?=$d['id']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('superadmin/organisasi/hapus/')?><?=$d['id']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                            

<?php }elseif(session()->get('role_baku') == 2){ ?>
 <a class="dropdown-item waves-effect" href="<?= site_url('admins/organisasi/edit/')?><?=$d['id']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('admins/organisasi/hapus/')?><?=$d['id']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                            

<?php }else{ ?>
 <a class="dropdown-item waves-effect" href="<?= site_url('user/organisasi/edit/')?><?=$d['id']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('user/organisasi/hapus/')?><?=$d['id']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
                            
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