    

<body>
<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-indigo navbar-static">
    <div class="navbar-brand">
        <a href="#" class="d-inline-block">
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

        <!-- <span class="navbar-text ml-md-3">
            <span class="badge badge-mark border-orange-300 mr-2"></span>
            Morning!!!

        </span> -->

        	<ul class="navbar-nav ml-xl-auto">
			<li class="nav-item dropdown dropdown-user">
               <?php foreach ($profile as $row) { ?>
                  
				<a href="#" class="navbar-nav-link dropdown-toggle legitRipple" data-toggle="dropdown" aria-expanded="false">
                    <?php if($row->apro_pic =='') { ?>
					<img src="<?php echo base_url();?>\assets\uploads\admin\admin.png" class="rounded-circle" alt="">
                    <?php }else {  ?>
                    <img src="<?php echo base_url();?>assets\uploads\admin\<?php echo $row->apro_pic ?>" class="rounded-circle" alt="">
                    <?php }?>
					<span><?php echo $row->afname ?></span>
				</a>
                <?php }?>
				<div class="dropdown-menu dropdown-menu-right">
					<a href="<?php echo base_url("Madmin/profile");?>" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
					<!-- <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a> -->
					<!-- <a href="#" class="dropdown-item">
						<i class="icon-comment-discussion"></i>
						Messages
						<span class="badge badge-pill bg-blue ml-auto">58</span>
					</a> -->
					<div class="dropdown-divider"></div>
				<!-- 	<a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a> -->
					<a href="<?php echo base_url();?>Login/logout" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
				</div>
			</li>
		</ul>
    </div>
</div>

