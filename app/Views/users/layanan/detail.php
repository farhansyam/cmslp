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
                <h5 class="card-header">Detail Data Layanan</h5>
                <div class="table-responsive text-wrap">
                <div class="card-body">
                      <div class="demo-inline-spacing">
                        <table class="table">
                           <tr>
                              <th>Judul</th>
                              <th>Deskripsi 1</th>
                              <th>Deskripsi 2</th>
                              <th>Status</th>
                          </tr>
                          <tr>
                              <td><?= $data1['judul_layanan'] ?></td>
                              <td><?= $data1['deskripsi_1'] ?></td>
                              <td><?= $data1['deskripsi_2'] ?></td>
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
                      </tr>
                    </thead>
                      <tbody class="table-border-bottom-0">
                    <?php 
                    $no = 1;
                    foreach($dataGambar as $d) { ?>
                           <tr>
                        <td><?= $no++?></td>
                        <td><img width="180" height="100" src="<?php echo base_url('uploads/layanan/'.$d->gambar)?>" alt="" srcset=""></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>

          
              <!--/ Responsive Table -->
            </div>

<?= $this->endSection() ?>