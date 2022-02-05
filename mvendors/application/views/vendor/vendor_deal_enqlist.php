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
			<h4 class="card-title">Confirmed Enquiries</h4>
			<!-- <a href="<?php //echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a> -->	
		</div>
		<div class="table-responsive">
		<table class="table table-bordered datatable-button-init-basic">
			<thead>
				<tr>
					<th>Order<br>No.</th>
					
					<th>Product/ Service</th>
					<th>User Name</th>
					<th>Mobile No.</th>
                   	<th>Email</th>
                    <th>Address</th> 
                    <th>Shipping Address</th>
                    <th>City</th>  
                  	<th>Enq.Date</th>
                   	<th>Status</th>
                   	<!--<th>Created Date</th> -->
					<!-- <th>Created On</th> -->
					<!-- <th class="text-center">Status</th> -->
					<th>Actions</th>
					<!-- <th>Quotations</th> -->
					<th>Accepted PO</th>
					<th>Bill</th>
					<th>E-Way Bill</th>
					<th>Chalan</th>
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
                  <td style='white-space:normal; width:35%;'><?php echo $row->uaddress;?></td>
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

					<?php
						$sql= "SELECT * FROM tbl_enq_bill  WHERE bill_enq_id =".$row->enq_id."";
                      	$query= $this->db->query($sql);
                      	$bill_count= $query->num_rows();
                  	?>

                  <?php if($bill_count>0){?>  

                  <td class="th-delate"><a class="view_En_Bill" data-toggle="modal" data-target="#view_Enq_Bill" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" data-poid="<?php echo $row->po_id;?>" data-qid="<?php echo $row->quot_id;?>" href="#""><button class="btn badge bg-teal-400 badge-pill">View(<?php echo $bill_count;?>)</button></a></td>
                  <?php } 
                  else{?>
                  <td><a class="view_EnqBill" data-toggle="modal" data-target="#view_EnqBill" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">Send<br>Bill </button></a></td>
                    
                  <?php }?>

					<?php
						$sql= "SELECT * FROM tbl_eway_bill  WHERE bill_enq_id =".$row->enq_id;
                      	$query= $this->db->query($sql);
                      	$b_count= $query->num_rows();
                  	?>

                  <?php if($b_count>0){?>  
                  <td class="th-delate"><a class="view_bill" data-toggle="modal" data-target="#view_bill" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#""><button class="btn badge bg-teal-400 badge-pill">View(<?php echo $b_count;?>)</button></a></td>
                  <?php } 
                  else{?>
                  <td><a class="eway_details" data-toggle="modal" data-target="#Eway_Details" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">Upload<br>E-Way Bill</button></a></td>
                    
                  <?php }?>

                  <?php
						$sql= "SELECT * FROM tbl_chalan  WHERE chalan_enq_id =".$row->enq_id."";
                      	$query= $this->db->query($sql);
                      	$c_count= $query->num_rows();
                      	//echo $c_count;
                  	?>

                  <?php if($c_count>0){?>  
                  <td><a class="view_chalan" data-toggle="modal" data-target="#view_chalan" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#""><button class="btn badge bg-teal-400 badge-pill">View(<?php echo $c_count;?>)</button></a></td>
                  <?php } 
                  else{?>
                  <td><a class="upload_chalan" data-toggle="modal" data-target="#chalan_Details" data-id="<?php echo $row->enq_id;?>" data-uid="<?php echo $row->enq_user_id;?>" href="#"><button class="btn badge bg-teal-400 badge-pill">Upload<br>Chalan</button></a></td>
                    
                  <?php }?>

                  <?php if($row->res_enq_status !='Completed'){
                  	//echo "bill count".$bill_count;
                  	if(($bill_count== 0)  || ($b_count==0) || ($c_count==0)){?>
                     <td><button class="btn badge bg-teal-400 badge-pill" style ='cursor: not-allowed;' disabled >Click to Complete</button></td>

					<?php }
						else{ ?>
							 <td><button class="btn badge bg-teal-400 badge-pill" onclick = "add_feed(<?php echo $row->enq_id;?>,<?php echo $row->user_id;?>);">Click to Complete</button></td>
					<?php	}

					 } else{ ?>
					<td><span class="badge bg-success"><?php echo $row->res_enq_status;?></span></td>
					<?php } 
				}  ?>

				</tr>
				
			</tbody>
		</table>
	</div>
