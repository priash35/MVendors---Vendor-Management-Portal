<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h2 class="mb-0 font-weight-semibold">
						Sub Category
					</h2>
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Category/updatesubcategory" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach($subcategory as $post) { ?>
											<div class="form-group">
												<label><strong>Category:</strong></label>
												<input type="hidden" class="form-control" id="sub_category_id" name="sub_category_id" value="<?php echo $post->sub_category_id;?>">
												<?php foreach ($categoryName as $key) { ?>
													
												<input  id="subcategory" name="subcategory" type="text" class="form-control" value="<?php echo $key->category_title; ?>" readonly>

												<input type="hidden" id="category_id" name="category_id" type="text" class="form-control" value="<?php echo $key->category_id; ?>" readonly>

												<?php } ?>
												
											</div>

											

											<div class="form-group">
												<label><strong>Sub Category Name:</strong></label>
												<input id="subcategory" name="subcategory" type="text" class="form-control" value="<?php echo $post->sub_category_title; ?>">
											</div>

											

											<div class="form-group">
												<label><strong>Product / Service:</strong></label>
												<select id="subprosub" name="subprosub" class="form-control select" data-fouc>
													<option value="PRODUCT" <?php if($post->sub_category_pro_serv=='PRODUCT')echo "selected"; ?> >PRODUCT</option>
													
														<option value="SERVICE" <?php if($post->sub_category_pro_serv=='SERVICE')echo "selected"; ?> >SERVICE</option>
												</select>
											</div>

											<div class="form-group brand">
												<label><strong>Brands:</strong></label>
                                                <select id="brand" name="brand[]" class="form-control select-search" data-fouc multiple="multiple">
                                                

                                                <?php foreach($brand as $row) { ?>
	                                              <option selected value="<?php echo $row->brand_id; ?>">
                                                  <?php echo $row->brand_title; ?></option>
	                                                  <?php foreach ($brands as $all) {
	                                                  	if($row->brand_id != $all->brand_id)
	                                                  	{
	                                                   ?>
	                                                	<option  value="<?php echo $all->brand_id; ?>">
                                                  <?php echo $all->brand_title; ?></option>
	                                                 <?php } }?>
                                          		 <?php  }?>
                                              
												</select>
											</div>

											<div class="form-group">
												<label><strong>Sub Category Price:</strong></label>
												<input id="subcatprice" name="subcatprice" type="text" class="form-control" value="<?php echo $post->sub_category_price; ?>">
											</div>

											<div class="form-group">
												<label><strong>Sub Category Commission:</strong></label>
												<input id="ratcomm" name="ratcomm" type="text" class="form-control" value="<?php echo $post->sub_category_commission; ?>">
											</div>

											<div class="form-group">
												<label><strong>Sub Category Image:</strong></label>
												<input type="file" id="subcategory_pic" name="subcategory_pic"  class="form-control-uniform" data-fouc>
												<span class="profile-picture">
													<?php if($post->sub_category_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/subcategory/<?php echo $post->sub_category_pic; ?>" />
													<?php }else{ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url().'assets/uploads/no_image.jpg';?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_subcategory_image" name="old_subcategory_image" value="<?php echo $post->sub_category_pic;?>">
											</div>

											<div class="text-center">
												<button type="submit" id="update_subcategory" name="update_subcategory" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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
<script type="text/javascript">
$(document).ready(function() {
   $("#subprosub").change(function() {
		var stype = $(this).val();	
   		if (stype =='SERVICE')
   		 {

   		 	 $(".brand").css("visibility", "hidden");	

   		 }
   		 else
   		 {

   		 	 $(".brand").css("visibility", "visible");
   		 }

    });
});
</script> 