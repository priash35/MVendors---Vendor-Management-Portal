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
				                <h6 class="card-title">Update Social</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Social/EditSocial" method="post" enctype="multipart/form-data" >
			                		<?php foreach($social as $row){?>
									<div class="form-group">
										<input type="hidden" name="social_id" class="form-control" value="<?php echo $row->social_id;?>">
										<label>Social Title:</label>
										<input type="text" name="social_name" class="form-control" value="<?php echo $row->social_name;?>" readonly>
									</div>
									
								

									<div class="form-group">
										<label>Social Link:</label>
										<input type="text" name="social_link" class="form-control"  value="<?php echo $row->social_link;?>">
									</div>

									<div class="d-flex justify-content-start align-items-center">
										
										<button type="submit" name="btn_update" class="btn bg-blue ml-3 legitRipple">Update <i class="icon-paperplane ml-2"></i></button>
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