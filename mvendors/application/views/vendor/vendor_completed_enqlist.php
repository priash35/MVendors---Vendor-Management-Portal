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
			<h4 class="card-title">Completed Enquiries</h4>
			<!-- <a href="<?php //echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a> -->	
		</div>
		<div class="table-responsive">
		<table class="table table-bordered datatable-button-init-basic">
			<thead>
				<tr>
					<th>Order<br>No.</th>
					
					<th>Product/ Service</th>
					<th>User Name</th>
					<!-- <th>Service</th> -->
					<th>Mobile No.</th>
                   <!-- <th>Unit</th> -->
                    <th>Email</th>
                    <th>Address</th>
                    <th>Shipping Address</th>
                    <th>City</th>
                    <!-- <th>Expectd Date</th> 
                    <th>Message</th>   -->
                    <th>Enq.Date</th>	
                   <th>Status</th>
                   <!--    -->
					<!--<th>Created Date</th> -->
					
					<!-- <th class="text-center">Status</th> -->
					<th>Actions</th>
					<!-- <th>Quotations</th> -->
					<th>Accepted PO</th>
					<th>Enquiry Bill</th>
					<th>E-Way Bill</th>
					<th>Chalan</th>
					<th>Feedback</th>
					<th>Review</th>
					<th>Final Enquiry Status</th>
					

				</tr>
			</thead>
			<tbody>
				<?php //$i=1; 
				//print_r($userenq);	
				foreach($userenq as $row) {?>
				<tr>
					<!-- <td><?php //echo $i++?></td> -->
					<td><?php echo $row->enq_id?></td>

					  

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
                  <td><span class="badge bg-success"><?php echo $row->res_enq_status;?></span></td>

					 <td> 
						 <?php
						//if($row->res_enq_status=="Active"){
						?> 
						 <a class="enq_details" data-toggle="modal" data-id="<?php echo $row->enq_id;?>" data-vid="<?php echo $row->res_vend_id;?>" data-userid="<?php echo $row->user_id;?>" data-target="#EnqDetails"  href="#"><button class="btn badge bg-success badge-pill">View Enquiry<br> Details</button></a>  
					 </td>
					<!--<td> -->
						<!-- <a href="#" onclick="decline_enq(<?php //echo $row->res_id;?>);"><button class="btn bg-danger">Decline</button></i></a> --><!-- <?php // }else{?> -->

						 <!-- <a class="enq_details" data-toggle="modal" data-id="<?php // echo $row->enq_id;?>" data-vid="<?php // echo $row->res_vend_id;?>" data-userid="<?php // echo $row->user_id;?>" data-target="#EnqDetails"  href="#">View Details </a> -->
					<!-- <?php //} ?>

					</td> -->
					<!-- <td>
						
						<a class="quot_details" data-toggle="modal" data-target="#QuotDetails" data-id="<?php //echo $row->enq_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">View Previous<br> Quotations</button></a> 
					</td> -->
					<td>
						
						<a class="po_details" data-toggle="modal" data-target="#PODetails" data-id="<?php echo $row->enq_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">View</button></a> 
					</td>

					 <td class="th-delate"><a class="view_En_Bill" data-toggle="modal" data-target="#view_Enq_Bill" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" data-poid="<?php echo $row->po_id;?>" data-qid="<?php echo $row->quot_id;?>" href="#""><button class="btn badge bg-teal-400 badge-pill">View</button></a></td>

					<?php
						$sql= "SELECT * FROM tbl_eway_bill  WHERE bill_enq_id =".$row->enq_id;
                      	$query= $this->db->query($sql);
                      	$b_count= $query->num_rows();
                  	?>

                  <?php if($b_count>0){?>  
                  <td class="th-delate"><a class="view_bill" data-toggle="modal" data-target="#view_bill" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#""><button class="btn badge bg-teal-400 badge-pill">View</button></a></td>
                  <?php } 
                  else{?>
                  <td>	<a class="eway_details" data-toggle="modal" data-target="#Eway_Details" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">Upload<br>E-Way Bill</button></a> </td>
                    
                  <?php }?>

                  <td><a class="view_chalan" data-toggle="modal" data-target="#view_chalan" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#""><button class="btn badge bg-teal-400 badge-pill">View</button></a></td>

                  <td style='white-space:normal; width:35%;'><?php echo $row->fr_feed_msg;?></td>

					<td style='white-space:normal; width:35%;'><?php echo $row->fr_rem_msg;?></td>

                  <?php if($row->res_enq_status !='Completed'){?>
                     <td><a href="<?php echo base_url();?>Inquiry/final_enq_Status/<?php echo $row->enq_id;?>"><button class="btn badge bg-teal-400 badge-pill">Click to Complete</button></a> </td>
					<?php  } else{ ?>
					<td><span class="badge bg-success"><?php echo $row->res_enq_status;?></span></td>
					<?php }}  ?>

					


				</tr>
				
			</tbody>
		</table>
	</div>
