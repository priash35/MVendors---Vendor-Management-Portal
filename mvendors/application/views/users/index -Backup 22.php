<body class="cms-index-index cms-home-page">
  <!-- Home Slider Start -->
  <div class="slider" >
    <div class="tp-banner-container clearfix" >
      <div class="tp-banner" style="height: 396px;">
        <ul>
          <!-- SLIDE 1 -->
          <?php foreach ($sldier as $row) { ?>
           <li data-transition="slidehorizontal" data-slotamount="5" data-masterspeed="700" > 
            <!-- MAIN IMAGE --> 
            <img src="<?php echo base_url();?>assets/uploads/slider/<?php echo $row->slider_pic?>" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" > 
            <!--  <img src="<?php //base_url();?>assets/front/images/slider/slider-img1.jpg" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">  -->
            <!-- LAYERS --> 
            <!-- LAYER NR. 1 -->
            <div class="tp-caption very_big_white skewfromrightshort fadeout"
                          data-x="center"
                          data-y="100"
                          data-speed="500"
                          data-start="1200"
                          data-easing="Circ.easeInOut"
                          style=" font-size:70px; font-weight:800; color:#fe0100;"><?php echo $row->slider_title?> <span style=" color:#000;"></span> </div>
           
            <!-- LAYER NR. 2 -->
            <div class="tp-caption tp-caption medium_text skewfromrightshort fadeout"
                          data-x="center"
                          data-y="165"
                          data-hoffset="0"
                          data-voffset="-73"
                          data-speed="500"
                          data-start="1200"
                          data-easing="Power4.easeOut"
                          style=" font-size:20px; font-weight:500; color:#337ab7;"> <?php echo $row->slider_subtitle?> </div>
           
            <!-- LAYER NR. 3 -->
            <div class="tp-caption customin tp-resizeme rs-parallaxlevel-0"
                          data-x="center"
                          data-y="210"
                          data-hoffset="0"
                          data-voffset="98" 
                          data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                          data-speed="500"
                          data-start="1500"
                          data-easing="Power3.easeInOut"
                          data-splitin="none"
                          data-splitout="none"
                          data-elementdelay="0.1"
                          data-endelementdelay="0.1"
                          data-linktoslide="next"
                          style="border: 2px solid #fed700;border-radius: 50px; font-size:14px; background-color:#fed700; color:#333; z-index: 12; max-width: auto; max-height: auto; white-space: nowrap; letter-spacing:1px;"><!-- <a href='#' class='largebtn slide1'>Learn More</a>  --></div>
          </li>
           <?php }?>
        </ul>
      </div>
    </div>
  </div>
 <!-- Main Container -->
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="shop-inner">
            <div class="page-title">
              <h2>Popular Services</h2>
            </div>
           
            <div class="product-grid-area">
              <ul class="products-grid">
                   <?php foreach ($menu as $row) { ?>
                <li class="item col-lg-3 col-md-4 col-sm-6 col-xs-3 ">
                  <div class="product-item">
                    <div class="item-inner">
                      <div class="product-thumbnail" >
                      <!--   <div class="icon-sale-label sale-left">Sale</div>
                        <div class="icon-new-label new-right">New</div> -->
                        <div class="pr-img-area"> <a href="<?php echo base_url();?>User/category/<?php echo $row->category_id; ?>">
                          <figure > <img class="first-img" src="<?php echo base_url();?>assets/uploads/category/<?php echo $row->category_pic; ?>" alt="" style="width: 256px; height: 200px;"> </figure>
                          </a>
                          <!-- <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button> -->
                        </div>
                        <div class="pr-info-area">
                          <div class="pr-button">
                          
                            <!-- <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></a> </div>
                            <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                            <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div> -->
                          </div>
                        </div>
                      </div>
                      <div class="item-info">
                        <div class="info-inner">
                          <div class="item-title"><a href="<?php echo base_url();?>User/category/<?php echo $row->category_id; ?>"><?php echo $row->category_title; ?></a> </div>
                          <div class="item-content">
                           <!--  <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div> -->
                            <!-- <div class="item-price">
                              <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <?php }?>
               
            
              </ul>
            </div>
          <div class="pagination-area ">
                <!-- <ul>
                  <li><a class="active" href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul> -->
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main Container End --> 