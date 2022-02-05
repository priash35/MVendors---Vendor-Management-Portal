	<!-- Theme JS files -->
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/datatables_advanced.js"></script>
	<script src="<?php echo base_url();?>/assets/admin//global_assets/js/demo_pages/datatables_extension_buttons_init.js"></script>


			<!-- Content area -->
			<div class="content">
				<!-- Right icons -->
				<div class="row">
					<div class="col-md-12">
            <div class="row">
              <div class="col-lg-4">

                <!-- Members online -->
         <div class="card bg-teal-400">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0">
                        <?php print_r($ActCout);?></h3>
                            </div>
                            
                            <div>
                    Active Vendor 
                      <!--<div class="font-size-sm opacity-75">489 avg</div>-->
                    </div>
                  </div>

                  <div class="container-fluid">
                    <!-- <div id="members-online"></div> -->
                  </div>
                </div>
                <!-- /members online -->

              </div>

              <div class="col-lg-4">

                <!-- Current server load -->
                <div class="card bg-pink-400">
                
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0"><?php print_r($AccpetCout);?></h3></h3>
                            </div>
                            
                            <div>
                     Interested Vendor
                      <!--<div class="font-size-sm opacity-75">34.6% avg</div>-->
                    </div>
                  </div>

                  <!-- <div id="server-load"></div> -->
                </div>
                <!-- /current server load -->

              </div>

              <div class="col-lg-4">

                <!-- Today's revenue -->
                <div class="card bg-blue-400">
                  <div class="card-body">
                    <div class="d-flex">
                      <h3 class="font-weight-semibold mb-0"><?php print_r($UnActCout);?></h3></h3>
                            </div>
                            
                            <div>
                     Un Interested Vendor
                      <!--<div class="font-size-sm opacity-75">$37,578 avg</div>-->
                    </div>
                  </div>

                  <!-- <div id="today-revenue"></div> -->
                </div>
                <!-- /today's revenue -->

              </div>
              
            </div>
						<div class="card">
						


							<div class="card-body">
								<ul class="nav nav-pills">
									<li class="nav-item"><a href="#right-icon-pill1" class="nav-link active" data-toggle="tab">Active Vendor <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill8" class="nav-link " data-toggle="tab">Interested Vendor<i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill7" class="nav-link " data-toggle="tab">Un Interested Vendor<i class="icon-menu7 ml-2"></i></a></li>
									<!-- <li class="nav-item"><a href="#right-icon-pill2" class="nav-link" data-toggle="tab">Active inquiry <i class="icon-menu7 ml-2"></i></a></li> -->
									
									<!--<li class="nav-item dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown <i class="icon-gear ml-2"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<a href="#right-icon-pill3" class="dropdown-item" data-toggle="tab">Accepted Enquiries</a>
											<a href="#right-icon-pill4" class="dropdown-item" data-toggle="tab">Another pill</a>
										</div>
									</li>-->
									
									<!-- <li class="nav-item"><a href="#right-icon-pill3" class="nav-link " data-toggle="tab">Accepted Enquiries <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill5" class="nav-link " data-toggle="tab">Confirmed Enquiries <i class="icon-menu7 ml-2"></i></a></li>
									<li class="nav-item"><a href="#right-icon-pill6" class="nav-link " data-toggle="tab">Completed Enquiries <i class="icon-menu7 ml-2"></i></a></li> -->
								</ul>

								<div class="tab-content">
									<div class="tab-pane fade show active" id="right-icon-pill1">
										<!-- Basic initialization -->
											<div class="card">
												<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Id</th>
															<th>Name</th>
															<th>Email</th>
															<th>Mobile No.</th>
															<th>Inq Status</th>
															<th>Enq Date</th>
															
														</tr>
													</thead>
													<tbody>
														<?php foreach ($getInAct as $key) { ?>
														<tr>
															<td><?php echo $key->res_id ?></td>
															<td><?php echo $key->vfname.' '. $key->vlname?></td>
															<td><?php echo $key->vemail ?></td>
															<td><?php echo $key->vmobile ?></td>
															<td><?php echo $key->res_enq_status ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
				
									</div>
									<div class="tab-pane fade" id="right-icon-pill8">
										 	<!-- Basic initialization -->
											<div class="card">
												<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Id</th>
															<th>Name</th>
															<th>Email</th>
															<th>Mobile No.</th>
															<th>Inq Status</th>
															<th>Enq Date</th>
															
														</tr>
													</thead>
													<tbody>
														<?php foreach ($getAct as $key) { ?>
														<tr>
															<td><?php echo $key->res_id ?></td>
															<td><?php echo $key->vfname.' '. $key->vlname?></td>
															<td><?php echo $key->vemail ?></td>
															<td><?php echo $key->vmobile ?></td>
															<td><?php echo $key->res_enq_status ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
									</div>
									<div class="tab-pane fade" id="right-icon-pill7">
											<!-- Basic initialization -->
											<div class="card">
													<table class="table datatable-button-init-basic">
													<thead>
														<tr>
															<th>Id</th>
															<th>Name</th>
															<th>Email</th>
															<th>Mobile No.</th>
															<th>Inq Status</th>
															<th>Enq Date</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($getUnAct as $key) { ?>
														<tr>
															<td><?php echo $key->res_id ?></td>
															<td><?php echo $key->vfname.' '. $key->vlname?></td>
															<td><?php echo $key->vemail ?></td>
															<td><?php echo $key->vmobile ?></td>
															<td><?php echo $key->res_enq_status ?></td>
															<td><?php echo $key->res_enq_created ?></td>
															<td>
                 
                            <?php 
                                      $sql= 'SELECT * FROM tbl_enq_vendor_response  WHERE res_enq_id ='.$key->res_enq_id.' AND res_vend_id = '.$key->vendor_id.' AND res_enq_status = "Not_Interested" ';
                                                  $query= $this->db->query($sql);
                                                  $res= $query->result();
                                      
                                  ?>
                                  <?php if(!empty($res)) { ?>
                                  <a href="#" onclick="assgninq('<?php echo $key->res_enq_id.','.$key->vendor_id; ?>')"><span class="badge badge-success">Assign inquery</span></a>
                                  <?php } else { ?>
                                  <?php $ides = $key->res_enq_id.''.$key->vendor_id; ?>
                                  <a href="#"><span class="badge badge-danger">Assigned </span></a>
                                  <?php }?>               
                              </td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<!-- /basic initialization -->
									</div>
									<div class="tab-pane fade" id="right-icon-pill2">
										
									</div>

									<div class="tab-pane fade" id="right-icon-pill3">
											
									</div>

									<div class="tab-pane fade" id="right-icon-pill4">
										Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthet.
									</div>
									<div class="tab-pane fade" id="right-icon-pill5">
										
									</div>
									<div class="tab-pane fade" id="right-icon-pill6">
									
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /right icons -->

			</div>
			<!-- /content area -->
<script type="text/javascript">
	 $("#bus_coun").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#bus_state').html(data);
            },
        });
    });
   $("#bus_state").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#bus_city').html(data);
            },
            
        });
    });
   
