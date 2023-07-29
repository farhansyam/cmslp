<?php $this->extend('layout/User'); ?>

<?= $this->section('content') ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Data Faq</h4>
<div class="card">
                <div class="card-datatable table-responsive pt-0">
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                    <div class="card-header flex-column flex-md-row">
                    </div>
                  </div>
                  <table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" style="width: 1214px;">
                    <thead>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 118.2px;" aria-label="Name: activate to sort column ascending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 118.2px;" aria-label="Name: activate to sort column ascending">No</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 109.2px;" aria-label="Date: activate to sort column ascending">Jawaban</th>
                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" style="width: 143.2px;" aria-label="Status: activate to sort column ascending">Status</th>
                      <th class="sorting_disabled" style="width: 151px;" aria-label="Actions">Actions</th></tr>
                    </thead>
                    <tbody>
                      <tr class="odd">
                        <td valign="top" class="">1</td>
                        <td valign="top" class="">1</td>
                        <td valign="top" class="">1</td>
                        <td valign="top" class="">1</td>
                        <td valign="top" class="">1</td>
                      </tr>
                    </tbody>
                  </table><div class="row"><div class="col-sm-12 col-md-6">
                </div>
              </div>
</div>
<div class="offcanvas offcanvas-end" id="add-new-record" aria-modal="true" role="dialog">
                <div class="offcanvas-header border-bottom">
                  <h5 class="offcanvas-title" id="exampleModalLabel">New Record</h5>
                  <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body flex-grow-1">
                  <form class="add-new-record pt-0 row g-3 fv-plugins-bootstrap5 fv-plugins-framework" id="form-add-new-record" onsubmit="return false" novalidate="novalidate">
                    <div class="col-sm-12 fv-plugins-icon-container">
                      <div class="input-group input-group-merge">
                        <span id="basicFullname2" class="input-group-text"><i class="mdi mdi-account-outline"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input type="text" id="basicFullname" class="form-control dt-full-name" name="basicFullname" placeholder="John Doe" aria-label="John Doe" aria-describedby="basicFullname2">
                          <label for="basicFullname">Full Name</label>
                        </div>
                      </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <div class="col-sm-12 fv-plugins-icon-container">
                      <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class="mdi mdi-briefcase-outline"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input type="text" id="basicPost" name="basicPost" class="form-control dt-post" placeholder="Web Developer" aria-label="Web Developer" aria-describedby="basicPost2">
                          <label for="basicPost">Post</label>
                        </div>
                      </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <div class="col-sm-12 fv-plugins-icon-container">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input type="text" id="basicEmail" name="basicEmail" class="form-control dt-email" placeholder="john.doe@example.com" aria-label="john.doe@example.com">
                          <label for="basicEmail">Email</label>
                        </div>
                      </div>
                      <div class="form-text">You can use letters, numbers &amp; periods</div>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <div class="col-sm-12 fv-plugins-icon-container">
                      <div class="input-group input-group-merge">
                        <span id="basicDate2" class="input-group-text"><i class="mdi mdi-calendar-month-outline"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input type="text" class="form-control dt-date flatpickr-input" id="basicDate" name="basicDate" aria-describedby="basicDate2" placeholder="MM/DD/YYYY" aria-label="MM/DD/YYYY" readonly="readonly">
                          <label for="basicDate">Joining Date</label>
                        </div>
                      </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <div class="col-sm-12 fv-plugins-icon-container">
                      <div class="input-group input-group-merge">
                        <span id="basicSalary2" class="input-group-text"><i class="mdi mdi-currency-usd"></i></span>
                        <div class="form-floating form-floating-outline">
                          <input type="number" id="basicSalary" name="basicSalary" class="form-control dt-salary" placeholder="12000" aria-label="12000" aria-describedby="basicSalary2">
                          <label for="basicSalary">Salary</label>
                        </div>
                      </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div></div>
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1 waves-effect waves-light">Submit</button>
                      <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                  <input type="hidden"></form>
                </div>
              </div>
              </div>
              </div>
        </div>

<?= $this->endSection() ?>