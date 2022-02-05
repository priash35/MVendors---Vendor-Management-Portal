<div id="mobile-menu">
  <ul>
    <li><a href="#" class="home1">Home</a>
    <!--   <ul>
        <li><a href="index.html"><span>Home Version 1</span></a></li>
        </ul> -->
    </li>
    <li><a href="#">Pages</a>
      <!--  <ul>
        <li><a href="#" class="">Shop Pages </a>
          <ul>
            <li> <a href="shop_grid.html"> Shop grid </a> </li>
            <li> <a href="shop_grid_right_sidebar.html"> Shop grid right sidebar</a> </li>
            <li> <a href="shop_list.html"> Shop list </a> </li>
            <li> <a href="shop_list_right_sidebar.html"> Shop list right sidebar</a> </li>
            <li> <a href="shop_grid_full_width.html"> Shop Full width </a> </li>
          </ul>
        </li>
        <li><a href="#">Ecommerce Pages </a>
          <ul>
            <li> <a href="wishlist.html"> Wishlists </a> </li>
            <li> <a href="checkout.html"> Checkout </a> </li>
            <li> <a href="compare.html"> Compare </a> </li>
            <li> <a href="shopping_cart.html"> Shopping cart </a> </li>
            <li> <a href="quick_view.html"> Quick View </a> </li>
          </ul>
        </li>
        <li> <a href="#">Static Pages </a>
          <ul>
            <li> <a href="account_page.html"> Create Account Page </a> </li>
            <li> <a href="about_us.html"> About Us </a> </li>
            <li> <a href="contact_us.html"> Contact us </a> </li>
            <li> <a href="404error.html"> Error 404 </a> </li>
            <li> <a href="faq.html"> FAQ </a> </li>
          </ul>
        </li>
        <li> <a href="#">Product Categories </a>
          <ul>
            <li> <a href="cat-3-col.html"> 3 Column Sidebar </a> </li>
            <li> <a href="cat-4-col.html"> 4 Column Sidebar</a> </li>
            <li> <a href="cat-4-col-full.html"> 4 Column Full width </a> </li>
            <li> <a href="cat-6-col.html"> 6 Columns Full width</a> </li>
          </ul>
        </li>
        <li> <a href="#">Single Product Pages </a>
          <ul>
            <li><a href="single_product.html"> single product </a> </li>
            <li> <a href="single_product_left_sidebar.html"> single product left sidebar</a> </li>
            <li> <a href="single_product_right_sidebar.html"> single product right sidebar</a> </li>
            <li> <a href="single_product_magnify_zoom.html"> single product magnify zoom</a> </li>
          </ul>
        </li>
        <li> <a href="#"> Blog Pages </a>
          <ul>
            <li><a href="blog_right_sidebar.html">Blog – Right sidebar </a></li>
            <li><a href="blog_left_sidebar.html">Blog – Left sidebar </a></li>
            <li><a href="blog_full_width.html">Blog_ - Full width</a></li>
            <li><a href="single_post.html">Single post </a></li>
          </ul>
        </li>
      </ul>-->
    </li>
    <li><a href="<?php echo base_url('Home');?>">Contact us</a></li>
    <li><a href="<?php echo base_url('Home/about');?>">About us</a></li>
    <li><a href="<?php echo base_url('Home/Article');?>">Blog</a>
      <!--<ul>
        <li><a href="blog_right_sidebar.html">Blog – Right sidebar </a></li>
        <li><a href="blog_left_sidebar.html">Blog – Left sidebar </a></li>
        <li><a href="blog_full_width.html">Blog_ - Full width</a></li>
        <li><a href="single_post.html">Single post </a></li>
      </ul>-->
    </li>

    <?php foreach ($menu as $row) { ?>
    <li><!-- <a href="<?php //echo base_url();?>User/category/<?php //echo $row->category_id; ?>" ><?php //echo $row->category_title; ?></a> -->
      <a href="#" ><?php echo $row->category_title; ?></a>
    
    <!-- <li><a href="shop_grid.html">Camera & Photo</a> -->
     <!--  <ul>
        <li><a href="#" class="">Accessories</a> -->
         <?php 
          //$sql= "Select * from tbl_sub_category where sub_cat_id = ".$row->category_id;
         $sql= 'SELECT * FROM tbl_category_subcategory tcs join tbl_category tc ON tc.category_id = tcs.category_id join tbl_sub_category sc ON sc.sub_category_id = tcs.subcategory_id WHERE tcs.catsubcat_stauts="ACTIVE" AND sc.sub_category_status="ACTIVE" AND tcs.category_id ='.$row->category_id;
          $query= $this->db->query($sql);
          $value= $query->result();
          foreach ($value as $key) { ?>
          <ul>
            <!-- <li><a href="<?php //echo $key->sub_category_id; ?>" class=""><?php //echo $key->sub_category_title; ?></a></li> -->

            <li><a href="<?php echo base_url();?>User/sub_category/<?php echo $key->sub_category_id; ?>"><span><?php echo $key->sub_category_title; ?></span></a></li>
           
          </ul><?php  }?>
        <!-- </li> -->
       <!--  <li><a href="#">Dresses</a>
          <ul>
            <li><a href="shop_grid.html">Accessories</a></li>
            <li><a href="shop_grid.html">Hats and Gloves</a></li>
            <li><a href="shop_grid.html">Lifestyle</a></li>
            <li><a href="shop_grid.html">Bras</a></li>
          </ul>
        </li>
        <li> <a href="#">Shoes</a>
          <ul>
            <li> <a href="shop_grid.html">Flat Shoes</a> </li>
            <li> <a href="shop_grid.html">Flat Sandals</a> </li>
            <li> <a href="shop_grid.html">Boots</a> </li>
            <li> <a href="shop_grid.html">Heels</a> </li>
          </ul>
        </li>
        <li> <a href="#">Jwellery</a>
          <ul>
            <li> <a href="shop_grid.html">Bracelets</a> </li>
            <li> <a href="shop_grid.html">Necklaces &amp; Pendent</a> </li>
            <li> <a href="shop_grid.html">Pendants</a> </li>
            <li> <a href="shop_grid.html">Pins &amp; Brooches</a> </li>
          </ul>
        </li>
        <li> <a href="#">Dresses</a>
          <ul>
            <li> <a href="shop_grid.html">Casual Dresses</a> </li>
            <li> <a href="shop_grid.html">Evening</a> </li>
            <li> <a href="shop_grid.html">Designer</a> </li>
            <li> <a href="shop_grid.html">Party</a> </li>
          </ul>
        </li>
        <li> <a href="#">Swimwear</a>
          <ul>
            <li> <a href="shop_grid.html">Swimsuits</a> </li>
            <li> <a href="shop_grid.html">Beach Clothing</a> </li>
            <li> <a href="shop_grid.html">Clothing</a> </li>
            <li> <a href="shop_grid.html">Bikinis</a> </li>
          </ul>
        </li> -->
     <!--  </ul> -->

   <?php }?>
    </li>

    <!--<li><a href="shop_grid.html">Computers</a>
        <ul>
      <li> <a href="#" class="">Clothing</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Coats &amp; Jackets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Raincoats</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Blazers</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Jackets</a> </li>
          </ul>
        </li>
        <li> <a href="#">Dresses</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Casual Dresses</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Evening</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Designer</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Party</a> </li>
          </ul>
        </li>
        <li> <a href="#" class="">Shoes</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Sport Shoes</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Casual Shoes</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Leather Shoes</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">canvas shoes</a> </li>
          </ul>
        </li>
        <li> <a href="#">Jackets</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Coats</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Formal Jackets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Leather Jackets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Blazers</a> </li>
          </ul>
        </li>
        <li> <a href="#">Accesories</a>
          <ul class="level1">
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Backpacks</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Wallets</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Laptops Bags</a> </li>
            <li class="level2 nav-6-1-1"> <a href="shop_grid.html">Belts</a> </li>
          </ul>
        </li>
      </ul>
    </li>-->
    <!--<li><a href="shop_grid.html">Apple Store</a>
      <ul>
        <li> <a href="shop_grid.html">Mobiles</a>
          <ul>
            <li> <a href="shop_grid.html">iPhone</a> </li>
            <li> <a href="shop_grid.html">Samsung</a> </li>
            <li> <a href="shop_grid.html">Nokia</a> </li>
            <li> <a href="shop_grid.html">Sony</a> </li>
          </ul>
        </li>
        <li> <a href="shop_grid.html" class="">Music &amp; Audio</a>
          <ul>
            <li> <a href="shop_grid.html">Audio</a> </li>
            <li> <a href="shop_grid.html">Cameras</a> </li>
            <li> <a href="shop_grid.html">Appling</a> </li>
            <li> <a href="shop_grid.html">Car Music</a> </li>
          </ul>
        </li>
        <li> <a href="shop_grid.html">Accessories</a>
          <ul>
            <li> <a href="shop_grid.html">Home &amp; Office</a> </li>
            <li> <a href="shop_grid.html">TV &amp; Home Theater</a> </li>
            <li> <a href="shop_grid.html">Phones &amp; Radio</a> </li>
            <li> <a href="shop_grid.html">All Electronics</a> </li>
          </ul>
        </li>
      </ul>
    </li>-->
  </ul>
