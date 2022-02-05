 
<link href="<?php echo base_url();?>assets/admin/global_assets/style.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_layouts.js"></script>
 <!--   <script src="<?php //echo base_url();?>/assets/admin/global_assets/js/main/jquery.min.js"></script> -->
    <script src="<?php echo base_url();?>/assets/admin/global_assets/popper.min.js"></script>
<!--     <script src="<?php echo base_url();?>/assets/admin/global_assets/js/main/bootstrap.bundle.min.js"></script> -->
    <script src="<?php echo base_url();?>/assets/admin/global_assets/script.js"></script>
  <script src="<?php echo base_url();?>/assets/admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script> 
    <script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/form_multiselect.js"></script>
    <script src="<?php echo base_url();?>/assets/admin/global_assets/js/demo_pages/picker_date.js"></script>






<div class="content">
<!-- Wizard with validation -->
                <div class="card">
                    <div class="card-header bg-white header-elements-inline">
                        <h6 class="card-title">Update Business Details</h6>
                        
                    </div>
   <div style="padding:30px;">
   
        <form action="<?php echo base_url();?>Mvendor/update_bdata/" method="post" enctype="multipart/form-data">
   
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
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="icon-copy"></i></div>
                    <p>Select Package</p>
                </div>
                
                <div class="form-wizard">
                    <div class="wizard-icon"><i class="icon-copy"></i></div>
                    <p>Bank Details</p>
                </div>
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
                                        <input type="text" name="shop_name" class="form-control required" placeholder="Organisation Name" value="<?php if(!empty($business)) {echo $business[0]->bis_name;}?>">
                                    </div>

                                    <div class="form-group">
                                        <label>Email address: <span class="text-danger">*</span></label>
                                        <input type="email" name="email" class="form-control required" placeholder="your@email.com"  value="<?php if(!empty($business)) {echo $business[0]->bis_email;}?>">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label>Mobile Number:</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="+99-99-9999-9999" value="<?php if(!empty($business)) {echo $business[0]->bis_mnumber;}?>">
                                    </div>

                                   

                                    <div class="form-group">
                                        <label>Address:</label>
                                         <textarea name="address" rows="1" cols="4" placeholder="Enter Business Address" class="form-control"><?php if(!empty($business)) {echo $business[0]->bis_address;}?></textarea>
                                    </div>

                                     <div class="form-group">
                                        <label>GST Number:</label>
                                         <textarea name="bis_gst" rows="1" cols="4" placeholder="Enter Business Address" class="form-control"><?php if(!empty($business)) {echo $business[0]->bis_gst;}?></textarea>
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
                                                <?php } } } else{
                                                    foreach($country as $row) { ?>
                                                        <option value="<?php echo $row->id; ?>"><?php echo $row->country_name; ?></option>
                                                <?php } } ?>
                                            
                                        </select>
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
                                              <?php } } }?>
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
                                              <?php } } }?>
                                        </select>
                                       
                                    </div>

                                  
                                </div>

                                <div class="col-md-6">
                                      <div class="form-group">
                                        <label>Pincode: <span class="text-danger">*</span></label>
                                        <input type="text" name="pincode" placeholder="Enter Your Pincode" class="form-control" value="<?php if(!empty($business)) {echo $business[0]->bis_pincode;} ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description:</label>
                                         <textarea id="description" name="description" rows="1" cols="4" placeholder="Enter Business Description" class="form-control"> <?php if(!empty($business)) {echo $business[0]->bis_description; }?> </textarea>
                                    </div>
                                  <!--  <div class="form-group">
                                        <label>Business Type: <span class="text-danger">*</span></label>
                                        <select name="buss_type" class="form-control form-control-select2" >
                                            
                                        </select>
                                    </div>  -->
                                    <!-- Default multiselect -->
                                     <div class="form-group">
                                        <label>Alternate Mobile No.:</label>
                                        <input type="text" name="alt_mobile" class="form-control" placeholder="+99-99-9999-9999" value="<?php if(!empty($business)) {echo $business[0]->bis_manumber;}?>">
                                    </div>
                                    <div class="form-group">
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
                                            <input  name="edate"  class="form-control daterange-single" value="<?php if(!empty($business)) {echo $business[0]->bis_established_date; } ?>">
                                        </div>  
                                   
                                     
                                          
                                                <div class="form-group">
                                                    <label>Opening Time:</label>
                                                    <input type="time" name="op_time" class="form-control" placeholder="Enter Opening Time"  value="<?php if(!empty($business)) {echo $business[0]->bis_op_time; }?>">
                                                </div>
                                           
                                            
                                                <div class="form-group">
                                                    <label>Closing Time:</label>
                                                    <input type="time" name="cl_time" class="form-control" placeholder="Enter Closing Time"  value="<?php if(!empty($business)) {echo $business[0]->bis_cls_time; }?>">
                                                 </div> 

                                    </div> 
                                    <div class="form-group">
                                        <label>Shop Image:</label>
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
                                </div>

                            </div>
                            <div class="wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
                        </fieldset>
            <fieldset>
                <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Products Services: <span class="text-danger">*</span></label>
                                        <!--  <select name="category" data-placeholder="Choose a Category" class="form-control form-control-select2" data-fouc> -->
                                            <select name="category" id="category" data-placeholder="Choose a Category" class="form-control form-control-select2">
                                            <!-- <option value="">Select Category</option> -->

                                              <?php if(!empty($business)) {
                                                     foreach($category as $row) {
                                                 if($row->category_id == $business[0]->bis_category){ ?>
                                                     <option value="<?php echo $row->category_id; ?>">
                                                            <?php echo $row->category_title; ?></option>
                                              <?php } } }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Sub Products Services: <span class="text-danger">*</span></label>
                                       <!--  <select name="sub_category" data-placeholder="Choose a Sub Category" class="form-control form-control-select2" data-fouc> -->
                                         <select name="sub_category" id="sub_category" data-placeholder="Choose a Sub Category" class="form-control form-control-select2">
                                             <?php if(!empty($business)) {
                                                     foreach($subcategory as $row) {
                                                 if($row->sub_category_id == $business[0]->bis_sub_category){ ?>
                                                     <option value="<?php echo $row->sub_category_id; ?>">
                                                            <?php echo $row->sub_category_title; ?></option>
                                              <?php } } }?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Type:</label>
                                       <select name="type" id="type" data-placeholder="Choose a Type" class="form-control form-control-select2" data-fouc>
                                         <?php if(!empty($business)) {  
                                                     foreach($type as $row) {
                                                 if($row->type_id == $business[0]->bis_type){ ?>
                                                     <option value="<?php echo $row->type_id; ?>">
                                                            <?php echo $row->type_name; ?></option>
                                              <?php } } }?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Type:</label>
                                           <select name="sub_type" id="sub_type" data-placeholder="Choose a Sub Type" class="form-control form-control-select2" data-fouc>
                                            <?php if(!empty($business)) {
                                                     foreach($subtype as $row) {
                                                 if($row->subtype_id == $business[0]->bis_sub_type){ ?>
                                                     <option value="<?php echo $row->subtype_id; ?>">
                                                            <?php echo $row->subtype_name; ?></option>
                                              <?php } } }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Brand:</label>
                                        <select name="brand" id="brand" data-placeholder="Choose a Brand" class="form-control form-control-select2" data-fouc>
                                           <!--  <option value="">Select Brand</option> -->
                                             
                                                <?php if(!empty($business)) {
                                                     foreach($brand as $row) {
                                                 if($row->brand_id == $business[0]->bis_brand){ ?>
                                                     <option value="<?php echo $row->brand_id; ?>">
                                                            <?php echo $row->brand_title; ?></option>
                                              <?php } } }?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
            </fieldset>
            <fieldset>
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Package:</label>
                                        <div class="form-group">
                                           <!--  <select name="package" data-placeholder="Select your package" class="form-control form-control-select2" data-fouc> -->
                                              <select name="package" data-placeholder="Select your package" class="form-control form-control-select2">
                                            <!--  <option value="">Select Package</option> -->
                                            


                                               <?php //if(!empty($business)) {
                                                     foreach($package as $row) {
                                                 if($row->package_id == $business[0]->bis_package){ ?>
                                                     <option value="<?php echo $row->package_id; ?>">
                                                            <?php echo $row->package_name; ?></option>
                                              <?php } } ?>
                                               
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                
                            </div>
                            <div class="wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                                <button type="button" class="btn btn-next">Next</button>
                            </div>
            </fieldset>
            <fieldset>
                    <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Bank Holder Name: <span class="text-danger">*</span></label>
                                        <input type="text" name="b_holder_name" placeholder="Bank Holder Name" class="form-control required"  value="<?php if(!empty($business)) {echo $business[0]->vaccount_hname; }?>">
                                    </div>
                                   
                                    <div class="form-group">
                                    <label>Bank Name: <span class="text-danger">*</span></label>
                                        <input type="text" name="bank_name" placeholder="Bank name" class="form-control required" value="<?php if(!empty($business)) { echo $business[0]->vbank_name; }?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                     <div class="form-group">
                                    <label>Bank Account Number: <span class="text-danger">*</span></label>
                                        <input type="text" name="acc_num" placeholder="Bank Account Number" class="form-control required" value="<?php if(!empty($business)) {echo $business[0]->vaccount_num; } ?>">
                                    </div>
                                    <div class="form-group">
                                    <label>Bank IFSC Code: <span class="text-danger">*</span></label>
                                        <input type="text" name="ifsc_code" placeholder="IFSC Code" class="form-control required" value="<?php if(!empty($business)) {echo $business[0]->vifsc_code; } ?>">
                                    </div>
                                    <!-- <div class="form-group">
                                    <label>Bank Account Type: <span class="text-danger">*</span></label>
                                       <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="acc_type" class="form-input-styled" data-fouc>Saving
                                            </label>
                                        </div>
                                         <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" name="acc_type" class="form-input-styled" data-fouc>Current
                                            </label>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="wizard-buttons">
                                <button type="button" class="btn btn-previous">Previous</button>
                               <button type="Update" name="update" class="btn btn-primary btn-submit">Update</button>
                            </div>
                                                                       


            </fieldset>
           <?php } ?>
        </div>
        </form>
    </div>
    </div>
 </div>  

<script>
    
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
                $('#type').html(data);
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
                 $('#category').append("<button></button>");
          // });
     //var tax_name = document.getElementById("tax_name1").value;

    })
</script>
