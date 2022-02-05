<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h2 class="mb-0 font-weight-semibold">
						Update Advertise
					</h2>
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
			            
							
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Advertise/update_advertise" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($advertise as $post) { ?>
											
											<div class="form-group">
												<label><strong>Advertise Name:</strong></label>
												<input type="hidden" class="form-control" id="advertise_id" name="advertise_id" value="<?php echo $post->advertise_id;?>">
												<input id="advertise_name" name="advertise_name" type="text" class="form-control" value="<?php echo $post->advertise_title; ?>">
											</div>

											<div class="form-group">
												<label><strong>Advertise Image:</strong></label>
												<input type="file" id="advertise_pic" name="advertise_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->advertise_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/advertise/<?php echo $post->advertise_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_advertise_image" name="old_advertise_image" value="<?php echo $post->advertise_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_advertise" name="update_advertise" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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