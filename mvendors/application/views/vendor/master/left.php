<?php 
/*$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);

if($components[4] !=''){
    $first_part = $components[4];
}
else
{
    $first_part = $components[3];
}


echo $directoryURI.'<br>';
echo $first_part;*/

?>
<style type="text/css">
    img.portimg {
            display: none;
            max-width: 200px;
            max-height: 200px;
}
</style>
<body>
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="<?php echo base_url();?>Mvendor" class="d-inline-block">
            <!--<img src="<?php echo base_url();?>/assets/admin/global_assets/images/logo_light.png" alt="">-->
             <img src="<?php echo base_url();?>/assets/uploads/mvendors_logo.png" alt="" class ="img-responsive" style="height: 50px;width: 75px;">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
        </ul>

        <span class="navbar-text ml-md-3">
           <!--  <span class="badge badge-mark border-orange-300 mr-2"></span>
            Morning!!!
 -->
        </span>

        	<ul class="navbar-nav ml-xl-auto">
        	<li class="nav-item dropdown dropdown-user" style="line-height: 35px;">
                <?php //print_r($result); 
                foreach ($result as $row) { ?>
                   
                <!-- <a href="#" class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
                     <?php //if ($row->vprof_pic == '') { ?>
                    <img src="<?php //echo base_url();?>assets\uploads\vendor\vendor.png" class="rounded-circle" alt="">
                     <?php // } else {?>
                         <img src="<?php //echo base_url();?>assets\uploads\vendor\<?php //echo $row->vprof_pic;?>" class="rounded-circle" alt="">
                      <?php //} ?> -->
                    
                    <!-- <i class=".icon .icon-bell-alt"></i><span>Notifications</span> -->
                    <?php $sql= 'SELECT * FROM tbl_notification WHERE notification_status ="UNREAD" AND notification_vend_id='.$row->vendor_id;
                     $query= $this->db->query($sql);
                     $value= $query->num_rows(); ?>
                    <a title="My Notifications" id = "noti"  href="#" class="noti navbar-nav-link legitRipple " data-toggle="modal" data-id="<?php echo $row->vendor_id;?>"><i class="icon-bell2"></i> Notifications<?php if($value!=0){?>( <?php echo $value; ?> )<?php } ?></a>

                <!-- <a title="My Notifications" id = "noti" class="noti" href="#"  data-toggle="modal" data-id="<?php //echo $userpro[0]->user_id;?>"><i class="fa fa-bell"></i><span class="hidden-xs">Notifications</span></a> -->

                <?php } ?>
               
               
            </li>
			<li class="nav-item dropdown dropdown-user">
                <?php foreach ($result as $row) { ?>
                   
				<a href="#" class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
                     <?php if ($row->vprof_pic == '') { ?>
                    <img src="<?php echo base_url();?>assets\uploads\vendor\vendor.png" class="rounded-circle" alt="">
                     <?php } else {?>
                         <img src="<?php echo base_url();?>assets\uploads\vendor\<?php echo $row->vprof_pic;?>" class="rounded-circle" alt="">
                      <?php } ?>
					
					<span><?php echo $row->vfname?></span>
				</a>

                <?php } ?>
				<div class="dropdown-menu dropdown-menu-right">
					<a href="<?php echo base_url("Mvendor/venoders_profile");?>" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<!-- <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
					<a href="#" class="dropdown-item">
						<i class="icon-comment-discussion"></i>
						Messages
						<span class="badge badge-pill bg-blue ml-auto">58</span>
					</a> -->
					<div class="dropdown-divider"></div>
					<!-- <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> -->
					<a href="<?php echo base_url();?>VLogin/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
		</ul>
    </div>
</div>

