	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>
	<script src="<?php echo base_url();?>/assets/admin//global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>


			<!-- Content area -->
			<div class="content">
				<!-- Right icons -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
						
							<div class="card-body">
								<ul class="nav nav-pills">
									<li class="nav-item"><a href="#right-icon-pill1" class="nav-link active" data-toggle="tab">Business Info <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill7" class="nav-link " data-toggle="tab">Vendor Info <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill2" class="nav-link" data-toggle="tab">Active inquiry <i class="icon-menu7 ml-2"></i></a></li>
									
									<!--<li class="nav-item dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown <i class="icon-gear ml-2"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#right-icon-pill3" class="dropdown-item" data-toggle="tab">Accepted Enquiries</a>
											<a href="#right-icon-pill4" class="dropdown-item" data-toggle="tab">Another pill</a>
										</div>
									</li>-->
									<li class="nav-item"><a href="#right-icon-pill3" class="nav-link " data-toggle="tab">Accepted Enquiries <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill5" class="nav-link " data-toggle="tab">Confirmed Enquiries <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill6" class="nav-link " data-toggle="tab">Completed Enquiries <i class="icon-menu7 ml-2"></i></a></li>
								</ul>

								<div class="tab-content">
									<div class="tab-pane fade show active" id="right-icon-pill1">
											<div class="card-body">
												<form action="<?php echo base_url('Vendor/updateVinfo');?>" method="post">
													<div class="row">
														<div class="col-md-6">
															<fieldset>
																<?php if (empty($venbuss)) { ?>
																	
																	<div class="alert alert-info">
																		  <strong>Info!</strong> Vendor Dont Have Business Account
																		</div>
																	<?php } ?>
																<legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Business Details</legend>
																<?php foreach ($venbuss as $key) { ?>

																	
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Shop Name:</label>
																	<div class="col-lg-9">
																		<input type="hidden" name="v_id" class="form-control" value="<?php echo $key->bis_det_id; ?>">
																		<input type="text" name="bis_name" class="form-control" value="<?php echo $key->bis_name; ?>" required>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Email :</label>
																	<div class="col-lg-9">
																		<input type="text" name="bis_email" class="form-control" value="<?php echo $key->bis_email; ?>" required>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Pincode:</label>
																	<div class="col-lg-9">
																		<input type="text" name="bis_pincode" class="form-control" value="<?php echo $key->bis_pincode; ?>" required>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">GST Number:</label>
																	<div class="col-lg-9">
																		<input type="text" name="bis_gst" class="form-control" value="<?php echo $key->bis_gst; ?>" required>
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Address:</label>
																	<div class="col-lg-9">
																		<textarea rows="5" cols="5" name="bis_address" class="form-control"><?php echo $key->bis_address; ?></textarea>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Permanent Address:</label>
																	<div class="col-lg-9">
																		<textarea rows="5" cols="5" name="bis_aaddress" class="form-control"><?php echo $key->bis_aaddress; ?></textarea>
																	</div>
																</div>
																
															</fieldset>
														</div>

														<div class="col-md-6">
															<fieldset>
											                	<legend class="font-weight-semibold"><!-- <i class="icon-truck mr-2"></i> Shipping details --><br></legend>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Mobile Number:</label>
																	<div class="col-lg-9">
																		<div class="row">
																			<div class="col-md-6">
																				<input type="text" name="bis_mnumber" value="<?php echo $key->bis_mnumber; ?>" class="form-control" required>
																			</div>

																			<div class="col-md-6">
																				<input type="text" name="bis_manumber" value="<?php echo $key->bis_manumber; ?>" class="form-control" required>
																			</div>
																		</div>
																	</div>
																</div>

																<!--<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Alternate Mobile No.:</label>
																	<div class="col-lg-9">
																		<input type="text" value="<?php //echo $key->bis_gst; ?>" class="form-control">
																	</div>
																</div> -->

																<!--<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Phone #:</label>
																	<div class="col-lg-9">
																		<input type="text" value="<?php //echo $key->bis_gst; ?>" class="form-control">
																	</div>
																</div> -->

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Location:</label>
																	<div class="col-lg-9">
																		<div class="row">
																			<div class="col-md-6">
																				<div class="mb-3">
														                          <!--  <input type="text" class="form-control" placeholder="Eugene Kopyov"> -->
														                          
														                           <select name="bus_coun" class="form-control  mb-3 select-fixed-single" data-fouc>
													                            	<option value="<?php echo $key->bis_country; ?>"><?php echo $key->country_name; ?></option>
																					<?php foreach ($country as $con) { ?>
																						<option value="<?php echo $key->id; ?>"><?php echo $con->country_name; ?></option>
																					<?php } ?>
																					</select>
													                            </div>
													                            

													                           
													                            <select name="bus_city" class="form-control  mb-3 select-fixed-single" data-fouc>
																						<option value="<?php echo $key->bis_city; ?>"><?php echo $key->city_name; ?></option>
																				</select>
													                      
																			</div>

																			<div class="col-md-6">
																				
																				<select name="bus_state" class="form-control mb-3">
													                            	<option value="<?php echo $key->bis_state; ?>"><?php echo $key->state_name; ?></option>
																					
																					</select>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Established Date:</label>
																	<div class="col-lg-9">
																		<div class="row">
																			<div class="col-md-6">
																				<div class="mb-3">
														                           <input name="bis_edate" type="text" class="form-control"  value="<?php echo $key->bis_established_date; ?>" >
													                            </div>
													                            <label>Opening Time:</label>
													                            <input type="text" name="bcdate" value="<?php echo $key->bis_op_time; ?>" class="form-control" required>
																			</div>

																			<div class="col-md-6">
																				<!-- <input type="textarea" placeholder="State/Province" class="form-control mb-3"> --><br><br>
																				<br>
																				<label>Closing Time:</label>
																				<input type="text" name="budate" value="<?php echo $key->bis_cls_time; ?>" class="form-control" required>
																			</div>
																		</div>
																	</div>
																</div>

																<!--<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Address:</label>
																	<div class="col-lg-9">
																		<input type="text" placeholder="Your address of living" class="form-control">
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Additional message:</label>
																	<div class="col-lg-9">
																		<textarea rows="5" cols="5" class="form-control" placeholder="Enter your message here"></textarea>
																	</div>
																</div>-->
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Business Description:</label> 
																	<div class="col-lg-9">
																		<textarea rows="5" cols="5" name="bis_desc" class="form-control" ><?php echo $key->bis_description; ?></textarea>
																	</div>
																</div>
															</fieldset>
															<?php } ?>
														</div>
													</div>

													<div class="text-right">
														<button type="submit" name="btn_update" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
													</div>
												</form>
											</div>
				
									</div>
									<div class="tab-pane fade" id="right-icon-pill7">
										<div class="card-body">
												<form action="<?php echo base_url('Vendor/vendorInfo');?>" method="post">
													<div class="row">
														<div class="col-md-6">
															<fieldset>
																<legend class="font-weight-semibold"><i class="icon-reading mr-2"></i> Vendor Details</legend>
																<?php foreach ($veninfo as $key) { ?>
																
																
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Name:</label>
																	<div class="col-lg-9">
																		<div class="row">
																			<div class="col-md-6">
																				<input type="hidden" name="vid" class="form-control" value="<?php echo $key->vendor_id; ?>" required>
																				<input type="text" name="vfname" class="form-control" value="<?php echo $key->vfname; ?>" required>
																			</div>

																			<div class="col-md-6">
																				<input type="text" name="vlname" class="form-control" value="<?php echo $key->vlname; ?>" required> 
																			</div>
																		</div>
																	</div>
																</div>
																
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Email :</label>
																	<div class="col-lg-9">
																		<input type="text" name="vemail" class="form-control" value="<?php echo $key->vemail; ?>" readonly style="background-color:moccasin;">
																	</div>
																</div>

																<!-- <div class="form-group row">
																	<label class="col-lg-3 col-form-label">Pincode:</label>
																	<div class="col-lg-9">
																		<input type="text" name="" class="form-control" value="<?php// echo $key->vlname; ?>"> 
																	</div>
																</div> -->

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Address:</label>
																	<div class="col-lg-9">
																		<textarea rows="5" cols="5" name="vaddress" class="form-control"> <?php echo $key->vaddress; ?></textarea>
																	</div>
																</div>
																
																
															</fieldset>
														</div>

														<div class="col-md-6">
															<fieldset>
											                	<legend class="font-weight-semibold"><!-- <i class="icon-truck mr-2"></i> --> <br></legend>
											                	<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Phone #:</label>
																	<div class="col-lg-9">
																		<input type="text" name="vmobile" value="<?php echo $key->vmobile; ?>"  class="form-control" readonly style="background-color:moccasin;">
																	</div>
																</div>

															

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Phone #:</label>
																	<div class="col-lg-9">
																		<input type="text" name="vanumber" value="<?php echo $key->vanumber; ?>"  class="form-control"> 
																	</div>
																</div>

																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Permanent Address:</label>
																	<div class="col-lg-9">
																		<textarea rows="5" cols="5" name="vbaddress" class="form-control"><?php echo $key->vbaddress; ?></textarea>
																	</div>
																</div>
																<!--<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Location:</label>
																	<div class="col-lg-9">
																		<div class="row">
																			<div class="col-md-6">
																				<div class="mb-3">
														                           <input type="text" class="form-control" placeholder="Eugene Kopyov">
													                            </div>

													                            <input type="text" placeholder="ZIP code" class="form-control">
																			</div>

																			<div class="col-md-6">
																				<input type="text" placeholder="State/Province" class="form-control mb-3">
																				<input type="text" placeholder="City" class="form-control">
																			</div>
																		</div>
																	</div>
																</div>
																<div class="form-group row">
																	<label class="col-lg-3 col-form-label">Established Date:</label>
																	<div class="col-lg-9">
																		<div class="row">
																			<div class="col-md-6">
																				<div class="mb-3">
														                           <input type="text" class="form-control" placeholder="Eugene Kopyov">
													                            </div>
													                            <label>Opening Time:</label>
													                            <input type="text" placeholder="ZIP code" class="form-control">
																			</div>

																			<div class="col-md-6">
																				<input type="textarea" placeholder="State/Province" class="form-control mb-3">
																				<label>Closing Time:</label>
																				<input type="text" placeholder="City" class="form-control">
																			</div>
																		</div>
																	</div>
																</div>-->

							
																<?php  } ?>
															</fieldset>
														</div>
													</div>

													<div class="text-right">
														<button type="submit" name="btn_update" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
													</div>
												</form>
											</div>
									</div>
									<div class="tab-pane fade" id="right-icon-pill2">
										<!-- Basic initialization -->
											<div class="card">
												<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Product / Services</th>
															<th>Quantity</th>
															<th>Creidt Time</th>
															<th>Order Time</th>
															<th>Excapted Date</th>
															<th>Message</th>
															<th>Enq Date</th>
															<th>Enq Status</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($actinq as $key) { ?>
														<tr>
															<td><?php echo $key->sub_category_title ?></td>
															<td><?php echo $key->enq_qty ?></td>
															<td><?php echo $key->enq_crdt_time ?></td>
															<td><?php echo $key->enq_oder_req_time ?></td>
															<td><?php echo $key->enq_exptd_date ?></td>
															<td><?php echo $key->enq_msg ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															<td><?php echo $key->res_enq_status ?></td> 
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
									</div>

									<div class="tab-pane fade" id="right-icon-pill3">
											<!-- Basic initialization -->
											<div class="card">
												<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Product / Services</th>
															<th>Quantity</th>
															<th>Creidt Time</th>
															<th>Order Time</th>
															<th>Excapted Date</th>
															<th>Message</th>
															<th>Enq Date</th>
															<th>Enq Status</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($acceinq as $key) { ?>
														<tr>
															<td><?php echo $key->sub_category_title ?></td>
															<td><?php echo $key->enq_qty ?></td>
															<td><?php echo $key->enq_crdt_time ?></td>
															<td><?php echo $key->enq_oder_req_time ?></td>
															<td><?php echo $key->enq_exptd_date ?></td>
															<td><?php echo $key->enq_msg ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															<td><?php echo $key->res_enq_status ?></td> 
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
									</div>

									<div class="tab-pane fade" id="right-icon-pill4">
										Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
									</div>
									<div class="tab-pane fade" id="right-icon-pill5">
										<!-- Basic initialization -->
											<div class="card">
												<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Product / Services</th>
															<th>Quantity</th>
															<th>Creidt Time</th>
															<th>Order Time</th>
															<th>Excapted Date</th>
															<th>Message</th>
															<th>Enq Date</th>
															<th>Enq Status</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($confinq as $key) { ?>
														<tr>
															<td><?php echo $key->sub_category_title ?></td>
															<td><?php echo $key->enq_qty ?></td>
															<td><?php echo $key->enq_crdt_time ?></td>
															<td><?php echo $key->enq_oder_req_time ?></td>
															<td><?php echo $key->enq_exptd_date ?></td>
															<td><?php echo $key->enq_msg ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															<td><?php echo $key->res_enq_status ?></td> 
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
									</div>
									<div class="tab-pane fade" id="right-icon-pill6">
										<!-- Basic initialization -->
											<div class="card">
												<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Product / Services</th>
															<th>Quantity</th>
															<th>Creidt Time</th>
															<th>Order Time</th>
															<th>Excapted Date</th>
															<th>Message</th>
															<th>Enq Date</th>
															<th>Enq Status</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($competeinq as $key) { ?>
														<tr>
															<td><?php echo $key->sub_category_title ?></td>
															<td><?php echo $key->enq_qty ?></td>
															<td><?php echo $key->enq_crdt_time ?></td>
															<td><?php echo $key->enq_oder_req_time ?></td>
															<td><?php echo $key->enq_exptd_date ?></td>
															<td><?php echo $key->enq_msg ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															<td><?php echo $key->res_enq_status ?></td> 
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /right icons -->

			</div>
			<!-- /content area -->
<script type="text/javascript">
	 $("#bus_coun").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#bus_state').html(data);
            },
        });
    });
   $("#bus_state").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#bus_city').html(data);
            },
            
        });
    });
   
</script>