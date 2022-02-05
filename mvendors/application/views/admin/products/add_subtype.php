<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Add Sub Type</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url();?>Category/addsubtype" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	
											<div class="form-group">
												<label><strong>Select Subtype Products Services:</strong></label>
												
												<select id="subcategory" name="subcategory" class="form-control select-search"  onchange="get_type(this);" data-fouc>
													<?php foreach($subcategory as $row){?>
													<option value="<?php echo $row->sub_category_id;?>"><?php echo $row->sub_category_title;?></option>
													<?php } ?>
												</select>
											</div>

											<div class="form-group">
												<label><strong>Select Type:</strong></label>
												
												<select id="type_id" name="type_id" class="form-control select-search" data-fouc>
													<option value="">Select Type</option>
													
												</select>
											</div>

											<div class="form-group">
												<label><strong>Sub Type Name:</strong></label>
												<input id="subtype_name" name="subtype_name" type="text" class="form-control" placeholder="Enter Type Name">
											</div>

											<div class="form-group">
												<label><strong>Sub Type Image:</strong></label>
												<input type="file" id="subtype_pic" name="subtype_pic"  class="form-control-uniform" data-fouc>
											</div>

											<div class="text-center">
												<button type="submit" id="add_subtype" name="add_subtype" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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

<script type="text/javascript">
	 $("#subcategory").change(function(){
   		 var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_sub_type");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#type_id').html(data);
            },
            
        });
    });
</script>