<!-- Theme JS files -->
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>

<!-- Content area -->
<div class="content">

	<?php if ($this->session->flashdata('event_success')) { ?>
		<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
    <?php } ?>
	<!-- Highlighting rows and columns -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Result for "All Banners"</h5>
			<a href="<?php echo base_url('Advertise/add_banner');?>"><button type="button" class="btn btn-primary legitRipple">Add New Banner<div class="legitRipple-ripple"></div></button></a>	
		</div>
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>Id</th>
					<th>Banner Title</th>
					<th>Banner Image</th>
					<th>Created On</th>
					<th>Created By</th>
					<th class="text-center">Status</th>
					<th>Actions</th>
				</tr>
			</thead>
				<tbody>
			<?php 
			foreach($result as $row){ ?>
			<tr role="row" class="odd">
				<td class="sorting_1"><?php echo $row->banner_id; ?></td>
				<td><?php echo $row->banner_title; ?></td>
				<td>
					<!-- <img src="<?php //echo base_url();?>assets/uploads/advertise/<?php //echo $row->advertise_pic; ?>"> -->
					<?php if($row->banner_pic) {
					?>
						<img src="<?php echo base_url();?>/assets/uploads/banner/<?php echo $row->banner_pic; ?>" id="img" class="img-responsive rounded img_size" alt="avatar" style="height: 30px; width: 60px"; />
						<?php 
						}else{ ?>
							<img src="<?php echo base_url();?>assets/uploads/no_image.jpg" id="img" class="avatar img-responsive rounded img_size" alt="avatar" style="height: 30px; width: 60px";>
					<?php	} ?>
					
				</td>
				<td><?php echo $row->banner_created_date; ?></td>
				<td>admin</td>
				<td><?php if($row->banner_status=='ACTIVE')
					{
					?>       
				<a href="<?php echo base_url().'Advertise/MakeBannerActive/'.$row->banner_id;?>" title="Click here to make Inactive"><span class="badge badge-success">Active</span></a>	<?php }else{ ?>
				<a href="<?php echo base_url().'Advertise/MakeBannerInactive/'.$row->banner_id;?>"><span class="badge badge-danger" title="Click here to make Active">Inactive</span></a> <?php }?></td>
				<td class="text-center">
					<a href="<?php echo base_url().'Advertise/update_banner/'.$row->banner_id;?>"><i class="icon-pencil7"></i></a>&nbsp
					<a href="<?php echo base_url().'Advertise/delete_banner/'.$row->banner_id;?>"onClick="return doconfirm();"><i class="icon-trash"></i></a>
				</td>

			</tr>
		<?php } ?>
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
</script>
<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>