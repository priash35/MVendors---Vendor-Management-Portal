<section class="main-container col2-right-layout">
    <div class="main container">
      <?php if ($this->session->flashdata('event_success')) { ?>
    <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
    <?php }elseif ($this->session->flashdata('event_error')) { ?>
      <div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
    <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('event_error') ?> </div></div>
   <?php } ?>
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
              <div class="page-title">
                <h2>Confirmed Inquiries</h2>
              </div>
              <div class="wishlist-item table-responsive">
                
                <table class="col-md-12" id="table_id">
                  <thead>
                    <tr>
                     
                      <th class="th-delate">Enq.Id.</th>
                      <th class="th-price">Vendor Name</th> 
                      <th class="th-product">Mobile No.</th>
                      <th class="th-product">Email</th>
                      <th class="th-product">Product/Service</th>
                      
                      <th class="th-product">Quantity</th>
                      <th class="th-product">Unit</th>
                      <th class="th-product">Credit Time</th>
                      <th class="th-product">Order Req. Time</th> 
                      <th class="th-product">Expectd Date</th> 
                      <th class="th-details">Message</th>  
                      <th class="th-details">Status</th> 
                      <th class="th-product">Refer Id</th>
                      <th class="th-price">Enq.Date</th> 
                      <th class="th-product">Quotations</th>
                      <th class="th-product">Final PO</th>
                      <!-- updated on 14 jan 2019 -->
                      <th class="th-product">Enquiry Bill</th>
                      <th class="th-product">Eway Bill</th>
                      <!-- updated on 14 jan 2019 -->
                      <th class="th-product">Chalan</th>
                      <th class="th-product">Final Enquiry Status</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=1; ?>

                     <?php //print_r($enq_details);
                    
                     foreach ($enq_details as $value) { ?>
                  <tr>
                     
                    <td class="th-delate"><?php echo $value->enq_id; ?></td>

                    <td class="th-delate"><?php echo $value->bis_name; ?></td>

                    <td class="th-delate"><?php echo $value->bis_mnumber; ?></td>
                    
                    <td class="th-delate"><?php echo $value->bis_email; ?></td>
                    
                    <?php if($value->enq_pro_subcat_id !=0 || $value->enq_ser_subcat_id !=0) {?>
                    <td class="th-delate"><?php echo $value->sub_category_title;?></td>
                    <?php } else{?>
                    <td class="th-delate"><a href="#">N.A.</a></td>
                    <?php }?>

                    <?php if($value->enq_qty !=''){?>  
                    <td class="th-delate"><?php echo $value->enq_qty;?></td>
                    <?php } else{?>
                      <td class="th-delate">N.A.</td>
                    <?php }?>

                     <?php if($value->enq_unit !=''){?>  
                    <td class="th-delate"><?php echo $value->enq_unit;?></td>
                    <?php } else{?>
                      <td class="th-delate">N.A.</td>
                    <?php }?>

                     <?php if($value->enq_crdt_time !=''){?>  
                    <td class="th-delate"><?php echo $value->enq_crdt_time;?></td>
                    <?php } else{?>
                      <td class="th-delate">N.A.</td>
                    <?php }?>

                     <?php if($value->enq_oder_req_time !=''){?>  
                    <td class="th-delate"><?php echo $value->enq_oder_req_time;?></td>
                    <?php } else{?>
                      <td class="th-delate">N.A.</td>
                    <?php }?>

                     <?php if($value->enq_exptd_date !=''){?>  
                    <td class="th-delate"><?php echo $value->enq_exptd_date;?></td>
                    <?php } else{?>
                      <td class="th-delate">N.A.</td>
                    <?php }?>

                    <td class="th-delate" style='white-space:normal; width:35%;'><?php echo $value->enq_msg;?></td>
                    
                    <td class="th-details"><?php echo $value->enq_status;?></td>

                    <?php if($value->enq_refer_id !='') {?>
                    <td class="th-delate"><?php echo $value->enq_refer_id;?></td>
                    <?php } else{?>
                    <td class="th-delate"><N.A.</td>
                    <?php }?>

                    <td class="th-details"><?php echo $value->enq_created;?></td>

                    <td class="th-details"><a class="quot_details" data-toggle="modal" data-target="#QuotDetails" data-id="<?php echo $value->enq_id;?>" href="#"><button class="button cart-button">View Quotations</button></a></td>

                    <td class="th-details"><a class="po_details1" data-toggle="modal" data-id="<?php echo $value->enq_id;?>" data-vid="<?php echo $value->res_vend_id;?>" data-userid="<?php echo $value->quot_user_id;?>" data-target="#PODetails1"  href="#"><button class="button cart-button">PO Details</button></a> </td>
<!-- updated on 14 jan 2019 -->
                      
                    <?php 
                      $sql= 'SELECT * FROM tbl_enq_bill  WHERE bill_enq_id ='.$value->enq_id;
                          $query= $this->db->query($sql);
                          $bill= $query->result();
                          //  print_r($eway);
                          if(empty($bill)){ ?>
                          
                           <td class="th-details"> Not Recived. </td>
                      
                        <?php  } 
                          else{ ?>

                     <td class="th-details"><a class="view_En_Bill" data-toggle="modal" data-id="<?php echo $value->enq_id;?>" data-vid="<?php echo $value->res_vend_id;?>" data-qid="<?php echo $value->quot_id;?>" data-target="#view_Enq_Bill"  href="#"><button class="button cart-button">Bill Details</button></a> </td>

                    <?php 
                  }
                      $sql= 'SELECT * FROM tbl_eway_bill  WHERE bill_enq_id ='.$value->enq_id;
                          $query= $this->db->query($sql);
                          $eway= $query->result();
                          //  print_r($eway);
                          if(empty($eway)){ ?>
                          
                           <td class="th-details"> Not Recived. </td>
                      
                        <?php  } 
                          else{ 
                          foreach ($eway as $key) { ?>
                      <td class="th-details"><a target ="_blank" href="<?php echo $key->bill_name;?>"><button class="button cart-button">View</button></a> </td>
                      <?php } } ?>

<!-- updated on 14 jan 2019 -->
                      <?php 
                      $sql= 'SELECT * FROM tbl_chalan  WHERE chalan_enq_id ='.$value->enq_id;
                          $query= $this->db->query($sql);
                          $chalan= $query->result();
                          //  print_r($eway);
                          if(empty($chalan)){ ?>
                          
                           <td class="th-details"> Not Recived. </td>
                      
                        <?php  } 
                          else{ 
                          foreach ($chalan as $val) { ?>
                      <td class="th-details"><a target ="_blank" href="<?php echo $val->chalan_name;?>"><button class="button cart-button">View</button></a> </td>
                      <?php } } ?>


                      <?php if($value->enq_status !='Completed')?>
                     <td class="th-details"><button class="button cart-button" onclick = "add_feed(<?php echo $value->enq_id;?>,<?php echo $value->res_vend_id;?>);">Click to Complete</button></td> 
                                        
                  </tr>
                    <?php }?>  
                  </tbody>
                </table>
              </div>
          </div>
        </div>
 
        

          <!--Previous Quot Popup Start-->          <!-- 20 Dec 2018 -->
 <div id="QuotDetails" class="modal fade">
    <div class="modal-dialog modal-lg login-popup">

        <div class="modal-content" style="height: auto;">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
        
            <div class="modal-body"> 
              <h5>Quotations<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
              <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                      <table id="datatable" class="table table-striped">
                        <thead>
                          <tr>
                            <th>Quot.<br>No.</th>
                            <th>Product/ Service</th>
                            <th>Quantity</th>
                            <th>Delivery Time</th>
                            <th>Total Rate per Unit</th>
                            <th>Transportation Rate</th>
                            <th>Message</th>
                            <th>Terms & Conditions</th> 
                            <th>Quotation Date</th>
                            <th>Attached File</th>
                          </tr>
                        </thead>
                        <tbody class='tbldata2' id='tbldata2'>
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

        </div>
    </div>
      
  </div>
  
 <!--End of Previous Quot Popup--> 

  <!--Quotation Popup Start-->  <!-- 20 Dec 2018 -->
 <div id="PODetails1" class="modal fade">
    <div class="modal-dialog modal-lg login-popup">

        <div class="modal-content" style="height: auto;">
          <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        
          <div class="modal-body" > 
            <div class="row">
              <div class="col-md-12">
               
                <h5>Final PO Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
                
                <div class="table-rep-plugin">
                  <div class="table-responsive" data-pattern="priority-columns">
                    <table id="tbldata10" class="table  table-striped tbldata10">
                    </table>
                        
                  </div>
                </div>
                <hr>
           
              </div>
                      
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>

      </div>
    </div>
      
  </div>
     
 <!--End of Quotation Popup--> 
 <!--enq_Bill details Start-->                 <!-- 14 Jan 2019 -->
 <div id="view_Enq_Bill" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
            <div class="modal-body" > 
                <div class="row">
                  <div class="col-md-12">
                    <h5>Enquiry Bill Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="" ass="price"> </span><br>
                  <div class="table-rep-plugin">
                        <div class="table-responsive" data-pattern="priority-columns">
                            <table id="datatable" class="table table-striped tbldata7">
                             </table>
                        </div>
            </div>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
 </div>
            
