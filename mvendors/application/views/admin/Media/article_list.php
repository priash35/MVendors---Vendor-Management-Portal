	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/extensions/buttons.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>

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
			<h5 class="card-title">Results for "Article List"</h5>
			<a href="<?php echo base_url('Media/add_article');?>"><button type="button" class="btn btn-primary legitRipple">Add New Article<div class="legitRipple-ripple"></div></button></a>	
		</div>
	
		<table class="table table-bordered datatable-button-init-basic">
			<thead>
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Download</th>
					<th>Created On</th>
					<th>Created By</th>
					<th class="text-center">Status</th>
					<th>Actions</th>

				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($article as $row) {?>
				<tr>
					<td><?php echo $i++?></td>
					<td><?php echo $row->blog_title ?></td>
					<td>Download</td>
					<td><?php echo $row->blog_c_date ?></td>
					<td>Admin</td>
					<td><?php if($row->blog_status == 1){?>
					<a href="<?php echo base_url().'Media/makeBloginactive/'.$row->blog_id;?>"><span class="badge badge-success">Active</span></a>
					  <?php }else{ ?>
					<a href="<?php echo base_url().'Media/makeBlogiInactive/'.$row->blog_id;?>"><span class="badge badge-danger">Inctive</span></a>
					  <?php }?></td>
					<td class="text-center">
						<a href="<?php echo base_url().'Media/update_article/'.$row->blog_id;?>"><i class="icon-pencil7"></i></a>
						<a href="<?php echo base_url().'Media/delete_article/'.$row->blog_id;?>"onClick="return doconfirm();"><i class="icon-trash"></i></a>
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