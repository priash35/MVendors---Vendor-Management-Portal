<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/inputs/inputmask.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/validation/validate.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/wizards/steps.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_wizard.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_layouts.js"></script>

<div class="content">
<!-- Wizard with validation -->
	            <div class="card">
					<div class="card-header bg-white header-elements-inline">
						<h6 class="card-title">Wizard with validation</h6>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					
                	<!-- <form class="wizard-form steps-validation" action="#" data-fouc> -->
					<form id="analyse" class="wizard-form steps-enable-all" action="#"  enctype="multipart/form-data" data-fouc>
						<h6>Business Details</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Referral ID:</label>
										<input type="text" name="ref_id" class="form-control" placeholder="Enter Referral Id">
									</div>

									<div class="form-group">
										<label>Organisation/Shop Name: <span class="text-danger">*</span></label>
										<input type="text" name="shop_name" class="form-control required" placeholder="Organisation Name">
									</div>

									<div class="form-group">
										<label>Email address: <span class="text-danger">*</span></label>
										<input type="email" name="email" class="form-control required" placeholder="your@email.com">
										
									</div>

									<div class="form-group">
										<label>Mobile Number:</label>
										<input type="text" name="mobile" class="form-control" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999">
									</div>

									<div class="form-group">
										<label>Alternate Mobile No.:</label>
										<input type="text" name="alt_mobile" class="form-control" placeholder="+99-99-9999-9999" data-mask="+99-99-9999-9999">
									</div>

									<div class="form-group">
										<label>Address:</label>
										 <textarea name="address" rows="1" cols="4" placeholder="Enter Business Address" class="form-control"></textarea>
									</div>

									<div class="form-group">
										<label>Country: <span class="text-danger">*</span></label>
										<select name="country" data-placeholder="Select Country" class="form-control form-control-select2 required" data-fouc>
											<option></option>
											<optgroup label="North America">
												<option value="1">United States</option>
												<option value="2">Canada</option>
											</optgroup>
										</select>
									</div>

									<div class="form-group">
										<label>State: <span class="text-danger">*</span></label>
										<select name="state" data-placeholder="Select State" class="form-control form-control-select2 required" data-fouc>
											<option></option>
											<optgroup label="North America">
												<option value="1">United States</option>
												<option value="2">Canada</option>
											</optgroup>
										</select>
									</div>

									<div class="form-group">
										<label>City: <span class="text-danger">*</span></label>
										<select name="city" data-placeholder="Select City" class="form-control form-control-select2 required" data-fouc>
											<option></option>
											<optgroup label="North America">
												<option value="1">United States</option>
												<option value="2">Canada</option>
											</optgroup>
										</select>
									</div>

									<div class="form-group">
										<label>Pincode: <span class="text-danger">*</span></label>
										<input type="text" name="pincode" placeholder="Enter Your Pincode" class="form-control required">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Description:</label>
										 <textarea name="description" rows="1" cols="4" placeholder="Enter Business Description" class="form-control"></textarea>
									</div>
									<div class="form-group">
										<label>Business Type: <span class="text-danger">*</span></label>
										<select name="buss_type" data-placeholder="Select Business Type" class="form-control form-control-select2 required" data-fouc>
											<option value="0">Select Business Type</option>
											<option value="1">Retailer</option>
											<option value="2">Dealer</option>
											<option value="3">Distributor</option>
											<option value="4">Constructor</option>
										</select>
									</div>
									
									<div class="form-group">
										<label>Contact Person:</label>
										<input type="text" name="cont_person" class="form-control" placeholder="Enter Contact Person">
									</div>
									<div class="form-group">
										<label>Payment Mode: <span class="text-danger">*</span></label>
										<select name="p_mode" data-placeholder="Select Payment Mode" class="form-control form-control-select2 required" data-fouc>
											<option></option>
											<optgroup label="North America">
												<option value="1">United States</option>
												<option value="2">Canada</option>
											</optgroup>
										</select>
									</div>
									<div class="form-group">
										<label>Established Date:</label>
										<input type="date" name="edate" class="form-control" placeholder="Enter Established Date">
									</div>
									<div class="form-group">
										<label>Opening Time:</label>
										<input type="time" name="op_time" class="form-control" placeholder="Enter Opening Time">
									</div>
									<div class="form-group">
										<label>Closing Time:</label>
										<input type="time" name="cl_time" class="form-control" placeholder="Enter Closing Time">
									</div>
									<!-- <div class="form-group">
										<label class="d-block">Shop Image:</label>
	                                    <input name="shop_pic" type="file" class="form-input-styled" data-fouc>
	                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
	                                </div>
	                                <div class="form-group">
										<label class="d-block">Shop Logo:</label>
	                                    <input name="shop_logo" type="file" class="form-input-styled" data-fouc>
	                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
	                                </div> -->
								</div>

							</div>
							
						</fieldset>

						<h6>Product/Service Addition</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Category: <span class="text-danger">*</span></label>
		                                 <select name="university-country" data-placeholder="Choose a Category" class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="1">United States</option> 
	                                        <option value="2">France</option> 
	                                        <option value="3">Germany</option> 
	                                        <option value="4">Spain</option> 
	                                    </select>
	                                </div>

	                                <div class="form-group">
										<label>Sub Category: <span class="text-danger">*</span></label>
		                                <select name="university-country" data-placeholder="Choose a Sub Category" class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="1">United States</option> 
	                                        <option value="2">France</option> 
	                                        <option value="3">Germany</option> 
	                                        <option value="4">Spain</option> 
	                                    </select>
	                                </div>

									<div class="form-group">
										<label>Type:</label>
		                               <select name="university-country" data-placeholder="Choose a Type" class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="1">United States</option> 
	                                        <option value="2">France</option> 
	                                        <option value="3">Germany</option> 
	                                        <option value="4">Spain</option> 
	                                    </select>
	                                </div>

	                               
								</div>

								<div class="col-md-6">
									 <div class="form-group">
										<label>Sub Type:</label>
			                               <select name="university-country" data-placeholder="Choose a Sub Type" class="form-control form-control-select2" data-fouc>
		                                        <option></option> 
		                                        <option value="1">United States</option> 
		                                        <option value="2">France</option> 
		                                        <option value="3">Germany</option> 
		                                        <option value="4">Spain</option> 
		                                    </select>
	                                </div>
									 <div class="form-group">
										<label>Brand:</label>
		                                <select name="university-country" data-placeholder="Choose a Brand" class="form-control form-control-select2" data-fouc>
	                                        <option></option> 
	                                        <option value="1">United States</option> 
	                                        <option value="2">France</option> 
	                                        <option value="3">Germany</option> 
	                                        <option value="4">Spain</option> 
	                                    </select>
	                                </div>
	                                <div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label>Country:</label>
			                                    <select name="education-from-month" data-placeholder="Country" class="form-control form-control-select2" data-fouc>
			                                    	<option></option>
			                                        <option value="India">India</option> 
			                                        <option value="USA">USA</option> 
			                                        <option value="UK">UK</option> 
			                                    </select>
		                                    </div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>State:</label>

			                                    <select name="education-from-year" data-placeholder="State" class="form-control form-control-select2" data-fouc>
			                                        <option></option> 
			                                       <!--  <option value="1995">1995</option> 
			                                        <option value="...">...</option> 
			                                        <option value="1980">1980</option>  -->
			                                    </select>
		                                    </div>
										</div>

										<div class="col-md-4">
											<div class="form-group">
												<label>City:</label>
			                                    <select name="education-from-year" data-placeholder="City" class="form-control form-control-select2" data-fouc>
			                                        <option></option> 
			                                        <!-- <option value="1995">1995</option> 
			                                        <option value="...">...</option> 
			                                        <option value="1980">1980</option>  -->
			                                    </select>
		                                    </div>
										</div>
											
									</div>

								</div>

							</div>

							
								
						</fieldset>

						<h6>Package/Membership selection</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Processing Fees: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-company" placeholder="Processing Fees" class="form-control required">
	                                </div>

									<!-- <div class="form-group">
										<label>Position: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-position" placeholder="Company name" class="form-control required">
	                                </div>

									<div class="row">
										<div class="col-md-6">
											<label>From:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-from-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option> 
					                                        <option value="...">...</option> 
					                                        <option value="December">December</option> 
					                                    </select>
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-from-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
					                                        <option></option> 
					                                        <option value="1995">1995</option> 
					                                        <option value="...">...</option> 
					                                        <option value="1980">1980</option> 
					                                    </select>
				                                    </div>
												</div>
											</div>
										</div>

										<div class="col-md-6">
											<label>To:</label>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-to-month" data-placeholder="Month" class="form-control form-control-select2" data-fouc>
					                                    	<option></option>
					                                        <option value="January">January</option> 
					                                        <option value="...">...</option> 
					                                        <option value="December">December</option> 
					                                    </select>
				                                    </div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
					                                    <select name="education-to-year" data-placeholder="Year" class="form-control form-control-select2" data-fouc>
					                                        <option></option> 
					                                        <option value="1995">1995</option> 
					                                        <option value="...">...</option> 
					                                        <option value="1980">1980</option> 
					                                    </select>
				                                    </div>
												</div>
											</div>
										</div>
									</div> -->
								</div>

								<div class="col-md-6">
	                                <div class="form-group">
										<label>Select Package:</label>
	                                    <div class="form-group">
		                                    <select name="education-from-month" data-placeholder="Select your package" class="form-control form-control-select2" data-fouc>
		                                    	<option></option>
		                                        <option value="Silver">Silver</option> 
		                                        <option value="Gold">Gold</option> 
		                                        <option value="Platinum">Platinum</option> 
		                                    </select>
	                                    </div>
	                                </div>

									<!-- <div class="form-group">
										<label class="d-block">Recommendations:</label>
	                                    <input name="recommendations" type="file" class="form-input-styled" data-fouc>
	                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
	                                </div> -->
								</div>
							</div>
						</fieldset>

						<h6>Banking information</h6>
						<fieldset>
							<div class="row">
								<div class="col-md-6">
                                    <div class="form-group">
                                    <label>Bank Holder Name: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-company" placeholder="Bank Holder Name" class="form-control required">
		                            </div>
		                            <div class="form-group">
                                    <label>Bank Account Number: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-company" placeholder="Bank Account Number" class="form-control required">
		                            </div>
		                            <div class="form-group">
                                    <label>Bank Name: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-company" placeholder="Bank name" class="form-control required">
		                            </div>
		                          
	                            	<!-- <div class="form-group">
									<label class="d-block">Applicant resume:</label>
                                   		 <input type="file" name="resume" class="form-input-styled" data-fouc>
                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                    </div> -->
                            
								</div>

								<div class="col-md-6">
									<div class="form-group">
                                    <label>Bank IFSC Code: <span class="text-danger">*</span></label>
		                                <input type="text" name="experience-company" placeholder="IFSC Code" class="form-control required">
		                            </div>
		                            <div class="form-group">
                                    <label>Bank Account Type: <span class="text-danger">*</span></label>
		                               <div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" class="form-input-styled" data-fouc>Saving
											</label>
										</div>
										 <div class="form-check">
											<label class="form-check-label">
												<input type="radio" name="availability" class="form-input-styled" data-fouc>Current
											</label>
										</div>
		                            </div>
									<!--  <div class="form-group">
										<label class="d-block">Applicant resume:</label>
	                                   		 <input type="file" name="resume" class="form-input-styled" data-fouc>
	                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                    </div>
                                     <div class="form-group">
										<label class="d-block">Applicant resume:</label>
	                                   		 <input type="file" name="resume" class="form-input-styled" data-fouc>
	                                    <span class="form-text text-muted">Accepted formats: pdf, doc. Max file size 2Mb</span>
                                    </div> -->
								</div>
							</div>
						</fieldset>
					</form>
	            </div>
	            <!-- /wizard with validation -->
</div>