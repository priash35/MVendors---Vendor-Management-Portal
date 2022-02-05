<section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>My Inquiry Responses</h2>
            </div>
            <div class="wishlist-item table-responsive">
              
              <table class="col-md-12" id="table_id">
                <thead>
                  <tr>
                   
                    <th class="th-delate">Sr.No.</th>
                    <th class="th-product">Vendor Name</th>
                    <th class="th-product">Mobile No.</th>
                    <th class="th-product">Email</th>
                    <th class="th-product">Product/Service</th>
                    <th class="th-product">Quantity</th>
                    <th class="th-product">Credit Time</th>
                    <th class="th-product">Order Req. Time</th> 
                    <th class="th-product">Service Expectd Date</th> 
                    <th class="th-details">Message</th>
                    <th class="th-price">Status</th>
                    <th class="th-price">Quotation</th> 

                   
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>
                   <?php 
                   foreach ($vend_list as $value) { ?>
                  <tr>
                    <td class="th-delate"><?php echo $i++; ?></td>

                                  
                  <td class="th-delate"><?php echo $value->bis_name;?></td>
                  
                  
                  <td class="th-delate"><?php echo $value->bis_mnumber;?></td>
                 
                  
                  <td class="th-delate"><?php echo $value->bis_email;?></td>

                  <?php if($value->enq_ser_subcat_id !=0 || $value->enq_pro_subcat_id !=0 ){?>
                  <td class="th-delate"><?php echo $value->sub_category_title;?></td>
                  <?php  } ?>

                  <td class="th-delate"><?php echo $value->enq_qty;?>(<?php echo $value->enq_unit;?>)</td>
                  <td class="th-delate"><?php echo $value->enq_crdt_time;?> Days</td>
                  <td class="th-delate"><?php echo $value->enq_oder_req_time;?> Days</td>
                  
                  <?php if($value->enq_exptd_date!='undefined'){?>
                  <td class="th-delate"><?php echo $value->enq_exptd_date;?></td>
                <?php } else{ ?>
                  <td class="th-delate">N.A.</td><?php } ?>
                  <td class="th-delate" style='white-space:normal; width:25%;'><?php echo $value->enq_msg;?></td>
                  <td class="th-delate"><?php echo $value->res_enq_status;?></td>         <!--updated on 31 dec 2018-->

                  <?php                  
                   $sql= 'SELECT * FROM tbl_vendor_quot WHERE quot_enq_id='.$value->res_enq_id.' AND quot_vend_id='.$value->res_vend_id;
                      $query= $this->db->query($sql);
                      $q_count= $query->num_rows();
                      //echo $q_count;
                  ?>
                  <?php if($q_count>0){?>  
                  <td class="th-delate"><a href="<?php echo base_url();?>User/view_quots/<?php echo $value->res_enq_id;?>"><button class="button cart-button">View(<?php echo $q_count;?>)</button></a></td>
                  <?php } else{?>
                    <td class="th-delate"><?php echo $q_count;?></td>
                  <?php }?>
                 
                  <!-- <td class="th-details"><?php //echo $value->enq_status;?></td> -->
                 
                  </tr>
                   <?php }?>  
                </tbody>
              </table>
           </div>
           
          </div>
        </div>

      


        <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>My Account</h3>
            </div>
            <div class="block-content">
              <ul>

                <li  class="current"><a href="<?php echo base_url('User/user_Dashboard');?>">Enquiry Dashboard</a></li>
                 <li><a href="<?php echo base_url('User/conf_enq');?>">Confirmed Enquiries</a></li>
                  <li><a href="<?php echo base_url('User/completd_enq');?>">Completed Enquiries</a></li>
                <li><a href="<?php echo base_url('User/user_profile');?>">User Information</a></li>
                 <li><a href="<?php echo base_url('User/update_user_password');?>">Change Password</a></li>
              <!--   <li><a href="#">Address Book</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="#">Billing Agreements</a></li>
                <li><a href="#">Recurring Profiles</a></li>
                <li><a href="#">My Product Reviews</a></li>
                <li><a href="#">My Tags</a></li>
                <li class="current"><a href="#">My Wishlist</a></li>
                <li><a href="#">My Downloadable</a></li>
                <li class="last"><a href="#">Newsletter Subscriptions</a></li> -->
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