</div>
	<!-- /highlighting rows and columns -->


<!--po Popup Start-->  				<!-- updated on 19 Dec 2018 -->
 <div id="PODetails" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
        
            <div class="modal-body"> 
            	<h5>Accepted PO<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
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
									<th>Rate per Unit</th>
									<!-- <th>GST(%)</th>
									<th>Total Rate per Unit</th>
									<th>Transportation Rate</th> -->
				                   	<th>Message</th>
				                    <th>Terms & Conditions</th> 
				                    <th>Quotation Date</th>
				                    
				                   	<th>Attached File</th>
				                   	<th>Status</th>
				                   
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
  
 <!--End of po Popup--> 

 <!--Quotation Popup Start-->  <!-- updated on 18 Dec 2018 -->
 <div id="EnqDetails" class="modal fade">
    <div class="modal-dialog  modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-12">
               
                   <h5>Enquiry Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
             	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped tbldata">
                                        
                        </table>
                        
                    </div>

                </div>
               
                <hr>
        	 	<!-- </form> -->
        	 	</div>
        	 
                    	 	
        	 </div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

        	</div>
         	</div>
      
        </div>
            
    </div>
    
</div>
 <!--End of Quotation Popup--> 


 <!--Eway Bill Popup Start-->  				<!-- 20 Dec 2018 -->
 <div id="Eway_Details" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
			</div>
        
            <div class="modal-body"> 
            	<h5>Upload Eway Bill<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
            	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        
               	<form id="bill-form" name="bill-form"  enctype="multipart/form-data" method="POST" action="<?php echo base_url("Inquiry/upload_bill");?>">

               		<h5>Send E-Way Bill<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 

             		<div class="row">
                   		<div class="col-md-12">

                   			<div class="row">
                   				<!-- <?php //$i=1; 
									//print_r($userenq);	
									//foreach($userenq as $row) {?>

				             		<input type="hidden" name="enq_id" value="<?php //echo $row->enq_id;?>">
				             		<input type="hidden" name="user_id" value="<?php //echo $row->enq_user_id;?>">
             							<?php// } ?>	 -->

             						<input type="hidden" id="enqId" name="enq_id" value="">
				             		<input type="hidden" id="UserId" name="user_id" value="">
             							

                   				<div class="col-md-10 form-group">
	                   				<label for="Upload">Upload Bill<span class="required"></span></label>
	                   			</div>
	                   			<div class="col-md-10 form-group">
	                   				<input type="file" id="bill" class="form-control" name= "bill" class="form-control" required>
	                   			</div>
                   				
                   			</div>
                   				
                   		</div>
                                           
		            </div>
		            <button id="bill_upload" name="bill_upload" class="button btnSubmit"><span>Send</span></button>
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
  
 <!--End of Eway Bill Popup--> 

 <!--bill details Start-->  						<!-- 20 Dec 2018 -->
 <div id="view_bill" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-12">
               
                   <h5>E-Way Bill Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="" ass="price"> </span><br>
             	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped tbldata5">
                                        
                        </table>
                        
                    </div>

                </div>
               
                <hr>
        	 	<!-- </form> -->
        	 	</div>
        	 
                    	 	
        	 </div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

        	</div>
         	</div>
      
        </div>
            
    </div>
    
</div>
 <!--End of bill details Popup--> 

  <!--Chalan details Start-->  								<!-- 11 Jan 2019 -->
 <div id="view_chalan" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-12">
               			<h5>Chalan Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="" ass="price"> </span><br>
		             	<div class="table-rep-plugin">
		                    <div class="table-responsive" data-pattern="priority-columns">
		                        <table id="datatable" class="table table-striped tbldata6">
		                         </table>
		                    </div>
						</div>
               		</div>
        	 	</div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
    </div>
 </div>
            
<!--End of Chalan details Popup--> 

 <!--End of Bill Popup--> 

 <!--enq_Bill details Start-->  								<!-- 14 Jan 2019 -->
 <div id="view_Enq_Bill" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-12">
               			<h5>Enquiry Bill Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="" ass="price"> </span><br>
		             	<div class="table-rep-plugin">
		                    <div class="table-responsive" data-pattern="priority-columns">
		                        <table id="datatable" class="table table-striped tbldata7">
		                         </table>
		                    </div>
						</div>
               		</div>
        	 	</div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
    </div>
 </div>
            
