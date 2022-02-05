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
	<div class="table-responsive">
	<div class="card">

		<div class="card-header header-elements-inline">
			<h5 class="card-title">Results for "Vendors List"</h5>
		</div>
        <div class="table-responsive">
		<table  id="tableresult" class="table table-bordered table-hover datatable-highlight">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Reference</th>
					<th>Email</th>
					<th>Mobile Nubmer</th>
					<th class="text-center">Status</th>
					<th>Show Vendor Details</th> 
					<th>Add Note</th>
					<th>Send Email</th>  

				</tr>
			</thead>
			<tbody>
				<?php 
				//print_r($vendors);
				$i=1; 
				foreach($vendors as $row) {?>
				<tr>
					<td><?php echo $i++?></td>
					<td><a href="<?php echo base_url('Vendor/getAllVendoerData');?>/<?php echo $row->vendor_id; ?>"><?php echo $row->vfname ?></a></td>
					<td><?php echo $row->referralid ?></td>
					<td><?php echo $row->vemail ?></td>
					<td><?php echo $row->vmobile ?></td>
					<td><?php if($row->vstatus== 'ACTIVE'){?>
					<a href="<?php echo base_url().'Vendor/makeVenInactive/'.$row->vendor_id;?>"><span class="badge badge-success">Active</span></a>
					  <?php }else{ ?>
					<a href="<?php echo base_url().'Vendor/makeVenActive/'.$row->vendor_id;?>"><span class="badge badge-danger">Inctive</span></a>
					  <?php }?></td>
					 <td class="text-center">

						<a href="" onclick="getid('<?php echo $row->vendor_id; ?>')" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-zoomin3" ></i></a>
						<!-- <a href="<?php //echo base_url().'Vendor/delete_vendor/'.$row->vendor_id;?>"onClick="return doconfirm();"><i class="icon-trash"></i></a> -->
					</td> 
					 <td class="text-center">
					 	<?php 
					 			$sql= 'SELECT * FROM tbl_vendor_note  WHERE vvan_id ='.$row->vendor_id;
                      			$query= $this->db->query($sql);
                      			$res= $query->result(); 
                      	if(!empty($res)){
                      	?>
							<a  href="modal_small" onclick="update('<?php echo $row->vendor_id ?>')" data-toggle="modal" data-target="#modal_smallu">Edit</a>
						<?php } else { ?>
							<a  href="modal_small" onclick="check('<?php echo $row->vendor_id ?>')" data-toggle="modal" data-target="#modal_small">Add Note</a>
						<?php }?>
					</td>
					 <td class="text-center">
					 	 <a  href="modal_smallrep" onclick="repemail('<?php echo $row->vendor_id ?>')" data-toggle="modal" data-target="#modal_smallrep">Send Email</a>
					 </td> 
				</tr>
				<?php  }?>
			</tbody>
		</table>
		</div>
	  </div>
	</div>
	<!-- /highlighting rows and columns -->
</div>
<!-- /content area -->


  <!-- Vertical form modal -->
<div id="modal_form_vertical" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <h5 class="modal-title">Vertical form</h5> -->
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<form action="#">
				<div class="modal-body">
						
								 <div class="row">
          	<div class="col-lg-6 col-md-6">
            	<h3>Vendor Information</h3>
                <table class="table table-bordered">
                  <tbody>
                   	<tr>
						<td class="sorting_1">Name</td>
						<td><p id="vfname"></p> <p id="vlname"></p></td>
					</tr>   
                    <tr>
                      <td class="info">Email-Id</td>
                      <td><p id="vemail"></p></td>
                    </tr>
                    <tr >
                      <td class="info">Mobile Number</td>
                      <td><p id="vmobile"></p></td>
                    </tr>
                    <tr >
                      <td class="info">Address</td>
                      <td><p id="vaddress"></p></td>
                    </tr>
                    <tr >
                      <td class="info">Pan No.</td>
                     <td><p id="lname"></p></td>
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-6">
            	<h3>Business Information</h3>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="info">Business Name</td>
                      <td><p id="bis_name"></p></td>
                      
                    </tr>      
                    <tr>
                      <td class="info">Business Number</td>
                     <td><p id="bis_mnumber"></p></td>
                      
                    </tr>
                    <tr>
                      <td class="info">Business Email</td>
                      <td><p id="bis_email"></p></td>
                      
                    </tr>
                    <tr>
                      <td class="info">Business Gst</td>
                      <td><p id="bis_gst"></p></td>
                      
                    </tr>
                    <tr>
                      <td class="info">Business Address</td>
                     <td><p id="bis_address"></p></td>
                      
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
          <!--<div class="row">
          	<div class="col-lg-6 col-md-6">
            	<h3>Bank Information</h3>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="info">Bank Name</td>
                      <td>Email-Id</td>
                    </tr>      
                    <tr>
                      <td class="info">Account No.</td>
                      <td>Doe</td>
                    </tr>
                    <tr >
                      <td class="info">Bank Address</td>
                      <td>Moe</td>
                    </tr>
                    <tr >
                      <td class="info">IFSC Code</td>
                      <td>Dooley</td> 
                    </tr>
                  </tbody>
                </table>
            </div>
            <div class="col-lg-6 col-md-6">
            	<h3>Shipping Information</h3>
                <table class="table table-bordered">
                  <tbody>
                    <tr>
                      <td class="info">Shipping Name</td>
                      <td>Defaultson</td>
                      
                    </tr>      
                    <tr>
                      <td class="info">Shipping Contact No</td>
                      <td>Doe</td>
                      
                    </tr>
                    <tr>
                      <td class="info">Shipping Address</td>
                      <td>Moe</td>
                      
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>-->
        </div> </div>


				</div>
			</form>
		</div>
	</div>
