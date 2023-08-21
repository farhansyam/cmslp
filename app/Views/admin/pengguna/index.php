<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"> Administrator</h4>
              <!-- Bootstrap Table with Header - Light -->
              <div class="card">
                <h5 class="card-header">Table Data admin</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                        <?php if(session()->get('role_baku') == 1){ ?>

                        <a href="<?= site_url('superadmin/pengguna/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>

<?php }elseif(session()->get('role_baku') == 2){ ?>
                        <a href="<?= site_url('admins/pengguna/tambah')?>"><button type="button" class="btn btn-primary waves-effect waves-light">Tambah</button></a>


<?php }else{ ?>

<?php } ?>

                      </div>
                    </div>

                  <table class="table">
                    <thead class="table-light">
                      <tr>
                        <th>No</th>
                        <th>username</th>
                        <th>password</th>
                        <th>Nama depan</th>
                        <th>Nama belakang</th>
                        <th>Role</th>
                        <th>JK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Nomor Telepon</th>
                        <th>email</th>
                        <th>alamat</th>
                        <th>kecamatan</th>
                        <th>kota</th>
                        <th>provinsi</th>
                        <th>Organisasi</th>
                        <th>Organisasi kode</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($pengguna as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><?= $d['username']?></td>
                        <td><?= $d['password']?></td>
                        <td><?= $d['nama_depan']?></td>
                        <td><?= $d['nama_belakang']?></td>
                        <td><?= $d['sebagai']['nama_role']?></td>
                        <td><?= $d['jenis_kelamin']?></td>
                        <td><?= $d['tempat_lahir']?></td>
                        <td><?= $d['tanggal_lahir']?></td>
                        <td><?= $d['nomor_telepon']?></td>
                        <td><?= $d['email']?></td>
                        <td><?= $d['alamat']?></td>
                        <td><?= $d['kecamatan']?></td>
                        <td><?= $d['kota']?></td>
                        <td><?= $d['provinsi']?></td>
                        <td><?= $d['organisasi_kode']['nama_organisasi']?></td>
                        <td><?= $d['organisasi_kode']['organisasi_kode']?></td>
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
                              <a class="dropdown-item waves-effect" href="<?= site_url('admins/pengguna/edit/')?><?=$d['id_pengguna']?>"><i class="mdi mdi-pencil-outline me-1"></i> Edit</a>
                              <a class="dropdown-item waves-effect" href="<?= site_url('admins/pengguna/hapus/')?><?=$d['id_pengguna']?>"><i class="mdi mdi-trash-can-outline me-1"></i> Delete</a>
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