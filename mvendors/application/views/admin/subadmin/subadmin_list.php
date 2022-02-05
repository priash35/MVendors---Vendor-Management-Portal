<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>




	<!-- /theme JS files -->
<div class="content">
			
				<!-- Highlighting rows and columns -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Results for "Subadmin List"</h5>
						<a href="<?php echo base_url('Madmin/add_subadmin');?>"><button type="button" class="btn btn-primary legitRipple">Add New Sub Admin<div class="legitRipple-ripple"></div></button></a>	
					</div>

					<!--<div class="card-body">
					</div>-->

					<table id="tableresult" class="table table-bordered datatable-button-init-basic">
						<thead>
						
							<tr>
								<th>Id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th style="display: none;">Gender</th>
								<th style="display: none;">Dob</th>
								<th>Status</th>
								<th class="text-center">Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php $i = 1;?>
						<?php //print_r($subadmin);
						 foreach($subadmin as $row)
						{
							
						?>
							<tr>
								<td><?php echo $i++; ?></td>
								<td><a href="#"><?php echo $row->afname; ?></a></td>
								<td><?php echo $row->aemail; ?></td>
								<td><?php echo $row->amobile; ?></td>
								<td style="display: none;"><?php echo $row->agender; ?></td>
								<td style="display: none;"><?php echo $row->adob; ?></td>
								<td style="display: none;"><?php echo $row->aaddress; ?></td>
								<td><?php if($row->astatus == 'ACTIVE') {?>   
								
								<a href="<?php echo base_url().'Madmin/subadmin_publish/'.$row->admin_id;?>"><span class="badge badge-success">Active</span></a>	<?php } else { ?>
									
								<a href="<?php echo base_url().'Madmin/subadmin_makeinactive/'.$row->admin_id;?>"><span class="badge badge-danger">Inactive</span></a> <?php }?>
								</td>
								<td class="text-center">
								<?php if($row->astatus == 'ACTIVE')
									{
									?><a class="btn bg-primary legitRipple"  href="<?php echo base_url('Madmin/accessrights/'.$row->admin_id);?>" id="right_<?php echo $row->admin_id; ?>"  >Right</a>
									<?php } ?>
									<button type="button" id="btninfo" class="btn bg-primary legitRipple" data-toggle="modal" data-target="#modal_theme_primary">More Info</button>
								</td>
							</tr>
							<?php }
							?>
						</tbody>
					</table>
				</div>
				<!-- /highlighting rows and columns -->
				  <!-- Primary modal -->
				  <div id="modal_theme_primary" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h6 class="modal-title">Subadmin Information</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<table class="table datatable-basic table-bordered dataTable no-footer" id="DataTables_Table_3" role="grid" aria-describedby="DataTables_Table_3_info">
								<thead>
									<!--<tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-sort="ascending" aria-label="First Name: activate to sort column descending">First Name</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Last Name: activate to sort column ascending">Last Name</th></tr>-->
								</thead>
								<tbody>
								<!--<?php //foreach($subadmin as $row)
								{?>
								<tr role="row" class="odd">
										<td class="sorting_1">Name</td>
										<td><?php// echo $row->afname?></td>
								</tr>
								<?php
								}?>-->
								<tr role="row" class="odd">
										<td class="sorting_1">Id</td>
										<td><p id="one"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Name</td>
										<td><p id="one"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Email</td>
										<td><p id="two"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Mobile Number</td>
										<td><p id="three"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Gender</td>
										<td><p id="four"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Date Of Birth</td>
										<td><p id="five"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Address</td>
										<td><p id="six"></p></td>
								</tr>
								<tr role="row" class="odd">
										<td class="sorting_1">Subadmin Status</td>
										<td><p id="seven"></p></td>
								</tr>
								</tbody>
								</table>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							<!--	<button type="button" class="btn bg-primary">Save changes</button>-->
							</div>
						</div>
					</div>
				</div>
				<!-- /primary modal -->
	</div>

	<script>
	$('#tableresult tr').click(function(event) {
		$(this).find("td").each(function(index) {
			$($("p").get(index)).html($(this).text());
		}); 

		 /*var name = $(this).closest('tr').find('#c_name').html();
		 $('#one').html(name);
		 var email = $(this).closest('tr').find('#c_mail').html();
		 $('#two').html(email);
		 var mob = $(this).closest('tr').find('#c_mob').html();
		 $('#three').html(mob);*/
	});
	</script>