</div>
	<!-- /highlighting rows and columns -->

	<!--Feedback & Remark Popup Start-->  						<!--14 Jan 2019 -->
 <div id="feedback" class="modal fade">
    <div class="modal-dialog  login-popup">
		<div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body"> 
            	<h5>Add Remark & Feedback for this User <span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"></span><br> 
            		<form id="feedback-form" name="feedback-form"  method="POST">
                 	
	             		<div class="row">
	                   		<div class="col-md-12">
	                   			<input type="hidden" id="enqid" name="enqid" value="">
					            <input type="hidden" id="uid" name="uid" value=""> 
	                   			<div class="col-md-10 form-group">
		                   			<label for="feed">Your Feedback<span class="required" style="color: red;">*</span></label>
		                   		</div>
		                   		<div class="col-md-10 form-group">
		                   			<textarea id="feed" name="feed" class="form-control" required></textarea>
		                   		</div>

		                   		<div class="col-md-10 form-group">
		                   			<label for="remark">Your Remark<span class="required" style="color: red;">*</span></label>
		                   		</div>
		                   		<div class="col-md-10 form-group">
		                   			<textarea id="remark" name="remark" class="form-control" required></textarea>
		                   		</div>
	                   		</div>
	                    </div>
			            <button id="feed_rem" name="feed_rem" class="button btnSubmit"><span>Submit</span></button>
		        	</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
     
 <!--End of Feedback & Remark Popup-->


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
									<th>Rate</th>
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
    <div class="modal-dialog modal-full login-popup">
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
		                        <table id="datatable" class="table  table-striped tbldata"></table>
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
            
 <!--End of Quotation Popup--> 


 <!--Eway Bill Popup Start-->  				<!-- 20 Dec 2018 -->
 <div id="Eway_Details" class="modal fade">
    <div class="modal-dialog  login-popup">
		<div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body"> 
            	<h5>Upload Eway Bill<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
            		<form id="bill-form" name="bill-form"  enctype="multipart/form-data" method="POST" action="<?php echo base_url("Inquiry/upload_bill");?>" class="">
                 	<!--<h5>Send E-Way Bill<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>  -->
	             		<div class="row">
	                   		<div class="col-md-12">
	                   			<input type="hidden" id="enqId" name="enq_id" value="">
					            <input type="hidden" id="UserId" name="user_id" value="">
	                   			<div class="col-md-10 form-group">
		                   			<label for="Upload">Select Bill<span class="required"></span></label>
		                   		</div>
		                   		<div class="col-md-10 form-group">
		                   			 <!--17/01/2019 -->  	
		                   			<input type="file" id="bill" class="form-control fileUpload" name= "bill" required>
		                   			<br>

		                   				<div class="upload-demo">
								    		<div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
										</div>
										 <!--17/01/2019 -->  	
		                   		</div>
	                   		</div>
	                    </div>
			            <button id="bill_upload" name="bill_upload" class="button btnSubmit"><span>Send</span></button>
		        	</form>
			</div>
			  <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	</div>

		</div>
    </div>
  
 </div>
     
 <!--End of Eway Bill Popup--> 

 <!--EWay bill details Start-->  						<!-- 20 Dec 2018 -->
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
	                        <table id="datatable" class="table  table-striped tbldata5"></table>
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
  <!--End of EWay bill details Popup--> 

  <!--Upload Chalan Popup Start-->  						<!--11 Jan 2019 -->
 <div id="chalan_Details" class="modal fade">
    <div class="modal-dialog  login-popup">
		<div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
            <div class="modal-body"> 
            	<h5>Upload Chalan<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"></span><br> 
            		<form id="chalan-form" name="chalan-form"  enctype="multipart/form-data" method="POST" action="<?php echo base_url("Inquiry/upload_chalan");?>" class="">
                 	
	             		<div class="row">
	                   		<div class="col-md-12">
	                   			<input type="hidden" id="enq_Id" name="enq_id" value="">
					            <input type="hidden" id="User_Id" name="user_id" value="">
	                   			<div class="col-md-10 form-group">
		                   			<label for="Upload">Select Chalan<span class="required"></span></label>
		                   		</div>
		                   		<div class="col-md-10 form-group">
		                   			<!--17/01/2019 -->
		                   			<input type="file" id="chalan" class="form-control fileUpload" name= "chalan" required>
		                   			<br>
		                   			<div class="upload-demo">
								    		<div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
										</div>

		                   			<!--17/01/2019 -->
		                   		</div>
	                   		</div>
	                    </div>
			            <button id="chalan_upload" name="chalan_upload" class="button btnSubmit"><span>Send</span></button>
		        	</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
     
 <!--End of Upload Chalan Popup-->

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

