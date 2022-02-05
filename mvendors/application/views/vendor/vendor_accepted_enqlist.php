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
    <?php }elseif ($this->session->flashdata('event_error')) { ?>
    	<div class="alert alert-warning alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('event_error') ?> </div></div>
   <?php } ?>

	<!-- Highlighting rows and columns -->
	<div class="card">
		<div class="card-header header-elements-inline">
			<h4 class="card-title">Accepted Enquiries</h4>
			<!-- <a href="<?php //echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a> -->	
		</div>
		<div class="table-responsive">
		<!-- <table id="table1" class="table table-bordered datatable-button-init-basic"> -->
			<table id="table1" class="table table-bordered">
			<thead>
				<tr>
					<th>Order<br>No.</th>
					<th>Assinged</th>
					<th>Product/ Service</th>
					<th>User Name</th>
					<th>Mobile No.</th>
                   	<th>Email</th>
                    <th>Address</th> 
                    <th>Shipping Address</th>
                    <th>City</th> 
                    <th>Enq.Date</th>
                    <th>Status</th>
                   	<th>Actions</th>
					<th>Quotations</th>
					<th>PO</th>
					<th>Reply</th>
				</tr>
			</thead>
			<tbody>
				<?php //$i=1; 
				//print_r($userenq);	
				foreach($userenq as $row) {?>
				<tr>
					<!-- <td><?php //echo $i++?></td> -->
					<td><?php echo $row->enq_id?></td>

					<td class="th-delate"><input type="checkbox" class="sub_chk" <?php if($row->res_enq_assigned=='Assigned') echo 'checked'; ?> onclick="return false;" ></td>	  

				<?php if($row->enq_pro_subcat_id !='') 
				{?>
                  <td><?php echo $row->sub_category_title;?></td>
                  <?php
                   } else if($row->enq_ser_subcat_id !='') {?>
                  <td><?php echo $row->sub_category_title;?></td>
                  <?php }?>

                  <td><?php echo $row->ufname.' '.$row->ulname?></td>

                  <!-- <?php //if($row->enq_ser_subcat_id !=''){?>
                  <td><?php //echo $row->sub_category_title;?></td>
                  <?php //} else{?>
                    <td>N.A.</td>
                  <?php //}?> -->

                  <td><?php echo $row->umobile;?></td>
                  <td><?php echo $row->uemail;?></td>
                  <td style="white-space:normal; width:35%;"><?php echo $row->uaddress;?></td>
                  <td style="white-space:normal; width:35%;"><?php echo $row->enq_ship_add;?></td>
                  <td><?php echo $row->city_name;?></td>
                  <td><?php echo $row->enq_created;?></td>
                 <!--  <?php 
                  	//if($row->atch_name!=''){
                  ?> -->
				  <!-- <td><a target='_blank' class='btn badge bg-success badge-pill' href="<?php //echo $row->atch_name;?>">View</a></td> -->
				 <!--  <?php // } else { ?>
					<td>N.A.</td>
				  <?php // } ?> -->

                  <td><span class="badge bg-blue"><?php echo $row->res_enq_status;?></span></td>

					<td>
						<!-- <?php
						//if($row->res_enq_status=="Active"){
						?> -->
						<a class="enq_details" data-toggle="modal" data-id="<?php echo $row->enq_id;?>" data-vid="<?php echo $row->res_vend_id;?>" data-userid="<?php echo $row->user_id;?>" data-target="#EnqDetails"  href="#"><button class="btn badge bg-success badge-pill">View Enquiry Details<br>& Send Quotation</button></a> 
					<!--  </td>
					<td> -->
						<!-- <a href="#" onclick="decline_enq(<?php //echo $row->res_id;?>);"><button class="btn bg-danger">Decline</button></i></a> -->
						<!-- <?php // }else{?> -->

						 <!-- <a class="enq_details" data-toggle="modal" data-id="<?php // echo $row->enq_id;?>" data-vid="<?php // echo $row->res_vend_id;?>" data-userid="<?php // echo $row->user_id;?>" data-target="#EnqDetails"  href="#">View Details </a> -->
					<!-- <?php //} ?> -->

					</td>
					<?php 
						$sql= 'SELECT * FROM tbl_vendor_quot  WHERE  quot_vend_id ='. $row->res_vend_id.' AND quot_enq_id ='. $row->enq_id;
                        $query= $this->db->query($sql);
                        $quot_cnt= $query->num_rows();
                        //echo $quot_cnt;

                        if($quot_cnt==0){
					?>
					<td><?php echo $quot_cnt;?></td>
					<?php } else{ ?>

					<td>
						<a class="quot_details" data-toggle="modal" data-target="#QuotDetails" data-id="<?php echo $row->enq_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">View Previous<br> Quotations(<?php echo $quot_cnt;?>)</button></a> 
					</td>
						<?php } ?>

						<?php 
						$sql= 'SELECT * FROM tbl_user_po  WHERE  po_vend_id ='. $row->res_vend_id.' AND po_enq_id ='. $row->enq_id;
                        $query= $this->db->query($sql);
                        $po_cnt= $query->num_rows();
                        //echo $quot_cnt;

                        if($po_cnt==0){
					?>
					<td><?php echo $po_cnt;?></td>
					<?php } else{ ?>
					<td>
						<a class="po_details" data-toggle="modal" data-target="#PODetails" data-id="<?php echo $row->enq_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">View All<br> PO(<?php echo $po_cnt; ?>)</button></a> 
					</td>
					<?php } ?>

					<td>
						 <a  href="modal_smallrep" onclick="repemail('<?php echo $row->enq_id ?>')" data-toggle="modal" data-target="#modal_smallrep"><button class="btn badge bg-teal-400 badge-pill">Reply<br></button></a>
					</td>	

					<!-- <td>
						<a class="eway_details" data-toggle="modal" data-target="#Eway_Details" data-id="<?php //echo $row->enq_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">View/Upload<br>E-Way Bill</button></a> 
					</td> -->

				</tr>
				<?php  }?>
			</tbody>
		</table>
	</div>
