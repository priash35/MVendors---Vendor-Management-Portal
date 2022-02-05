<div class="content">

				<!-- Form action components -->
				
				<div class="row">
					<div class="col-md-4">
			        	
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add Video</h6>
							</div>

			               
			                <div class="card-body">
			                	<form action="<?php echo base_url('Media/add_video');?>" method="post" enctype="multipart/form-data" >
			       
									<div class="form-group">
										<label>Video Title:</label>
										<input type="text" name="video_title" class="form-control" placeholder="Video Title" required>
									</div>

									<div class="form-group">
										<label>Video Url:</label>
										<input type="text" name="video_url" class="form-control" placeholder="Vidoe Url" required>
									</div>

									<div class="d-flex justify-content-start align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" name="add_video" class="btn bg-blue ml-3 legitRipple">Add Video <i class="icon-paperplane ml-2"></i></button>
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