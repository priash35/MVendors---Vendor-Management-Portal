
<div class="content">
				<!-- Form action components -->
				<div class="row">
					<div class="col-md-6">
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Check User Inquiry</h6>
							</div>
							  <div class="card-body">
			                	<form action="<?php echo base_url();?>Inquiry/update_user_enquiry" method="post" enctype="multipart/form-data" >
					                <div class="card-body">
					                	<?php foreach ($ediinq as $key) { ?>
					                	
											<div class="form-group">
												<input type="hidden" name="enq_id" type="text" class="form-control" value="<?php echo $key->enq_id; ?>" placeholder="Enter Slider Title">
											</div>

											<div class="form-group">
												<strong><label class="d-block">Inquiry Quantity:</label></strong>
												<input type="text"  class="form-control" value="<?php echo $key->enq_qty; ?>" name="enq_qty" required>
											</div>
                                            
                                            <div class="form-group">
												<strong><label class="d-block">Inquiry Commission:</label>	</strong><span id="errmsg"></span>
												<input type="text" id="enq_commission" class="form-control" value="<?php echo $key->enq_commission; ?>" name="enq_commission" required>
											</div>
                                            
											<div class="form-group">
												<strong><label class="d-block">Inquiry Oder Time:</label></strong>
												<input type="text"  class="form-control" value="<?php echo $key->enq_oder_req_time; ?>"  name="enq_oder_req_time" required>
											</div>

											<div class="form-group">
												<strong><label class="d-block">Inquiry Credit Time:</label></strong>
												<input type="text"  class="form-control" value="<?php echo $key->enq_crdt_time; ?>" name="enq_crdt_time" required>
											</div>

											<div class="form-group">
												<strong><label class="d-block">Inquery Expected Date:</label></strong>
												<input type="text"  class="form-control" value="<?php echo $key->enq_exptd_date; ?>" name="enq_exptd_date" required>
											</div>
										
											<div class="form-group">
												<strong><label class="d-block">Check Inquery Status:</label></strong>
												<select id="enq_status" name="enq_status" class="form-control select-fixed-single" data-fouc>
													<option value="Verified">Verified</option>
													<option value="Closed">Closed</option>
													<option value="Fake">Fake</option>
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