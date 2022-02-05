<div class="content">

				<!-- Form action components -->
				
				<div class="row">
					<div class="col-md-4">
			        	
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Update Video</h6>
							</div>

			                <div class="card-body">
			                	<form action="<?php echo base_url();?>Media/update_video" method="post" enctype="multipart/form-data" >
			                		<?php foreach($videos as $row){?>
									<div class="form-group">
										<input type="hidden" name="video_id" class="form-control" value="<?php echo $row->video_id;?>"placeholder="Video Title">
										<label>Video Title:</label>
										<input type="text" name="video_title" class="form-control" value="<?php echo $row->video_name;?>"placeholder="Video Title">
									</div>

									<div class="form-group">
										<label>Video Url:</label>
										<input type="text" name="video_url" class="form-control"  value="<?php echo $row->video_link;?>"placeholder="Vidoe Url">
									</div>

									<div class="d-flex justify-content-start align-items-center">
										
										<button type="submit" name="update_video" class="btn bg-blue ml-3 legitRipple">Update <i class="icon-paperplane ml-2"></i></button>
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