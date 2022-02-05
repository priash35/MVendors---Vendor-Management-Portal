<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script> 
    <script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_multiselect.js"></script>
    <script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/picker_date.js"></script>

<div class="content">
				<!-- Tab icons -->
				<div class="mb-3 mt-2">
					<?php if ($this->session->flashdata('event_success')) { ?>
					<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
					<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
			        <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
			    <?php } ?>
				</div>
				<!-- /tab icons title -->
				

				<!-- Left icons -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<ul class="nav nav-tabs nav-tabs-highlight">
									<li class="nav-item"><a href="#left-icon-tab1" class="nav-link legitRipple active show" data-toggle="tab"><i class="icon-menu7 mr-2"></i> Edit Profile</a></li>
									<li class="nav-item"><a href="#left-icon-tab2" class="nav-link legitRipple " data-toggle="tab"><i class="icon-menu7 mr-2"></i> Profile</a></li>
									<li class="nav-item"><a href="#left-icon-tab3" class="nav-link legitRipple" data-toggle="tab"><i class="icon-menu7 mr-2"></i>Change Password</a></li>
								</ul>
								<?php foreach ($profile as $value) {?>
								<div class="tab-content">
									<div class="tab-pane fade active show" id="left-icon-tab1">
										<div class="row">
											<div class="col-xl-3 col-sm-6">
												<div class="card">
													<div class="card-body text-center">
														<div class="card-img-actions d-inline-block mb-3">
															<?php if($value->apro_pic =='') { ?>
																<img class="img-fluid rounded-circle" src="<?php echo base_url();?>assets\uploads\admin\admin.png" width="170" height="170" alt="">
															<?php }else {  ?>
															<img class="img-fluid rounded-circle" src="<?php echo base_url();?>assets\uploads\admin\<?php echo $value->apro_pic ?>" width="170" height="170" alt="">
														<?php }?>
														</div>
													</div>
												</div>

											</div>

										<div>
									<table class="table table-bordered datatable-complex-header">
								
								<thead>
									<tr>
			                           <!--  <th rowspan="2">Name</th> -->
			                             <td>Name :</td>
			                             <th><?php echo $value->afname; ?> <?php echo $value->alname; ?></th>
			                            <!-- <th colspan="2">HR Information</th>
			                            <th colspan="3">Contact</th> -->
			                        </tr>
			                      
								</thead>
								<tbody>
						            <tr>
		                                <td>Address :</td>
		                                <th><?php echo $value->aaddress; ?></th>
			                        </tr>
			                     	<tr>
		                                <td>Gender :</td>
		                                <th><?php echo $value->agender; ?></th>
			                        </tr>
			                        <tr>
		                                <td>Email Id :</td>
		                                <th><?php echo $value->aemail; ?></th>
			                        </tr>
			                        <tr>
		                                <td>Contact No :</td>
		                                <th><?php echo $value->amobile; ?></th>
			                        </tr>
						        </tbody>
						   
							</table>
				</div>
											</div>
									</div>

									<div class="tab-pane fade " id="left-icon-tab2">
										<div class="row">
										<div>
											<form action="updateAdminPro" method="post" enctype="multipart/form-data">
												<div class="card">
													<div class="card-body text-center">
														<div class="card-img-actions d-inline-block mb-3">
															<?php if($value->apro_pic =='') { ?>
																<img class="img-fluid rounded-circle" src="<?php echo base_url();?>assets\uploads\admin\admin.png" width="170" height="170" alt="">
															<?php }else {  ?>
															<img class="img-fluid rounded-circle" src="<?php echo base_url();?>assets\uploads\admin\<?php echo $value->apro_pic ?>" width="170" height="170" alt="">
														<?php }?>


														<input type="file" id="admin_image" name="admin_image"  class="form-control-uniform" data-fouc>
														<input type="hidden" id="admin_image" name="old_admin_image" value="<?php echo $value->apro_pic; ?>" class="form-control-uniform" data-fouc>

														</div>
													</div>
													
												</div>

											</div>
										<div class="col-md-4">

												<!-- Custom background -->
												
													<div class="card">
														<div class="card-body">
															<div class="form-group">
																<label>First Name:</label>
																<input type="hidden" name="adid" class="form-control" value="<?php echo $value->admin_id; ?>">
																<input type="text" name="fname" class="form-control" value="<?php echo $value->afname; ?>"	 placeholder="First Name">
															</div>

															<div class="form-group">
																<label>Data Of Birth:</label>
																<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text"><i class="icon-calendar22"></i></span>
																	</span>
																	<input type="text" name="dob" class="form-control daterange-single" value="<?php echo $value->adob; ?>">
																</div>
															</div>

																<div class="form-group">
														<label class="d-block font-weight-semibold">Gendar</label>
														
														<div class="custom-control custom-control-right custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" name="gen" id="custom_radio_inline_right_checked" value="Male" <?php if($value->agender=="Male"){?> checked="true" <?php } ?> />
															<label class="custom-control-label position-static" for="custom_radio_inline_right_checked">Male</label>
														</div>
												
														<div class="custom-control custom-control-right custom-radio custom-control-inline">
															<input type="radio" class="custom-control-input" name="gen" id="custom_radio_inline_right_unchecked" value="Female" <?php if($value->agender=="Female"){?> checked="true" <?php } ?> >
															<label class="custom-control-label position-static" for="custom_radio_inline_right_unchecked">Female</label>
														</div>
													
													</div>

															<div class="form-group">
																<label>Address:</label>
																<textarea rows="3" cols="3" name="add" class="form-control" placeholder="Default textarea"><?php echo $value->aaddress; ?></textarea>
															</div>
														</div>

														
													</div>
													
												
												<!-- /custom background -->

											</div>
											<div class="col-md-4">
												<!-- Custom background -->
												
													<div class="card">
														<div class="card-body">
															<div class="form-group">
																<label>Last Name:</label>
																<input type="text" name="lname" class="form-control" value="<?php echo $value->alname; ?>" placeholder="Last Name">
															</div>
															<div class="form-group">
																<label>Email:</label>
																<input type="text" name="email" class="form-control" value="<?php echo $value->aemail; ?>" placeholder="Your Email">
															</div>
															<div class="form-group">
																<label>Mobile Number:</label>
																<input type="text" name="mnumber" class="form-control" value="<?php echo $value->amobile; ?>" placeholder="Mobile Number">
															</div>

															<!-- <div class="form-group">
																<label>Your password:</label>
																<input type="password" class="form-control" placeholder="Your strong password">
															</div> -->
														
														</div>
														

														<div class="card-footer d-flex justify-content-between align-items-center bg-teal-400 border-top-0">
															<!-- <button type="submit" class="btn bg-transparent text-white border-white border-2 legitRipple">Cancel</button> -->
															<button type="submit" name="btn_update" class="btn btn-outline bg-white text-white border-white border-2 legitRipple">Save <i class="icon-paperplane ml-2"></i></button>
														</div>	
													</div>
													
												</form>
												<!-- /custom background -->

											</div>
											
										</div>
									</div>

									<div class="tab-pane fade" id="left-icon-tab3">
										<div class="col-md-4">
												<!-- Custom background -->
												<form action="changeOldAdminPass" method="post">
													<div class="card">
														<div class="card-body">
															<div class="form-group">
																<label>Old Password:</label>
																<input type="text"  class="form-control" value="<?php echo $value->apassword; ?>"  value="<??>" placeholder="Old Password" readonly>
															</div>

															<div class="form-group">
																<label>New Password:</label>
																<input type="text" name="oldpass" class="form-control" placeholder="Your strong password" required>
															</div>

															<!-- <div class="form-group mb-0">
																<label>Confirm Password:</label>
																<input type="text" name="conpass" class="form-control" placeholder="Your strong password" required>
															</div> -->
														</div>
													</div>
												 <?php }?>
													<button type="submit" name="btn_submit" class="btn btn-primary legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>	
												</form>
												<!-- /custom background -->

											</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					
				</div>
				<!-- /left icons -->
			</div>
			<script type="text/javascript">
				

				$(document).ready (function(){
					$("#deletesuccess").alert();
					window.setTimeout(function () { 
					$("#deletesuccess").alert('close'); }, 2000);
				})
			</script>
		