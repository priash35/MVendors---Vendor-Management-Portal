<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Mvendors</title>
	<!-- Favicon  -->
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets\front/images/footer-logo.png">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/admin/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/admin/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/admin/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/admin/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>/assets/admin/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/main/jquery.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>

	<script src="<?php echo base_url();?>/assets/admin/assets/js/app.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/login.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Page content -->
	<div class="page-content login-cover">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login form -->
				<!-- <form class="login-form wmin-sm-400" action="<?php //echo base_url();?>/Login/register"> -->
					<div class="card mb-0">
						<ul class="nav nav-tabs nav-justified alpha-grey mb-0">
							<li class="nav-item"><a href="#login-tab1" class="nav-link border-y-0 border-left-0 active" data-toggle="tab"><h6 class="my-1">Sign in</h6></a></li>
							<li class="nav-item"><a href="#login-tab2" class="nav-link border-y-0 border-right-0" data-toggle="tab"><h6 class="my-1">Register</h6></a></li>
						</ul>

						<div class="tab-content card-body">
							
							<div class="tab-pane fade show active" id="login-tab1">
								<form class="login-form wmin-sm-400" action="" method="post">
								<div class="text-center mb-3">
									<img src="<?php echo base_url();?>assets/uploads/mvendors_logo.png" alt="fotter logo">
									<!-- <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i> -->
									<h5 class="mb-0">Login to your Vendor account</h5>
									<span class="d-block text-muted">Your credentials</span>
								</div>
								<?php if ($this->session->flashdata('success')) { ?>
									<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
							        <div class="font-weight-semibold"><?= $this->session->flashdata('success') ?> </div></div>
							    <?php } elseif ($this->session->flashdata('error')) { ?>
							    	<div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
									<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
							        <div class="font-weight-semibold"><?= $this->session->flashdata('error') ?> </div></div>
							    <?php } ?>
								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="text" id="username" name="username" class="form-control" placeholder="Enter email" required>
									<div class="form-control-feedback">
										<i class="icon-user text-muted"></i>
									</div>
								</div>

								<div class="form-group form-group-feedback form-group-feedback-left">
									<input type="password" id="password" name="password" class="form-control" placeholder="Enetr password" required>
									<div class="form-control-feedback">
										<i class="icon-lock2 text-muted"></i>
									</div>
								</div>

								<div class="form-group d-flex align-items-center">
									<!-- <div class="form-check mb-0">
										<label class="form-check-label">
											<input type="checkbox" name="remember" class="form-input-styled" checked data-fouc>
											Remember
										</label>
									</div> -->

									<a href="login_password_recover.html" class="ml-auto">Forgot password?</a>
								</div>

								<div class="form-group">
									<button type="submit" id="login" name="login" class="btn btn-primary btn-block">Sign in</button>
								</div>

								<!-- <div class="form-group text-center text-muted content-divider">
									<span class="px-2">or sign in with</span>
								</div>

								<div class="form-group text-center">
									<button type="button" class="btn btn-outline bg-indigo border-indigo text-indigo btn-icon rounded-round border-2"><i class="icon-facebook"></i></button>
									<button type="button" class="btn btn-outline bg-pink-300 border-pink-300 text-pink-300 btn-icon rounded-round border-2 ml-2"><i class="icon-dribbble3"></i></button>
									<button type="button" class="btn btn-outline bg-slate-600 border-slate-600 text-slate-600 btn-icon rounded-round border-2 ml-2"><i class="icon-github"></i></button>
									<button type="button" class="btn btn-outline bg-info border-info text-info btn-icon rounded-round border-2 ml-2"><i class="icon-twitter"></i></button>
								</div>

								<div class="form-group text-center text-muted content-divider">
									<span class="px-2">Don't have an account?</span>
								</div>

								<div class="form-group">
									<a href="#" class="btn btn-light btn-block">Sign up</a>
								</div> -->

								<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>

								</form>
							</div>
						
						<!-- Registration code -->
						
							<div class="tab-pane fade" id="login-tab2">
								<form class="login-form wmin-sm-400" action="<?php echo base_url();?>VLogin/register" method="post">
								<div class="text-center mb-3">
									<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
									<h5 class="mb-0">Create Vendor Account</h5>
									<span class="d-block text-muted">All fields are required</span>
								</div>

								<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" id="fname" name="fname" class="form-control" placeholder="First name" value="" required>
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" value="" required>
												<div class="form-control-feedback">
													<i class="icon-user-check text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="email" id="email" name="email" class="form-control" placeholder="Your email" value="" required>
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="password" id="pass" name="pass" class="form-control" placeholder="Create password" value="" required>
												<div class="form-control-feedback">
													<i class="icon-user-lock text-muted"></i>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" id="vreference" name="vreference" class="form-control" placeholder="referral id" maxlength="10" value="">
												<div class="form-control-feedback">
													<i class="icon-mobile text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="text" id="mobile" name="mobile" class="form-control" placeholder="Your mobile number" maxlength="10" value="" required>
												<div class="form-control-feedback">
													<i class="icon-mobile text-muted"></i>
												</div>
											</div>
										</div>

										<!-- <div class="col-md-6">
											<div class="form-group form-group-feedback form-group-feedback-right">
												<input type="email" class="form-control" placeholder="Repeat email">
												<div class="form-control-feedback">
													<i class="icon-mention text-muted"></i>
												</div>
											</div>
										</div> -->
									</div>
									<br>
									<div class="row">
										
											<button type="submit" id="register" name="register" class="btn bg-dark btn-block">Register</button>
										
									</div>
									</form>
							</div>
							
						</div>
					</div>
				<!-- </form> -->
				<!-- /login form -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>
</html>
