<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add Product Banner</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url();?>Advertise/add_productbanner" method="post" enctype="multipart/form-data" >
					                <div class="card-body">

											<div class="form-group">
												<label><strong>Product Banner Name:</strong></label>
												<input id="p_banner_name" name="p_banner_name" type="text" class="form-control" placeholder="Enter Banner Name" required>
											</div>

											<div class="form-group">
												<label><strong>Product Banner Image:</strong></label>
												<input type="file" id="p_banner_pic" name="p_banner_pic"  class="form-control-uniform" data-fouc required>
											</div>

											<div class="text-center">
												<button type="submit" id="add_p_banner" name="add_p_banner" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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