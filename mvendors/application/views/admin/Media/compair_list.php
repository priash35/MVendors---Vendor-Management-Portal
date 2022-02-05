	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>

<!-- Content area -->
<div class="content">
	<!-- Highlighting rows and columns -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Results for "Vendors List"</h5>
		</div>
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Reference</th>
					<th>Email</th>
					<th>Mobile Nubmer</th>
					<th>Shop Name</th>
					<th>Date</th>
					<th class="text-center">Status</th>
					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($vendors as $row) {?>
				<tr>
					<td><?php echo $i++?></td>
					<td><?php echo $row->vfname ?></td>
					<td><?php echo $row->vmobile ?></td>
					<td><?php echo $row->vemail ?></td>
					<td><?php echo $row->vmobile ?></td>
					<th><?php echo $row->vgender ?></th>
					<td><?php echo $row->vcreated_date ?></td>
					<?php if ($row->vstatus == 1) { ?>
						<td><span class="badge badge-success">Active</span></td>
					<?} else{?>
						<td><span class="badge badge-danger">Inctive</span></td>
					<?php }?>
					<td class="text-center">
						<a href=""><i class="icon-zoomin3"></i></a>
						<a href="<?php echo base_url().'Vendor/delete_vendor/'.$row->vendor_id;?>"onClick="return doconfirm();"><i class="icon-trash"></i></a>
					</td>
				</tr>
				<?php  }?>
			</tbody>
		</table>
	</div>
	<!-- /highlighting rows and columns -->
</div>
<!-- /content area -->
<script type="text/javascript">
	function doconfirm()
{
  job=confirm("Are you sure to delete permanently?");
  if(job!=true)
  {
      return false;
  }
} 
</script>>