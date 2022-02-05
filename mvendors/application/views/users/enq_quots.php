<section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>My Quotations</h2>
            </div>
            <div class="wishlist-item table-responsive">
              
              <table class="col-md-12" id="table_id" >
                <thead>
                  <tr>
                   	<th>Mark</th>                               <!-- update 27 Dec 2018 -->
                    <th class="th-delate">Quot.Id.</th>
                    <th class="th-product">Vendor Name</th>
                    <th class="th-product">Mobile No.</th>
                    <th class="th-product">Email</th>
                    <th class="th-product">Product/Service</th> 
                    
                    <th class="th-product">Quantity</th>
                    <th class="th-product">Delivery Time</th>
                    <th class="th-product">Rate Per Unit(Including GST)</th>
                   
                    <th class="th-product">Transportation Rate</th>

                     
                    <th class="th-details">Message</th>
                    <th class="th-details">Terms & Conditions</th>
                    <th class="th-price">Quotation Attachment</th> 
                    <th class="th-price">PO</th>
                    <th class="th-price">View Previous PO</th>

                    <!-- <th class="th-total th-add-to-cart"></th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                   <?php //print_r($quot_list);
                   foreach ($quot_list as $value) { ?>
                  <tr>
                    <!-- update 27 Dec 2018 -->
                    <td class="th-delate"><input type="checkbox" class="sub_chk"  value="<?php echo $value->quot_id;?>" <?php if($value->quot_status=='Selected') echo 'checked'; ?> ></td>
                  <td class="th-delate"><?php echo $value->quot_id;?></td>

                  <!--   <td class="th-product"><a href="#"><img src="images/products/img03.jpg" alt="cart"></a></td> -->
                  
                  <td class="th-delate"><?php echo $value->bis_name;?></td>
                  
                  <td class="th-delate"><?php echo $value->bis_mnumber;?></td>
                 
                  <td class="th-delate"><?php echo $value->bis_email;?></td>

                  <td class="th-delate"><?php echo $value->sub_category_title;?></td>

                  <td class="th-delate"><?php echo $value->quot_qty;?>(<?php echo $value->enq_unit;?>)</td>

                  <td class="th-delate"><?php echo $value->quot_deli_time;?> Days</td>

                  <td class="th-delate">Rs. <?php echo $value->quot_tot_rate;?></td>

                  <td class="th-delate">Rs. <?php echo $value->quot_trans_rate;?></td>

                  <td class="th-delate" style='white-space:normal; width:25%;'><?php echo $value->quot_msg;?></td>

                  <td class="th-delate"><?php echo $value->quot_terms_cond;?></td>

                <?php if($value->quot_name!=''){?>
                  <td class="th-delate"><a target="_blank" href="<?php echo $value->quot_name;?>"><button class="button cart-button">Veiw</button></a></td>
                <?php }else{ ?>
                  <td class="th-delate">N.A.</td>
                <?php }?>

                  <?php if ($value->enq_status =='Active'){?>
                  <td class="th-delate"><a href="<?php echo base_url();?>User/send_po_view/<?php echo $value->quot_id;?>" ><button class="button cart-button">Send</button></a></td>
                <?php } else{?>
                  <td class="th-delate"><a href="<?php //echo base_url();?>User/send_po_view/<?php echo $value->quot_id;?>" ><button class="button cart-button" style="cursor: not-allowed;" disabled>Send</button></a></td>
               <?php }?>
                  
                 <?php                  
                   $sql= 'SELECT * FROM tbl_user_po WHERE po_quot_id='.$value->quot_id.' AND po_vend_id='.$value->quot_vend_id;
                      $query= $this->db->query($sql);
                      $p_count= $query->num_rows();
                      //echo $q_count;
                  ?>
                  <?php if($p_count>0){?> 

                    
                  <td class="th-delate"><a class="po_details" data-toggle="modal" data-target="#PoDetails" data-id="<?php echo $value->quot_id;?>" href="#"><button class="button cart-button">View(<?php echo $p_count;?>)</button></a></td>
                  <?php } else{?>
                    <td class="th-delate"><?php echo $p_count;?></td>
                  <?php }?>

                  <!-- <td class="th-delate"><a href="<?php //echo $value->quot_name;?>"><button class="button cart-button">Veiw</button></a></td> -->
                  <!-- <th class="td-add-to-cart"><a href="#">Contact</a></th> -->
                  </tr>
                   <?php }?>  
                </tbody>
              </table>
            <!--   <a href="checkout.html" class="all-cart">Add all to cart</a>  -->
          </div>
           
          </div>
        </div>

  <!--Previous PO Popup Start-->          <!-- updated on 19 Dec 2018 -->
 <div id="PODetails" class="modal fade">
    <div class="modal-dialog modal-lg login-popup">

        <div class="modal-content" style="height: auto;">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
        
            <div class="modal-body"> 
              <h5>All PO<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
              <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped">
                          <thead>
                <tr>
                  <th>Sr.<br>No.</th>
                  <th>Product/ Service</th>
                  <th>Quantity</th>
                  <th>Delivery Time</th>
                  <th>Credit Time</th>
                  <th>Rate</th>
                  <th>Message</th>
                  <th>Terms & Conditions</th> 
                  <th>PO Date</th>
                  <th>Status</th>
                  <th>Attached File</th>

                </tr>
              </thead>
              <tbody class='tbldata1' id='tbldata1'>
                
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
  
 <!--End of Previous PO Popup--> 

      


        <!-- <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>My Account</h3>
            </div>
            <div class="block-content">
              <ul>

                <li class="current"><a href="<?php //echo base_url('User/user_Dashboard');?>">Enquiry Dashboard</a></li>
                 <li><a href="<?php //echo base_url('User/conf_enq');?>">Confirmed Enquiries</a></li>
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
    </div>
  </section>
