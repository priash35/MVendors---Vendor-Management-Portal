
<section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Send PO</h2>
              <hr>
            </div>
            <div class="row">

              <div class="col-md-3">
                <?php 
                  foreach ($enq_ved_details as $key) {
                  
                ?>
                <h5>Enquiry Details</h5>
                 
              <table class="table table-responsive table-condensed" >
                  <tbody>

                    <tr>
                      <th class="th-delate" style="font-weight: bold;">Enq.Id.</th>
                      <td class="th-delate"><?php echo $key->enq_id; ?></td>
                    </tr>
                    
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Product/Service</th>
                      <td class="th-delate"><?php echo $key->sub_category_title;?></td>
                    </tr>
                   
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Quantity</th>
                      <td class="th-delate"><?php echo $key->enq_qty;?>(<?php echo $key->enq_unit;?>)</td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;">Order Req. Time(Days)</th>
                      <td class="th-delate"><?php echo $key->enq_oder_req_time;?></td>
                    </tr>
                    
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Credit Time(Days)</th>
                      <td class="th-delate"><?php echo $key->enq_crdt_time;?></td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;">Message</th> 
                      <td class="th-delate" style="white-space:normal; width:35%;"><?php echo $key->enq_msg;?></td>
                    </tr>
                    
                    <tr>
                      <th class="th-price" style="font-weight: bold;">Attached Quotation</th>
                       <?php if($key->atch_name!=''){?> 
                      <td><a target='_blank' class='btn badge bg-success badge-pill' href="<?php echo $key->atch_name;?>">View</a></td>
                      <?php } else {?>
                        <td>N.A.</td>
                      <?php }?>
                    </tr>

                  </tbody>
               
              </table>
            </div>

              <div class="col-md-3">
               
               <h5>Quotation Details</h5>
                 
              <table class="table table-responsive table-condensed" >
                  <tbody>

                    <tr>
                      <th class="th-delate" style="font-weight: bold;">Quot.Id.</th>
                      <td class="th-delate"><?php echo $key->quot_id; ?></td>
                    </tr>
                    
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Product/Service</th>
                      <td class="th-delate"><?php echo $key->sub_category_title;?></td>
                    </tr>
                   
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Quantity</th>
                      <td class="th-delate"><?php echo $key->quot_qty;?>(<?php echo $key->enq_unit;?>)</td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;">Delivery Time(Days)</th>
                      <td class="th-delate"><?php echo $key->quot_deli_time;?></td>
                    </tr>

                      
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Total Rate per Unit(Including GST)</th>
                      <td class="th-delate">Rs. <?php echo $key->quot_tot_rate;?></td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;" >Transportation Rate</th>
                      <td class="th-delate">Rs. <?php echo $key->quot_trans_rate;?></td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;">Message</th> 
                      <td class="th-delate" style="white-space:normal; width:35%;"><?php echo $key->quot_msg;?></td>
                    </tr>
                    
                    <tr>
                      <th class="th-price" style="font-weight: bold;">Terms & Conditions</th> 
                      <td class="th-delate" style="white-space:normal; width:35%;"><?php echo $key->quot_terms_cond;?></td>
                    </tr>

                    <tr>
                      <th class="th-price" style="font-weight: bold;">Attached Quotation</th>
                       <?php if($key->quot_name!=''){?> 
                      <td><a target='_blank' class='btn badge bg-success badge-pill' href="<?php echo $key->quot_name;?>">View</a></td>
                    <?php } else {?>
                      <td>N.A.</td>
                    <?php }?>
                    </tr>

                  </tbody>
               
              </table>

        </div>
              
            <div class="col-md-6">
              <h5>PO Form</h5>

              <form id="po-form" name="po-form" enctype="multipart/form-data" method="POST" action="<?php echo base_url("User/upload_po");?>">
                
                  <input type="hidden" name="enqId" id="enqId" value="<?php echo $key->enq_id;?>">

                  <input type="hidden" name="vendId" id="vendId" value="<?php echo $key->quot_vend_id;?>" >

                  <input type="hidden" name="quot" id="quot" value="<?php echo $key->quot_id;?>" >
                  
                <div class="table-rep-plugin">
                <div class="table-responsive" data-pattern="priority-columns">
                        
               
                <table class="table table-responsive table-condensed">
                  <?php if($po_data) {
                 
                    foreach ($po_data as $value) { ?>
                  
                <tbody>

                   <tr>
                    <th class="th-product" style="font-weight: bold;">PO Id</th>
                    <td class="th-delate"><input type="text" class="form-control" readonly></td>
                  </tr>
                 
                  <tr>
                    <th class="th-product" style="font-weight: bold;">Product/Service</th>
                    <td class="th-delate"><input id="po_subcat" name="po_subcat" type="text" class="form-control" value="<?php echo $key->sub_category_title;?>" readonly></td>
                  </tr>
                 
                  <tr>
                    <th class="th-product" style="font-weight: bold;">Quantity</th>
                    
                      <td class="th-delate">
                        
                          <input id="po_qty" name="po_qty" type="number" class="form-control" value="<?php echo $value->po_qty;?>" required>
                            
                      </td>
                    
                  </tr>

                   <tr>
                      <th class="th-product" style="font-weight: bold;">Delivery Time(Days)</th>
                      <td class="th-delate">
                        
                        <input id="po_dtime" name="po_dtime" type="number" class="form-control" value="<?php echo $value->po_deli_time;?>" required>
                                                 
                      </td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;">Credit Time(Days)</th>
                      <td class="th-delate">
                        
                        <input id="po_crtime" name="po_crtime" type="number" class="form-control" value="<?php echo $value->po_credit_time;?>" required>
                                                 
                      </td>
                    </tr>
                  
                    <tr>
                      <th class="th-product" style="font-weight: bold;">Rate(Rs)</th>
                      <td class="th-delate"><input id="po_rate" name="po_rate" type="text" class="form-control" value="<?php echo $value->po_rate;?>" required ></td>
                    </tr>
                 
                  <tr>
                    <th class="th-product" style="font-weight: bold;">Message</th> 
                    <td class="th-delate"><textarea id="po_msg" name="po_msg" required><?php echo $value->po_msg;?></textarea></td>
                  </tr>
                  
                  <tr>
                    <th class="th-price" style="font-weight: bold;">Terms & Conditions</th> 
                    <td class="th-delate"><textarea id="po_terms" name="po_terms" width="40" required><?php echo $value->po_terms_cond;?></textarea></td>
                  </tr>

                  <tr>
                    <th class="th-price" style="font-weight: bold;">Upload PO</th>
                  <td>
                    <input type="file" class="form-control fileUpload" id="po" name= "po">
                    <!--17/01/2019 -->   
                     
                    <div class="upload-demo">
                        <div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
                    </div>

                    <!--17/01/2019 --> 

                   <!--  <img src="<?php //echo $value->po_name; ?>" class="img-thumbnail" alt="Purchase Order"> 
                    <input type="hidden" class="form-control" id="po" name= "po" value= "<?php //echo $value->po_name; ?>"> -->
                    </td>
                  </tr>

                </tbody>
                <?php  } }
                else { ?>
                  <tbody>
                 
                   <tr>
                    <th class="th-product" style="font-weight: bold;">PO Id</th>
                    <td class="th-delate"><input type="text" class="form-control" readonly></td>
                  </tr>

                  <tr>
                    <th class="th-product" style="font-weight: bold;">Product/Service</th>
                    <td class="th-delate"><input id="po_subcat" name="po_subcat" type="text" class="form-control" value="<?php echo $key->sub_category_title;?>" readonly></td>
                  </tr>
                 
                  <tr>
                    <th class="th-product" style="font-weight: bold;">Quantity</th>
                      <td class="th-delate">
                        <input id="po_qty" name="po_qty" type="number" class="form-control" value="<?php echo $key->quot_qty;?>" required>
                      </td>
                    
                  </tr>

                   <tr>
                      <th class="th-product" style="font-weight: bold;">Delivery Time(Days)</th>
                      <td class="th-delate">
                        
                          <input id="po_dtime" name="po_dtime" type="number" class="form-control" value="<?php echo $key->quot_deli_time;?>" required>
                      </td>
                    </tr>

                    <tr>
                      <th class="th-product" style="font-weight: bold;">Credit Time(Days)</th>
                      <td class="th-delate">
                        
                        <input id="po_crtime" name="po_crtime" type="number" class="form-control" value="<?php //echo $value->po_deli_time;?>" required>
                                                 
                      </td>
                    </tr>
                  
                  <tr>
                    <th class="th-product" style="font-weight: bold;">Rate(Rs)</th>
                    <td class="th-delate"><input id="po_rate" name="po_rate" type="text" class="form-control" value="<?php echo $key->quot_tot_rate;?>" required ></td>
                  </tr>

                  <tr>
                    <th class="th-product" style="font-weight: bold;">Message</th> 
                    <td class="th-delate"><textarea id="po_msg" name="po_msg" required></textarea></td>
                  </tr>
                  
                  <tr>
                    <th class="th-price" style="font-weight: bold;">Terms & Conditions</th> 
                    <td class="th-delate"><textarea id="po_terms" name="po_terms" width="40" required></textarea></td>
                  </tr>

                  <tr>
                    <th class="th-price" style="font-weight: bold;">Upload PO</th>
                    
                    <td> <input type="file" class="form-control" id="po" name= "po">
                    <input type="file" class="form-control fileUpload" id="po" name= "po">
                    <!--17/01/2019 -->   
                     
                    <div class="upload-demo">
                        <div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
                    </div>

                    <!--17/01/2019 --> 
</td>
                  </tr>

                </tbody>
               <?php } } ?>
               
              </table>
              <div class="col-md-6">
                <button id="po_upload" name="po_upload" class="button btnSubmit">&nbsp; <span>Send</span></button>
              </div>

            </div>
          </div>
            
         </form>
        </div>
       </div>
                
      </div>
     </div>
  
  <!-- <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>My Account</h3>
            </div>
            <div class="block-content">
              <ul>

                <li  class="current"><a href="<?php //echo base_url('User/user_Dashboard');?>">Enquiry Dashboard</a></li>
                 <li><a href="<?php //echo base_url('User/conf_enq');?>">Confirmed Enquiries</a></li>
                  <li><a href="<?php //echo base_url('User/completd_enq');?>">Completed Enquiries</a></li>
                <li><a href="<?php //echo base_url('User/user_profile');?>">User Information</a></li>
                 <li><a href="<?php //echo base_url('User/update_user_password');?>">Change Password</a></li>
                <!--   <li><a href="#">Address Book</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Billing Agreements</a></li>
                <li><a href="#">Recurring Profiles</a></li>
                <li><a href="#">My Product Reviews</a></li>
                <li><a href="#">My Tags</a></li>
                <li class="current"><a href="#">My Wishlist</a></li>
                <li><a href="#">My Downloadable</a></li>
                <li class="last"><a href="#">Newsletter Subscriptions</a></li> -->
             <!-- </ul>
            </div>
          </div>
        </aside> -->
       </div>
    </div>
</section>
