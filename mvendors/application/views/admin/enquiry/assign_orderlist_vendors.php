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
			<h5 class="card-title">Results for "User Enquiry List"</h5>
			<!-- <a href="<?php //echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a> -->	
		</div>
		
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>ID</th>
					<th>Vendor Name</th>
					<th>Shop Name</th>
					<th>Vendor Address</th>
					<th>Vendor Category</th>
					<!-- <th>Created On</th> -->
					<th>Actions</th>
						

				</tr>
			</thead>
			<tbody>
				<?php //print_r($uinquiry);

				$i=1; 
				
				foreach($gallidata as $row) {
					
					?>
				<tr>
					<td><?php echo $row->enq_id ?></td>
					<td><?php echo $row->vfname.' '.$row->vlname ?></td>
					<td><?php echo $row->bis_name ?></td>
					<td><?php echo $row->bis_address ?></td>
					<td><?php echo $row->sub_category_title ?></td>								
					<!-- <td>Admin</td> -->
					<td class="text-center">

						<?php 
								$sql= 'SELECT * FROM tbl_enq_vendor_response  WHERE res_enq_id ='.$row->enq_id.' AND res_vend_id = '.$row->vendor_id.' AND res_enq_status = "Active" ';
                      			$query= $this->db->query($sql);
                      			$res= $query->result();
                
						?>
						<?php if(!empty($res)) { ?>
						<a href="#" onclick="assgninq('<?php echo $row->enq_id.','.$row->vendor_id; ?>')"><span class="badge badge-success">Assign inquery</span></a>
						<?php } else { ?>
						<?php $ides = $row->enq_id.''.$row->vendor_id; ?>
						<a href="#"><span class="badge badge-danger">Assigned </span></a>
						<?php }?>
					</td>
					
				</tr>
				<?php  }?>
			</tbody>
		</table>
	
	</div>
	<!-- /highlighting rows and columns -->
</div>
<!-- /content area -->



<!-- /small email -->
<script type="text/javascript">
	    //var subcat = <?php //echo json_encode($remark); ?>;
	function assgninq(id)
	{
		$.ajax({
            type: 'post', 
            url: '<?php echo base_url("Inquiry/assign_Inqueryto_Vendoer");?>',
            data: {id:id},
            success: function(data)
            {   
               location.reload();
			
            },
        });	
	}

	function update(id)
	{
		$("#enid").val(id);
		$.ajax({
            type: 'post', 
            url: '<?php echo base_url("Inquiry/get_remarks");?>',
            data: {id:id},
            success: function(data)
            {   
               // $('#state').val(data);
                 var jsonData = $.parseJSON(data);
		      // var htmlText = '';
		      for (var i = 0; i < jsonData.remark.length; i++) {
			    var counter = jsonData.remark[i];
			    //console.log(counter.counter_name);
			  
			}
			  $('#enmsg').val(counter.remark_msg);

            },
        });	
	}
</script>

<script type="text/javascript">
	    //var subcat = <?php //echo json_encode($remark); ?>;
	function check(id)
	{
		//$("#enq_user_id").val(id);
		alert(id);
	}

	function update(id)
	{
		$("#enid").val(id);
		$.ajax({
            type: 'post', 
            url: '<?php echo base_url("Inquiry/get_remarks");?>',
            data: {id:id},
            success: function(data)
            {   
               // $('#state').val(data);
                 var jsonData = $.parseJSON(data);
		      // var htmlText = '';
		      for (var i = 0; i < jsonData.remark.length; i++) {
			    var counter = jsonData.remark[i];
			    //console.log(counter.counter_name);
			  
			}
			  $('#enmsg').val(counter.remark_msg);
            },
        });	
	}
</script>

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