<!--Bill Popup Start-->  <!-- updated on 11 Jan 2019 -->

 <div id="view_EnqBill" class="modal fade">
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
      			<?php  //print_r($userenq);	
				foreach($userenq as $row) {?>
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-4">
               			<h5>Quotation Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
             			<div class="table-rep-plugin">
                    		<div class="table-responsive" data-pattern="priority-columns">
                       		 	<table id="datatable" class="table table-striped tbldata"> 
                       		 		<tr><th>Quot Id</td>
							        <td><?php echo $row->quot_id; ?></td></tr>
							        <tr><th>Product / Service</td>
							        <td><?php echo $row->sub_category_title; ?></td></tr>
							        <tr><th>Quantity</td>
							        <td><?php echo $row->quot_qty;?>(<?php echo $row->enq_unit;?>)</td></tr>
							        <tr><th>Delivery Time(Days)</td>
							        <td><?php echo $row->quot_deli_time; ?></td></tr>
							        <tr><th>Rate per Unit</td>
							        <td><?php echo $row->quot_rate; ?></td></tr>
							        <tr><th>GST</td>
							        <td><?php echo $row->quot_gst; ?> %</td></tr>
							        <tr><th>Total Rate per Unit</td>
							        <td><?php echo $row->quot_tot_rate; ?></td></tr>
							        <tr><th>Transport Rate</td>
							        <td><?php echo $row->quot_trans_rate; ?></td></tr>
							        <tr><th>Message</td>
							        <td><?php echo $row->quot_msg; ?></td></tr>
							        <tr><th>Terms & Conditions</td>
							        <td><?php echo $row->quot_terms_cond; ?></td></tr>
							        <tr><th>Date</td>
							        <td><?php echo $row->quot_created; ?></td></tr>
							        <tr><th>Attachment</td>
							        <td><a target='_blank' class='btn badge bg-success badge-pill' href="<?php echo $row->quot_name; ?>">View</a></td></tr>
							    </table>
                        	</div>
						</div>
               			<hr>
        	 		</div>

        	 		<div class="col-md-3">
               			<h5>PO Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
             			<div class="table-rep-plugin">
                    		<div class="table-responsive" data-pattern="priority-columns">
                       		 	<table id="datatable" class="table table-striped tbldata">
									<tr><th>PO Id</td>
							        <td><?php echo $row->po_id; ?></td></tr>
							        <tr><th>Product / Service</td>
							        <td><?php echo $row->sub_category_title; ?></td></tr>
							        <tr><th>Quantity</td>
							        <td><?php echo $row->po_qty;?>(<?php echo $row->enq_unit;?>)</td></tr>
							        <tr><th>Delivery Time(Days)</td>
							        <td><?php echo $row->po_deli_time; ?></td></tr>
							        <tr><th>Credit Time(Days)</td>
							        <td><?php echo $row->po_credit_time; ?></td></tr>
							        <tr><th>Rate per Unit</td>
							        <td><?php echo $row->po_rate; ?></td></tr>
							        <tr><th>Message</td>
							        <td><?php echo $row->po_msg; ?></td></tr>
							        <tr><th>Terms & Conditions</td>
							        <td><?php echo $row->po_terms_cond; ?></td></tr>
							        <tr><th>Date</td>
							        <td><?php echo $row->po_created; ?></td></tr>
							        <tr><th>Attachment</td>
							        <td><a target='_blank' class='btn badge bg-success badge-pill' href="<?php echo $row->po_name; ?>">View</a></td></tr>
                       		 	</table>
                        	</div>
						</div>
               			<hr>
        	 		</div>

        	 		<div class="col-md-5">
	                 	<form id="bill-form" name="bill-form"  enctype="multipart/form-data" method="POST" action="<?php echo base_url("Inquiry/insert_bill");?>">
		                 	<input type="hidden" name="enqId" id="enqId" value="<?php echo $row->enq_id;?>">
		                 	<input type="hidden" name="userId" id="userId" value="<?php echo $row->user_id;?>">
		                 	<input type="hidden" name="quotId" id="quotId" value="<?php echo $row->quot_id;?>">
		                 	<input type="hidden" name="poId" id="poId" value="<?php echo $row->po_id;?>">
							<h5>Send Bill<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
	             		
	             			<div class="row">
	                   			<div class="col-md-12">
	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="Name">Name<span class="required"></span></label>
		                   				</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="text" id="pro_ser" name= "pro_ser" readonly="" class="form-control" value="<?php echo $row->ufname;?> <?php echo $row->ulname;?>" >
			                   			</div>
	                   				</div>

	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="Mobile">Mobile No.<span class="required"></span></label>
		                   				</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="text" id="mob" name= "mob" readonly="" class="form-control" value="<?php echo $row->umobile;?>" >
			                   			</div>
	                   				</div>

	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="Mobile">Email<span class="required"></span></label>
		                   				</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="text" id="email" name= "email" readonly="" class="form-control" value="<?php echo $row->uemail;?>" >
			                   			</div>
	                   				</div>

	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="Address">Address<span class="required"></span></label>
		                   				</div>
			                   		<div class="col-md-6 form-group">
			                   				<textarea id="address" name= "address" readonly="" class="form-control"><?php echo $row->enq_add;?></textarea>   
			                   			</div>
	                   				</div>
	                   				
	                   				<!--19 Jan 2019-->

	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="ship_address">Shipping Address<span class="required"></span></label>
		                   				</div>
			                   		<div class="col-md-6 form-group">
			                   				<textarea id="ship_address" name= "ship_address" readonly="" class="form-control"><?php echo $row->enq_ship_add;?></textarea>   
			                   			</div>
	                   				</div>

	                   				<!--19 Jan 2019-->

	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="Product/Service">City<span class="required"></span></label>
		                   				</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="text" id="city" name= "city" readonly="" class="form-control" value="<?php echo $row->city_name;?>" >
			                   			</div>
	                   				</div>

									<div class="row">
		                   				<div class="col-md-6 form-group">
		                   					<label for="Product/Service">Product/<br>Service<span class="required"></span></label>
		                   				</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="text" id="pro_ser" name= "pro_ser" readonly="" class="form-control" value="<?php echo $row->sub_category_title;?>" >
			                   			</div>
	                   				</div>

	                   				<div class="row">
			                   			<div class="col-md-6 form-group">
			                   				<label for="Quantity">Quantity<span class="required"></span></label>
			                   			</div>
			                   			<div class="col-md-3 form-group">
			                   				<input type="number" id="qty" name= "qty" class="form-control" value = "<?php echo $row->po_qty;?>" required ></div>
			                   			<div class="col-md-3 form-group">
			                   				<select name="unit" class="form-control">
			                   					<option value="Unit"><?php echo $row->enq_unit;?></option>
			                   				</select>
		                   				</div>
	                   				</div>	

	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
			                   				<label for="Delivery Time">Delivery Time(Days)<span class="required"></span></label>
			                   			</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="number" id="d_time" name= "d_time" required class="form-control" value="<?php echo $row->po_deli_time;?>">
			                   			</div>
									</div>


	                   				<div class="row">
		                   				<div class="col-md-6 form-group">
			                   				<label for="Delivery Time">Credit Time(Days)<span class="required"></span></label>
			                   			</div>
			                   			<div class="col-md-6 form-group">
			                   				<input type="number" id="cr_time" name= "cr_time" required class="form-control" value="<?php echo $row->po_credit_time;?>">
			                   			</div>
									</div>


		                   			<div class="row">
		                   				<div class="col-md-6 form-group">
			                   				<label for="Rate">Rate per Unit (Rs.)(Rate+GST)<span class="required"></span></label>
			                   			</div>
			                   			<div class="col-md-3 form-group">
			                   				<input type="number" id="rate" name= "rate" required class="form-control" value="<?php echo $row->po_rate;?>" placeholder="Rate per Unit">
			                   			</div>
			                   			<div class="col-md-3 form-group">
			                   				<input type="number" id="gst" name= "gst" required class="form-control" placeholder="GST%" value="<?php //echo $row->quot_gst;?>">
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
			                   				<input type="text" id="t_rate" name= "t_rate" required class="form-control" placeholder="Transportation Rate" value="<?php echo $row->quot_trans_rate;?>">
			                   			</div>
		                   				
		                   			</div>

	                   			
		                   			<div class="row">
		                   				<div class="col-md-6 form-group">
			                   				<label for="Upload">Upload Bill<span class="required"></span></label>
			                   			</div>
			                   			<div class="col-md-6 form-group">
			                   			<!--17/01/2019 --> 
			                   				<input type="file" id="enq_bill" name= "enq_bill" class="form-control fileUpload">
			                   				<br>

		                   				<div class="upload-demo">
								    		<div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
										</div>

										<!--17/01/2019 --> 
			                   			</div>
		                   				
		                   			</div>
	                   			</div>
	                   		</div>
			            	<button id="enq_bill_upload" name="enq_bill_upload" class="button btnSubmit"><span>Send</span></button>
			          	</form>
                	</div>
                  <?php } ?>  	 	
        	 </div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>

       	</div>
    </div>
 </div>

 <!--End of Bill Popup--> 

 <!--enq_Bill details Start-->  								<!-- 11 Jan 2019 -->
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

							        tr.push("<td style='white-space:normal; width:25%;'>" + mydata[i]['quot_terms_cond'] + "</td>");
							       
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
							       
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[i]['po_name'] +">View</a></td>");

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

