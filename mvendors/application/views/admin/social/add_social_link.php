<!-- Theme JS files -->
<!-- 	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/uploader_bootstrap.js"></script> -->
<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add Article</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url('Media/add_article');?>" method="post" enctype="multipart/form-data" >
			       
									<div class="form-group">
										<label>Article Title:</label>
										<input type="text" name="blog_title" class="form-control" placeholder="Article Title" required>
									</div>

									<div class="form-group">
										<label>Article Image:</label>
										<input type="file" name="blog_image"  class="form-control" placeholder="Article Image" required>
									</div>
									
									<div class="form-group">
										<label>Article Content:</label>
										<input type="text" name="blog_content" class="form-control" placeholder="Article Content" required>
									</div>  

									<div class="d-flex justify-content-start align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" name="add_article" class="btn bg-blue ml-3 legitRipple">Add Article <i class="icon-paperplane ml-2"></i></button>
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