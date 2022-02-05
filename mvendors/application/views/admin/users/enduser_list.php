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
			<h5 class="card-title">Results for "User List"</h5>
		</div>
		<table class="table table-bordered datatable-button-init-basic">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile Nubmer</th>
          <th>Organization</th>
          <th>User Referal Id</th>
					<th class="text-center">Status</th>
          <th>Created Date</th>
					<th>Actions</th>
          <th>Add Note</th>
          <th>Send Email</th>

				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($enduser as $row) {?>
				<tr>
					<td><?php echo $i++?></td>
					<td><a href="<?php echo base_url('Madmin/allUserData');?>/<?php echo $row->user_id;?>"><?php echo $row->ufname ?></a> </td>
					<td><?php echo $row->uemail ?></td>
					<td><?php echo $row->umobile ?></td>
          <td><?php echo $row->uorganization ?></td>
          <td><?php echo $row->ureference ?></td>
					<td><?php if($row->ustatus== 'ACTIVE'){?>
					<a href="<?php echo base_url().'Madmin/makeUserInactive/'.$row->user_id;?>"><span class="badge badge-success">Active</span></a>
					  <?php }else{ ?>
					<a href="<?php echo base_url().'Madmin/makeUserActive/'.$row->user_id;?>"><span class="badge badge-danger">Inctive</span></a>
					  <?php }?></td>
          <td><?php echo $row->ucreated_date?></td>
					<td class="text-center">
						<a href="#" onclick="NewOpen('<?php echo $row->user_id; ?>')" data-toggle="modal" data-target="#modal_form_vertical"><i class="icon-zoomin3" ></i></a>
						<!-- <a href=""onClick="return doconfirm();"><i class="icon-trash"></i></a> -->
					</td>
    
          <td class="text-center">
            <?php 
                $sql= 'SELECT * FROM tbl_user_note  WHERE user_id ='.$row->user_id;
                            $query= $this->db->query($sql);
                            $res= $query->result(); 
                        if(!empty($res)){
                        ?>
              <a  href="modal_small" onclick="update('<?php echo $row->user_id ?>')" data-toggle="modal" data-target="#modal_smallu">Edit</a>
            <?php } else { ?>
              <a  href="modal_small" onclick="check('<?php echo $row->user_id ?>')" data-toggle="modal" data-target="#modal_small">Add Note</a>
            <?php }?>
          </td> 
           <td> 
              <a  href="modal_smallrep" onclick="repemail('<?php echo $row->user_id ?>')" data-toggle="modal" data-target="#modal_smallrep">Send Email</a>
           </td> 
				</tr>
				<?php  }?>
			</tbody>
		</table>
	</div>
	<!-- /highlighting rows and columns -->
</div>


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
          	<div class="col-lg-12">
            	<h3>User Information</h3>
                <table class="table table-bordered">
                  <tbody>
                   	<tr>
						<td class="sorting_1">Name</td>
						<td><p id="ufname"></p> <p id="ulname"></p></td>
					</tr>   
                    <tr>
                      <td class="info">Email-Id</td>
                      <td><p id="uemail"></p></td>
                    </tr>
                    <tr >
                      <td class="info">Mobile Number</td>
                      <td><p id="umobile"></p></td>
                    </tr>
                    <tr >
                      <td class="info">Address</td>
                      <td><p id="uaddress"></p></td>
                    </tr>
                    <tr >
                      <td class="info">Pan No.</td>
                     <td><p id="ugst"></p></td>
                    </tr>
                  </tbody>
                </table>
            </div>
           <!-- <div class="col-lg-6 col-md-6">
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
            </div>-->
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
<!-- Add user Note modal -->
<div id="modal_small" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Note</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>User/addUnote" >
      <div class="modal-body">
      
        <input type="hidden" id="usid" name="usid" > 
        
        <textarea name="us_msg" rows="3" cols="3" class="form-control" placeholder="Add Note" required></textarea>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" name="btn_vnote" class="btn bg-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /End Uer Note modal -->

<!-- Update User Note upadate -->
<div id="modal_smallu" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Note</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>User/updateUnote" >
      <div class="modal-body">
      
        <input type="hidden" id="usrid" name="usrid" > 
        
        <textarea id="u_msg"  name="u_msg" rows="3" cols="3" class="form-control" placeholder="Note" required></textarea> 
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
        <button type="submit" name="btn_up" class="btn bg-primary">Update changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /Update User Note modal -->


<!-- Small Replay -->
<div id="modal_smallrep" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reply on Mail</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>madmin/sendEmail" >
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

function NewOpen(id)
{
	 $.ajax({
	       type: 'post', 
	       url: '<?php echo base_url("Vendor/getAllUserDetials");?>',
		   data: {id:id},
	        success: function(data)
	        {

	        	var obj = $.parseJSON(data);
	        		
	        	  $('#ufname').text(obj.ufname);
				  $('#ulname').text(obj.ulname);
	        	  $('#uemail').text(obj.uemail);
	        	  $('#umobile').text(obj.umobile);
	        	  $('#uaddress').text(obj.uaddress);

	        	  $('#ugst').text(obj.ugst);
				  $/*('#bis_address').text(obj.bis_address);
	        	  $('#bis_mnumber').text(obj.bis_mnumber);
	        	  $('#bis_email').text(obj.bis_email);
	        	  $('#bis_gst').text(obj.bis_gst);
*/
	            ///$('#modal_form').modal('show');*/
	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	            alert('Error get data from ajax');
	        }
	    });
}
</script>
<script>
  function check(id)
  {
    $("#usid").val(id);
  }
  function update(id)
  {
    $("#usrid").val(id);
    $.ajax({
            type: 'post', 
            url: '<?php echo base_url("User/getUnoteData");?>',
            data: {id:id},
            success: function(data)
            {   
              var jsonData = $.parseJSON(data);
          for (var i = 0; i < jsonData.remark.length; i++) {
        var counter = jsonData.remark[i];
      }
        $('#u_msg').val(counter.note_msg);

            },
        }); 
  }
  function repemail(id)
  {
    $("#enq_user_id").val(id);
    $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Madmin/getUserEmail");?>',
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
</script>
<script type="text/javascript">
  $(document).ready (function(){
    $("#deletesuccess").alert();
    window.setTimeout(function () { 
    $("#deletesuccess").alert('close'); }, 2000);
  })
</script>