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
			<h5 class="card-title">Results for "Verified User Enquiry List"</h5>
			<!-- <a href="<?php //echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a> -->	
		</div>
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>ID</th>
					<th>User Name</th>
					<th>Inquiry Number</th>
					<th>Inquiry Category</th>
					<th>Inquiry Message</th>
					<th>Inquiry Quantity</th>
					<th>Inquiry Credit Days</th>
					<th>Inquiry Delivery Days</th>
					<!-- <th>Created On</th> -->
					<th class="text-center">Inquiry Status</th>
				<!--	<th>Actions</th>-->

				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($uinquiry as $row) {?>
				<tr>
				<td><?php echo $row->enq_id ?></td>
					<td><?php echo $row->ufname.' '.$row->ulname ?></td>
					<td><?php echo $row->umobile ?></td>
					<td><?php echo $row->sub_category_title ?></td>
					<td><?php echo $row->enq_msg ?></td>
					<td><?php echo $row->enq_qty .' '.$row->enq_unit ?></td>
					<td><?php echo $row->enq_crdt_time ?></td>
					<th><?php echo $row->enq_oder_req_time ?></th>
					<!-- <td>Admin</td> -->
					<td><?php if($row->enq_status=='Verified'){?>
					<a href="#"><span class="badge badge-success">Verified</span></a>
					  <?php }else{ ?>
					<a href="#"><span class="badge badge-danger">Inctive</span></a>
					  <?php }?></td>
					<!--<td class="text-center">
						<a href="<?php //echo base_url().'Inquiry/update_verified_inquiry/'.$row->enq_id;?>"><i class="icon-pencil7"></i></a>
					</td> -->
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