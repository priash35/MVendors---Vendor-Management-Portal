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
				                <h6 class="card-title">Update Sub Type</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Category/updatesubtype" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($subtype as $post) { ?>
											<div class="form-group">
												<label><strong>Select Subcategory:</strong></label>
												<input type="hidden" class="form-control" id="subtype_id" name="subtype_id" value="<?php echo $post->subtype_id;?>">
												<select id="subcategory" name="subcategory" class="form-control select-search"  onchange="get_type(this);" data-fouc>
													<option value="<?php echo $post->subcategory;?>" selected><?php echo $post->sub_category_title;?></option>
													<?php foreach($subcategory as $row){
														if($post->subcategory != $row->sub_category_id){
														?>
													<option value="<?php echo $row->sub_category_id;?>"><?php echo $row->sub_category_title;?></option>
													<?php }} ?>
												</select>
											</div>

											<div class="form-group">
												<label><strong>Select Type:</strong></label>
												
												<select id="type_id" name="type_id" class="form-control select-search" data-fouc>
													<option value="<?php echo $post->subtype_type;?>" selected><?php echo $post->type_name;?></option>
													
												</select>
											</div>

											<div class="form-group">
												<label><strong>Sub Type Name:</strong></label>
												<input id="subtype_name" name="subtype_name" type="text" class="form-control" value="<?php echo $post->subtype_name; ?>">
											</div>

											<div class="form-group">
												<label><strong>Sub Type Image:</strong></label>
												<input type="file" id="subtype_pic" name="subtype_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->subtype_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/subtype/<?php echo $post->subtype_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_subtype_image" name="old_subtype_image" value="<?php echo $post->subtype_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_subtype" name="update_subtype" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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