<!-- /main navbar -->


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
            <?php $rights=explode(',', $right); ?>
            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="icon-home4"></i>
                            <span>
                                Dashboard
                               
                            </span>
                        </a>
                        
                    </li>
                    <?php if(in_array("Product", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Products</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Products">
                           
                            <li class="nav-item"><a href="<?php echo base_url('Category');?>" class="nav-link <?=(current_url()==base_url('Category')) ? 'active':''?>"><i class="icon-transmission"></i>Category</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('Category/subCategory');?>" class="nav-link"><i class="icon-transmission"></i>Sub Category</a></li>
                            <!-- <li class="nav-item"><a href="<?php //echo base_url('Category/select_brandlist');?>" class="nav-link"><i class="icon-transmission"></i>Select Brands</a></li>
                            <li class="nav-item"><a href="<?php //echo base_url('Category/type');?>" class="nav-link"><i class="icon-transmission"></i>Type</a></li>
                            <li class="nav-item"><a href="<?php //echo base_url('Category/subtype');?>" class="nav-link"><i class="icon-transmission"></i>Sub Type</a></li> -->
                            <li class="nav-item"><a href="<?php echo base_url('Category/brand');?>" class="nav-link"><i class="icon-transmission"></i>Brand</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                     <?php /*if(in_array("Settings", $rights))*/{ ?>
                    <!-- <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-wrench3"></i> <span>Settings</span></a>

                        <ul class="nav nav-group-sub" data-submenu-title="Settings">
                            <li class="nav-item"><a href="<?php //echo base_url('settings');?>" class="nav-link"><i class="icon-transmission"></i>Size</a></li>
                        </ul>
                    </li> -->
                    <?php } ?> 
                    <?php if(in_array("Vendors", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="<?php echo base_url('vendor'); ?>" class="nav-link <?=(current_url()==base_url('vendor')) ? 'active':''?>"><i class="icon-stack"></i> <span>Vendors</span></a>
                    </li>
                    <?php } ?>
                    <?php if(in_array("Admin Products", $rights)){ ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url('products'); ?>" class="nav-link">
                            <i class="icon-list-unordered"></i>
                            <span> Admin Products</span>
                            <span class="badge bg-blue-400 align-self-center ml-auto"></span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if(in_array("Vendor Products", $rights)){ ?>
                    <li class="nav-item"><a href="<?php  ?>" class="nav-link"><i class="icon-width"></i> <span>Vendor Products</span></a></li>
                    <?php } ?>
                   
                    <?php if(in_array("Notification", $rights)){ ?>
                  <!--   <li class="nav-item nav-item-submenu">
                        <a href="<?php echo base_url('order');?>" class="nav-link"><i class="icon-file-css"></i> <span>Notification</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Notification">
                            <li class="nav-item"><a href="<?php echo base_url('notification/products_history');?>" class="nav-link"><i class="icon-transmission"></i>Vendor Products History</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('notification/admin_products_history');?>" class="nav-link"><i class="icon-transmission"></i>Admin Products History</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('notification/order_history');?>" class="nav-link"><i class="icon-transmission"></i>Order History</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('order');?>" class="nav-link"><i class="icon-transmission"></i>Vendor Updated Products</a></li>
                        </ul>
                    </li> -->
                    <?php } ?>
                    <?php if(in_array("Advertise", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-spell-check"></i> <span>Advertise</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Advertise">
                            <li class="nav-item"><a href="<?php echo base_url('Advertise/index');?>" class="nav-link"><i class="icon-transmission"></i>Advertise</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('Advertise/slider_list');?>" class="nav-link"><i class="icon-transmission"></i>Sliders</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('Advertise/listbanner');?>" class="nav-link"><i class="icon-transmission"></i>Listing Page Banner</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('Advertise/productbanner');?>" class="nav-link"><i class="icon-transmission"></i>Product Detail Banner</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('Advertise/advertise_banner');?>" class="nav-link"><i class="icon-transmission"></i>Advertise Banner</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(in_array("Users", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-people"></i> <span>Users</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Users">
                            <li class="nav-item"><a href="<?php echo base_url('madmin/endusers');?>" class="nav-link"><i class="icon-transmission"></i>End Users</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('madmin/subadmin');?>" class="nav-link"><i class="icon-transmission"></i>Sub Admin</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(in_array("Media", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-indent-decrease2"></i> <span>Media</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Media">
                            <li class="nav-item"><a href="<?php echo base_url('Media/index');?>" class="nav-link"><i class="icon-transmission"></i>Videos</a></li>
							<!-- <li class="nav-item"><a href="#" class="nav-link"><i class="icon-transmission"></i>Compair</a></li> -->
							<li class="nav-item"><a href="<?php echo base_url('Media/article_list');?>" class="nav-link"><i class="icon-transmission"></i>Article</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if(in_array("Reviews", $rights)){ ?>
                    <!-- <li class="nav-item nav-item-submenu">
                        <a href="<?php echo base_url('reviews');?>" class="nav-link"><i class="icon-file-spreadsheet"></i> <span>Reviews</span></a>
                    </li> -->
                    <?php } ?>
                    <?php if(in_array("Expert Suggestion", $rights)){ ?>
                  <!--   <li class="nav-item nav-item-submenu">
                        <a href="<?php echo base_url('order');?>" class="nav-link"><i class="icon-puzzle2"></i> <span> Expert Suggestion</span></a>
                    </li> -->
                    <?php } ?>
                    <?php if(in_array("Enquiry", $rights)){ ?>
                   <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link <?=(current_url()==base_url('Enquiry')) ? 'active':''?>"><i class="icon-versions"></i> <span>Inquiry</span></a>
                       <ul class="nav nav-group-sub" data-submenu-title="Enquiry">
                            <li class="nav-item"><a href="<?php echo base_url('inquiry/user_enquiry');?>" class="nav-link"><i class="icon-transmission"></i>User Inquiry List</a></li>
                             <li class="nav-item"><a href="<?php echo base_url('inquiry/assign_orderlist');?>" class="nav-link"><i class="icon-transmission"></i>Assign Enquiry to Vendors</a></li>
                           <li class="nav-item"><a href="<?php echo base_url('inquiry/verified_inquiry');?>" class="nav-link"><i class="icon-transmission"></i>Verified Inquiry List</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('inquiry/non_verified_inquiry');?>" class="nav-link"><i class="icon-transmission"></i>Non Inquiry List</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('inquiry/completed_inquiry');?>" class="nav-link"><i class="icon-transmission"></i>Completed Inquiry</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('inquiry/single_user_enquirylist');?>" class="nav-link"><i class="icon-transmission"></i>Single User Inquiry List</a></li>
                         <!--    <li class="nav-item"><a href="<?php //echo base_url('order/contact');?>" class="nav-link"><i class="icon-transmission"></i>Contact Us</a></li>
                            <li class="nav-item"><a href="<?php //echo base_url('order/refer_enquiry');?>" class="nav-link"><i class="icon-transmission"></i> Refer Enquiry</a></li> -->
                        </ul> 
                    </li> 
                    <?php } ?>

                        <li class="nav-item nav-item-submenu">
                            <a href="<?php echo base_url('Configuration'); ?>" class="nav-link <?=(current_url()==base_url('Configuration')) ? 'active':''?>"><i class="icon-stats-bars"></i> <span>Configuration</span></a>
                               <!--  <ul class="nav nav-group-sub" data-submenu-title="Package">
                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-transmission"></i>View Package</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link"><i class="icon-transmission"></i>Purchase Register</a></li>
                                </ul> -->
                        </li>
                   
                    <?php if(in_array("Order Details", $rights)){ ?>
                  <!--   <li class="nav-item nav-item-submenu">
                        <a href="" class="nav-link"><i class="icon-insert-template"></i> <span></i>Order Details</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Order Details">
                            <li class="nav-item"><a href="<?php echo base_url('order');?>" class="nav-link"><i class="icon-transmission"></i>Order Booking</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('order/order_history');?>" class="nav-link"><i class="icon-transmission"></i>Order History</a></li>
                        </ul>
                    </li> -->
                    <?php } ?>
                    <?php if(in_array("Reports", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-stats-bars"></i> <span>Reports</span></a>
                       <!--  <ul class="nav nav-group-sub" data-submenu-title="Reports">
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>Vendor Stock</a></li>
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>Purchase Register</a></li>
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>User References</a></li>
                            <li class="nav-item"><a href="animations_css3.html" class="nav-link"><i class="icon-transmission"></i>Vendor References</a></li>
                        </ul> -->
                    </li>
                    <?php } ?>
                    <?php if(in_array("Package", $rights)){ ?>
                    <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-stats-bars"></i> <span>Package</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Package">
                            <li class="nav-item"><a href="<?php echo base_url('Package/Package_list');?>" class="nav-link"><i class="icon-transmission"></i>View Package</a></li>
                           <!--  <li class="nav-item"><a href="#" class="nav-link"><i class="icon-transmission"></i>Purchase Register</a></li> -->
                        </ul>
                    </li>
                     <?php } ?>
                    
                      <?php if(in_array("Import", $rights)){ ?>
                      <li class="nav-item nav-item-submenu">
                        <a href="#" class="nav-link"><i class="icon-stats-bars"></i> <span>Import</span></a>
                        <ul class="nav nav-group-sub" data-submenu-title="Import">
                            <li class="nav-item"><a href="<?php echo base_url('Import');?>" class="nav-link"><i class="icon-transmission"></i>User Import</a></li>
                            <li class="nav-item"><a href="<?php echo base_url('Import/import_vendors');?>" class="nav-link"><i class="icon-transmission"></i>Vendors Import</a></li>
                             <li class="nav-item"><a href="<?php echo base_url('Import/category_type');?>" class="nav-link"><i class="icon-transmission"></i>Category Import</a></li>
                              <li class="nav-item"><a href="<?php echo base_url('Import/subcategory_type');?>" class="nav-link"><i class="icon-transmission"></i>Sub Category Import</a></li>
                               <li class="nav-item"><a href="<?php echo base_url('Import/brands_type');?>" class="nav-link"><i class="icon-transmission"></i>Brands Import</a></li>
                        </ul>
                    </li>
                     <?php } ?>
                      <li class="nav-item nav-item-submenu">
                            <a href="<?php echo base_url('Log'); ?>" class="nav-link <?=(current_url()==base_url('Log')) ? 'active':''?>"><i class="icon-stats-bars"></i> <span>Log</span></a>
                        </li>
                     <li class="nav-item nav-item-submenu">
	                   <!-- <a href="<?php // echo base_url('Social'); ?>" class="nav-link"><i class="icon-stats-bars"></i> <span>Social Media Link</span></a>-->
	                    
                        </li>
                </ul>
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
                        <a href="<?php echo base_url('Madmin');?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
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
        <!-- /page header -->