<!--End of enq_Bill details Popup--> 

<!--Feedback & Remark Popup Start-->              <!--14 Jan 2019 -->
 <div id="feedback" class="modal fade">
    <div class="modal-dialog  login-popup">
    <div class="modal-content" style="height: auto;">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
            <div class="modal-body"> 
              <h5>Add Remark & Feedback for this User <span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"></span><br> 
                <form id="feedback-form" name="feedback-form"  method="POST">
                  
                  <div class="row">
                        <div class="col-md-12">
                          <input type="hidden" id="enqid" name="enqid" value="">
                          <input type="hidden" id="vid" name="vid" value=""> 
                          <div class="col-md-10 form-group">
                            <label for="feed">Your Feedback<span class="required" style="color: red;">*</span></label>
                          </div>
                          <div class="col-md-10 form-group">
                            <textarea id="feed" name="feed" class="form-control" required></textarea>
                          </div>

                          <div class="col-md-10 form-group">
                            <label for="remark">Your Remark<span class="required" style="color: red;">*</span></label>
                          </div>
                          <div class="col-md-10 form-group">
                            <textarea id="remark" name="remark" class="form-control" required></textarea>
                          </div>
                        </div>
                      </div>
                  <button id="feed_rem" name="feed_rem" class="button btnSubmit"><span>Submit</span></button>
              </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     
 <!--End of Feedback & Remark Popup-->



       
