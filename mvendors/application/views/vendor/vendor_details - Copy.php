<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_layouts.js"></script>

			<div class="content">
						<!-- Basic layout-->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Profile Details</h5>
					</div>
						<form action="<?php echo base_url();?>Mvendor/update_vprofile" method="post" enctype="multipart/form-data" >
							<div class="col-md-12 row">
								<div class="col-md-6">
									<div class="card-body">
									
										<div class="form-group">
											<label>First Name:</label>
											<input type="hidden" name="vid" class="form-control" value="<?php echo $result[0]->vendor_id.' '.$result[0]->vlname;?>">
											<input type="text" name="vfname" class="form-control" value="<?php echo $result[0]->vfname;?>">
										</div>

										<div class="form-group">
											<label>Last Name:</label>
											<input type="text" name="vlname" class="form-control" value="<?php echo $result[0]->vlname;?>">
										</div>

										<div class="form-group">
											<label>Email Id:</label>
											<input type="email" name="vemail" class="form-control" value="<?php echo $result[0]->vemail;?>">
										</div>

										<div class="form-group">
											<label>Mobile Number:</label>
											<input type="text" name="vmobile" class="form-control" value="<?php echo $result[0]->vmobile;?>">
										</div> 
										
										<div class="form-group">
											<label>Alternate Number:</label>
											<input type="text" name="vanumber" class="form-control" placeholder="Enter Alternate Number" value="<?php echo $result[0]->vanumber;?>">
										</div>
										
										<div class="form-group">
											<label class="d-block">Gender:</label>

											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" class="form-input-styled" value="Male" <?php if(isset($result[0]->vgender)) echo ($result[0]->vgender== 'Male') ?  "checked" : "" ;  ?> name="vgender" data-fouc>
													Male
												</label>
											</div>

											<div class="form-check form-check-inline">
												<label class="form-check-label">
													<input type="radio" class="form-input-styled" value="Female"  <?php if(isset($result[0]->vgender)) echo ($result[0]->vgender== 'Female') ?  "checked" : "" ;  ?> name="vgender" data-fouc>
													Female
												</label>
											</div>
										</div>

										<div class="form-group">
											<label>Date Of Birth:</label>
											<input type="date"name="vdob" class="form-control" placeholder="Enter Date Of Birth" value="<?php echo $result[0]->vdob;?>">
										</div>
										<div class="form-group">
											<label>Profile Picture:</label>
											<input type="file" name="profile" class="form-input-styled" data-fouc>
											<span class="form-text text-muted">Accepted formats: gif, png, jpg. Max file size 2Mb</span>
											<span class="profile-picture">
													<?php if($result[0]->vprof_pic){ ?>
														<img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/vendor/<?php echo $result[0]->vprof_pic; ?>" />
													<?php } ?>
												</span>
												
												  <input type="hidden" class="form-control" id="old_prof_pic" name="old_prof_pic" value="<?php echo $result[0]->vprof_pic;?>">
										</div>	
										
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="card-body">
										<div class="form-group">
											<label>Personal Address:</label>
											<textarea rows="2" name="vaddress" cols="5" class="form-control" placeholder="Enter Personal Address" ><?php //echo $result[0]->vaddress;?></textarea>
										</div>
										<div class="form-group">
											<label>Country:</label>
											<select name="vcountry" id="vcountry" class="form-control form-control-select2" data-fouc>
													 <?php foreach($country as $row) { ?>
                                                        <option value="<?php //echo $row->id; ?>"><?php echo $row->country_name; ?></option>
                                                <?php } ?>
											</select>
										</div>
										<div class="form-group">
											<label>State:</label>
											<select name="vstate" id="vstate" class="form-control form-control-select2" data-fouc>
													<option value="">Select State</option>
											</select>
										</div>
										<div class="form-group">
											<label>City:</label>
											<select name="vcity" id="vcity" class="form-control form-control-select2" data-fouc>
													<option value="">Select City</option>
											</select>
										</div>
										<div class="form-group">
											<label>Pincode:</label>
											<input type="text" name="vpincode" class="form-control" placeholder="Enter Your Pincode"  value="<?php //echo $result[0]->vpincode;?>">
										</div>
										<div class="form-group">
											<label>Organization Name:</label>
											<input type="text" name="vorganization" class="form-control" placeholder="Enter Organization Name" value="<?php //echo $result[0]->vorganization;?>">
										</div>
										<div class="form-group">
											<label>Business Address:</label>
											<textarea rows="2" cols="5" name="vbaddress" class="form-control" placeholder="Enter Your Business Address"><?php //echo $result[0]->vbaddress;?></textarea>
										</div>
										<div class="form-group">
											<label>Shop Address:</label>
											<textarea rows="2" cols="5" name="vsaddress" class="form-control" placeholder="Enter Your Shop Address"><?php //echo $result[0]->vsaddress;?></textarea>
										</div>
								</div>
							</div>
							<div class="card-body">
								<div class="text-center">
									<button type="submit" name="update_profile" class="btn btn-primary">Save<i class="icon-paperplane ml-2"></i></button>
								</div>
							</div>
					</div>
					</form>
				</div><!-- /basic layout -->
			</div>
			<!-- /content area -->


<script>
    
   $("#vcountry").change(function(){
    var id = $(this).val();
    
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#vstate').html(data);
                
            },
            
        });
    });
   $("#vstate").change(function(){
    var id = $(this).val();
    
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#vcity').html(data);
                
            },
            
        });
    });

 </script>
		

