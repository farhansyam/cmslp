

<?php if(session()->get('role_baku') == 1) {?>
<?php $this->extend('layout/SuperAdmin');}elseif(session()->get('role_baku') == 2){

 ?>
<?php $this->extend('layout/Admin'); }else{?>
<?php $this->extend('layout/User'); }?>
<?= $this->section('content') ?>
   <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-1 mb-3">Edit Kerjasama Client</h4>
<?php if(session()->get('role_baku') == 1){ ?>

  <form action="<?= site_url('superadmin/kerjasama-client/update')?>" method="post" enctype="multipart/form-data">

<?php }elseif(session()->get('role_baku') == 2){ ?>
  <form action="<?= site_url('admins/kerjasama-client/update')?>" method="post" enctype="multipart/form-data">


<?php }else{ ?>

  <form action="<?= site_url('user/kerjasama-client/update')?>" method="post" enctype="multipart/form-data">
<?php } ?>

              <input type="hidden" name="id" value="<?= $id_kerjasama_client?>">
              <div class="row">
                <!-- Floating (Outline) -->
                <div class="col-md-12">
                  <div class="card mb-4">
                    <!-- <h5 class="card-header">General</h5> -->
                    <div class="card-body demo-vertical-spacing demo-only-element">
                      <div class="form-floating form-floating-outline">
                          <input
                            type="text"
                            required
                            class="form-control"
                            name = "nama_client"
                            id="basic-nama_client"
                            placeholder="landingpage"
                            aria-label="nama_client"
                            value="<?= $nama_client ?>"
                            aria-describedby="basic-nama_client" />
                          <label for="basic-nama_client">Nama Client</label>
                      </div>
                      <label for="basic-Jawaban">Logo Sebelumnya</label>
                      <div class="form-floating form-floating-outline">
                        <td><img width="180" height="180" src="<?php echo base_url('uploads/client/'.$logo_client)?>" alt="" srcset=""></td>
                         
                      </div>
                            <label class="switch switch-danger">
                            <input type="hidden" name="status"  value="0">
                            <input type="checkbox" name="status" class="switch-input" <?=  $status == 1 ?  'checked': '' ?> value="1">
                            <span class="switch-toggle-slider">
                              <span class="switch-on"></span>
                              <span class="switch-off"></span>
                            </span>
                            <span class="switch-label">Status (On/Off)</span>
                          </label>
                          <div class="form-floating form-floating-outline">
                          <input
                            name="logo_client"
                            type="file"
                            class="form-control"
                            id="basic-logo_client"
                            placeholder="landingpage"
                            aria-label="logo_client"
                            aria-describedby="basic-logo_client" />
                          <label for="basic-logo_client">Logo Baru</label>
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                         
                         
                     
                    </div>
                  </div>
                </div>
               
            </div>
<?= $this->endSection() ?>