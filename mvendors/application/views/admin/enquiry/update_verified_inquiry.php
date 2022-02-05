

<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Update User Inquiry</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url();?>Inquiry/update_verified_inquiry" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach ($uinquiry as $key) { ?>
					                	
											<div class="form-group">
												<label><strong>Product Quantity:</strong></label>
												<input type="hidden" name="enq_id" type="text" class="form-control" value="<?php echo $key->enq_id; ?>" placeholder="Enter Slider Title">
												<input  name="enq_qty" type="text" class="form-control" value="<?php echo $key->enq_qty; ?>" placeholder="Enter Slider Title">
											</div>

											<div class="form-group">
												<label><strong>Product Unit:</strong></label>
												<input id="slidtitle" name="enq_unit" type="text" class="form-control" value="<?php echo $key->enq_unit; ?>" placeholder="Enter Slider Title">
											</div>

											<div class="form-group">
												<label><strong>Credit Time(Days):</strong></label>
												<input id="slidtitle" name="enq_crdt_time" type="text" class="form-control" value="<?php echo $key->enq_crdt_time; ?>" placeholder="Enter Slider Title">
											</div>

											<div class="form-group">
												<label><strong>Order required Time(Days):</strong></label>
												<input id="slidtitle" name="enq_oder_req_time" type="text" class="form-control" value="<?php echo $key->enq_oder_req_time; ?>" placeholder="Enter Slider Title">
											</div>

											<div class="form-group">
												<strong><label class="d-block">User Inquery Status:</label></strong>
												<select id="enq_status" name="enq_status" class="form-control select-fixed-single" data-fouc>
													<option value="Verified">Verified</option>
													<option value="Completed">Completed</option>
												</select>
											</div>
					                	<?php } ?>
											<div class="text-center">
												<button type="submit" id="update_inq" name="update_inq" onclick="doconfirm()" class="btn bg-teal-400 legitRipple">Save<i class="icon-paperplane ml-2"></i></button>
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

/*
	function doconfirm()
{
	     

  job=confirm("Are you sure to change status permanently?");
  if(job!=true)
  {
      return false;
  }
} 
$('#enq_status').on('change', function() {
 	var conceptName =( this.value );
 	doconfirm();
});*/
</script>
<script type="text/javascript">
//$("#update_inq").click(function(){
	//alert('teest');
		function doconfirm()
		{
			     

		  job=confirm("Are you sure to change status permanently?");
		  if(job!=true)
		  {
		      return false;
		  }
		} 
			
//});
</script>