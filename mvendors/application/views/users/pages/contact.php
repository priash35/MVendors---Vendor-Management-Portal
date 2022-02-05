  <!-- Main Container -->
  <section class="main-container col1-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-12">
          
          <div id="contact" class="page-content page-contact">
          <div class="page-title">
            <h2>Contact Us</h2>
          </div>
            <!--   -->
            <div class="row">
              <div class="col-xs-12 col-sm-6" id="contact_form_map">
                <h3 class="page-subheading">Let's get in touch</h3>
               <!-- <p>Lorem ipsum dolor sit amet onsectetuer adipiscing elit. Mauris fermentum dictum magna. Sed laoreet aliquam leo. Ut tellus dolor dapibus eget. Mauris tincidunt aliquam lectus sed vestibulum. Vestibulum bibendum suscipit mattis.</p>
                <br/>
                <ul>
                  <li>Praesent nec tincidunt turpis.</li>
                  <li>Aliquam et nisi risus.&nbsp;Cras ut varius ante.</li>
                  <li>Ut congue gravida dolor, vitae viverra dolor.</li>
                </ul>
                <br/>-->
                <ul class="store_info">
                  <li><i class="fa fa-home"></i>S.No: 282, H. No: 132, Opp Fish Firm, Solapur Road,Pune, Maharashtra, India -411028</li>
                  <li><i class="fa fa-home"></i>9’ Manish Complex, St. Patrick Town, Near Croma Mall, Shevkar Vasti, Hadapsar Industrial Estate, Pune, Maharashtra, India -411013</li>
                  <li><i class="fa fa-phone"></i><span>+91 9112656464 / 8530725767</span></li>
                  <li><i class="fa fa-fax"></i><span>+39 0035 356 765</span></li>
                  <li><i class="fa fa-envelope"></i>Email: <span><a href="mailto:info@mvendors.com">
                  contact@mvendors.com/ info@mvendors.com</a></span></li>
                </ul>
              </div>
              <div class="col-sm-6">
                <h3 class="page-subheading">Make an enquiry</h3>
                <div class="contact-form-box">
                  <div class="form-selector">
                    <label>Name</label>
                  
                    <input class="form-control" type="text" id="fname" name="fname" placeholder="first Name" required>
		   <span id="fname-msg" ></span>
                  </div>
                  <div class="form-selector">
                    <label>Email</label>
                  
             		<input class="form-control" type="email" id="email" name="email" placeholder="Email address" required>
			<span id="email-msg" ></span>
                  </div>
                  <div class="form-selector">
                    <label>Phone</label>
                  
                    <input class="form-control" type="tel" id="phone" name="phone" placeholder="phone no." required>
		 <span id="phone-msg" ></span>
                  </div>
                  <div class="form-selector">
                    <label>Message</label>
           
                    <textarea class="form-control input-sm" rows="10" id="message" name="message"></textarea>
                     <span id="message-msg" ></span>
                  </div>
                  <div class="form-selector">
                  
                    
                    <input type="submit" class="btn btn-warning" onclick="send()">
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </section>
  <!-- Main Container End -->
<script>
            function send()
             {
             	    valid = valContact();
		if(valid) {
			jQuery.ajax({
			   url: "<?php echo base_url();?>User/sendEmail",
			   data: 'form_fname='+$("#fname").val()+'&form_email='+$("#email").val()+'&phone='+$("#phone").val()+'&subject='+$("#subject").val()+'&message='+$("#message").val(),
				   type: "POST",
				   success: function(data){
					
					 $("#demo").html(data);
					  $('#fname').val('');$('#email').val('');$('#phone').val('');$('#subject').val('');$('#message').val('');
					},
					error: function() {}
			   });
                   }
             }
             function valContact() 
		 {
			var valid = true;	
			$(".demoInputBox").css('background-color','');
			$(".info").html('');
			if(!$("#fname").val()) {
				$("#fname-msg").html("(Please enter your name)");
				$("#fname-msg").css('background-color','#FFFFDF');
				valid = false;
			}
			
			if(!$("#email").val()) {
				$("#email-msg").html("(Please enter your email)");
				$("#email-msg").css('background-color','#FFFFDF');
				valid = false;
			}
			if(!$("#phone").val()) {
				$("#phone-msg").html("(Please enter your Number)");
				$("#phone-msg").css('background-color','#FFFFDF');
				valid = false;
			}
	
			
			if(!$("#message").val()) {
				$("#message-msg").html("(Please enter your message)");
				$("#message-msg").css('background-color','#FFFFDF');
				valid = false;
			}
			return valid;
		}
 </script>
		 