<!-- <aside class="right sidebar col-sm-3 col-xs-12">
    <div class="sidebar-account block">
        <div class="sidebar-bar-title">
          <h3>My Account</h3>
        </div>
        <div class="block-content">
          <ul>

            <li><a href="<?php //echo base_url('User/user_Dashboard');?>">Enquiry Dashboard</a></li>
            <li class="current"><a href="<?php //echo base_url('User/conf_enq');?>">Confirmed Enquiries</a></li>
             <li><a href="<?php //echo base_url('User/completd_enq');?>">Completed Enquiries</a></li>
            <li><a href="<?php //echo base_url('User/user_profile');?>">User Information</a></li>
            <li><a href="<?php //echo base_url('User/update_user_password');?>">Change Password</a></li> -->
              <!--   <li><a href="#">Address Book</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Billing Agreements</a></li>
                <li><a href="#">Recurring Profiles</a></li>
                <li><a href="#">My Product Reviews</a></li>
                <li><a href="#">My Tags</a></li>
                <li class="current"><a href="#">My Wishlist</a></li>
                <li><a href="#">My Downloadable</a></li>
                <li class="last"><a href="#">Newsletter Subscriptions</a></li> -->
         <!--  </ul>
        </div>
    </div>
</aside> -->
  
</div>
</section>