</div>
	<!-- /highlighting rows and columns -->

	<!--Quotation Popup Start-->  <!-- updated on 18 Dec 2018 -->
 <div id="EnqDetails" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-6">
               
                   		<h5>Enquiry Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
             			<div class="table-rep-plugin">
                    		<div class="table-responsive" data-pattern="priority-columns">
                       		 	<table id="datatable" class="table table-striped tbldata"> </table>
                        	</div>
						</div>
               			<hr>
        	 		</div>
        	 		<div class="col-md-6">
                 	<form id="quot-form" name="quot-form"  enctype="multipart/form-data" method="POST" action="<?php echo base_url("Inquiry/upload_quot");?>">
	                 	<input type="hidden" name="enqId" id="enqId">
	                 	<input type="hidden" name="userId" id="userId">
						<h5>Send Quotation<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
             		
             			<div class="row">
                   			<div class="col-md-12">
								<div class="row">
	                   				<div class="col-md-6 form-group">
	                   					<label for="Product/Service">Product/<br>Service<span class="required"></span></label>
	                   				</div>
		                   			<div class="col-md-6 form-group">
		                   				<input type="text" id="pro_ser" name= "pro_ser" readonly="" class="form-control" >
		                   			</div>
                   				</div>

                   				<div class="row">
		                   			<div class="col-md-6 form-group">
		                   				<label for="Quantity">Quantity<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-3 form-group">
		                   				<input type="number" id="qty" name= "qty" class="form-control" required ></div>
		                   			<div class="col-md-3 form-group">
		                   				<select name="unit" class="form-control">
		                   					<option value="Unit">Unit</option>
		                   				</select>
	                   				</div>
                   				</div>	

                   				<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Delivery Time">Delivery Time(Days)<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-6 form-group">
		                   				<input type="number" id="d_time" name= "d_time" required class="form-control">
		                   			</div>
								</div>

	                   			<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Rate">Rate per Unit (Rs.)(Rate+GST)<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-3 form-group">
		                   				<input type="number" id="rate" name= "rate" required class="form-control" placeholder="Rate per Unit">
		                   			</div>
		                   			<div class="col-md-3 form-group">
		                   				<input type="number" id="gst" name= "gst" required class="form-control" placeholder="GST%">
		                   			</div>
		                   		</div>

                   				<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Total Rate">Total Rate per Unit<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-6 form-group">
		                   				<input type="text" id="tot" name= "tot" required class="form-control" placeholder="Total Rate" readonly="">
		                   			</div>
                   				</div>

	                   			<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Total Rate">Transportation Rate<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-6 form-group">
		                   				<input type="text" id="t_rate" name= "t_rate" required class="form-control" placeholder="Transportation Rate">
		                   			</div>
	                   				
	                   			</div>
	                   			
	                   			<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Total Rate"><strong>Total</strong><span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-6 form-group">
		                   				<input type="text" id="ftot" name= "ftot" required class="form-control" placeholder="Transportation Rate" readonly>
		                   			</div>
	                   				
	                   			</div>

	                   			<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Message">Message<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-6 form-group">
		                   				<textarea id="q_msg" name= "q_msg" class="form-control"> </textarea>
		                   			</div>
	                   				
	                   			</div>

	                   			<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Terms">Terms & Conditions<span class="required"></span></label>
		                   			</div>
		                   			<div class="col-md-6 form-group">
		                   				<textarea id="terms" name= "terms" class="form-control"> </textarea>
		                   			</div>
	                   				
	                   			</div>
                   			
	                   			<div class="row">
	                   				<div class="col-md-6 form-group">
		                   				<label for="Upload">Upload Quotation<span class="required"></span></label>
		                   			</div>
		                 <!--17/01/2019 -->  			
		                   			<div class="col-md-6 form-group">
		                   				<input type="file" id="quot" name= "quot" class="form-control fileUpload">
		                   				<br>

		                   				<div class="upload-demo">
								    		<div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
										</div>
		                   			</div>
		                 <!--17/01/2019 -->  
	                   			</div>

	                   			<!-- testing 17/01/2019 -->
									<!-- <input class="fileUpload" name="profilepic" type="file" value="Choose a file"> -->
								 
								<!-- testing -->

                   			</div>
                   		</div>
		            	<button id="quot_upload" name="quot_upload" class="button btnSubmit"><span>Send</span></button>
		          	</form>
                	</div>
                    	 	
        	 </div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

       	</div>
    </div>
 </div>
 <!--End of Quotation Popup--> 


 <!--Previous Quot Popup Start-->  				<!-- updated on 18 Dec 2018 -->
 <div id="QuotDetails" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
        
            <div class="modal-body"> 
            	<h5>Previous Quotations<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
            	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped">
                        	<thead>
								<tr>
									<th>Quot.<br>No.</th>
									<th>Product/ Service</th>
									<th>Quantity</th>
									<th>Delivery Time</th>
									<th>Rate per Unit</th>
									<th>GST(%)</th>
									<th>Total Rate per Unit</th>
									<th>Transportation Rate</th>
									<th>Message</th>
				                    <th>Terms & Conditions</th> 
				                    <th>Quotation Date</th>
				                   	<th>Attached File</th>

								</tr>
							</thead>
							<tbody class='tbldata1' id='tbldata1'>
								
							</tbody>
                                        
               			</table>
                        
                      
                    </div>

                </div>
                
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

        </div>
    </div>
      
  </div>
  
 <!--End of Previous Quot Popup--> 