</script>

<script>      //29 Dec 2018
   

function mOver(obj)
  {
    
     var id = obj;//cat id
     var data='';
         $('#test'+curr_open).css({display: "none"});
        $('#test'+id).html('');
        data+= '<a href="#" class="dropdown-item  dropdown-toggle"><i class="icon-firefox">';
            
        for (var i=0;i < subcat[id].length;i++) {
      
        if(subcat[id][i]['sel'] == 1){
         data+= '<option id="'+id+'_'+subcat[id][i]['sub_category_id']+'" style="background-color:#2196f38c;" onclick="subclick(\''+id+','+subcat[id][i]['sub_category_id']+','+subcat[id][i]['category_title']+','+subcat[id][i]['sub_category_title']+'\')">'+subcat[id][i]['sub_category_title']+'</option>';   
         }
         else{
          data+= '<option id="'+id+'_'+subcat[id][i]['sub_category_id']+'" onclick="subclick(\''+id+','+subcat[id][i]['sub_category_id']+','+subcat[id][i]['category_title']+','+subcat[id][i]['sub_category_title']+'\')">'+subcat[id][i]['sub_category_title']+'</option>'; 
        }
        }
      data+='</i></a>';
      $('#test'+id).html(data);
      //document.getElementById('test'+id).style.display = "block";

      $('#test'+id).toggle(function () { 
              
      $('#test'+id).css({display: "inline-block"});
      curr_open=id;
       });
   
  }


  function subclick(index)
  {
    var i;
    var sel = document.getElementById("sid");
    var sel_disp = document.getElementById("sid_display");
    var readstring='';
    //for (i = 0; i <= index.length; i++) {
      var option = document.createElement("OPTION");
      var fields = index.split(',');
      var cur_option = document.getElementById(`${fields[0]}_${fields[1]}`);
        for (j=0;j<subcat[fields[0]].length;j++){
          if (subcat[fields[0]][j]['sub_category_id']==fields[1]){
            if (subcat[fields[0]][j]['sel'] ==0){
              subcat[fields[0]][j]['sel'] =1;
              cur_option.style.backgroundColor="#2196f38c";
              option.setAttribute('id',`${fields[0]},${fields[1]}`);
              option.setAttribute(`value` , `${fields[0]},${fields[1]}`);
              //option.innerHTML = index; 
              option.innerHTML = `(${fields[2]}) ${fields[3]}`;

              option.setAttribute('selected','');
              sel.appendChild(option);
            }else{
              subcat[fields[0]][j]['sel'] =0;
              cur_option.style.backgroundColor="#ffffff";  
              var element = document.getElementById(`${fields[0]},${fields[1]}`);            
              sel.removeChild(element);
            }
          }
        }

        for (k=0;k<sel.length;k++){
          readstring+=sel.options[k].text+",";
        }
        sel_disp.value=readstring.replace(/,\s*$/, "");
    //}
      
  }
    
   $("#country").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#state').html(data);
            },
        });
    });
   $("#state").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#city').html(data);
            },
            
        });
    });
   $("#category").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_sub_cat");?>',
            data: {id:id},
            success: function(data)
            {  
                $('#sub_category').html(data);
            },
        });
    });
   $("#sub_category").change(function(){
    var id = $(this).val();

         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_type");?>',
            data: {id:id},
            success: function(data)
            {   

               $('#brand').html(data);
                //$(".form-control multiselect-clickable-groups").html(data);

            },
            
        });
    });
   $("#type").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("Mvendor/get_sub_type");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#sub_type').html(data);
            },
            
        });
    });
</script>


<script type="text/javascript">
    var id = $("#v_id").val(); 
  
    
      // Warning alert
        $('#updated').on('click', function(event) {
            
         
            
        });

        
</script>


<script type="text/javascript">
  function selectIngredient(select)
{
  var option = select.options[select.selectedIndex];
  var ul = select.parentNode.getElementsByTagName('ul')[0];
     
  var choices = ul.getElementsByTagName('input');
  for (var i = 0; i < choices.length; i++)
    if (choices[i].value == option.value)
      return;
     
  var li = document.createElement('li');
  var input = document.createElement('input');
  var text = document.createTextNode(option.firstChild.data);
     
  input.type = 'hidden';
  input.name = 'ingredients[]';
  input.value = option.value;

  li.appendChild(input);
  li.appendChild(text);
  li.setAttribute('onclick', 'this.parentNode.removeChild(this);');     
    
  ul.appendChild(li);
}
</script>
<script type="text/javascript">
  function assgninq(id) // 24 Jan 19
  {
    alert(id);
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
</script>