<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Portofolio</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Detail Data Portofolio</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                        <table class="table">
                           <tr>
                              <th>Judul</th>
                              <th>Kategori</th>
                              <th>Deskripsi</th>
                              <th>Spesifikasi</th>
                              <th>Client</th>
                              <th>Url Web</th>
                              <th>Lokasi</th>
                              <th>Status</th>
                          </tr>
                          <tr>
                              <td><?= $data1['judul_portofolio'] ?></td>
                              <td><?= $data1['kategori_portofolio'] ?></td>
                              <td><?= $data1['deskripsi'] ?></td>
                              <td><?= $data1['spesifikasi_project'] ?></td>
                              <td><?= $data1['client'] ?></td>
                              <td><?= $data1['url_website'] ?></td>
                              <td><?= $data1['lokasi'] ?></td>
                              <td><?php if($data1['status'] == 1) {?>
                        <span class="badge bg-label-success me-1">Active</span>
                          <?php } else{?>
                        <span class="badge bg-label-danger me-1">Deactive</span>
                         <?php } ?>
                        </td>
                          </tr>
                        </table>
                    </div>
                    </div>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                      <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($dataGambar as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><img width="180" height="100" src="<?php echo base_url('uploads/portofolio/'.$d->gambar)?>" alt="" srcset=""></td>
                        <td>
                          <div class="dropdown">
                            
                                                            <?php if(session()->get('role_baku') == 1) {?>
                              <a class="waves-effect" href="<?= site_url('superadmin/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
<?php }elseif(session()->get('role_baku') == 2){ ?>
                              <a class="waves-effect" href="<?= site_url('admin/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>

<?php  }else{?>
                              <a class="waves-effect" href="<?= site_url('user/gambar/hapus/')?><?=$d->id_gambar?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
  
<?php  }?>
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