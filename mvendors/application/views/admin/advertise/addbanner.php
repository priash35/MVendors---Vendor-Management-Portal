<div class="content">

		<!-- Form action components -->
		<div class="mb-3">
			<h2 class="mb-0 font-weight-semibold">
				Add Banner
			</h2>
			
		</div>
		
		<div class="card">
			<div class="row">
				<div class="col-md-12 row">
	            
					
					<div class="col-md-3">
					</div>
					
					<div class="col-md-6">
						<form action="<?php echo base_url();?>Advertise/add_banner" method="post" enctype="multipart/form-data" >
			                <div class="card-body">
			            		<div class="form-group">
									<label><strong>Banner Name:</strong></label>
									<input id="banner_name" name="banner_name" type="text" class="form-control" value="" placeholder="Enter Banner Name" required>
								</div>

								<div class="form-group">
									<label><strong>Banner Image:</strong></label>
									<input type="file" id="banner_pic" name="banner_pic"  class="form-control-uniform" data-fouc required>
								</div>

								<div class="text-center">
									<button type="submit" id="add_banner" name="add_banner" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
								</div>
								
							</div>
						</form>
					</div>
					
					<div class="col-md-3">
					</div>
                
				</div><!-- col div end -->
			</div><!-- row div end -->
		</div><!-- card div end -->

				
</div>