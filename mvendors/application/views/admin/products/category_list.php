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
    <?php }elseif ($this->session->flashdata('error')) { ?>
    	<div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('error') ?> </div></div>
    <?php } ?>


	<!-- Highlighting rows and columns -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h5 class="card-title">Result for "All Category"</h5>
			<a href="<?php echo base_url('Category/addcategory');?>"><button type="button" class="btn btn-primary legitRipple">Add category<div class="legitRipple-ripple"></div></button></a>	
		</div>
		<table class="table table-bordered datatable-button-init-basic">
			<thead>
				<tr>
					<th>ID</th>
					<th>Category</th>
					<th>Images</th>
					<th>Created Date</th>
					<th>Updated Date</th>
					<th>Status</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($result as $row) {?>
				<tr>
					<td><?php echo $i++?></td>
					<td data-toggle="tooltip" title="<?php echo $row->category_title ?>"><?php echo $row->category_title ?></td>
					<td>
					<?php if($row->category_pic) {?>
						<img src="<?php echo base_url();?>assets/uploads/category/<?php echo $row->category_pic ?>"  onError="this.src = '<?php echo base_url().'assets/uploads/no_image.jpg';?>'" id="img" class="avatar img-responsive rounded img_size" alt="avatar" style="height: 30px; width: 60px"; >
						<?php 
						}else{ ?>
							<img src="<?php echo base_url();?>assets/uploads/no_image.jpg" id="img" class="avatar img-responsive rounded img_size" alt="avatar" style="height: 30px; width: 60px";>
					<?php	} ?>
					</td>
					<th><?php echo $row->category_c_date ?></th>
					<th><?php echo $row->category_u_date ?></th>
					<td><?php if($row->category_status=='ACTIVE'){?>
					<a href="<?php echo base_url().'Category/makeCategoryInactive/'.$row->category_id;?>"><span class="badge badge-success">Active</span></a>
					  <?php }else{ ?>
					<a href="<?php echo base_url().'Category/makeCategoryActive/'.$row->category_id;?>"><span class="badge badge-danger">Inctive</span></a>
					  <?php }?></td>
					  
					<td class="text-center">
						<a href="<?php echo base_url().'Category/updatecategory/'.$row->category_id;?>"><i class="icon-pencil7"></i></a>
						<!-- <a href="<?php //echo base_url().'Category/delete_category/'.$row->category_id;?>"onClick="return doconfirm();"><i class="icon-trash"></i></a> -->
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