</div>
<!-- /vertical form modal -->
<!-- Add Note modal -->
<div id="modal_small" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Note</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="<?php echo base_url(); ?>Vendor/addVnote" >
			<div class="modal-body">
			
				<input type="hidden" id="vid" name="vid" > 
				
				<textarea name="v_msg" rows="3" cols="3" class="form-control" placeholder="Add Note" required></textarea>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" name="btn_vnote" class="btn bg-primary">Save changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /End Note modal -->
<!-- Update Note upadate -->
<div id="modal_smallu" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Update Note</h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form method="post" action="<?php echo base_url(); ?>Vendor/updateVnote" >
			<div class="modal-body">
			
				<input type="hidden" id="uid" name="uid" > 
				
				<textarea id="v_msg"  name="v_msg" rows="3" cols="3" class="form-control" placeholder="Note" required></textarea> 
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" name="btn_up" class="btn bg-primary">Update changes</button>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /Update Note modal -->

<!-- Small Replay -->
<div id="modal_smallrep" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reply on Mail</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>madmin/sendVemail" >
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
	function getid(id)
	{
	 $.ajax({
	       type: 'post', 
	       url: '<?php echo base_url("Vendor/getAllVendoerDetails");?>',
		   data: {id:id},
	        success: function(data)
	        {

	        	var obj = $.parseJSON(data);
	        		
	        	  $('#vfname').text(obj.vfname);
				  $('#vlname').text(obj.vlname);
	        	  $('#vemail').text(obj.vemail);
	        	  $('#vmobile').text(obj.vmobile);
	        	  $('#vaddress').text(obj.vaddress);

	        	  $('#bis_name').text(obj.bis_name);
				  $('#bis_address').text(obj.bis_address);
	        	  $('#bis_mnumber').text(obj.bis_mnumber);
	        	  $('#bis_email').text(obj.bis_email);
	        	  $('#bis_gst').text(obj.bis_gst);

	            ///$('#modal_form').modal('show');*/
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
	}
</script>
<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>
	<script>
	$('#tableresult tr').click(function(event) {
		/*$(this).find("td").each(function(index) {
			$($("p").get(index)).html($(this).text());
		}); */

		 /*var name = $(this).closest('tr').find('#c_name').html();
		 $('#one').html(name);
		 var email = $(this).closest('tr').find('#c_mail').html();
		 $('#two').html(email);
		 var mob = $(this).closest('tr').find('#c_mob').html();
		 $('#three').html(mob);*/
	});
	</script>
<script>
	function check(id)
	{
		$("#vid").val(id);
	}
	function update(id)
	{
		$("#uid").val(id);
		$.ajax({
            type: 'post', 
            url: '<?php echo base_url("Vendor/getVnoteData");?>',
            data: {id:id},
            success: function(data)
            {   
              var jsonData = $.parseJSON(data);
		      for (var i = 0; i < jsonData.remark.length; i++) {
			  var counter = jsonData.remark[i];
			}
			  $('#v_msg').val(counter.vnote);

            },
        });	
	}
	  function repemail(id)
  {
    $("#enq_user_id").val(id);
    $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Madmin/getVendorEmail");?>',
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
        $('#name').val(counter.vfname +' '+counter.vlname);
        $('#email').val(counter.vemail);
        $('#umobile').val(counter.vmobile);
            },
        }); 
  }
</script>