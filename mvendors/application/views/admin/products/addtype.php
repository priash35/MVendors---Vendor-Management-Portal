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
				                <h6 class="card-title">Add Type</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url();?>Category/addtype" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	
											<div class="form-group">
												<label><strong>Select Type:</strong></label>
												
												<select id="subcategory" name="subcategory" class="form-control select-search" data-fouc>
													<?php foreach($subcategory as $row){?>
													<option value="<?php echo $row->sub_category_id;?>"><?php echo $row->sub_category_title;?></option>
													<?php } ?>
												</select>
											</div>

											<div class="form-group">
												<label><strong>Type Name:</strong></label>
												<input id="type_name" name="type_name" type="text" class="form-control" placeholder="Enter Type Name">
											</div>

											<div class="form-group">
												<label><strong>Type Image:</strong></label>
												<input type="file" id="type_pic" name="type_pic"  class="form-control-uniform" data-fouc>
											</div>

											<div class="text-center">
												<button type="submit" id="add_type" name="add_type" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
											</div>
										
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