<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h2 class="mb-0 font-weight-semibold">
						Update Brand
					</h2>
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
			            
							
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Category/update_brand" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($brand as $post) { ?>
											
											<div class="form-group">
												<label><strong>Brand Name:</strong></label>
												<input type="hidden" class="form-control" id="brand_id" name="brand_id" value="<?php echo $post->brand_id;?>">
												<input id="brand" name="brand" type="text" class="form-control" value="<?php echo $post->brand_title; ?>">
											</div>

											<div class="form-group">
												<label><strong>Brand Image:</strong></label>
												<input type="file" id="brand_pic" name="brand_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->brand_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/brand/<?php echo $post->brand_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_brand_image" name="old_brand_image" value="<?php echo $post->brand_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_brand" name="update_brand" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
											</div>
										<?php } ?>
									</div>
								</form>
							</div>
							
							<div class="col-md-3">
							</div>
		                
						</div><!-- col div end -->
					</div><!-- row div end -->
				</div><!-- card div end -->

				
</div>