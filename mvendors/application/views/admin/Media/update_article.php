<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/purify.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/uploaders/fileinput/fileinput.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<div class="content">
		<!-- Form action components -->
				<div class="row">
					<div class="col-md-4">
			        	
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Update Article</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Media/update_article" method="post" enctype="multipart/form-data" >
			                		<?php foreach($article as $row){?>
									<div class="form-group">
										<input type="hidden" name="blog_id" class="form-control" value="<?php echo $row->blog_id;?>"placeholder="Video Title">
										<label>Article Title:</label>
										<input type="text" name="blog_title" class="form-control" value="<?php echo $row->blog_title;?>"placeholder="Article Title">
									</div>
									
									<div class="form-group">
										<input type="file" name="blog_image" class="file-input-custom"  data-show-caption="true" data-show-upload="true" accept="image/*" data-fouc>
									</div>

									<div class="form-group">
										<label>Article Content:</label>
										<input type="text" name="blog_content" class="form-control"  value="<?php echo $row->blog_content;?>"placeholder="Article Content">
									</div>

									<div class="d-flex justify-content-start align-items-center">
										
										<button type="submit" name="update_article" class="btn bg-blue ml-3 legitRipple">Update <i class="icon-paperplane ml-2"></i></button>
									</div>
								<?php }?>
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