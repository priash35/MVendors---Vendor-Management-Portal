<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
			<i class="icon-unfold mr-2"></i>
			Footer
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-footer">
		<span class="navbar-text">
			<!-- <a href="#">Design and Developed </a> by <a href="http://gravitybusinessservices.com" target="_blank">Gravity Business Services</a> -->
			 <div class="col-sm-12 col-xs-12 coppyright">© 2018 All Rights Reserved By MVENDORS | Designed By<a href="http://www.gravitybusinessservices.com"> Gravity Business Services</a>. </div>
		</span>	
		<ul class="navbar-nav ml-lg-auto">
		<li class="nav-item"><a href="#">Last IP :<span class="text-pink-400"><i ></i> <?php echo $ip;?></span></a></li>
		</ul>	
	</div>
</div>
<!-- /footer -->
<script type="text/javascript">			//image upload preview 17 Jan 2019
	    function readURL() {
        var $input = $(this);
        var $newinput =  $(this).parent().parent().parent().find('.portimg ');
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                reset($newinput.next('.delbtn'), true);
                $newinput.attr('src', e.target.result).show();
                $newinput.after('<input type="button" class="delbtn removebtn" value="Remove">');
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
    $(".fileUpload").change(readURL);
    $("form").on('click', '.delbtn', function (e) {
        reset($(this));
    });

    function reset(elm, prserveFileName) {
        if (elm && elm.length > 0) {
            var $input = elm;
            $input.prev('.portimg').attr('src', '').hide();
            if (!prserveFileName) {
                $($input).parent().parent().parent().find('input.fileUpload ').val("");
                //input.fileUpload and input#uploadre both need to empty values for particular div
            }
            elm.remove();
        }
    }
</script>