<!--Previous Quot Popup Start-->  				<!-- updated on 19 Dec 2018 -->
 <div id="PODetails" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
        
            <div class="modal-body"> 
            	<h5>All PO<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
            	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped">
                        	<thead>
								<tr>
									<th>Sr.<br>No.</th>
									<th>Product/ Service</th>
									<th>Quantity</th>
									<th>Delivery Time</th>
									<th>Credit Time</th>
									<th>Rate</th>
				                   	<th>Message</th>
				                    <th>Terms & Conditions</th> 
				                    <th>Quotation Date</th>

				                   	<th>Attached File</th>
				                   	<th>Status</th>
				                   	<th>Action</th>

								</tr>
							</thead>
							<tbody class='tbldata2' id='tbldata2'>
								
							</tbody>
                                        
               			</table>
					</div>

                </div>
                
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

        </div>
    </div>
      
  </div>
  
 <!--End of Previous Quot Popup--> 




</div>
<!-- /content area -->


<!-- Small Replay -->
<div id="modal_smallrep" class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reply on Mail</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form method="post" action="<?php echo base_url(); ?>Vendor/sendEmail" >
      <div class="modal-body">
        <input type="hidden" id="enid" name="enid" class="form-control"> 
        <input type="hidden" id="um" name="umobile" class="form-control">
        <input type="text" id="na" name="name" class="form-control" readonly>
        <input type="text" id="em" name="email" class="form-control" readonly>
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
	$('#table1').dataTable( {
	   // "order": [],
	    "aaSorting": []

	    // Your other options here...
	} );
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

	/*$(".form-wizard").formwizard({
    disableUIStyles: true,
    disableInputFields: false,
    inDuration: 150,
    outDuration: 150
});*/
</script>

