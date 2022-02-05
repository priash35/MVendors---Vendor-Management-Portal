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
		<div class="table-responsive">
		<table class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>ID</th>
					<th>User Name</th>
					<th>Inquiry Category</th>
					<th>Inquiry Number</th>
					<th>Inquiry Email</th>
					<th>Inquiry Message</th>
					<th>Inquiry Quantity</th>
					<th>Inquiry Credit Days</th>
					<!-- <th>Created On</th> -->
					<th>Actions</th>
					<th>Remarks</th>
						

				</tr>
			</thead>
			<tbody>
				<?php //print_r($uinquiry);

				$i=1; 
				
				foreach($uinquiry as $row) {
					
					?>
				<tr>
			     	<td><?php echo $row->enq_id ?></td>
					<td><?php echo $row->ufname.' '.$row->ulname ?></td>
					<td><?php echo $row->sub_category_title ?></td>
					<td><?php echo $row->umobile ?></td>
					<td><?php echo $row->uemail ?></td>
					<td><?php echo $row->enq_msg ?></td>
					<td><?php echo $row->enq_qty.' '.$row->enq_unit?></td>
					<td><?php echo $row->enq_crdt_time ?> Days</td>
					
					<!-- <td>Admin</td> -->
					<td class="text-center">
						<?php if ($row->enq_type == "Single") { ?>
						<a href=""><i class="icon-lock2"></i></a>
						<?php } else { ?>
						<a href="<?php echo base_url().'Inquiry/assign_orderlist_vendors/'.$row->enq_id;?>">Assign inquery</a>
						<?php }?>
					</td>
					<td class="text-center">
						<?php //if(empty($row->remark_msg)) {

							//print_r($rmark);

							//foreach ($rmark as $key) {
								$sql= 'SELECT * FROM tbl_remark  WHERE enq_id ='.$row->enq_id;
                      			$query= $this->db->query($sql);
                      			$res= $query->result();
						
							if(!empty($res)){
						 ?>
						
							<a  href="modal_small" onclick="update('<?php echo $row->enq_user_id ?>,<?php echo $row->enq_id ?>')" data-toggle="modal" data-target="#modal_smallu">Edit</a>

							<a  href="modal_small" onclick="repemail('<?php echo $row->enq_user_id ?>,<?php echo $row->enq_id ?>')" data-toggle="modal" data-target="#modal_smallrep">Reply</a>
						<?php } else { ?>
								<a  href="modal_small" onclick="check('<?php echo $row->enq_user_id ?>,<?php echo $row->enq_id ?>')" data-toggle="modal" data-target="#modal_small">Add</a>
							
						<?php }?>
						<!--  <a href="<?php //echo base_url().'Advertise/delete_slider/'.$row->enq_id;?>"  data-toggle="modal" data-target="#modal_theme_info"><i class="icon-zoomin3"></i></a>  -->
					</td>
				</tr>
				<?php  }?>
			</tbody>
		</table>
		</div>
	</div>
	<!-- /highlighting rows and columns -->
</div>
<!-- /content area -->


<!-- Small modal -->
<div id="modal_small" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Remark</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="<?php echo base_url(); ?>Inquiry/user_remark" >
			<div class="modal-body">
			
				<input type="hidden" id="enq_user_id" name="enq_user_id" > 
				
				<textarea name="re_msg" rows="3" cols="3" class="form-control" placeholder="Remark" ></textarea>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" name="btn_rem" class="btn bg-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /small modal -->


<!-- Small upadate -->
<div id="modal_smallu" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Remark</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="<?php echo base_url(); ?>Inquiry/update_user_remark" >
			<div class="modal-body">
			
				<input type="hidden" id="enid" name="enid" > 
				
				<textarea id="enmsg"  name="enmsg" rows="3" cols="3" class="form-control" placeholder="Remark" required></textarea> 
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" name="btn_up" class="btn bg-primary">Update changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /small modal -->

<!-- Small Replay -->
<div id="modal_smallrep" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Reply on Mail</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="<?php echo base_url(); ?>Inquiry/sendEmail" >
			<div class="modal-body">
				<input type="hidden" id="enid" name="enid" class="form-control"> 
				<input type="hidden" id="umobile" name="umobile" class="form-control">
				<input type="text" id="name" name="name" class="form-control" readonly>
				<input type="text" id="email" name="email" class="form-control" readonly>
				<input type="text" id="sub" name="sub" class="form-control" placeholder="Subject" required>
				<textarea id="msg"  name="enmsg" rows="3" cols="3" class="form-control" placeholder="Message" required></textarea> 
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" name="btn_up" class="btn bg-primary">Send</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /small Replay -->
<!-- /small email -->
<script type="text/javascript">
	    //var subcat = <?php //echo json_encode($remark); ?>;
	function repemail(id)
	{
		$("#enq_user_id").val(id);
		$.ajax({
            type: 'post', 
            url: '<?php echo base_url("Inquiry/getUserEmail");?>',
            data: {id:id},
            success: function(data)
            {   
               // $('#state').val(data);
                 var jsonData = $.parseJSON(data);
		      // var htmlText = '';
		      for (var i = 0; i < jsonData.email.length; i++) {
			    var counter = jsonData.email[i];
			    console.log(counter.uemail);
			  
			}
			  $('#name').val(counter.ufname +' '+counter.ulname);
			  $('#email').val(counter.uemail);
			  $('#umobile').val(counter.umobile);
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
		$("#enq_user_id").val(id);
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