$(".upload_chalan").click(function(e){							//11 Jan 2018
			
			var enq_Id = $(this).data('id');
			var user_Id = $(this).data('uid');
			
			$("#enq_Id").val(enq_Id);
			$("#User_Id").val(user_Id);

	});

$(".view_Enqbill").click(function(e){							//11 Jan 2018
			
			var enq_Id = $(this).data('id');
			var user_Id = $(this).data('uid');
			var po_Id = $(this).data('poid');
			var quot_Id = $(this).data('qid');
			
			$("#enq_Id").val(enq_Id);
			$("#User_Id").val(user_Id);
			$("#quot_Id").val(quot_Id);
			$("#po_Id").val(po_Id);

	});



</script> 
<script type="text/javascript">						//11 Jan 2019
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
									/*tr.push('<tr>');
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
									/*if(mydata[0]['enq_exptd_date']!=null){
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


	
	$(".view_En_Bill").click(function(e){							//11 Jan 2019
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
<script type="text/javascript">
	 function add_feed(enq_id,user_id)          //Updated on 14 Jan 2019
        { 
         /* alert(enq_id);
          alert(user_id);*/
          if(enq_id!="" && user_id!= "")
          	{
          		$("#enqid").val(enq_id);
				$("#uid").val(user_id);

	             $('#feedback').modal('show');

	           // $("#feed_rem").click(function(e){							
	           	$('body').on('click', '#feed_rem', function(){
					
	             	var feed = $('#feed').val();
	             	var remark = $('#remark').val();
	             	var e_id = $('#enqid').val();
	             	var u_id = $('#uid').val();
	             	//alert(e_id);
	             	if(feed =='' && remark ==''){
						alert ("Please fill all details.");
					}
					else{
						
						$.ajax({
		                        url:'<?php echo base_url("Inquiry/add_feed_remark");?>',
								data: {e_id:e_id,feed:feed,remark:remark,u_id:u_id},  
		                      	type:"POST",
		                        success:function(data)
		                        {  
								 //alert(data);
									 if(data){
								 	window.location.href= "<?php echo site_url('Inquiry/final_enq_Status');?>?id="+e_id;
									}
								}
							
						});
					}
				});
            
           		
               // window.location.href= "<?php //echo site_url('Inquiry/final_enq_Status');?>?id="+enq_id+"&feedback="+feedback;
          	}
        	/*  else{
                alert('Please give feedback before you complete this enquiry.');
              }*/
        }
     
      
</script>