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
			<h5 class="card-title">Results for "Slider List"</h5>
			<a href="<?php echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a>	
		</div>
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>ID</th>
					<th>Slider Title</th>
					<th>Slider Sub Title</th>
					<th>Slider Image</th>
					<th>Created Date</th>
					<th>Updated Date</th>
					<th>Created On</th>
					<th class="text-center">Status</th>
					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($result as $row) {?>
				<tr>
					<td><?php echo $i++?></td>
					<td><?php echo $row->slider_title ?></td>
					<td><?php echo $row->slider_subtitle ?></td>
					<td><?php if($row->slider_pic) {?>
							<img src="<?php echo base_url();?>assets/uploads/slider/<?php echo $row->slider_pic; ?>" id="img" class="img-responsive rounded img_size" alt="avatar" style="height: 30px; width: 60px"; />
							<?php } else {?>
								<img src="<?php echo base_url();?>assets/uploads/no_image.jpg" id="img" class="avatar img-responsive rounded img_size" alt="avatar" style="height: 30px; width: 60px";>
						<?php	} ?>
					</td>
					<td><?php echo $row->slider_c_date ?></td>
					<th><?php echo $row->slider_up_date ?></th>
					<td>Admin</td>
					<td><?php if($row->slider_status=='ACTIVE'){?>
					<a href="<?php echo base_url().'Advertise/makeSliderInactive/'.$row->slider_id;?>"><span class="badge badge-success">Active</span></a>
					  <?php }else{ ?>
					<a href="<?php echo base_url().'Advertise/makeSliderActive/'.$row->slider_id;?>"><span class="badge badge-danger">Inctive</span></a>
					  <?php }?></td>
					<td class="text-center">
						<a href="<?php echo base_url().'Advertise/update_slider/'.$row->slider_id;?>"><i class="icon-pencil7"></i></a>
						<a href="<?php echo base_url().'Advertise/delete_slider/'.$row->slider_id;?>"onClick="return doconfirm();"><i class="icon-trash"></i></a>
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
</script>
<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>