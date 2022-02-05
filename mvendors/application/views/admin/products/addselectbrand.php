<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
				<!-- 	<h2 class="mb-0 font-weight-semibold">
						Add New Subtype Products Services
					</h2> -->
					
				</div>
				
				<div class="card">
					<div class="row">
						<div class="col-md-12 row">
							<div class="col-md-3">
							</div>
							
							<div class="col-md-6">
								<form action="<?php echo base_url();?>Category/addsubcategory" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	
											<div class="form-group">
												<label><strong>Products Services:</strong></label>
												
												<select id="category" name="category[]" class="form-control select-search" multiple="multiple" data-fouc required>
													<?php foreach($category as $row){?>
													<option value="<?php echo $row->category_id;?>"><?php echo $row->category_title;?></option>
													<?php } ?>
												</select>
											</div>

											<div class="form-group">
												<label><strong>Subtype Product Or Service:</strong></label>
												<select id="subprosub" name="subprosub" class="form-control select-search" data-fouc><option value="PRODUCT">PRODUCT</option>
												<option value="SERVICE">SERVICE</option>
												</select>
											</div>

											<div class="form-group">
												<label><strong>Subtype Products Services:</strong></label>
												<input id="subcategory" name="subcategory" type="text" class="form-control" placeholder="Subtype Products Services" required>
											</div>

											<div class="form-group">
												<label><strong>Brands:</strong></label>
                                                <select id="brand" name="brand[]" class="form-control select-search" data-fouc multiple="multiple">
                                                	<?php foreach($brand as $row) { ?>
                                                     <option value="<?php echo $row->brand_id; ?>">
                                                            <?php echo $row->brand_title; ?></option>
                                                <?php  }?>
												</select>
											</div>

											

											<div class="form-group">
												<label><strong>Subtype Products Service Price:</strong></label>
												<input id="subcatprice" name="subcatprice" type="text" class="form-control" placeholder="Subtype Products Price" required>
											</div>

											<div class="form-group">
												<label><strong>Subtype Products Commission Rate:</strong></label>
												<input id="subcatcomm" name="subcatcomm" type="text" class="form-control" placeholder="Subtype Products Commission Rate" required>
											</div>

											<div class="form-group">
												<label><strong>Subtype Products Service Image:</strong></label>
												<input type="file" id="subcategory_pic" name="subcategory_pic"  class="form-control-uniform" data-fouc>
											</div>

											<div class="text-center">
												<button type="submit" id="add_subcategory" name="add_subcategory" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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