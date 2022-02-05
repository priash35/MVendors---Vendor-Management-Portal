<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h2 class="mb-0 font-weight-semibold">
						Update Category
					</h2>
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
			            
							
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Category/updatecategory" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($category as $post) { ?>
											
											<div class="form-group">
												<label><strong>Category Name:</strong></label>
												<input id="category_id" name="category_id" type="hidden" class="form-control" value="<?php echo $post->category_id; ?>" >
												<input id="category" name="category" type="text" class="form-control" value="<?php echo $post->category_title; ?>" >
											</div>

											<div class="form-group">
												<label><strong>Category Image:</strong></label>
												<input type="file" id="category_pic" name="category_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->category_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/category/<?php echo $post->category_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/images/uploadimg.png';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_category_image" name="old_category_image" value="<?php echo $post->category_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_category" name="update_category" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
											</div>
										<?php } ?>
									</div>
								</form>
							</div>
							
							<div class="col-md-3">
							</div>
		                
						</div><!-- col div end -->
					</div><!-- row div end -->
				</div><!-- card div end -->

				
</div>