<script type="text/javascript">						//9 Jan 2019
	$(document).ready(function (){
		$("#gst").focusout(function(){
			var rate = parseInt($('#rate').val());
			var gst = (parseInt($('#gst').val())/100)* rate;
			//alert(gst);

    		var tot = rate + gst;
    		//alert(tot);
    		$('#tot').val(tot);
  		});
	});
	
</script>	
<script type="text/javascript">						//28 Jan 2019
	$(document).ready(function (){
	//	$("#t_rate").focusout(function(){
    	$("#t_rate").on('change', function() {

			var tot = parseInt($('#tot').val());
			var t_rate = parseInt($('#t_rate').val());
			//alert(gst);

    		var ftot = t_rate + tot;
    		//alert(ftot);
    		$('#ftot').val(ftot);
  		});
	});
	
</script>
<!-- <script type="text/javascript">					//Updated on 11 Dec 2018
        function accept_enq(enq_id)
				{	
					//alert(enq_id);
					if(enq_id!="")
					{
						var conf= confirm("Once you accept this Enquiry, required points will be automatically deducted.Are you sure you want to accept this enquiry?");
						
						if(conf)
						{
							window.location.href= "<?php //echo site_url('Inquiry/accept_enquiry');?>?id="+enq_id;
						}
					}
				}

		 function decline_enq(res_id)					//Updated on 13 Dec 2018
				{	
					//alert(enq_id);
					if(res_id!="")
					{
						var conf= confirm("Once you decline this Enquiry, this enquiry will be automatically closed for you.");
						
						if(conf)
						{
							window.location.href= "<?php //	echo site_url('Inquiry/decline_enquiry');?>?id="+res_id;
						}
					}
				}
</script> -->

