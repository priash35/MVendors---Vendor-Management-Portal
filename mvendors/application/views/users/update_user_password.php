<section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Update Password</h2>
            </div>
            <?php if ($this->session->flashdata('event_success')) { ?>
          <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
          <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
              <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
          <?php } ?>
          <div class="wishlist-item table-responsive">
            <form action="<?php echo base_url('User/update_user_password');?>" method="post">
            <?php foreach ($userpro as $value) { ?>
              <div class="box-authentication">
                <label for="emmail_login">Old Password<span class="required">*</span></label>
                <input type="hidden" name="user_id" value="<?php echo $value->user_id; ?>" class="form-control" required>
                <input type="text" name="oldpass" class="form-control" required>
                <label for="emmail_login">New  Password<span class="required">*</span></label>
                <input name="nupass"  type="text" class="form-control">
                 <label for="emmail_login">Conform  Password<span class="required">*</span></label>
                <input name="nupass"  type="text" class="form-control" required>
                  <button class="button" name="btnupdate"> <span>update</span></button>
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
                <li><a href="<?php echo base_url('User/user_profile');?>">User Information</a></li>
                 <li  class="current"><a href="<?php echo base_url('User/update_user_password');?>">Change Password</a></li>
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
