<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add Slider</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url('Madmin/add_subadmin');?>" method="post" enctype="multipart/form-data" >
					                <div class="card-body">

											<div class="form-group">
												<label><strong>First Name:</strong></label>
												<input name="afname" type="text" class="form-control" placeholder="Enter First Name">
											</div>

											<div class="form-group">
												<label><strong>Last Name:</strong></label>
												<input  name="alname" type="text" class="form-control" placeholder="Enter Last Name">
											</div>

											<div class="form-group">
												<label><strong>Email Id:</strong></label>
												<input type="text" name="aemail"  class="form-control" placeholder="Enter Email Id">
											</div>
											<div class="form-group">
												<label><strong>Mobile :</strong></label>
												<input type="text"  name="amobile"  class="form-control" placeholder="Enter Mobile Number">
											</div>
											<div class="form-group">
												<label><strong>Password :</strong></label>
												<input type="text"  name="apassword"  class="form-control" placeholder="Enter Password">
											</div>

											<div class="text-center">
												<button type="submit" id="btnsubmit" name="btnsubmit" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
											</div>
										
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left aligned buttons -->

					</div>

					<div class="col-md-4">    	
					</div>

					<div class="col-md-4">
					</div>
				</div>
				<!-- /form action components -->
</div>