<!--End of enq_Bill details Popup--> 



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



<script type="text/javascript">
	
	$(".enq_details").click(function(e){							//11 Dec 2018
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
								
								$("#enqId").val(mydata.enq[0].enq_id);
								$("#userId").val(mydata.enq[0].enq_user_id);

								if(mydata.enq[0].enq_pro_subcat_id !=0){
									$("#pro_ser").val(mydata.enq[0].sub_category_title);
								}

								if(mydata.enq[0].enq_pro_subcat_id !=0){
									$("#pro_ser").val(mydata.enq[0].sub_category_title);
								}

								$("#qty").val(mydata.enq[0].enq_qty);

							    var tr=[];
							        
							        if(mydata.enq[0].enq_pro_subcat_id !=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata.enq[0].sub_category_title + "</td>");
							        tr.push('</tr>');
							    	}

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
							      

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        //tr.push("<td>" + mydata[0]['atch_name'] + "</td>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata.enq[0].atch_name +">View</a></td>");
							        tr.push('</tr>');
							     
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
								
							for(i=0; i<mydata.length; i++)
							{

							    var tr=[];
							        
							        tr.push('<tr>');
							      
							        tr.push("<td>"+mydata[i]['quot_count']+"</td>");
							       
							        tr.push("<td>" + mydata[i]['sub_category_title'] + "</td>");
							       
							        tr.push("<td>" + mydata[i]['quot_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							       
							        tr.push("<td>" + mydata[i]['quot_deli_time'] + " Days</td>");

							        tr.push("<td>" + mydata[i]['quot_rate'] + "</td>");
							       
							       	tr.push("<td style='white-space:normal; width:25%;'>" + mydata[i]['quot_msg'] + " Days</td>");

							        tr.push("<td>" + mydata[i]['quot_terms_cond'] + "</td>");
							       
							        tr.push("<td>" + mydata[i]['quot_created'] + "</td>");
							       
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[i]['quot_id'] +">View</a></td>");

							        tr.push('</tr>');

							         $('#tbldata1').append($(tr.join('')));
							}    
							   
						}
						
					});

			});

