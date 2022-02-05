<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h2 class="mb-0 font-weight-semibold">
						Update Banner
					</h2>
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
			            
							
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Advertise/update_banner" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($banner as $post) { ?>
											
											<div class="form-group">
												<label><strong>Banner Name:</strong></label>
												<input type="hidden" class="form-control" id="banner_id" name="banner_id" value="<?php echo $post->banner_id;?>">
												<input id="banner_name" name="banner_name" type="text" class="form-control" value="<?php echo $post->banner_title; ?>">
											</div>

											<div class="form-group">
												<label><strong>Banner Image:</strong></label>
												<input type="file" id="banner_pic" name="banner_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->banner_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/banner/<?php echo $post->banner_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_banner_image" name="old_banner_image" value="<?php echo $post->banner_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_banner" name="update_banner" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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