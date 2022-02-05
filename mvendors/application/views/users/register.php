<!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      
        
        <div class="page-content">
          
            <div class="account-login">
               <div class="account-login">
              <?php if ($this->session->flashdata('event_success')) { ?>
              <div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
              <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                  <div class="font-weight-semibold"><?= $this->session->flashdata('event_success') ?> </div></div>
              <?php } elseif($this->session->flashdata('event_error')) { ?>
                   <div class="alert alert-danger alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
              <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                  <div class="font-weight-semibold"><?= $this->session->flashdata('event_error') ?> </div></div>
             <?php } ?>
              <div class="box-authentication">
                <h4>Register</h4><p>Create your very own account</p>    
                <form id="myform" action="<?php echo base_url();?>User/Create_user" method="post">
                <label for="emmail_register">User Name<span id="form_fname-info" class="required">*</span></label>
                <input  id="uname"  name="uname" type="text" class="form-control" required>             
                <label for="emmail_register">Email Address<span  id="form_email-info" class="required">*</span></label>
                <input id="uemail" name="uemail" type="email" class="form-control" required>
                <label for="emmail_register">Mobile Number<span id="form_num-info" class="required">*</span></label>
                <input  id="unumber" name="umobile" type="text" class="form-control"required>
                <label for="emmail_register">Referral Id<span id="form_num-info" class="required"></span></label>
                <input  id="ref" name="ref" type="text" class="form-control" >
               <!-- <label>Organization Name<span id="form_num-info" class="required"></span></label>
                <input  id="uorganization" name="uorganization" type="text" class="form-control" >-->
            <!--    <label>Country<span id="form_num-count" class="required">*</span></label>
                <select  class="form-control" id="con"  name="ucountry" style="width: 262px;" required>
                   <option value="101">India</option>
                
                </select>-->

              
             <!--   <label for="register">State<span class="required">*</span></label>
                <select name="ustate" id="sta" class="form-control" style="width: 262px;" required>
                   <option value="22">Maharashtra</option>
                </select>
                <label for="register">City<span class="required">*</span></label>
                 <select name="ucity" id="cit" class="form-control" style="width: 262px;" required>
                   <option value="2763">Pune</option>
                </select>-->
                <!-- <button class="button" name="add_user" onclick="sendContact()"><i class="fa fa-user"></i>&nbsp; <span>Register</span></button> -->
                <br>
                <input type="submit" class="btn btn-warning" name="add_user"  onclick="sendContact()">
                </form>
                <div class="register-benefits">
                       <!--  <h5>Sign up today and you will be able to :</h5>
                        <ul>
                          <li>Speed your way through checkout</li>
                          <li>Track your orders easily</li>
                          <li>Keep a record of all your purchases</li>
                        </ul> -->
                      </div>
              </div>
   
    
        </div>
      </div>

    </div>
  </section>
  <!-- Main Container End --> 
  <!-- Footer -->
<script>
   $("#con").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("VLogin/get_state");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#sta').html(data);
            },
        });
    });
</script>
<script>
$(document).ready(function(){
     $("#sta").change(function(){
  // $("#sta").change(function(){
    var id = $(this).val();
         $.ajax({
            type: 'post', 
            url: '<?php echo base_url("VLogin/get_city");?>',
            data: {id:id},
            success: function(data)
            {   
                $('#cit').html(data);
            },
            
        });
    });
 });
</script>