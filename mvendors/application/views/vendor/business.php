 
<link href="<?php echo base_url();?>assets/admin/global_assets/style.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/form_layouts.js"></script>
 <!--   <script src="<?php //echo base_url();?>/assets/admin/global_assets/js/main/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/popper.min.js"></script>
<!--     <script src="<?php echo base_url();?>/assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/script.js"></script>
<!--   <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>  -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/form_multiselect.js"></script>
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/picker_date.js"></script>


<script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/notifications/sweet_alert.min.js"></script>

    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/extra_sweetalert.js"></script>

<!-- Theme JS files -->
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/forms/inputs/duallistbox/duallistbox.min.js"></script>

   
    <script src="<?php echo base_url();?>assets/admin/global_assets/js/demo_pages/form_dual_listboxes.js"></script>
    <!-- /theme JS files -->
        <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/pickers/daterangepicker.js"></script>
  <script src="<?php echo base_url();?>assets/admin//global_assets/js/plugins/pickers/anytime.min.js"></script>
  <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/pickers/pickadate/picker.js"></script>
  <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/pickers/pickadate/picker.date.js"></script>
  <script src="<?php echo base_url();?>assets/admin/global_assets/js/plugins/pickers/pickadate/picker.time.js"></script>
  

</style>
<div class="content">
<!-- Wizard with validation -->
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Business Details</h6>
                      <!--   <a href="<?php //echo base_url();?>Mvendor/update_bdata/<?php //echo $vendor; ?>">Edit <i class="icon-pencil7"></i></a> -->
                    </div>
   <div style="padding:30px;">
   
        <form action="<?php echo base_url();?>Mvendor/get_bdata" method="post" enctype="multipart/form-data">
   
            <div class="card-body">
            <div class="wizards">
                <div class="progressbar">
                    <div class="progress-line" data-now-value="12.11" data-number-of-steps="4" style="width: 12.11%;"></div> <!-- 19.66% -->
                </div>
                <div class="form-wizard active">
                    <div class="wizard-icon"><i class="icon-copy"></i></div>
                    <p>Business Details</p>
                </div>
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="icon-copy"></i></div>
                    <p>Product/Service Addition</p>
                </div>
              <!--   <div class="form-wizard">
                    <div class="wizard-icon"><i class="icon-copy"></i></div>
                    <p>Select Package</p>
                </div>
                
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="icon-copy"></i></div>
                    <p>Bank Details</p>
                </div> -->
            </div>
            <br><br>
            <?php if(isset($business)){
                    
                ?>
                <fieldset>
                        <!-- <h6>Business Details</h6> -->
                            <div class="row">
                                <div class="col-md-6">
                                   <!--  <div class="form-group">
                                        <label>Referral ID:</label>
                                        <input type="text" name="ref_id" class="form-control" placeholder="Enter Referral Id">
                                    </div> -->
                                    <input type="hidden" name="v_id" class="form-control" value="<?php echo $vendor; ?>">
                                    <div class="form-group">
                                        <label>Organisation/Shop Name: <span class="text-danger">*</span></label>
                                        <input type="text" name="shop_name"  placeholder="Organisation Name" class="form-control required" value="<?php if(!empty($business)) {echo $business[0]->bis_name;}?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Email address: <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control required" placeholder="your@email.com"  value="<?php if(!empty($business)) {echo $business[0]->bis_email;}?>">
                                        
                                    </div>

                                   
                                    <div class="form-group">
                                        <label>Address:<span class="text-danger">*</span></label>
                                         <textarea name="address" rows="1" cols="4" placeholder="Enter Business Address" class="form-control"><?php if(!empty($business)) {echo $business[0]->bis_address;}?></textarea>
                                    </div>
                                      <div class="form-group">
                                        <label>Permanent Address:<span class="text-danger">*</span></label>
                                         <textarea name="aaddress" rows="1" cols="4" placeholder="Enter Business Address" class="form-control"><?php if(!empty($business)) {echo $business[0]->bis_aaddress;}?></textarea>
                                    </div>
                                  

                                     <div class="form-group">

                                        <label>Pincode: <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" placeholder="Enter Your Pincode" class="form-control" value="<?php if(!empty($business)) {echo $business[0]->bis_pincode;} ?>">

                                    </div>


                                    <div class="form-group">
                                        <label>State: <span class="text-danger">*</span></label>
                                       <!--  <select name="state" data-placeholder="Select State" class="form-control form-control-select2 required" data-fouc> -->
                                         <select name="state" id="state" data-placeholder="Select State" class="form-control form-control-select2">
                                              <!--   <option value="">Select State</option> -->
                                                <?php if(!empty($business)) {
                                                     foreach($states as $row) {
                                                 if($row->id == $business[0]->bis_state){ ?>
                                                     <option value="<?php echo $row->id; ?>">
                                                            <?php echo $row->state_name; ?></option>
                                              <?php } } }
                                              else{?>
                                                    <option value="22">Maharashtra</option>
                                                   <?php foreach($cur_states as $row) { 

                                                        if($row->id!='22')
                                                           { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->state_name; ?></option>
                                                 <?php   }
                                                 } } ?>

                                              
                                        </select>

                                    </div>

                                     <div class="form-group">
                                       
                                      <label>GST Number:<span class="text-danger">*</span></label>
                                         <textarea name="bis_gst" rows="1" cols="4" placeholder="Enter GST Number" class="form-control"><?php if(!empty($business)) {echo $business[0]->bis_gst;}?></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>Shop Banner Image:</label>
                                        <input name="shop_pic" id="shop_pic" type="file" class="form-input-styled" data-fouc>
                                        <span class="form-text text-muted">Accepted formats: jpg,jpeg,png. Max file size 2Mb</span>
                                        <span class="profile-picture">
                                            <?php if(!empty($business)) { if($business[0]->bis_pic){ ?>
                                                <img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/vbusiness/<?php echo $business[0]->bis_pic; ?>" />
                                            <?php } } ?>
                                        </span>
                                        
                                          <input type="hidden" class="form-control" id="old_prof_pic" name="old_prof_pic" value="<?php if(!empty($business)) {echo $business[0]->bis_pic;}?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Business Details/Description:</label>
                                         <textarea id="description" name="description" rows="1" cols="4" placeholder="Enter Business Details/ Description" class="form-control"> <?php if(!empty($business)) {echo $business[0]->bis_description; }?> </textarea>
                                    </div>
                                    

                                  
                                </div>

                                <div class="col-md-6">
                                      <div class="form-group">
                                       
                                        <label>Mobile Number:<span class="text-danger">*</span></label>
                                        <input type="text" name="mobile" class="form-control" placeholder="+99-99-9999-9999" value="<?php if(!empty($business)) {echo $business[0]->bis_mnumber;}?>">
                                    </div>
                                    <!-- <br /> -->
                                    <!--  <div class="form-group">
                                        <label></label>
                                    </div> -->

                                    
                                  <!--  <div class="form-group">
                                        <label>Business Type: <span class="text-danger">*</span></label>
                                        <select name="buss_type" class="form-control form-control-select2" >
                                            
                                        </select>
                                    </div>  -->
                                    <!-- Default multiselect -->
                                     <div class="form-group">
                                        <label>Alternate Mobile No.:<span class="text-danger">*</span></label>
                                        <input type="text" name="alt_mobile" class="form-control" placeholder="+99-99-9999-9999" value="<?php if(!empty($business)) {echo $business[0]->bis_manumber;}?>">
                                    </div>

                                
                                 

                                    <div class="form-group">
                                        <label>Country: <span class="text-danger">*</span></label>
                                      <!--   <select name="country" data-placeholder="Select Country"  class="form-control select-search  required" data-fouc> -->
                                          <select name="country" id="country" data-placeholder="Select Country"  class="form-control form-control-select2">
                                               <!--  <option value="">Select Country</option> -->
                                                
                                               

                                                <?php if(!empty($business)) {
                                                  foreach($country as $row) {
                                                  if($row->id == $business[0]->bis_country){ ?>
                                                         <option value="<?php echo $row->id; ?>">
                                                            <?php echo $row->country_name; ?></option>
                                                <?php } } } else{?>
                                                    <option value="101">India</option>
                                                   <?php foreach($country as $row) { 

                                                        if($row->id!='101')
                                                           { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->country_name; ?></option>
                                                 <?php   }
                                                 } } ?>
                                            
                                        </select>
                                    </div>
                                    

                                    <div class="form-group">
                                        <label>City: <span class="text-danger">*</span></label>
                                        <!-- <select name="city" data-placeholder="Select City" class="form-control form-control-select2 required" data-fouc> -->
                                        <select name="city" id="city" data-placeholder="Select City" class="form-control form-control-select2">
                                               <!--  <option value="">Select City</option> -->
                                                <?php if(!empty($business)) {
                                                     foreach($city as $row) {
                                                 if($row->id == $business[0]->bis_city){ ?>
                                                     <option value="<?php echo $row->id; ?>">
                                                            <?php echo $row->city_name; ?></option>
                                              <?php } } }
                                              else{?>
                                                    <option value="2763">Pune</option>
                                                   <?php foreach($cur_city as $row) { 

                                                        if($row->id!='2763')
                                                           { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->city_name; ?></option>
                                                 <?php   }
                                                 } } ?>

                                              
                                        </select>

                                       <label>Contact Person:</label>
                                        <input type="text" name="cont_person" class="form-control" placeholder="Enter Contact Person"  value="<?php if(!empty($business)) {echo $business[0]->bis_cont_person; }?>"> 
                                    </div>
                                    

                                    <!-- <div class="form-group">
                                        <label>Payment Mode: <span class="text-danger">*</span></label>
                                      
                                         <select name="p_mode" data-placeholder="Select Payment Mode" class="form-control" >
                                            
                                                <option value="1">Cash</option>
                                                <option value="2">Cheque</option>
                                          
                                        </select>
                                    </div> -->
                                     <div class="row">
                                    <div class="form-group">
                                        <label>Established Date:</label>
                                          
						
    <input type="text" id="edate" name="edate"  class="date-own form-control" placeholder="Year" class="" value="<?php if(!empty($business)) {echo $business[0]->bis_established_date;} ?>">
                                        </div>  
                                   
                                          
                                                 <div class="form-group">
                                         <label>Opening Time:</label>
                                         <div class="input-group">
                                        
                                          <input type="text" type="time" name="op_time"  class="form-control pickatime-events" placeholder="Opening Time" value="<?php if(!empty($business)) {echo $business[0]->bis_op_time; }?>">
                                        </div>
                                        </div>
                                           
                                            
                                        <div class="form-group">
                                            <label>Closing Time:</label>
                                            <div class="input-group">
                                              
                                                <input type="text" type="time" name="cl_time" class="form-control pickatime-events" placeholder="Closing Time" value="<?php if(!empty($business)) {echo $business[0]->bis_cls_time; }?>">
                                              </div>
                                         </div> 


                                    </div> 
                                    
                                    <div class="form-group">
                                        <label>Shop Logo:</label>
                                        <input name="shop_logo" id="shop_logo" type="file" class="form-input-styled" data-fouc>
                                        <span class="form-text text-muted">Accepted formats: jpg,jpeg,png. Max file size 2Mb</span>
                                        <span class="profile-picture">
                                            <?php if(!empty($business)) { if($business[0]->bis_logo){ ?>
                                                <img id="avatar" style="height:150px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/vbusiness/<?php echo $business[0]->bis_logo; ?>" />
                                            <?php } } ?>
                                        </span>
                                        
                                          <input type="hidden" class="form-control" id="old_bis_logo" name="old_bis_logo" value="<?php if(!empty($business)) {echo $business[0]->bis_logo;}?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Shop Images:</label>
                                        <input name="shop_imgs[]" id="shop_imgs" type="file" class="form-input-styled" data-fouc multiple>
                                        <span class="form-text text-muted">Accepted formats: jpg,jpeg,png. Max file size 2Mb</span>
                                         <span class="profile-picture">
                                            <?php if(!empty($business)) { if($business[0]->bis_shop_imgs){ 
                                                $str = $business[0]->bis_shop_imgs;
                                                $array = explode(',', $str);
                                                foreach ($array as $key) {


                                                   // print_r($key);
                                               // echo "arr[".$key."] = ".$value."<br>";
                                               // }
                                                //for($i=0; $i < sizeof($array); $i++)
                                                //{?>
                                                    <img id="avatar" style="height:50px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php echo base_url();?>assets/uploads/vbusiness/<?php echo $key; ?>" />
                                               <?php }
                                                
                                                //print_r($array);
                                               // echo sizeof($array);

                                                ?>

                                                <!-- 
                                                   <img id="avatar" style="height:50px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php //echo base_url();?>assets/uploads/vbusiness/<?php //echo $new; ?>" />  -->
                                                <!-- <img id="avatar" style="height:50px;" class="editable img-responsive" alt="Alex's Avatar" src="<?php //echo base_url();?>assets/uploads/vbusiness/<?php //echo $business[0]->bis_shop_imgs; ?>" /> -->
                                            <?php  } } ?>
                                        </span> 
                                        
                                          <input type="hidden" class="form-control" id="shopimgs" name="shopimgs" value="<?php if(!empty($business)) {echo $business[0]->bis_shop_imgs;}?>">
                                    </div>
                                </div>

                            </div>
                            <div class="wizard-buttons">
                              <!--   <button type="button" class="btn btn-previous">Previous</button> -->
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
            <fieldset>
             <div class="row">
                          <div class="col-md-6">
                              <div class="form-group" style="overflow-y: scroll; height:400px;">
                                  <div class="navbar navbar-expand-xl navbar-light rounded">
                                      <ul class="navbar-nav" >
                                        <li class="nav-item dropdown" id='ulid'>
                                            <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                                              <i class="icon-cube3 mr-2"></i>
                                              Category
                                            </a>
                                            <div class="dropdown-menu">  <?php foreach($category as $row) { ?>
                                              <div class="dropdown-submenu">
                                               
                                                <a href="#" class="dropdown-toggle dropdown-item" data-toggle="dropdown" id="drop"><i class="icon-plus-circle2"></i><option onclick="mOver('<?php echo $row->category_id; ?>')" value="<?php echo $row->category_id; ?>">
                                                <?php echo $row->category_title; ?></option></a> 
                                              
                                                <div class="dropdown-menu" id="test<?php echo $row->category_id; ?>">
                                                  
                                                </div>
                                              </div>
                                              <?php  } ?>
                                            
                                            </div>
                                        </li>
                                      </ul> 
                                  </div> 
                              </div>
                          </div> 
                          
                          <div class="col-md-6">
                                   <textarea readonly id="sid_display" class="form-control " height="100px" width="200px"></textarea><br/>
                                   <select id="sid"  name ="sid[]"  class="form-control " multiple="multiple"  style='display:none' ></select>  
                              <div class="wizard-buttons">
                                
                                <button type="button" class="btn btn-previous">Previous</button>
                             
                                <button type="submit" name="save" id="save" <?php if(!empty($business)) {echo 'style="display: none;"';}?> class="btn btn-primary btn-submit">Submit</button>

                                <button type="submit" onclick="hello()" name="update" id="update" <?php if(empty($business)) {echo 'style="display: none;"';}?> class="btn btn-primary btn-submit">Update</button>
                              </div>
                          </div>
                </div>            
            </fieldset>
     
           <?php } ?>
        </div>
        </form>
    </div>
    </div>
 </div>  

