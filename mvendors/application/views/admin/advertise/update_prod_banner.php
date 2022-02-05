<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<div class="content">
		<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
			        	
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Update Product Banner</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Advertise/update_productbanner" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($banner as $post) { ?>
											<input type="hidden" class="form-control" id="p_banner_id" name="p_banner_id" value="<?php echo $post->product_banner_id;?>">
											<div class="form-group">
												<label><strong>Product Banner Name:</strong></label>
												<input id="p_banner_name" name="p_banner_name" type="text" class="form-control" value="<?php echo $post->product_banner_title; ?>">
											</div>

											<div class="form-group">
												<label><strong>Product Banner Image:</strong></label>
												<input type="file" id="p_banner_pic" name="p_banner_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->product_banner_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/product_banner/<?php echo $post->product_banner_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_banner_image" name="old_banner_image" value="<?php echo $post->product_banner_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_p_banner" name="update_p_banner" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
											</div>
										<?php } ?>
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