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
                    <th>Action</th>
                    <!-- <th class="th-total th-add-to-cart"></th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; ?>

                   <?php 
                  
                   foreach ($userinq as $value) { ?>
                  <tr>
                  
                    <td class="th-delate"><?php echo $value->enq_id; ?></td>

                  
                  <?php if($value->enq_pro_subcat_id !=0 || $value->enq_ser_subcat_id !=0) {?>
                  <td class="th-delate"><?php echo $value->sub_category_title;?></td>
                  <?php } else{?>
                  <td class="th-delate"><a href="#">N.A.</a></td>
                  <?php }?>

                  <?php 
                   
                   //updated 15,31 dec
                   $sql= "SELECT * FROM tbl_enq_vendor_response  WHERE (res_enq_status='Accepted' OR res_enq_status='Deal' OR res_enq_status='Completed' OR res_enq_status ='Closed') AND res_enq_id =".$value->enq_id;

                      $query= $this->db->query($sql);
                      $v_count= $query->num_rows();
                      //echo $value->enq_id;
                  ?>

                  <?php if($v_count>0){?>  
                  <td class="th-delate"><a href="<?php echo base_url();?>User/vendors_response/<?php echo $value->enq_id;?>"><button class="button cart-button">View(<?php echo $v_count;?>)</button></a></td>
                  <?php } else{?>
                    <td class="th-delate"><?php echo $v_count;?></td>
                  <?php }?>

                  <?php 
                   
                   $sql= 'SELECT * FROM tbl_vendor_quot WHERE quot_enq_id ='.$value->enq_id;
                      $query= $this->db->query($sql);
                      $q_count= $query->num_rows();
                     
                  ?>
                  <?php if($q_count>0){?>  
                  <td class="th-delate"><a href="<?php echo base_url();?>User/view_quots/<?php echo $value->enq_id;?>"><button class="button cart-button">View(<?php echo $q_count;?>)</button></a></td>
                  <?php } else{?>
                    <td class="th-delate"><?php echo $q_count;?></td>
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

                  <td class="th-delate" style="white-space:normal;"><?php echo $value->enq_msg;?></td>
                  
                  <td class="th-details"><?php echo $value->enq_status;?></td>

                  <?php if($value->enq_refer_id !='') {?>
                  <td class="th-delate"><?php echo $value->enq_refer_id;?></td>
                  <?php } else{?>
                  <td class="th-delate"><N.A.</td>
                  <?php }?>

                  <td class="th-details"><?php echo $value->enq_created;?></td>

                  <?php 
                      $sql= 'SELECT * FROM tbl_user_po  WHERE po_enq_id  ='.$value->enq_id;
                      $query= $this->db->query($sql);
                      $p_count= $query->num_rows();
                   ?>

                  <?php if($p_count == 0 && $value->enq_status!='Closed'){?>  
                    <td class="th-delate"><a href="#" onclick="close_enq(<?php echo $value->enq_id;?>);"><button class="button cart-button">Close</button></a></td>
                  <?php } else{
                    if($value->enq_status!='Closed'){ ?>
                        <td class="th-delate">PO Sent.</td>
                    <?php } else{ ?>
                      <td class="th-delate">N.A.</td>
                   <?php }
                 }?>
                  
                  </tr>
                   <?php }?>  
                </tbody>
              </table>
          </div>
           
          </div>
        </div>
       <!--  <aside class="right sidebar col-sm-3 col-xs-12">
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
            <!--   </ul>
            </div>
          </div>
        </aside> -->
      </div>
    </div>
  </section>

  <script type="text/javascript">
    function close_enq(enq_id)          //Updated on 10 Jan 2019
        { 
          //alert(enq_id);
          if(enq_id!="")
          {
            var conf= confirm("Once you Close this Enquiry, vendors wont be able to send you quotations!");

            
            if(conf)
            {
              
               var feedback = prompt("Give your Feedback, why do you want to close this enquiry? : ", "Your feedback");
               if(feedback){
                //document.write("You have entered : " + feedback);
                window.location.href= "<?php echo site_url('User/close_enqForall');?>?id="+enq_id+"&feedback="+feedback;
              }
              else{
                alert('Please give feedback before you close this enquiry.');
              }
          }
        }
      }

  </script>
