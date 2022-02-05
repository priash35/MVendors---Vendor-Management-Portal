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
				                <h6 class="card-title">Update Slider</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Advertise/update_slider" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($advertise as $post) { ?>
											<input type="hidden" class="form-control" id="sli_id" name="sli_id" value="<?php echo $post->slider_id;?>">
											<div class="form-group">
												<label><strong>Slider Title:</strong></label>
												<input id="slidtitle" name="slidtitle" type="text" class="form-control" value="<?php echo $post->slider_title; ?>">
											</div>

											<div class="form-group">
												<label><strong>Slider Sub Title:</strong></label>
												<input id="slisubtitle" name="slisubtitle" type="text" class="form-control" value="<?php echo $post->slider_subtitle; ?>">
											</div>

											<div class="form-group">
												<label><strong>Slider Banner Image:</strong></label>
												<input type="file" id="sliimg" name="sliimg"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->slider_pic){ ?>
														<br><img id="avatar" style="height:150px; width: 300px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/slider/<?php echo $post->slider_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px; width: 300px;"  class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_ad_banner_image" name="old_slide" value="<?php echo $post->slider_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_slid" name="update_slid" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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