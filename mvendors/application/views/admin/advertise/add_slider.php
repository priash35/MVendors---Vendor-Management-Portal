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
			                	<form action="<?php echo base_url();?>Advertise/add_slider" method="post" enctype="multipart/form-data" >
					                <div class="card-body">

											<div class="form-group">
												<label><strong>Slider Title:</strong></label>
												<input id="slidtitle" name="slidtitle" type="text" class="form-control" placeholder="Enter Slider Title" required>
											</div>

											<div class="form-group">
												<label><strong>Slider Sub Title:</strong></label>
												<input id="slisubtitle" name="slisubtitle" type="text" class="form-control" placeholder="Enter Sub Title" required>
											</div>

											<div class="form-group">
												<label><strong>Slider Image:</strong></label>
												<input type="file" id="sliimg" name="sliimg"  class="form-control-uniform" data-fouc required> 
											</div>

											<div class="text-center">
												<button type="submit" id="add_slider" name="add_slider" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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