</div>
<!-- end mobile menu -->
<div id="page"> 
 
  
  <!-- Header -->
  <header>
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-sm-4 hidden-xs"> 
              <!-- Default Welcome Message -->
            
              <div class="welcome-msg ">

                <a href="<?php echo base_url();?>User">
                <img class="small-image" src="<?php echo base_url();?>assets\front/images/footer-logo.png" alt="Ipsums Dolors Untra"></a> 
              </div> 
                <span class="phone hidden-sm">Call Us: +91 9112656464</span>

            </div>
             
            <!-- top links -->
            <div class="headerlinkmenu col-lg-8 col-md-7 col-sm-8 col-xs-12">
              <div class="links">
              
              
                <div class="myaccount">
                  

                </div>
               

                <div class="language-currency-wrapper">
                 <div class="inner-cl">
                   <!--  <div class="block block-language form-language"> -->
                     <div class="block  form-language">
                      <?php if(!empty($userpro) != ''){?>
                      <div class="lg-cur"><i class="fa fa-user"></i> <span><span class="lg-fr">Welcome <?php foreach ($userpro as $value) { ?><?php echo $value->ufname; ?> <?php echo $value->ulname; ?><?php  } ?></span> <i class="fa fa-angle-down"></i> </span> 
                      </div>
                      <ul>
                       <li> <a class="selected" href="<?php echo base_url ('User/user_profile'); ?>"><span>User Information</span> </a> </li>
                       <li> <a class="selected" href="<?php echo base_url ('User/user_Dashboard'); ?>"><span>Enquiry Dashboard</span> </a> </li>
                       <li> <a class="selected" href="<?php echo base_url ('User/conf_enq'); ?>"><span>Confirmed Enquiries</span> </a> </li>
                       <li> <a class="selected" href="<?php echo base_url ('User/completd_enq'); ?>"><span>Completed Enquiries</span> </a> </li>
                       <li> <a class="selected" href="<?php echo base_url ('User/update_user_password'); ?>"><span>Change Password</span></a> </li>
                       <li> <a class="selected" href="<?php echo base_url ('User/logout'); ?>"><span>Logout</span></a> </li>
                      </ul>
                       <?php } else {?>
                         <a href="<?php echo base_url('User/Login'); ?>"> <div class="lg-cur"><i class="fa fa-user"></i> My Account
                      </div></a> 
                       <?php } ?>
                      
                    </div>
                  </div>
                </div>
               
               
               
               <!--  <div class="wishlist"><a title="My Wishlist" href="wishlist.html"><i class="fa fa-heart"></i><span class="hidden-xs">Wishlist</span></a></div>  -->
                <div class="blog"><a title="Blog" href="<?php echo base_url();?>VLogin"><i class="fa fa-rss"></i><span class="hidden-xs">Sell With Us</span></a></div>
                <!-- <div class="login"><a href="#"><i class="fa fa-unlock-alt"></i><span class="hidden-xs" id="test">Log In</span></a></div> -->
                <?php if(!empty($userpro[0]->user_id) != ''){?>
                  <div class="login"><a href="<?php echo base_url('User/logout');?>"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Logout</span></a></div>
                <?php } else { ?>
                <div class="login"><a href="<?php echo base_url('User/Login');?>"><i class="fa fa-unlock-alt"></i><span class="hidden-xs">Log In</span></a></div>
                 <?php } ?>
              </div>
              <div class="language-currency-wrapper">
                <!-- <div class="inner-cl">
                  <div class="block block-language form-language">
                    <div class="lg-cur"> <span> <img src="images/flag-default.jpg" alt="French"> <span class="lg-fr">French</span> <i class="fa fa-angle-down"></i> </span> </div>
                    <ul>
                      <li> <a class="selected" href="#"> <img src="images/flag-english.jpg" alt="flag"> <span>English</span> </a> </li>
                    </ul>
                  </div>
                  <div class="block block-currency">
                    <div class="item-cur"> <span>USD </span> <i class="fa fa-angle-down"></i></div>
                    <ul>
                      <li> <a href="#"><span class="cur_icon">€</span> EUR</a> </li>
                      <li> <a href="#"><span class="cur_icon">¥</span> JPY</a> </li>
                      <li> <a class="selected" href="#"><span class="cur_icon">$</span> USD</a> </li>
                    </ul>
                  </div>
                </div> -->
                
                <!-- End Default Welcome Message --> 
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--<div class="container">
        <div class="row">
          <div class="col-sm-3 col-md-3 col-xs-12"> 
            <div class="logo"><a title="e-commerce" href="#"><img alt="responsive theme logo" src="<?php echo base_url();?>assets/front/images/logo.png"></a> </div>
          </div>
          <div class="col-xs-9 col-sm-6 col-md-6"> 
            <div class="top-search">
              <div id="search">
                <form>
                  <div class="input-group">
                  <select class="cate-dropdown hidden-xs" >
                    </select>   
                        <input type="text"  id="search_data" name="search-term" class="form-control" placeholder="Search" >
                    <button class="btn-search" type="button"><i class="fa fa-search"></i></button>
                  </div>
                  <ul  id="finalResult">
                  </ul>
                </form>
              </div>
            </div>
          </div>
          <!-- top cart -->
          
          <!--<div class="col-lg-3 col-xs-3 top-cart">
            <div class="top-cart-contain">
              <div class="mini-cart">
               <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"> <a href="#">
                  <div class="cart-icon"><i class="fa fa-shopping-cart"></i></div>
                  <div class="shoppingcart-inner hidden-xs"><span class="cart-title">Shopping Cart</span> <span class="cart-total">4 Item(s): $520.00</span></div>
                  </a></div> 
                <div>
                  <div class="top-cart-content">
                    <div class="block-subtitle hidden-xs">Recently added item(s)</div>
                    <ul id="cart-sidebar" class="mini-products-list">
                      <li class="item odd"> <a href="shopping_cart.html" title="Ipsums Dolors Untra" class="product-image"><img src="<?php //echo base_url(); ?>assets/front/images/products/img07.jpg" alt="html template" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
                          <strong>1</strong> x <span class="price">$20.00</span> </div>
                      </li>
                      <li class="item even"> <a href="shopping_cart.html" title="Ipsums Dolors Untra" class="product-image"><img src="<?php //echo base_url(); ?>assets/front/images/products/img11.jpg" alt="html template" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a> </p>
                          <strong>1</strong> x <span class="price">$230.00</span> </div>
                      </li>
                      <li class="item last odd"> <a href="shopping_cart.html" title="Ipsums Dolors Untra" class="product-image"><img src="<?php ///echo base_url(); ?>assets/front/images/products/img10.jpg" alt="html template" width="65"></a>
                        <div class="product-details"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a>
                          <p class="product-name"><a href="shopping_cart.html">Sed do eiusmod tempor incidist</a> </p>
                          <strong>2</strong> x <span class="price">$420.00</span> </div>
                      </li>
                    </ul>
                    <div class="top-subtotal">Subtotal: <span class="price">$520.00</span></div>
                    <div class="actions">
                      <button class="btn-checkout" type="button"><i class="fa fa-check"></i><span>Checkout</span></button>
                      <button class="view-cart" type="button"><i class="fa fa-shopping-cart"></i> <span>View Cart</span></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>-->
    </div>
  </header>
  <!-- end header --> 
  
  <!-- Navbar -->
  <nav>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="mm-toggle-wrap">
            <div class="mm-toggle"> <i class="fa fa-align-justify"></i> </div>
            <span class="mm-label">Categories </span> </div>
          <div class="mega-container visible-lg visible-md visible-sm">
            <div class="navleft-container">
              <div class="mega-menu-title">
                <h3>Categories</h3>
              </div>
              <div class="mega-menu-category">
                <ul class="nav">
                  
                  <?php foreach ($menu as $row) { ?>
                  <li> <!-- <a href="<?php //echo base_url();?>User/category/<?php //echo $row->category_id; ?>"><i class="icon fa fa-location-arrow fa-fw"></i><?php //echo $row->category_title; ?></a> -->
                    <a href="#"><i class="icon fa fa-location-arrow fa-fw"></i><?php echo $row->category_title; ?></a>
                    <div class="wrap-popup column1">
                      <div class="popup">
                         <?php 
                              //$sql= "Select * from tbl_sub_category where sub_cat_id = ".$row->category_id;
                        $sql= 'SELECT * FROM tbl_category_subcategory tcs join tbl_category tc ON tc.category_id = tcs.category_id join tbl_sub_category sc ON sc.sub_category_id = tcs.subcategory_id WHERE tcs.catsubcat_stauts="ACTIVE" AND sc.sub_category_status="ACTIVE" AND tcs.category_id ='.$row->category_id;
                              $query= $this->db->query($sql);
                              $value= $query->result();
                              foreach ($value as $key) { ?>
                        <ul class="nav">
                          <li><a href="<?php echo base_url();?>User/sub_category/<?php echo $key->sub_category_id; ?>"><span><?php echo $key->sub_category_title; ?></span></a></li>
                        </ul><?php  }?>
                      </div>
                    </div>
                  </li><?php }?>
                  <!--<li> <a href="#"><i class="icon fa fa-desktop fa-fw"></i> Computers</a>
                    <div class="wrap-popup">
                      <div class="popup">
                        <div class="row">
                          <div class="col-md-4 col-sm-6">
                            <h3>Dell</h3>
                            <ul class="nav">
                              <li><a href="shop_grid.html">Dell Inspiron 3558</a></li>
                              <li><a href="shop_grid.html">Dell Adapter </a></li>
                              <li><a href="shop_grid.html">Optical USB Mouse</a></li>
                              <li><a href="shop_grid.html">Laptop Battery</a></li>
                            </ul>
                            <br>
                            <h3>Microsoft</h3>
                            <ul class="nav">
                              <li> <a href="shop_grid.html">Lumia 550 4G</a> </li>
                              <li> <a href="shop_grid.html">Surface Pro 4</a> </li>
                              <li> <a href="shop_grid.html">HTC Desire 620G</a> </li>
                              <li> <a href="shop_grid.html">DMG Flip Cover</a> </li>
                              <li> <a href="shop_grid.html">Silicone Keyboard</a> </li>
                            </ul>
                          </div>
                          <div class="col-md-4 col-sm-6 has-sep">
                            <h3>Apple</h3>
                            <ul class="nav">
                              <li> <a href="shop_grid.html">Apple Macbook Pro</a> </li>
                              <li> <a href="shop_grid.html">Newest Apple Macbook Pro</a> </li>
                              <li> <a href="shop_grid.html">Retina Display Laptop</a> </li>
                              <li> <a href="shop_grid.html">Silicone Keyboard</a> </li>
                            </ul>
                            <br>
                            <h3>Lenovo</h3>
                            <ul class="nav">
                              <li> <a href="shop_grid.html">Lenovo Yoga 300</a> </li>
                              <li> <a href="shop_grid.html">Lenovo IdeaPad</a> </li>
                              <li> <a href="shop_grid.html">Tab 3 A710F Tablet</a> </li>
                              <li> <a href="shop_grid.html">Channel Speakers</a> </li>
                              <li> <a href="shop_grid.html">Accessories</a> </li>
                            </ul>
                          </div>
                          <div class="col-md-4 has-sep hidden-sm">
                            <div class="custom-menu-right">
                              <div class="box-banner media">
                                <div class="add-desc">
                                  <h3>Computer <br>
                                    Services </h3>
                                  <div class="price-sale">2017</div>
                                  <a href="#">Shop Now</a> </div>
                                <div class="add-right"><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/menu-img1.jpg" alt="html template"></a></div>
                              </div>
                              <div class="box-banner media">
                                <div class="add-desc">
                                  <h3>Save up to</h3>
                                  <div class="price-sale">75 <sup>%</sup><sub>off</sub></div>
                                  <a href="#">Shopping Now</a> </div>
                                <div class="add-right"><a href="#"><img src="<?php echo base_url(); ?>assets/front/images/menu-img2.jpg" alt="html template"></a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li> <a href="shop_grid.html"><i class="icon fa fa-apple fa-fw"></i> Apple Store</a>
                    <div class="wrap-popup column2">
                      <div class="popup">
                        <div class="row">
                          <div class="col-sm-6">
                            <h3>iPhone</h3>
                            <ul class="nav">
                              <li> <a href="shop_grid.html"> iPhone SE </a> </li>
                              <li> <a href="shop_grid.htmls"> iPhone 6s Plus </a> </li>
                              <li> <a href="shop_grid.html"> iPhone 3G </a> </li>
                              <li> <a href="shop_grid.html"> iPad Pro </a> </li>
                            </ul>
                          </div>
                          <div class="col-sm-6 has-sep">
                            <h3> Watch </h3>
                            <ul class="nav">
                              <li> <a href="shop_grid.html"> Quartz Watches </a> </li>
                              <li> <a href="shop_grid.html"> Lover's Watches</a> </li>
                              <li> <a href="shop_grid.html"> Digital Watches </a> </li>
                              <li> <a href="shop_grid.html"> Sport Watch </a> </li>
                            </ul>
                          </div>
                          <div class="col-sm-12"> <a class="ads1" href="#"><img class="img-responsive" src="<?php echo base_url();?>assets/front/images/menu-img3.jpg" alt="html template"></a> </div>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="nosub"><a href="#"><i class="icon fa fa-location-arrow fa-fw"></i> Car Electronic</a></li>
                  <li> <a href="shop_grid.html"><i class="icon fa fa-headphones fa-fw"></i> Headphones</a>
                    <div class="wrap-popup column1">
                      <div class="popup">
                        <ul class="nav">
                          <li><a href="shop_grid.html"><span>Envent Stereo</span></a></li>
                          <li><a href="shop_grid.html"><span>Sennheiser</span></a></li>
                          <li><a href="shop_grid.html"><span>Philips</span></a></li>
                          <li><a href="shop_grid.html"><span>Sony</span></a></li>
                          <li><a href="shop_grid.html"><span>Avantree</span></a></li>
                          <li><a href="shop_grid.html"><span>Bajaao</span></a></li>
                          <li><a href="shop_grid.html"><span>FiiO</span></a></li>
                          <li><a href="shop_grid.html"><span>Audio-Technica</span></a></li>
                          <li><a href="shop_grid.html"><span>LUXA2</span></a></li>
                          <li><a href="shop_grid.html"><span>Geekria</span></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li><a href="#"><i class="icon fa fa-microphone fa-fw"></i> Accessories</a>
                    <div class="wrap-popup column1">
                      <div class="popup">
                        <ul class="nav">
                          <li> <a href="shop_grid.html"> Vacuum Cleaner </a> </li>
                          <li> <a href="shop_grid.html"> Memore Bluetooth</a> </li>
                          <li> <a href="shop_grid.html"> On-Ear Headphones </a> </li>
                          <li> <a href="shop_grid.html"> Digital MP3 Player </a> </li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <li class="nosub"><a href="shop_grid.html"><i class="icon fa fa-gamepad fa-fw"></i> Game &amp; Video</a></li>
                  <li class="nosub"><a href="shop_grid.html"><i class="glyphicon glyphicon-time"></i> Watches</a></li>
                  <li class="nosub"><a href="shop_grid.html"><i class="icon fa fa-lightbulb-o fa-fw"></i> Lights &amp; Lighting</a></li>-->
                </ul> 
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 col-sm-8">
          <div class="mtmegamenu">
            <ul>
            
      
              <li class="mt-root">
                <div class="mt-root-item"><a href="<?php echo base_url('Home');?>">
                  <div class="title title_font"><span class="title-text">Contact Us</span> </div>
                  </a></div>
              </li>
              <li class="mt-root">
                <div class="mt-root-item"><a href="<?php echo base_url('Home/about');?>">
                  <div class="title title_font"><span class="title-text">about us</span></div>
                  </a></div>
              </li>
              <li class="mt-root ">
                <div class="mt-root-item"><a href="<?php echo base_url('Home/Article');?>">
                  <div class="title title_font"><span class="title-text">Articles</span></div>
                  </a></div>
              </li>
          
            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- Breadcrumbs -->
  
<!--   <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="#">Home</a><span>&raquo;</span></li>
            <li><strong><?php //echo $title;?></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div> -->
  <!-- Breadcrumbs End --> 
  <script type="text/javascript">

    function liveSearch() 
      {
        var myNewURL = "mvan/User";//the new URL
        window.history.pushState("object or string", "Title", "/" + myNewURL );
        //var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);
        //var pgurl=window.location.href;
        //alert (pgurl);
        var input_data = $('#search_data').val();
        if (input_data.length === 0) 
        {
          $('#suggestions').hide();
        } 
        else 
        {
         $.ajax({
          type: "POST",
          url: "<?php echo base_url(); ?>User/search",
          data: {search_data: input_data},
          success: function (data) 
          {
            // return succes
            if (data.length > 0) 
            {
              $('#suggestions').show();
              $('#autoSuggestionsList').addClass('auto_list');
              $('#autoSuggestionsList').html(data);
            }
          }
          });
        }
      }
  </script>

