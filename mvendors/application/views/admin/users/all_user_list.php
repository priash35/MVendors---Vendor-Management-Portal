  <!-- Theme JS files -->
  <script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
  <script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>
  <script src="<?php echo base_url();?>/assets/admin//global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>


      <!-- Content area -->
      <div class="content">
        <!-- Right icons -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            
              <div class="card-body">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a href="#right-icon-pill1" class="nav-link active" data-toggle="tab">User Info  <i class="icon-menu7 ml-2"></i></a></li>
                <!--   <li class="nav-item"><a href="#right-icon-pill7" class="nav-link active" data-toggle="tab"><i class="icon-menu7 ml-2"></i></a></li> -->
                  <li class="nav-item"><a href="#right-icon-pill2" class="nav-link" data-toggle="tab">User Inquiry <i class="icon-menu7 ml-2"></i></a></li>
                  
                  <!--<li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown <i class="icon-gear ml-2"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a href="#right-icon-pill3" class="dropdown-item" data-toggle="tab">Accepted Enquiries</a>
                      <a href="#right-icon-pill4" class="dropdown-item" data-toggle="tab">Another pill</a>
                    </div>
                  </li>-->
                  <li class="nav-item"><a href="#right-icon-pill3" class="nav-link " data-toggle="tab">Confirmed Enquiries<i class="icon-menu7 ml-2"></i></a></li>
                  <!-- <li class="nav-item"><a href="#right-icon-pill5" class="nav-link " data-toggle="tab">Confirmed Enquiries <i class="icon-menu7 ml-2"></i></a></li> -->
                  <li class="nav-item"><a href="#right-icon-pill6" class="nav-link " data-toggle="tab">Completed Enquiries <i class="icon-menu7 ml-2"></i></a></li>
                </ul>

                <div class="tab-content">
                  <div class="tab-pane fade show active" id="right-icon-pill1">
                           <div class="card-body">
                        <form action="<?php echo base_url('Vendor/UpdateUserInfo'); ?>" method="post">
                          <div class="row">
                            <div class="col-md-6">
                              <fieldset>
                                <legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> User Details</legend>
                                <?php foreach ($uinfo as $key) { ?>
                                
                                
                                <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Name:</label>
                                  <div class="col-lg-9">
                                    <div class="row">
                                      <div class="col-md-6">
                                         <input type="hidden" name="uid" class="form-control" value="<?php echo $key->user_id; ?>"> 
                                        <input type="text" name="ufname" class="form-control" value="<?php echo $key->ufname; ?>">
                                      </div>

                                      <div class="col-md-6">
                                        <input type="text" name="ulname" class="form-control" value="<?php echo $key->ulname; ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Email :</label>
                                  <div class="col-lg-9">
                                    <input type="text" name="uemail" class="form-control" value="<?php echo $key->uemail; ?>" readonly style="background-color:moccasin;">
                                  </div>
                                </div>

                                <!--<div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Pincode:</label>
                                  <div class="col-lg-9">
                                    <input type="text" class="form-control" value="<?php //echo $key->upincode; ?>"> 
                                  </div>
                                </div> -->

                                <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Address:</label>
                                  <div class="col-lg-9">
                                    <textarea rows="5" cols="5" name="uaddress" class="form-control"> <?php echo $key->uaddress; ?></textarea>
                                  </div>
                                </div>
                                
                                
                              </fieldset>
                            </div>

                            <div class="col-md-6">
                              <fieldset>
                                        <legend class="font-weight-semibold"><!-- <i class="icon-truck mr-2"></i> --> <br></legend>
                                        <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Phone #:</label>
                                  <div class="col-lg-9">
                                    <input type="text" name="umobile" value="<?php echo $key->umobile; ?>"  class="form-control" readonly style="background-color:moccasin;">
                                  </div>
                                </div>

                              

                                <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Phone #:</label>
                                  <div class="col-lg-9">
                                    <input type="text" name="uanumber" value="<?php echo $key->uanumber; ?>"  class="form-control">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Permanent Address:</label>
                                  <div class="col-lg-9">
                                    <textarea rows="5" cols="5" name="ubaddress" class="form-control"><?php echo $key->ubaddress; ?></textarea>
                                  </div>
                                </div>
                                <!--<div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Location:</label>
                                  <div class="col-lg-9">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                                       <input type="text" class="form-control" placeholder="Eugene Kopyov">
                                                      </div>

                                                      <input type="text" placeholder="ZIP code" class="form-control">
                                      </div>

                                      <div class="col-md-6">
                                        <input type="text" placeholder="State/Province" class="form-control mb-3">
                                        <input type="text" placeholder="City" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group row">
                                  <label class="col-lg-3 col-form-label">Established Date:</label>
                                  <div class="col-lg-9">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <div class="mb-3">
                                                       <input type="text" class="form-control" placeholder="Eugene Kopyov">
                                                      </div>
                                                      <label>Opening Time:</label>
                                                      <input type="text" placeholder="ZIP code" class="form-control">
                                      </div>

                                      <div class="col-md-6">
                                        <input type="textarea" placeholder="State/Province" class="form-control mb-3">
                                        <label>Closing Time:</label>
                                        <input type="text" placeholder="City" class="form-control">
                                      </div>
                                    </div>
                                  </div>
                                </div>-->

              
                                <?php  } ?>
                              </fieldset>
                            </div>
                          </div>

                          <div class="text-right">
                            <button type="submit" name="btn_update" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                          </div>
                        </form>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="right-icon-pill7">
               
                  </div>
                  <div class="tab-pane fade" id="right-icon-pill2">
                    <!-- Basic initialization -->
                      <div class="card">
                        <table class="table datatable-button-init-basic">
                          <thead>
                            <tr>
                              <th>Inq ID</th>
                              <th>Product / Services</th>
                              <th>Quantity</th>
                              <th>Creidt Time</th>
                              <th>Order Time</th>
                              <th>Excapted Date</th>
                              <th>Message</th>
                              <th>Enq Date</th>
                              <th>Enq Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($uinq as $key) { ?>
                            <tr>
                              <td><?php echo $key->enq_id ?></td>
                              <td><?php echo $key->enq_type ?></td>
                              <td><?php echo $key->enq_add ?></td>
                              <td><?php echo $key->enq_country ?></td>
                              <td><?php echo $key->enq_state ?></td>
                              <td><?php echo $key->enq_city ?></td>
                              <td><?php echo $key->enq_msg ?></td>
                              <td><?php echo $key->enq_created ?></td>
                              <td><?php echo $key->enq_endDate ?></td> 
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /basic initialization -->
                  </div>

                  <div class="tab-pane fade" id="right-icon-pill3">
                      <!-- Basic initialization -->
                      <div class="card">
                        <table class="table datatable-button-init-basic">
                          <thead>
                            <tr>
                              <th>Product / Services</th>
                              <th>Quantity</th>
                              <th>Creidt Time</th>
                              <th>Order Time</th>
                              <th>Excapted Date</th>
                              <th>Message</th>
                              <th>Enq Date</th>
                              <th>Enq Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($uconfinq as $key) { ?>
                            <tr>
                              <td><?php echo $key->enq_id ?></td>
                              <td><?php echo $key->enq_qty ?></td>
                              <td><?php echo $key->enq_crdt_time ?></td>
                              <td><?php echo $key->enq_oder_req_time ?></td>
                              <td><?php echo $key->enq_exptd_date ?></td>
                              <td><?php echo $key->enq_msg ?></td>
                              <td><?php echo $key->enq_endDate ?></td>
                              <td><?php echo $key->enq_udated ?></td> 
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /basic initialization -->
                  </div>

                  <div class="tab-pane fade" id="right-icon-pill4">
                    Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
                  </div>
                 
                  <div class="tab-pane fade" id="right-icon-pill6">
                    <!-- Basic initialization -->
                      <div class="card">
                        <table class="table datatable-button-init-basic">
                          <thead>
                            <tr>
                              <th>Product / Services</th>
                              <th>Quantity</th>
                              <th>Creidt Time</th>
                              <th>Order Time</th>
                              <th>Excapted Date</th>
                              <th>Message</th>
                              <th>Enq Date</th>
                              <th>Enq Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($ucompeteinq as $key) { ?>
                            <tr>
                              <td><?php echo $key->enq_id ?></td>
                              <td><?php echo $key->enq_qty ?></td>
                              <td><?php echo $key->enq_crdt_time ?></td>
                              <td><?php echo $key->enq_oder_req_time ?></td>
                              <td><?php echo $key->enq_exptd_date ?></td>
                              <td><?php echo $key->enq_msg ?></td>
                              <td><?php echo $key->enq_created ?></td>
                              <td><?php echo $key->enq_endDate ?></td> 
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <!-- /basic initialization -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /right icons -->

      </div>
      <!-- /content area -->