<script type="text/javascript">
	
	$(".enq_details").click(function(e){							//11 Dec 2018			//10 Jan 2018
			var enq_Id = $(this).data('id');
			var vid = $(this).data('vid');
			var user_Id = $(this).data('userid');
			$('.tbldata').html('');


			$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_details");?>',
							data: {enq_Id:enq_Id,vid:vid,user_Id:user_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('.tbldata').html('');
							 	//alert(data);
								var mydata= JSON.parse(data);
								   /*  for(i = 0;i<mydata.enq.length;i++) {	
											alert(mydata.enq[i].enq_id);
											alert(mydata.enq[i].enq_user_id);
									}*/
								//mydata.enq[0].sub_category_title

								if(mydata.quot ==''){
									//alert('empty');
									$("#qty").val(mydata.enq[0].enq_qty);

								}
								else{
									//alert('not empty');
									$("#qty").val(mydata.quot[0].quot_qty);
									$("#d_time").val(mydata.quot[0].quot_deli_time);
									$("#rate").val(mydata.quot[0].quot_rate);
									$("#gst").val(mydata.quot[0].quot_gst);
									$("#tot").val(mydata.quot[0].quot_tot_rate);
									$("#t_rate").val(mydata.quot[0].quot_trans_rate);
									$("#q_msg").val(mydata.quot[0].quot_msg);
									$("#terms").val(mydata.quot[0].quot_terms_cond);
									//$("#d_time").val(mydata.quot[0].quot_name);
									
								}

								$("#enqId").val(mydata.enq[0].enq_id);
								$("#userId").val(mydata.enq[0].enq_user_id);
							
								if(mydata.enq[0].enq_pro_subcat_id !=0){
									$("#pro_ser").val(mydata.enq[0].sub_category_title);
								}

								if(mydata.enq[0].enq_ser_subcat_id !=0){
									$("#pro_ser").val(mydata.enq[0].sub_category_title);
								}

								

							    var tr=[];
							        /*tr.push('<tr>');
							        tr.push("<th> Name</td>");
							        tr.push("<td>" + mydata[0]['ufname']+" "+mydata[0]['ulname'] + "</td>");
							        tr.push('</tr>');*/
							        /*tr.push('<tr>');
							        tr.push("<th> Mobile No.</td>");
							        tr.push("<td>" + mydata[0]['umobile'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');
							        tr.push("<th> Email</td>");
							        tr.push("<td>" + mydata[0]['uemail'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');
							        tr.push("<th> Address</td>");
							        tr.push("<td>" + mydata[0]['uaddress'] + "</td>");
							        tr.push('</tr>');*/

							       	if(mydata.enq[0].enq_ser_subcat_id !=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata.enq[0].sub_category_title + "</td>");
							        tr.push('</tr>');
							   		}

							   		if(mydata.enq[0].enq_qty !=null && mydata.enq[0].enq_unit !=null){
							        tr.push('<tr>');
							        tr.push("<th> Quantity</td>");
							        tr.push("<td>" + mydata.enq[0].enq_qty +" "+mydata.enq[0].enq_unit+ "</td>");
							        tr.push('</tr>');
							    	}

							        tr.push('<tr>');
							        tr.push("<th> Message</td>");
							        tr.push("<td style='white-space:normal; width:25%;'>" + mydata.enq[0].enq_msg + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');

							        if(mydata.enq[0].enq_crdt_time !=null){
							        tr.push("<th> Credit Time</td>");
							        tr.push("<td>" + mydata.enq[0].enq_crdt_time + " Days</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata.enq[0].enq_oder_req_time !=null){
							        tr.push('<tr>');
							        tr.push("<th> Order Required Time</td>");
							        tr.push("<td>" + mydata.enq[0].enq_oder_req_time + " Days</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata.enq[0].enq_exptd_date !=null){
							        tr.push('<tr>');
							        tr.push("<th> Expected Date</td>");
							        tr.push("<td>" + mydata.enq[0].enq_exptd_date + "</td>");
							        tr.push('</tr>');
							    	}

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Date</td>");
							        tr.push("<td>" + mydata.enq[0].enq_created + "</td>");
							        tr.push('</tr>');
							      
								if(mydata.enq[0].atch_name !=null){

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        						        
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata.enq[0].atch_name +">View</a></td>");
							    	
							        tr.push('</tr>');
							       
							    }
							    
							    $('.tbldata').append($(tr.join('')));
							   
						}
						
					});


			});
</script>

<script type="text/javascript">		
	$(".quot_details").click(function(e){							//18 Dec 2018
			var enq_Id = $(this).data('id');
			var i = 0;

			$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_quot_details");?>',
							data: {enq_Id:enq_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('#tbldata1').html('');
							 //alert(data);
								var mydata= JSON.parse(data);
								//alert(mydata);
								
							for(i=0; i<mydata.length; i++)
							{

							    var tr=[];
							        
							        tr.push('<tr>');
							      
							        tr.push("<td>"+mydata[i]['quot_count']+"</td>");
							       
							        tr.push("<td>" + mydata[i]['sub_category_title'] + "</td>");
							       
							        tr.push("<td>" + mydata[i]['quot_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							       
							        tr.push("<td>" + mydata[i]['quot_deli_time'] + " Days</td>");

							        tr.push("<td>" + mydata[i]['quot_rate'] + "</td>");

							        tr.push("<td>" + mydata[i]['quot_gst'] + "</td>");

							        tr.push("<td>" + mydata[i]['quot_tot_rate'] + "</td>");

							        tr.push("<td>" + mydata[i]['quot_trans_rate'] + "</td>");
							       
							       	tr.push("<td style='white-space:normal; width:25%;'>" + mydata[i]['quot_msg'] + " Days</td>");

							        tr.push("<td>" + mydata[i]['quot_terms_cond'] + "</td>");
							       
							        tr.push("<td>" + mydata[i]['quot_created'] + "</td>");
							       
							        if(mydata[i]['quot_name']!='')
							        {
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[i]['quot_name'] +">View</a></td>");
							    	} else 
							    	{
							    	tr.push("<td>N.A.</td>");
							    	}

							        tr.push('</tr>');

							         $('#tbldata1').append($(tr.join('')));
							}    
							    
							   
							   // var enq_Id =null;*/
						}
						
					});


			});

	/*$(document).ready (function(){
		//$("#EnqDetails").click(function(event){
		$('#EnqDetails').on("click",function(){
			jQuery('#EnqDetails').modal('show');
		});
	});*/
