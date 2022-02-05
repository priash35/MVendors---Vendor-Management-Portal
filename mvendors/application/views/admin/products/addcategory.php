<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<!-- <h2 class="mb-0 font-weight-semibold">
						Add New Products Services
					</h2> -->
					<?php if ($this->session->flashdata('event_success')) { ?>
						<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
						<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
				        <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
				    <?php } ?>
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
			            
							
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Category/addcategory" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	
											
											<div class="form-group">
												<label><strong>Category Name:</strong></label>
												<input id="category" name="category" type="text" class="form-control" placeholder="Category Name" required>
											</div>

											<div class="form-group">
												<label><strong>Category Image:</strong></label>
												<input type="file" id="category_pic" name="category_pic"  class="form-control-uniform" data-fouc>
											</div>

											<div class="text-center">
												<button type="submit" id="add_category" name="add_category" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
											</div>
										
									</div>
								</form>
							</div>
							
							<div class="col-md-3">
							</div>
		                
						</div><!-- col div end -->
					</div><!-- row div end -->
				</div><!-- card div end -->

				
</div>
<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>