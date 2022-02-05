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
			<h4 class="card-title"> Active Enquiries</h4>
			<!-- <a href="<?php //echo base_url('Advertise/add_slider');?>"><button type="button" class="btn btn-primary legitRipple">Add New Slider<div class="legitRipple-ripple"></div></button></a> -->	
		</div>
		<div class="table-responsive">
		<table class="table table-bordered datatable-button-init-basic">
			<thead>
				<tr>
					<th>Order No.</th>
					<!--<th>User Name</th>-->
					<th>Product/ Service</th>
					<!-- <th>Service</th> -->
					<th>Quantity (Unit)</th>
                   <!--  <th>Unit</th> -->
                    <th>Credit Time</th>
                    <th>Order Req.Time</th> 
                    <th>Expectd Date</th> 
                    <th>Message</th>  
                   	<th>Status</th>
                    <th>Enq.Date</th> 
					<!--<th>Enq. <br> Attachment</th>-->
					<!-- <th>Created Date</th> -->
					<!-- <th class="text-center">Status</th> -->
					<th>Action</th>
					<th>Action</th>

				</tr>
			</thead>
			<tbody>
				<?php //$i=1; 
				//print_r($userenq);	
				foreach($userenq as $row) {?>
				<tr>
					<!-- <td><?php //echo $i++?></td> -->
					<td><?php echo $row->enq_id?></td>

					<!-- <td><?php //echo $row->ufname.' '.$row->ulname?></td> -->
				<?php if($row->enq_pro_subcat_id !='') 
				{?>
                  <td><?php echo $row->sub_category_title;?></td>
                  <?php
                   } else if($row->enq_ser_subcat_id !='') {?>
                  <td><?php echo $row->sub_category_title;?></td>
                  <?php }?>

                  <!-- <?php //if($row->enq_ser_subcat_id !=''){?>
                  <td><?php //echo $row->sub_category_title;?></td>
                  <?php //} else{?>
                    <td>N.A.</td>
                  <?php //}?> -->

					<?php if($row->enq_qty !='' && $row->enq_unit !=''){?>  
                  <td><?php echo $row->enq_qty.' '.$row->enq_unit;?></td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                  <!--  <?php //if($row->enq_unit !=''){?>  
                  <td><?php // echo $row->enq_unit;?></td>
                  <?php //} else{?>
                    <td>N.A.</td>
                  <?php //}?> -->

                   <?php if($row->enq_crdt_time !=''){?>  
                  <td><?php echo $row->enq_crdt_time;?><br>Days</td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                  <?php if($row->enq_oder_req_time !=''){?>  
                  <td><?php echo $row->enq_oder_req_time;?><br>Days</td>
                  <?php } else{?>
                    <td>N.A.</td>
                  <?php }?>

                  <?php if($row->enq_exptd_date =='' || $row->enq_exptd_date =='undefined' ){?>  
                  	<td>N.A.</td>
                  	                 
                  <?php } else{?>
                  	 <td><?php echo $row->enq_exptd_date;?></td>
                    <?php }?>

                  	<td style="white-space:normal; width:35%;"><?php echo $row->enq_msg;?></td>

                  	<?php if ($row->enq_status == "Closed"){?>
					<td><span class="badge bg-danger"><?php echo $row->enq_status;?></span></td>
				<?php } else if($row->enq_status == "Fake"){ ?>
					<td><span class="badge bg-grey-400"><?php echo $row->enq_status;?></span></td>
			<?php	}else{?><td><span class="badge bg-blue"><?php echo $row->enq_status;?></span></td> <?php }?>

					<td><?php echo $row->enq_created ?></td>
		
					<!-- <td><a target='_blank' class='btn badge bg-success badge-pill' href="<?php //echo $row->atch_name;?>">View</a></td> -->
					
					<!-- <td><?php //if($row->enq_status=='VERIFIED'){?>
					<a href="<?php //echo base_url().'Advertise/makeSliderInactive/'.$row->enq_id;?>"><span class="badge badge-success">VERIFIED</span></a>
					  <?php //}elseif ($row->enq_status=='FAKE') { ?>
					<a href="<?php //echo base_url().'Advertise/makeSliderActive/'.$row->enq_id;?>"><span class="badge badge-danger">FAKE</span></a>
					 <?php // }elseif ($row->enq_status=='CLOSED') { ?>
					<a href="<?php //echo base_url().'Advertise/makeSliderActive/'.$row->enq_id;?>"><span class="badge badge-warning">CLOSED</span></a>
					  <?php //}else{ ?>
					<a href="<?php //echo base_url().'Advertise/makeSliderActive/'.$row->enq_id;?>"><span class="badge badge-primary">NORMAL</span></a>
					  <?php //}?>
					</td> -->
					<td>
						<?php
						//if($row->res_enq_status=="Active"){
							$qty = $row->enq_qty;
						//	$commision = $row->sub_category_commission;
						//	$product_rate = $row->sub_category_price;

							//$deduction= ($product_rate * $qty)*$commision; New Changes 22 Jan 19
                            $deduction= $row->enq_commission;
							//echo $deduction;

							/*$sql= 'SELECT * FROM tbl_vendor_quot  WHERE quot_enq_id ='.$value->enq_id;
	                      	$query= $this->db->query($sql);
	                      	$q_count= $query->num_rows();*/
						?>
						<a href="#" onclick="accept_enq(<?php echo $row->enq_id;?>,<?php echo $deduction;?>,<?php echo $row->enq_user_id;?>,<?php echo $row->res_vend_id;?>)"><button class="btn badge bg-success badge-pill">Interested</button></a> 
					  </td>
					<td> 
						 <a href="#" onclick="decline_enq(<?php echo $row->res_id;?>);"><button class="btn badge bg-danger badge-pill">Not Interested</button></i></a> <?php // }else{?>

						<!-- <a class="enq_details" data-toggle="modal" data-id="<?php // echo $row->enq_id;?>" data-vid="<?php // echo $row->res_vend_id;?>" data-userid="<?php // echo $row->user_id;?>" data-target="#EnqDetails"  href="#">View Details </a>	 -->
					<?php //} ?>

					</td>
				</tr>
				<?php  }?>
			</tbody>
		</table>
	</div>
</div>
	<!-- /highlighting rows and columns -->

	<div id="EnqDetails" class="modal fade">				<!-- 25 Dec 2018 -->
    <div class="modal-dialog modal-full login-popup">

        <div class="modal-content" style="height: auto;">
        	<div class="modal-header">
				<button type="button" class="close" id="close" data-dismiss="modal">&times;</button>
			</div>
        
            <div class="modal-body" > 
                <div class="row">
                	<div class="col-md-3">
               
                   <h5>User Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
             	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped utbldata">
                                        
                        </table>
                        
                    </div>

                </div>
               
                <hr>
   
        	 </div>

                	<div class="col-md-4">
               
                   <h5>Enquiry Details<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br>
             	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped tbldata">
                                        
                        </table>
                        
                    </div>

                </div>
               
                <hr>
   
        	 </div>
        	 <div class="col-md-5">
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
	                   				<input type="text" id="ftot" name= "ftot" required class="form-control" placeholder="Total Rate" readonly style="
    background-color: navajowhite;">
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
	                   			<div class="col-md-6 form-group">
	                   				<!--17/01/2019 --> 
	                   				<input type="file" id="quot" name= "quot" class="form-control fileUpload" required>
	                   				<br>

		                   				<div class="upload-demo">
								    		<div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
										</div>

									<!--17/01/2019 --> 
	                   			</div>
                   				
                   			</div>
                   		</div>
                   		                        
		            </div>
		            <button id="quot_upload" name="quot_upload" class="button btnSubmit"><span>Send</span></button>
		          </form>
                </div>
                    	 	
        	 </div>
        	</div>
        	<div class="modal-footer">
				<button type="button" class="btn btn-default" id="close" data-dismiss="modal">Close</button>
			</div>

        	</div>
         	</div>
      
        </div>
            
    </div>
    
</div>
 <!--End of Quotation Popup--> 

	<!--enquiry Popup Start-->  <!-- updated on 11 Dec 2018 -->
<!--  <div id="EnqDetails" class="modal fade">
    <div class="modal-dialog login-popup">
        <div class="modal-content" style="height: auto;">
        
            <div class="modal-body" > 
                
                 <form id="quot-form" name="quot-form" enctype="multipart/form-data" method="POST" action="<?php //echo base_url("Inquiry/upload_quot");?>">
                 	<input type="hidden" name="enqId" id="enqId">
                 	<input type="hidden" name="userId" id="userId">

                   <h4>Enquiry Details<span class="text-capitalize" style="color: orangered;"></span></h4><span id="error1" class="price"> </span><br> 
             	<div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <table id="datatable" class="table  table-striped tbldata">
                                        
                        </table>
                        <hr>
                         <div class="row">
                         	<div class="col-md-12"><label for="Message">Upload Quotation<span class="required"></span></label></div>
		               		 <div class= "col-md-6">
		                   		<input type="file" id="quot" name= "quot" >
							</div>
							
		                  	<div class="col-md-6">
		                 		<button id="quot_upload" name="quot_upload" class="button btnSubmit">&nbsp; <span>Send</span></button>
		                	</div>

               	 		</div>
                    </div>

                </div>
               
                <hr>
        	 	</form>


         	</div>
      
        </div>
            
    </div>
    
</div> -->
 <!--End of enquiry Popup--> 
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

<script type="text/javascript">					//Updated on 11 Dec 2018
function accept_enq(enq_id,deduction,userid,vid)
{	
	var id= enq_id;
	//var userid = 
	//alert(enq_id);
	if(id!="")
	{
		var conf= confirm("Once you accept this Enquiry,"+deduction+" points will be automatically deducted.Are you sure you want to accept this enquiry?");
		
		if(conf)
		{
			$.ajax({
                url:'<?php echo base_url("Inquiry/accept_enquiry");?>',
				data: {id:id},  
              	type:"POST",
                success:function(data)
                { 
                	//alert(data);
                	if(data == 1)
                	{
                		alert('Enquiry Accepted Successfully.');
                		//location.reload();
                		ViewPopup(id,userid,vid);
                	}
                	else{
                		alert('You dont have sufficient points to accept this enquiry.');
                	}
                }
        	});
			//window.location.href= "<?php //echo site_url('Inquiry/accept_enquiry');?>?id="+enq_id;
		}
	}
}

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

<script type="text/javascript">		
		 function ViewPopup(enq_Id,user_Id,vid) 					//updated on 25 Dec 2018
		 {
			//var visaId = $("#visaId").val();

			//alert(vid);
			$(document).ready(function () {
				jQuery('#EnqDetails').modal('show');
				
				$('.tbldata').html('');
				//$.ajax({
				//	type: "POST",
				//	url: "<?php //echo base_url("Inquiry/ViewPopup");?>",
				//	data: {},
					//success: function (data) {
						
						$.ajax({
	                        url:'<?php echo base_url("Inquiry/get_details");?>',
	                       //url:'<?php //echo base_url("get_details");?>',
							data: {enq_Id:enq_Id,vid:vid,user_Id:user_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('.tbldata').html('');

								var mydata= JSON.parse(data);
								
								$("#enqId").val(mydata.enq[0].enq_id);
								$("#userId").val(mydata.enq[0].enq_user_id);

								if(mydata.enq[0].enq_pro_subcat_id !=0){
									$("#pro_ser").val(mydata.enq[0].sub_category_title);
								}

								if(mydata.enq[0].enq_ser_subcat_id !=0){
									$("#pro_ser").val(mydata.enq[0].sub_category_title);
								}

								$("#qty").val(mydata.enq[0].enq_qty);
//User Details on 9 Jan 2018	
								var tr1=[];
							        
							        
							        tr1.push('<tr>');
							        tr1.push("<th> Name</td>");
							        tr1.push("<td>" + mydata.enq[0].ufname+" "+ mydata.enq[0].ulname + "</td>");
							        tr1.push('</tr>');
							    	
							    	
							        tr1.push('<tr>');
							        tr1.push("<th> Email</td>");
							        tr1.push("<td>" + mydata.enq[0].uemail + "</td>");
							        tr1.push('</tr>');
							   		

							   		tr1.push('<tr>');
							        tr1.push("<th> Mobile No.</td>");
							        tr1.push("<td>" + mydata.enq[0].umobile + "</td>");
							        tr1.push('</tr>');
							    	

							        tr1.push('<tr>');
							        tr1.push("<th> Address</td>");
							        tr1.push("<td>" + mydata.enq[0].enq_add + "</td>");
							        tr1.push('</tr>');
							        tr1.push('<tr>');

							        tr1.push("<th> City</td>");
							        tr1.push("<td>" + mydata.enq[0].city_name + "</td>");
							        tr1.push('</tr>');
							    	
							    	tr1.push('<tr>');
							        tr1.push("<th> State</td>");
							        tr1.push("<td>" + mydata.enq[0].state_name + "</td>");
							        tr1.push('</tr>');
							    	
							    	tr1.push('<tr>');
							        tr1.push("<th> Country</td>");
							        tr1.push("<td>" + mydata.enq[0].country_name + "</td>");
							        tr1.push('</tr>');
							    	
							        /*tr.push('<tr>');
							        tr.push("<th> Enquiry Date</td>");
							        tr.push("<td>" + mydata[0]['enq_created'] + "</td>");
							        tr.push('</tr>');
							       
							        tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        //tr.push("<td>" + mydata[0]['atch_name'] + "</td>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[0]['atch_name'] +">View</a></td>");
							        tr.push('</tr>');*/
							       
							    $('.utbldata').append($(tr1.join('')));

//enq_details 
							    var tr=[];
							        
							        if(mydata.enq[0].enq_pro_subcat_id!=0){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata.enq[0].sub_category_title + "</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata.enq[0].enq_ser_subcat_id!=0){
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
							       
							       	if(mydata.enq[0].atch_name != null){
							        tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata.enq[0].atch_name +">View</a></td>");
							        tr.push('</tr>');
							       	}else if(mydata.enq[0].atch_name == null){
							       	tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-warning  badge-pill' href="+ mydata.enq[0].atch_name +">Attachment not Found</a></td>");
							        tr.push('</tr>');
							       	}
							    $('.tbldata').append($(tr.join('')));


							    
							   
							}
						
						});

				});
		}

	$('#EnqDetails').on('hidden.bs.modal', function () {
	// location.reload();'Inquiry/vendor_accpted_enquirylist'
		window.location.href= "<?php echo site_url('Inquiry/vendor_accpted_enquirylist');?>";

	})

	$('#close').on('click', function () {
	// location.reload();'Inquiry/vendor_accpted_enquirylist'
		window.location.href= "<?php echo site_url('Inquiry/vendor_accpted_enquirylist');?>";

	})

		 function decline_enq(res_id)					//Updated on 13 Dec 2018
				{	
					//alert(enq_id);
					if(res_id!="")
					{
						var conf= confirm("Once you decline this Enquiry, this enquiry will be automatically closed for you.");
						
						if(conf)
						{
							window.location.href= "<?php echo site_url('Inquiry/decline_enquiry');?>?id="+res_id;
						}
					}
				}

		

</script>

<!-- <script type="text/javascript">

	$(".enq_details").click(function(e){							//11 Dec 2018
			var enq_Id = $(this).data('id');
			var vid = $(this).data('vid');
			var user_Id = $(this).data('userid');

			$.ajax({
	                        url:'<?php //echo base_url("Inquiry/get_details");?>',
							data: {enq_Id:enq_Id,vid:vid,user_Id:user_Id},  
	                      	type:"POST",
	                        success:function(data)
	                        {  
							 $('.tbldata').html('');
							 //alert(data);
								var mydata= JSON.parse(data);
								//alert(mydata);
								/*id = mydata[0]['enq_name'];
								alert(id);*/

								$("#enqId").val(mydata[0]['enq_id']);
								$("#userId").val(mydata[0]['enq_user_id']);

							    var tr=[];
							        tr.push('<tr>');
							        tr.push("<th> Name</td>");
							        tr.push("<td>" + mydata[0]['ufname']+" "+mydata[0]['ulname'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');
							        tr.push("<th> Mobile No.</td>");
							        tr.push("<td>" + mydata[0]['umobile'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');
							        tr.push("<th> Email</td>");
							        tr.push("<td>" + mydata[0]['uemail'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');
							        tr.push("<th> Address</td>");
							        tr.push("<td style='white-space:normal; width:25%;'>" + mydata[0]['uaddress'] + "</td>");
							        tr.push('</tr>');
							        
							        if(mydata[0]['enq_pro_subcat_id']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_ser_subcat_id']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Product/Service</td>");
							        tr.push("<td>" + mydata[0]['sub_category_title'] + "</td>");
							        tr.push('</tr>');
							   		}

							   		if(mydata[0]['enq_qty']!=null && mydata[0]['enq_unit']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Quantity</td>");
							        tr.push("<td>" + mydata[0]['enq_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							        tr.push('</tr>');
							    	}

							        tr.push('<tr>');
							        tr.push("<th> Message</td>");
							        tr.push("<td>" + mydata[0]['enq_msg'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');

							        if(mydata[0]['enq_crdt_time']!=null){
							        tr.push("<th> Enquiry Credit Time</td>");
							        tr.push("<td>" + mydata[0]['enq_crdt_time'] + " Days</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_oder_req_time']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Order Required Time</td>");
							        tr.push("<td>" + mydata[0]['enq_oder_req_time'] + " Days</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_exptd_date']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Expected Date</td>");
							        tr.push("<td>" + mydata[0]['enq_exptd_date'] + "</td>");
							        tr.push('</tr>');
							    	}

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Date</td>");
							        tr.push("<td>" + mydata[0]['enq_created'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');

							        /*tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</td>");
							        tr.push("<td>" + mydata[0]['atch_name'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');*/
							        
							    $('.tbldata').append($(tr.join('')));
							   // var enq_Id =null;
						}
						
					});

			});

	/*$(document).ready (function(){
		//$("#EnqDetails").click(function(event){
		$('#EnqDetails').on("click",function(){
			jQuery('#EnqDetails').modal('show');
		});
	});*/
</script>  -->

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

								var mydata= JSON.parse(data);
								
								$("#enqId").val(mydata[0]['enq_id']);
								$("#userId").val(mydata[0]['enq_user_id']);

								if(mydata[0]['enq_pro_subcat_id']!=0){
									$("#pro_ser").val(mydata[0]['sub_category_title']);
								}

								if(mydata[0]['enq_pro_subcat_id']!=0){
									$("#pro_ser").val(mydata[0]['sub_category_title']);
								}

								$("#qty").val(mydata[0]['enq_qty']);

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

							   		if(mydata[0]['enq_qty']!=null && mydata[0]['enq_unit']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Quantity</td>");
							        tr.push("<td>" + mydata[0]['enq_qty'] +" "+mydata[0]['enq_unit']+ "</td>");
							        tr.push('</tr>');
							    	}

							        tr.push('<tr>');
							        tr.push("<th> Message</td>");
							        tr.push("<td style='white-space:normal; width:25%;'>" + mydata[0]['enq_msg'] + "</td>");
							        tr.push('</tr>');
							        tr.push('<tr>');

							        if(mydata[0]['enq_crdt_time']!=null){
							        tr.push("<th> Credit Time</td>");
							        tr.push("<td>" + mydata[0]['enq_crdt_time'] + " Days</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_oder_req_time']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Order Required Time</td>");
							        tr.push("<td>" + mydata[0]['enq_oder_req_time'] + " Days</td>");
							        tr.push('</tr>');
							    	}

							    	if(mydata[0]['enq_exptd_date']!=null){
							        tr.push('<tr>');
							        tr.push("<th> Expected Date</td>");
							        tr.push("<td>" + mydata[0]['enq_exptd_date'] + "</td>");
							        tr.push('</tr>');
							    	}

							        tr.push('<tr>');
							        tr.push("<th> Enquiry Date</td>");
							        tr.push("<td>" + mydata[0]['enq_created'] + "</td>");
							        tr.push('</tr>');
							       
							        tr.push('<tr>');
							        tr.push("<th> Enquiry Attachment</th>");
							        //tr.push("<td>" + mydata[0]['atch_name'] + "</td>");
							        tr.push("<td><a  target='_blank' class='btn badge bg-success badge-pill' href="+ mydata[0]['atch_name'] +">View</a></td>");
							        tr.push('</tr>');
							       
							    $('.tbldata').append($(tr.join('')));
							   
						}
						
					});

			});
</script>