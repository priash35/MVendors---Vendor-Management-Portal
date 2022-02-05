<section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>User Information</h2>
            </div>
            <?php if ($this->session->flashdata('event_success')) { ?>
          <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
          <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
              <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
          <?php } ?>
          <div class="wishlist-item table-responsive">
            <form action="<?php echo base_url('User/update_user_profile');?>" method="post">
            <?php foreach ($userpro as $value) { ?>
              <div class="box-authentication">
                <label for="emmail_login">First Name<span class="required">*</span></label>
                <input type="hidden" name="user_id"value="<?php echo $value->user_id; ?>" class="form-control">
                <input type="text" name="ufname"value="<?php echo $value->ufname; ?>" class="form-control">
                <label for="password_login">Email<span class="required">*</span></label>
                <input name="uemail" type="text" value="<?php echo $value->uemail; ?>" class="form-control" readonly>
               <!--  <label for="password_login">Data Of Birthday<span class="required">*</span></label>
                <input name="udob" value="<?php //echo $value->udob; ?>" type="text" class="form-control"> -->
                
                <!--  <label for="password_login">Gendar<span class="required">*</span></label>
                <input name="ugender" value="<?php echo $value->ugender; ?>" type="text" class="form-control"> -->
                 <label for="password_login">GST Number<span class="required"></span></label>
                <input name="ugst" value="<?php echo $value->ugst; ?>" type="text" class="form-control">
                 <label >Country<span class="required">*</span></label>
                <select class="form-control" id="con" name="con" style="width: 192px;" required>
                  <option value="<?php echo $value->ucountry; ?>"><?php echo $value->country_name; ?></option>	
                  <?php foreach ($country as $key) { ?>
                   <?php if ($value->ucountry != $key->id) { ?>
                     <option value="<?php echo $key->id; ?>"><?php echo $key->country_name; ?></option>	
                   <?php } else { ?>
                 	
                  <?php } } ?>
                </select>

                <label >State<span class="required">*</span></label>
                  <select class="form-control" id="sta" name="sta" style="width: 192px;" required>
                  	<option value="<?php echo $value->state_id; ?>" ><?php echo $value->state_name; ?></option>
                   <?php foreach ($states as $key) { ?>
                 	 <option value="volvo"><?php echo $key->state_name; ?></option>
                  <?php } ?>
                </select>

                <label >City<span class="required">*</span></label>
             		
                  <select class="form-control" id="cty" name="cty" style="width: 192px;" required>
                  	<option value="<?php echo $value->ucity; ?>"><?php echo $value->city_name; ?></option>
                    <?php foreach ($city as $key) { ?>
	                  <option value="<?php echo $key->id; ?>"><?php echo $key->city_name; ?></option>
	                <?php } ?>
                </select>

              </div>
               <div class="box-authentication">
                <label for="emmail_login">Last Name<span class="required">*</span></label>
                <input name="ulname" value="<?php echo $value->ulname; ?>" type="text" class="form-control">
                <label for="password_login">Mobile Number<span class="required">*</span></label>
                <input name="umobile" value="<?php echo $value->umobile; ?>" type="text" class="form-control" readonly>
                 <label for="password_login">Organization Name<span class="required"></span></label>
                <input name="uorganization" value="<?php echo $value->uorganization; ?>"   type="text" class="form-control">
                <label for="password_login">Alternative Mobile Number<span class="required"></span></label>
                <input name="uanumber" value="<?php echo $value->uanumber; ?>" type="text" class="form-control">
                <label for="password_login">Address<span class="required">*</span></label>
                <textarea class="form-control" name="uaddress"><?php echo $value->uaddress; ?></textarea>
                <label for="password_login">Alternative Address<span class="required"></span></label>
                <textarea type="textarea" class="form-control" name="ubaddress" ><?php echo $value->ubaddress; ?></textarea>
                  <button class="button" name="btnupdate"><i class="fa fa-lock"></i>&nbsp; <span>update</span></button>
              </div>
              </form>
            <?php  } ?>
              <!--<table class="col-md-12">
                <thead>
                  <tr>
                    <th class="th-delate">Remove</th>
                    <th class="th-product">Images</th>
                    <th class="th-details">Product Name</th>
                    <th class="th-price">Unit Price</th>
                    <th class="th-total th-add-to-cart">Add to Cart </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="th-delate"><a href="#">X</a></td>
                    <td class="th-product"><a href="#"><img src="images/products/img03.jpg" alt="cart"></a></td>
                    <td class="th-details"><h2><a href="#">Lorem Ipsum is simply</a></h2></td>
                    <td class="th-price">$125.00</td>
                    <th class="td-add-to-cart"><a href="#"> Add to Cart</a></th>
                  </tr>

                </tbody>
              </table>
              <a href="checkout.html" class="all-cart">Add all to cart</a> --></div>
          </div>
        </div>
        <aside class="right sidebar col-sm-3 col-xs-12">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>My Account</h3>
            </div>
            <div class="block-content">
              <ul>
                <li><a href="<?php echo base_url('User/user_Dashboard');?>">Enquiry Dashboard</a></li>
                <li><a href="<?php echo base_url('User/conf_enq');?>">Confirmed Enquiries</a></li>
                  <li><a href="<?php echo base_url('User/completd_enq');?>">Completed Enquiries</a></li>
                <li class="current"><a href="<?php echo base_url('User/user_profile');?>">User Information</a></li>
                <li><a href="<?php echo base_url('User/update_user_password');?>">Change Password</a></li>
                <!-- <li><a href="#">Address Book</a></li>
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
<script>
   $("#con").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("VLogin/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#sta').html(data);
                $('#cty').html('');
            },
        });
    });
   $("#sta").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("VLogin/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#cty').html(data);
            },
            
        });
    });
</script>
<script>
  /*
   function getCity(id) {
   	alert(id);
   	  $.ajax({
            type: 'post', 
            url: '<?php //echo base_url("Vlogin/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#cty').html(data);
            },
            
        });
   	}
*/
</script>