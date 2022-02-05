
<div class="content">
	<!-- Colors -->
	<div class="card" style="padding:20px;">
		<div class="card-header header-elements-inline">
			<h2 class="card-title">Access Rights</h2>
		</div>

		<div class="card-body">
		<form method="Post"> 
			<?php foreach($subadmin as $row) { 
				$rights=explode(',', $row->arights);
				
				?>
			<div class="row">
				<div class="col-md-9" style="padding: 20px; border: solid 1px #cccccc;">
					<div class="form-group mb-3 mb-md-2">
						
						<div class="row">
							<div class="col-md-6">
								<input type="hidden" id="admin_id" name="admin_id" class="form-control" value="<?php echo $row->admin_id; ?>">
								<div class="form-group">
										<label>Subadmin Name:</label>
										<input type="text" class="form-control" value="<?php echo $row->afname; ?>" readonly>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												Products
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox1" name="checkbox[]" value="Product" <?php if(in_array("Product", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Settings
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox2" name="checkbox[]"  value="Settings" <?php if(in_array("Settings", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Advertise
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox3" name="checkbox[]"  value="Advertise" <?php if(in_array("Advertise", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>
										<div class="form-check">
											<label class="form-check-label">
												Vendors
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox3" name="checkbox[]"  value="Vendors" <?php if(in_array("Vendors", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												Notification
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox1" name="checkbox[]" value="Notification"<?php if(in_array("Notification", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Admin Product
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox2" name="checkbox[]" value="Admin Product" <?php if(in_array("Admin Product", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Vendor Product
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox3" name="checkbox[]" value="Vendor Product" <?php if(in_array("Vendor Product", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>
										<div class="form-check">
											<label class="form-check-label">
												Order Details
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox3" name="checkbox[]" value="Order Details" <?php if(in_array("Order Details", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
										<label>Subadmin Email:</label>
										<input type="text" class="form-control" value="<?php echo $row->aemail; ?>" readonly>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												Media
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox1" name="checkbox[]" value="Media"  <?php if(in_array("Media", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Users
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox2" name="checkbox[]" value="Users" <?php if(in_array("Users", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Reviews
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox3" name="checkbox[]" value="Reviews" <?php if(in_array("Reviews", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-check">
											<label class="form-check-label">
												Enquiry
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox1" name="checkbox[]" value="Enquiry" <?php if(in_array("Enquiry", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Reports
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox2" name="checkbox[]" value="Reports" <?php if(in_array("Reports", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>

										<div class="form-check">
											<label class="form-check-label">
												Expert Suggestion
											</label>
											<input type="checkbox" class="form-check-input-styled-primary" id="checkbox3" name="checkbox[]" value="Expert Suggestion" <?php if(in_array("Expert Suggestion", $rights)){ echo " checked=\"checked\""; } ?>>
												
										</div>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="input-group">
							<button type="submit" id="btn_submit" name="btn_submit" class="btn btn-sm btn-primary">
								Submit
								<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
							</button> 
						</div>
					</div>
				</div>

				
			</div>
			<?php } ?>
			</form>
		</div>
	</div>
	<!-- /colors -->
</div>

<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/styling/switch.min.js"></script>

<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>