<!-- /main navbar -->
<!--Notifications Popup Start-->                      <!-- 16 Jan 2019 -->
 <div id="notif" class="modal fade">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content" style="height: auto;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body"> 
            <h5>Notifications<span class="text-capitalize" style="color: orangered;"></span></h5><span id="error1" class="price"> </span><br> 
            <div class="table-rep-plugin">
                <div class="table-responsive" data-pattern="priority-columns">
                  <table id="datatable" class="table table-striped">
                    <thead>
                      <tr>
                        <th>Sr.<br>No.</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class='tbldata_note' id='tbldata_note'></tbody>
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
  
 <!--End of Notifications Popup-->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    <div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            <span class="font-weight-semibold">Navigation</span>
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->

        <!-- Sidebar content -->
        <div class="sidebar-content">
           
            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
			<?php if($result[0]->vgender != ''){?>
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="<?php echo base_url("Mvendor");?>" class="nav-link <?=(current_url()==base_url('Mvendor')) ? 'active':''?>">
                            <i class="icon-home4"></i>
                            <span>
                                Dashboard
                            </span>
                        </a>
                        
                    </li>
                  
                     <li class="nav-item nav-item-submenu">
                        <a href="<?php echo base_url("Mvendor/update_business_details");?>" class="nav-link <?=(current_url()==base_url('Mvendor/update_business_details')) ? 'active':''?>"><i class="icon-versions"></i> <span>Business Details</span></a>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <a href="<?php echo base_url("Mvendor/update_business_category");?>" class="nav-link <?=(current_url()==base_url('Mvendor/update_business_category')) ? 'active':''?>"><i class="icon-versions"></i> <span>Category Details</span></a>
                    </li>
                     <li class="nav-item nav-item-submenu">
                        <!-- <a href="<?php //echo base_url();?>Mvendor/vendor_business" class="nav-link"><i class="icon-copy"></i> <span>Business Details</span></a> -->
                        <a href="<?php echo base_url("Package");?>" class="nav-link <?=(current_url()==base_url('Package')) ? 'active':''?>"><i class="icon-versions"></i> <span>Pckage Details</span></a>
                    </li>
                     <li class="nav-item nav-item-submenu">
                        <!-- <a href="<?php //echo base_url();?>Mvendor/vendor_business" class="nav-link"><i class="icon-copy"></i> <span>Business Details</span></a> -->
                        <a href="<?php echo base_url("Inquiry/vendor_enquirylist");?>" class="nav-link <?=(current_url()==base_url('Inquiry/vendor_enquirylist')) ? 'active':''?>"><i class="icon-versions"></i> <span>Active Enquiries</span></a>
                    </li>
                    <li class="nav-item nav-item-submenu">
                        <!-- <a href="<?php //echo base_url();?>Mvendor/vendor_business" class="nav-link"><i class="icon-copy"></i> <span>Business Details</span></a> -->
                        <a href="<?php echo base_url("Inquiry/vendor_accpted_enquirylist");?>" class="nav-link <?=(current_url()==base_url('Inquiry/vendor_accpted_enquirylist')) ? 'active':''?>"><i class="icon-versions"></i> <span>Accepted/Assigned Enquiries</span></a>
                    </li>
                    <li class="nav-item nav-item-submenu">
                       
                        <a href="<?php echo base_url("Inquiry/vendor_deal_enquirylist");?>" class="nav-link <?=(current_url()==base_url('Inquiry/vendor_deal_enquirylist')) ? 'active':''?>"><i class="icon-versions"></i> <span>Confirmed Enquiries</span></a>
                    </li>

                    <li class="nav-item nav-item-submenu">
                       
                        <a href="<?php echo base_url("Inquiry/vendor_Completed_enqlist");?>" class="nav-link <?=(current_url()==base_url('Inquiry/vendor_Completed_enqlist')) ? 'active':''?>"><i class="icon-versions"></i> <span>Completed Enquiries</span></a>
                    </li>
                    <!-- <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Enquiry Details</span></a>
                    </li> -->
                    <!-- <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-stats-bars"></i> <span>Reports</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Animations">
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>Vendor Stock</a></li>
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>Purchase Register</a></li>
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>User References</a></li>
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>Vendor References</a></li>
                        </ul>
                    </li> -->
                   
                   
                </ul>
			<?php  }?>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->
        
    </div>
    <!-- /main sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-light">
            <!--<div class="page-header-content header-elements-md-inline">
                <div class="page-title d-flex">
                    <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Home</span> - Dashboard</h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                            <i class="icon-bars-alt text-pink-300"></i>
                            <span>Statistics</span>
                        </a>
                        <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                            <i class="icon-calculator text-pink-300"></i>
                            <span>Invoices</span>
                        </a>
                        <a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                            <i class="icon-calendar5 text-pink-300"></i>
                            <span>Schedule</span>
                        </a>
                    </div>
                </div>
            </div>-->

            <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
                <div class="d-flex">
                    <div class="breadcrumb">
                        <a href="<?php echo base_url();?>Mvendor" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                        <span class="breadcrumb-item active"><?php echo $title;?></span>
                    </div>

                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div>

                <div class="header-elements d-none">
                    <div class="breadcrumb justify-content-center">
                        <!--<a href="#" class="breadcrumb-elements-item">
                            <i class="icon-comment-discussion mr-2"></i>
                            Support
                        </a>-->

                       
                    </div>
                </div>
            </div>
        </div>
      <script>
       $("#navMenus").on('click','li',function(){
            // remove classname 'active' from all li who already has classname 'active'
            $("#navMenus li.active").removeClass("active"); 
            // adding classname 'active' to current click li 
            $(this).addClass("active"); 
        });
    </script> 
    
    <script type="text/javascript">   
     $(".noti").click(function(e){              //16 Jan 2019  //Notification Pop Up

        jQuery('#notif').modal('show');
        var v_id = $(this).data('id');
       // alert(v_id);
        var i = 0;
        var j = 1;
        $.ajax({
                          url:'<?php echo base_url("Inquiry/get_vendor_notifications");?>',
                          data: {v_id:v_id},  
                          type:"POST",
                          success:function(data)
                          {  
                              $('#tbldata_note').html('');
                           //alert(data);
                            var mydata= JSON.parse(data);
                            //alert(mydata);
                            
                            for(i=0; i<mydata.length; i++)
                            {

                                var tr=[];
                        
                                tr.push('<tr id="tr'+ mydata[i]['notification_id'] +'">');
                      
                                tr.push("<td>" + j + "</td>");
                       
                                tr.push("<td>" + mydata[i]['notification_title'] + "</td>");
                       
                                tr.push("<td>" + mydata[i]['notification_c_date'] + "</td>");
                        
                                tr.push("<td><a class='btn badge bg-success badge-pill' onclick='del_noti("+ mydata[i]['notification_id'] +")' id='"+ mydata[i]['notification_id'] +"' href='#'>Delete</a></td>");

                                /*tr.push("<td><a class='delete btn badge bg-success badge-pill ' id='"+ mydata[i]['notification_id'] +"' href='#'>Delete</a></td>");*/
                                
                                tr.push('</tr>');

                                $('#tbldata_note').append($(tr.join('')));

                                 j++;
                            }  

                          }

            
            });

  });
    
  function del_noti(id)                       //16 Jan 2019
  {
   
        $.ajax({
            url: '<?php echo base_url("User/remove_noti");?>',
            type: 'post',
            data: {id:id},
            success: function (data) {
               
                $('#tr'+id).remove();
                
            },
            error: function () {
               
            }
        });
  }

 //});   
</script> 