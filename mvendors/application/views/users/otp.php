<!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
        <div class="page-content">
            <div class="account-login">
         <?php if ($this->session->flashdata('event_success')) { ?>
		<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
	    <?php }elseif ($this->session->flashdata('event_error')) { ?>
	    	<div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
			<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
	        <div class="font-weight-semibold"><?= $this->session->flashdata('event_error') ?> </div></div>
	   <?php } ?> 
        <div class="box-authentication">
          <h4>Login</h4>
          <form action="<?php echo base_url();?>User/set_password" method="post">
         <p class="before-login-text">Welcome back! Sign in to your account</p>
          <label for="emmail_login">User Otp<span class="required">*</span></label>
          <input id="emmail_login" name="uopt" type="text" class="form-control">
          <label for="password_login">Password<span class="required">*</span></label>
          <input id="password_login" name="upass" type="password" class="form-control">
          <p class="forgot-pass"><a href="#">Lost your password?</a></p> <p class="before-login-text"><a href="#">Create Account?</a></p>
           <input type="submit" name="btn_verify" class="btn btn-warning" name="btnlogin">
          <label class="inline" for="rememberme">
        </form>
        </div>
        </div>
      </div>

    </div>
  </section>
  <!-- Main Container End --> 

  