</script> 
<script type="text/javascript">		
	$(".po_details").click(function(e){							//19 Dec 2018
			var enq_Id = $(this).data('id');
			var i = 0;

			$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_po_details");?>',
							data: {enq_Id:enq_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('#tbldata2').html('');
							 //alert(data);
								var mydata= JSON.parse(data);
								//alert(mydata);
								
							for(i=0; i<mydata.length; i++)
							{

							    var tr=[];
							        
							        tr.push('<tr>');
							      
							        tr.push("<td>"+mydata[i]['po_count']+"</td>");
							       
							        tr.push("<td>" + mydata[i]['sub_category_title'] + "</td>");
							       
							        tr.push("<td>" + mydata[i]['po_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							       
							        tr.push("<td>" + mydata[i]['po_deli_time'] + " Days</td>");

							        tr.push("<td>" + mydata[i]['po_credit_time'] + " Days</td>");

							        tr.push("<td>" + mydata[i]['po_rate'] + "</td>");
							       
							       	tr.push("<td style='white-space:normal; width:35%;'>" + mydata[i]['po_msg'] + " Days</td>");

							        tr.push("<td style='white-space:normal; width:35%;'>" + mydata[i]['po_terms_cond'] + "</td>");
							       
							        tr.push("<td>" + mydata[i]['po_created'] + "</td>");

							        if(mydata[i]['po_name']!='')
							        {
							       
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[i]['po_name'] +">View</a></td>");
							   		 }else 
							    	{
							    	tr.push("<td>N.A.</td>");
							    	}

							        /*tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[i]['po_name'] +">View</a></td>");*/
							        tr.push("<td>" + mydata[i]['po_quot_status'] + "</td>");


							        tr.push("<td><a href='#' onclick='accept_po("+ mydata[i]['po_id']+","+enq_Id+")'><button class='btn badge bg-success badge-pill'>Accept</button></a> </td>");

							        tr.push('</tr>');

							         $('#tbldata2').append($(tr.join('')));
								}    
							}
						
					});


	});

	function accept_po(po_id,enq_id)
				{	
					//alert(enq_id);
					if(po_id!="")
					{
						var conf= confirm("By accepting this PO, you will confirm a Deal!");
						
						if(conf)
						{
							window.location.href= "<?php echo site_url('Inquiry/accept_PO');?>?id="+po_id+"&enq_id="+enq_id;
						}
					}
				}

</script> 
<script type="text/javascript">
	function repemail(id){
	 $("#enq_user_id").val(id);
	    $.ajax({
	            type: 'post', 
	            url: '<?php echo base_url("Vendor/getVEmail");?>',
	            data: {id:id},
	            success: function(data)
	            {   
	            	
	          var jsonData = $.parseJSON(data);
	          for (var i = 0; i < jsonData.email.length; i++) {
	          var counter = jsonData.email[i];
	          console.log(counter.uemail);
	        
	      }
	        $('#na').val(counter.ufname +' '+counter.ulname);
	        $('#em').val(counter.uemail);
	        //$('#um').val(counter.vmobile);
	            },
	        }); 
	}
</script>