<script>      //29 Dec 2018
    var subcat = <?php echo json_encode($allcatsubc); ?>;
    var curr_open=0;
      
    
   $( document ).ready(function() {        //28,29 Dec 2018

  
      var sel_disp = document.getElementById("sid_display");
      var disp_text ="";
      
            for ( var key in subcat){
              //alert(key);
              for (var i=0;i < subcat[key].length;i++) {
                if(subcat[key][i]['sel'] == 1){
                  var option = document.createElement("OPTION");
                  option.setAttribute('id',`${key},${subcat[key][i]['sub_category_id']}`);
                  
                  option.innerHTML ='('+ subcat[key][i]['category_title']+') '+subcat[key][i]['sub_category_title'];
                  var sel = document.getElementById("sid");
                  option.setAttribute('selected','');                  
                  option.setAttribute(`value` , `${key},${subcat[key][i]['sub_category_id']}`);
                  sel.appendChild(option);
                  disp_text+='('+ subcat[key][i]['category_title']+') '+subcat[key][i]['sub_category_title']+",";
                }
              }
              sel_disp.value=disp_text.replace(/,\s*$/, "");
            }
       });

function mOver(obj)
  {
    
     var id = obj;//cat id
     var data='';
         $('#test'+curr_open).css({display: "none"});
        $('#test'+id).html('');
        //data+= '<a href="#" class="dropdown-item  dropdown-toggle"><i class="icon-firefox">';
            
           for (var i=0;i < subcat[id].length;i++) {
      
        if(subcat[id][i]['sel'] == 1){
         data+= '<div class="row" width=100% style="margin-left: 5px;"><i id="icon_" class="icon-checkbox-checked mr-2"></i><option id="'+id+'_'+subcat[id][i]['sub_category_id']+'" style="background-color:#2196f38c;" onclick="subclick(\''+id+','+subcat[id][i]['sub_category_id']+','+subcat[id][i]['category_title']+','+subcat[id][i]['sub_category_title']+'\')">'+subcat[id][i]['sub_category_title']+'</option></div><br>';   
         }
         else{
          data+= '<div class="row" width=100% style="margin-left: 5px;"><i id="icon_" class="icon-checkbox-unchecked mr-2"></i><option id="'+id+'_'+subcat[id][i]['sub_category_id']+'" onclick="subclick(\''+id+','+subcat[id][i]['sub_category_id']+','+subcat[id][i]['category_title']+','+subcat[id][i]['sub_category_title']+'\')">'+subcat[id][i]['sub_category_title']+'</option></div><br>'; 
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
               cur_option.previousSibling.classList.remove("icon-checkbox-unchecked");
              cur_option.previousSibling.classList.add("icon-checkbox-checked");
              option.setAttribute('id',`${fields[0]},${fields[1]}`);
              option.setAttribute(`value` , `${fields[0]},${fields[1]}`);
              //option.innerHTML = index; 
              option.innerHTML = `(${fields[2]}) ${fields[3]}`;

              option.setAttribute('selected','');
              sel.appendChild(option);
            }else{
              subcat[fields[0]][j]['sel'] =0;
              cur_option.style.backgroundColor="#ffffff"; 
               cur_option.previousSibling.classList.remove("icon-checkbox-checked");
              cur_option.previousSibling.classList.add("icon-checkbox-unchecked");
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

<script>
    $(document).ready(function(){

        // $(".dropdown-toggle").dropdown();
        //$('#category').click(function()
                 //$('#category').append("<button></button>");
          // });
     //var tax_name = document.getElementById("tax_name1").value;

    })
</script>
<script type="text/javascript">
    var id = $("#v_id").val(); 
   // $( "#update" ).click(function() {

            /*swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this Category file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
            });*/
       


        /*$.ajax({
            type: 'post', 
            url: '<?php //echo base_url("Mvendor/check_Vendor_Inquery");?>',
            data: {id:id},
            success: function(data)
            {   
                //$('#sub_type').html(data);
                //alert(data +'You cnat change the category');
            },
            
        });*/
  //  });
    
      // Warning alert
        $('#updated').on('click', function(event) {
            
            /*event.preventDefault();
             swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!'
             }),
              function (isConfirm) {
                if (isConfirm) {
                  swal("Deleted!", "Your imaginary file has been deleted!", "success");
                } else {
                  swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
              }*/
/*
                var id = $("#v_id").val(); 
                $.ajax({
                type: "POST",
                data: {id: id},
                url: '<?php// echo base_url("Mvendor/check_Vendor_Inquery");?>',
                success: function (data) {
                    if (data > 0)
                    {

                        swal("Deleted!", "Product has been deleted.", "success");
                        
                    } else {

                        swal("Oops...", "Error in delete product!", "error");
                        
                    }
                }
            });*/
            
        });

        
</script>
<script>
    function hello()
    {
        /* event.preventDefault();
         swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this imaginary file!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
             });
          function (isConfirm) {
                if (isConfirm) {
                  swal("Deleted!", "Your imaginary file has been deleted!", "success");
                } else {
                  swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
              }*/
    } 
</script>
<script>

    $('#update').on('click', function(event) {
        var id = $("#category").val(); 
        var Cid = $("#sub_category").val();
      
            $.ajax({
                type: "POST",
                data: {id: id,Cid:Cid},
                url: '<?php echo base_url("Mvendor/checkCagegoryInTable");?>',
                success: function (data) {
                    if (data !=='')
                    {
                        event.preventDefault();
                        swal({
                        title: 'Are you sure?',
                        html: 'You will not be able to Submit Please Select the Sub Category of  '+ data +' !',
                        type: 'warning',
                        confirmButtonText: 'Ok',
                        closeOnConfirm: false
                           });
                           
                    } else {
                         alert('fail');
                        
                    }
                }
            });
        
                

       
         
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
 <script>
   $('.date-own').datepicker({
         minViewMode: 2,
         format: 'yyyy',
         'autoclose' : true
       });
 
 </script>