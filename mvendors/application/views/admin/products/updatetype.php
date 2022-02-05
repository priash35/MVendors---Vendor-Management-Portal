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
				                <h6 class="card-title">Update Type</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Category/updatetype" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($type as $post) { ?>
											<div class="form-group">
												<label><strong>Select Subcategory:</strong></label>
												<input type="hidden" class="form-control" id="type_id" name="type_id" value="<?php echo $post->type_id;?>">
												<select id="subcategory" name="subcategory" class="form-control select-search" data-fouc>
													<option value="<?php echo $post->type_subcategory;?>" selected><?php echo $post->sub_category_title;?></option>
													<?php foreach($subcategory as $row){
														if($post->sub_cat_id != $row->sub_category_id){
														?>
													<option value="<?php echo $row->sub_category_id;?>"><?php echo $row->sub_category_title;?></option>
													<?php }} ?>
												</select>
											</div>

											<div class="form-group">
												<label><strong>Type Name:</strong></label>
												<input id="type_name" name="type_name" type="text" class="form-control" value="<?php echo $post->type_name; ?>">
											</div>

											<div class="form-group">
												<label><strong>Type Image:</strong></label>
												<input type="file" id="type_pic" name="type_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->type_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/type/<?php echo $post->type_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_type_image" name="old_type_image" value="<?php echo $post->type_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_type" name="update_type" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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