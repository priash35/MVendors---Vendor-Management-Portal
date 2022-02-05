<div class="content">

		<!-- Form action components -->
		<div class="mb-3">
			<h2 class="mb-0 font-weight-semibold">
				Add Advertise
			</h2>
			
		</div>
		
		<div class="card">
			<div class="row">
				<div class="col-md-12 row">
	            
					
					<div class="col-md-3">
					</div>
					
					<div class="col-md-6">
						<form action="<?php echo base_url();?>Advertise/add_advertise" method="post" enctype="multipart/form-data" >
			                <div class="card-body">
			            		<div class="form-group">
									<label><strong>Advertise Name:</strong></label>
									<input id="advertise_name" name="advertise_name" type="text" class="form-control" value="" placeholder="Enter Advertise Name" required>
								</div>

								<div class="form-group">
									<label><strong>Advertise Image:</strong></label>
									<input type="file" id="advertise_pic" name="advertise_pic"  class="form-control-uniform" data-fouc required>
								</div>

								<div class="text-center">
									<button type="submit" id="add_advertise" name="add_advertise" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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