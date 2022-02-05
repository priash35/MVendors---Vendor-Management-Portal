<!-- Theme JS files -->
<!-- 	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/uploader_bootstrap.js"></script> -->
<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add Package</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url('Package/add_package');?>" method="post" enctype="multipart/form-data" >
			       
									<div class="form-group">
										<label>Package Name:</label>
										<input type="text" name="package_name" class="form-control" placeholder="Package Name">
									</div>

									<div class="form-group">
										<label>Package Category:</label>
										<input type="text" name="package_category" class="form-control" placeholder="Package Category">
									</div>

									<div class="form-group">
										<label>Package Video:</label>
										<input type="text" name="package_video" class="form-control" placeholder="Package Video">
									</div>

									<div class="form-group">
										<label>Package Images:</label>
										<input type="text" name="package_images" class="form-control" placeholder="Package Images">
									</div>

									<div class="form-group">
										<label>Package Keywords:</label>
										<input type="text" name="package_keywords" class="form-control" placeholder="Package Keywords">
									</div>

									<div class="form-group">
										<label>Package Price:</label>
										<input type="text" name="package_price" class="form-control" placeholder="Package Price">
									</div>

									<div class="form-group">
										<label>Package Duration:</label>
										<input type="text" name="package_duration" class="form-control" placeholder="Package Days">
									</div>

									
									<div class="d-flex justify-content-start align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" name="add_package" class="btn bg-blue ml-3 legitRipple">Add Package <i class="icon-paperplane ml-2"></i></button>
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