</script> 
<script type="text/javascript">		
	$(".po_details").click(function(e){							//19 Dec 2018
			var enq_Id = $(this).data('id');
			var i = 0;

			$.ajax({
	                        url:'<?php echo base_url("Inquiry/getAccepted_po_details");?>',
							data: {enq_Id:enq_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('#tbldata2').html('');
							 //alert(data);
								var mydata= JSON.parse(data);
							
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
							       
							        if(mydata[0]['po_name']!=''){
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[i]['po_name'] +">View</a></td>");
							    	}
							    	else
							    	{
							    		tr.push("<td>N.A.</td>");
							    	}

							        tr.push("<td>" + mydata[i]['po_quot_status'] + "</td>");

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
	$(".eway_details").click(function(e){							//4 Jan 2018
			
			var enq_Id = $(this).data('id');
			var user_Id = $(this).data('uid');
			
			$("#enqId").val(enq_Id);
			$("#UserId").val(user_Id);

	});


</script> 
<script type="text/javascript">
	
	$(".view_bill").click(function(e){							//20 Dec 2018
			var enq_Id = $(this).data('id');
			var user_Id = $(this).data('uid');
			$('.tbldata5').html('');


			$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_bill_details");?>',
							data: {enq_Id:enq_Id,user_Id:user_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('.tbldata5').html('');
							 //alert(data);
								var mydata= JSON.parse(data);
								
								    var tr=[];
							       							        
							        if(mydata[0]['enq_pro_subcat_id']!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_ser_subcat_id']!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							   		}

							   		tr.push('<tr>');
							        tr.push("<th> User Name</td>");
							        tr.push("<td>" + mydata[0]['ufname'] +" "+ mydata[0]['ulname'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> User Email</td>");
							        tr.push("<td>" + mydata[0]['uemail'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> User Mobile</td>");
							        tr.push("<td>" + mydata[0]['umobile'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Bill</th>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[0]['bill_name'] +">View</a></td>");
							        tr.push('</tr>');

							   		/*if(mydata[0]['enq_qty']!=null && mydata[0]['enq_unit']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Quantity</td>");
							        tr.push("<td>" + mydata[0]['enq_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							        tr.push('</tr>');
							    	}*/
									/*
							        tr.push('<tr>');
							        tr.push("<th> Message</td>");
							        tr.push("<td>" + mydata[0]['enq_msg'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');*/

							        /*if(mydata[0]['enq_crdt_time']!=null){
							        tr.push("<th> Credit Time</td>");
							        tr.push("<td>" + mydata[0]['enq_crdt_time'] + " Days</td>");
							        tr.push('</tr>');
							    	}*/

							    	/*if(mydata[0]['enq_oder_req_time']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Order Required Time</td>");
							        tr.push("<td>" + mydata[0]['enq_oder_req_time'] + " Days</td>");
							        tr.push('</tr>');
							    	}*/
/*
							    	if(mydata[0]['enq_exptd_date']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Expected Date</td>");
							        tr.push("<td>" + mydata[0]['enq_exptd_date'] + "</td>");
							        tr.push('</tr>');
							    	}*/

							        /*tr.push('<tr>');
							        tr.push("<th> Enquiry Date</td>");
							        tr.push("<td>" + mydata[0]['enq_created'] + "</td>");
							        tr.push('</tr>');*/
							       

							        /*tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[0]['atch_name'] +">View</a></td>");
							        tr.push('</tr>');*/
							       
							    $('.tbldata5').append($(tr.join('')));
							}
						
					});

			});

	$(".view_chalan").click(function(e){							//11 Jan 2019
			var enq_Id = $(this).data('id');
			var user_Id = $(this).data('uid');
			
			$('.tbldata6').html('');


			$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_chalan_details");?>',
							data: {enq_Id:enq_Id,user_Id:user_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('.tbldata6').html('');
								var mydata= JSON.parse(data);
								
								    var tr=[];
							       							        
							        if(mydata[0]['enq_pro_subcat_id']!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_ser_subcat_id']!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							   		}

							   		tr.push('<tr>');
							        tr.push("<th> User Name</td>");
							        tr.push("<td>" + mydata[0]['ufname'] +" "+ mydata[0]['ulname'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> User Email</td>");
							        tr.push("<td>" + mydata[0]['uemail'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> User Mobile</td>");
							        tr.push("<td>" + mydata[0]['umobile'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> Chalan</th>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[0]['chalan_name'] +">View</a></td>");
							        tr.push('</tr>');

							    $('.tbldata6').append($(tr.join('')));
							}
			});
	});

	$(".view_En_Bill").click(function(e){							//14 Jan 2019
			var enq_Id = $(this).data('id');
			var user_Id = $(this).data('uid');
			$('.tbldata7').html('');

				$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_enqbill_details");?>',
							data: {enq_Id:enq_Id,user_Id:user_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('.tbldata5').html('');
							 //alert(data);
								var mydata= JSON.parse(data);
								var tr=[];
							       

							   		tr.push('<tr>');
							        tr.push("<th> User Name</td>");
							        tr.push("<td>" + mydata[0]['ufname'] +" "+ mydata[0]['ulname'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> User Email</td>");
							        tr.push("<td>" + mydata[0]['uemail'] +"</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> User Mobile</td>");
							        tr.push("<td>" + mydata[0]['umobile'] +"</td>");
							        tr.push('</tr>');

							        if(mydata[0]['enq_pro_subcat_id']!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_ser_subcat_id']!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							   		}

							        tr.push('<tr>');
							        tr.push("<th> Quantity</td>");
							        tr.push("<td>" + mydata[0]['enq_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							        tr.push('</tr>');
							    	
									tr.push('<tr>');
							        tr.push("<th> Rate per Unit</td>");
							        tr.push("<td>Rs." + mydata[0]['bill_rate'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');

							        tr.push('<tr>');
							        tr.push("<th> GST</td>");
							        tr.push("<td>" + mydata[0]['bill_gst'] + " %</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> Total Rate per Unit</td>");
							        tr.push("<td>Rs." + mydata[0]['bill_tot_rate'] + " </td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> Transportation Rate</td>");
							        tr.push("<td>Rs." + mydata[0]['bill_trans_rate'] + " </td>");
							        tr.push('</tr>');

							        	
							        tr.push("<th> Credit Time</td>");
							        tr.push("<td>" + mydata[0]['bill_credit_time'] + " Days</td>");
							        tr.push('</tr>');
							    	
									tr.push('<tr>');
							        tr.push("<th> Delivery Time</td>");
							        tr.push("<td>" + mydata[0]['bill_deli_time'] + "Days</td>");
							        tr.push('</tr>');
							    	
									tr.push('<tr>');
							        tr.push("<th> Bill Date</td>");
							        tr.push("<td>" + mydata[0]['bill_created'] + "</td>");
							        tr.push('</tr>');

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Bill</th>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[0]['bill_name'] +">View</a></td>");
							        tr.push('</tr>');
							       
							    $('.tbldata7').append($(tr.join('')));
							}
						});

	});
</script>