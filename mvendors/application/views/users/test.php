



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
        <div class="col-main col-sm-9 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>My Inquiry</h2>
            </div>
            <div class="wishlist-item table-responsive">
              
              <table id="table_id" class="display">
               
               <thead> 
               <tr>
                    <th>Enq.Id.</th>
                    <th>Product/Service</th>
                   
                    <th>No. of Vendor Respose</th>
                    <th>No. of Quotations</th>
                    
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Credit Time</th>
                    <th>Order Req. Time</th> 
                    <th>Expectd Date</th> 
                    <th>Message</th>  
                    <th>Status</th> 
                    <th>Refer Id</th>
                    <th>Enq. Date</th> 
                  
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>

                   <?php 
               
                   foreach ($userinq as $value) { ?>
                  <tr>
                   
                    <td><?php echo $value->enq_id; ?></td>

                  <?php if($value->enq_pro_subcat_id !=0 || $value->enq_ser_subcat_id !=0) {?>
                  <td><?php echo $value->sub_category_title;?></td>
                  <?php } else{?>
                  <td><a href="#">N.A.</a></td>
                  <?php }?>

                
                    <?php 
                       //updated 15 dec
                     $sql= "SELECT * FROM tbl_enq_vendor_response  WHERE res_enq_status='Accepted' AND res_enq_id =".$value->enq_id;
                        $query= $this->db->query($sql);
                        $v_count= $query->num_rows();
                    ?>

                  <?php if($v_count>0){?>  
                  <td><a href="<?php echo base_url();?>User/vendors_response/<?php echo $value->enq_id;?>"><button class="button cart-button">View(<?php echo $v_count;?>)</button></a></td>
                  <?php } else{?>
                    <td><?php echo $v_count;?></td>
                  <?php }?>

                    <?php 
                     
                     $sql= 'SELECT * FROM tbl_vendor_quot  WHERE quot_enq_id ='.$value->enq_id;
                        $query= $this->db->query($sql);
                        $q_count= $query->num_rows();
                        
                    ?>
                  <?php if($q_count>0){?>  
                  <td><a href="<?php echo base_url();?>User/view_quots/<?php echo $value->enq_id;?>"><button class="button cart-button">View(<?php echo $q_count;?>)</button></a></td>
                  <?php } else{?>
                    <td><?php echo $q_count;?></td>
                  <?php }?>
                                    
                  <?php if($value->enq_qty !=''){?>  
                  <td><?php echo $value->enq_qty;?></td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                   <?php if($value->enq_unit !=''){?>  
                  <td><?php echo $value->enq_unit;?></td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                   <?php if($value->enq_crdt_time !=''){?>  
                  <td><?php echo $value->enq_crdt_time;?></td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                   <?php if($value->enq_oder_req_time !=''){?>  
                  <td><?php echo $value->enq_oder_req_time;?></td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                   <?php if($value->enq_exptd_date !=''){?>  
                  <td><?php echo $value->enq_exptd_date;?></td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                  <td><?php echo $value->enq_msg;?></td>
                  
                  <td><?php echo $value->enq_status;?></td>

                  <?php if($value->enq_refer_id !='') {?>
                  <td><?php echo $value->enq_refer_id;?></td>
                  <?php } else{?>
                  <td><N.A.</td>
                  <?php }?>

                  <td><?php echo $value->enq_created;?></td>
                                   
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
              
              </ul>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
 