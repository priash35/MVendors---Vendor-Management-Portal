<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h2 class="mb-0 font-weight-semibold">
						Add New Brand
					</h2>
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
			            
							
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Category/addbrand" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	
											
											<div class="form-group">
												<label><strong>Brand Name:</strong></label>
												<input id="brand" name="brand" type="text" class="form-control" placeholder="Enter Brand" required>
											</div>

											<div class="form-group">
												<label><strong>Brand Image:</strong></label>
												<input type="file" id="brand_pic" name="brand_pic"  class="form-control-uniform" data-fouc>
											</div>

											<div class="text-center">
												<button type="submit" id="add_brand" name="add_brand" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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
<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>