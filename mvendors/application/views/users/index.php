<body class="cms-index-index cms-home-page">

  <!-- Main Container -->
  <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
          <div class="category-description std">
            <div class="slider-items-products">
              <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                <br>
                <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                   <?php foreach ($sldier as $row) { ?>
                  <!-- Item -->
                  <div class="item"> <a href="#x"><img alt="" src="<?php echo base_url();?>assets/uploads/slider/<?php echo $row->slider_pic; ?>" ></a>
                     <div class="inner-info">
                      <div class="cat-img-title"><!--  <span></span> -->
                        <h2 class="cat-heading"><strong><?php echo $row->slider_title; ?></strong></h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <a class="info" href="#">Shop Now</a>  --></div>
                    </div> 
                  </div>
                  <!-- End Item --> 
                  
                  <!-- Item -->
                  <!-- <div class="item"> <a href="#x"><img alt="" src="<?php //echo base_url();?>assets/uploads/slider/<?php //echo $row->slider_pic; ?>"></a> </div> -->
                   <?php }?>
                  <!-- End Item --> 
                  
                </div>
              </div>
            </div>
          </div>
          <div class="shop-inner">
            <div class="page-title">
              <h2>Popular Services</h2>
            </div>
            <div class="toolbar">
               <!--   <div class="view-mode">
                <ul>
                  <li class="active"> <a href="shop_grid.html"> <i class="fa fa-th-large"></i> </a> </li>
                  <li> <a href="shop_list.html"> <i class="fa fa-th-list"></i> </a> </li>
                </ul>
              </div>
           <div class="sorter">
                <div class="short-by">
                  <label>Sort By:</label>
                  <select>
                    <option selected="selected">Position</option>
                    <option>Name</option>
                    <option>Price</option>
                    <option>Size</option>
                  </select>
                </div>
                <div class="short-by page">
                  <label>Show:</label>
                  <select>
                    <option selected="selected">18</option>
                    <option>20</option>
                    <option>25</option>
                    <option>30</option>
                  </select>
                </div>
              </div> -->
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
                        <div class="pr-img-area">
                          <?php if($row->category_pic ==''){ ?>
                             <a href="<?php echo base_url();?>User/category_list/<?php echo $row->category_id; ?>">
                          <figure > <img class="first-img" src="<?php echo base_url();?>assets/uploads/no_image.jpg" alt="" style="width: 256px; height: 200px;"> </figure>
                          </a>
                          <?php } else { ?>
                           <a href="<?php echo base_url();?>User/category_list/<?php echo $row->category_id; ?>">
                          <figure > <img class="first-img" src="<?php echo base_url();?>assets/uploads/category/<?php echo $row->category_pic; ?>" alt="" style="width: 256px; height: 200px;"> </figure>
                          </a>
                           <?php }  ?>
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
                          <div class="item-title">
                              <a href="<?php echo base_url();?>User/category_list/<?php echo $row->category_id; ?>"><?php echo $row->category_title; ?></a> </div>
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
             <!--  <ul>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul> -->
            </div>
          </div>
        </div>
        <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">

         
          <div class="single-img-add sidebar-add-slider ">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              
              <!-- Wrapper for slides -->
              <!--<div class="carousel-inner" role="listbox">
                <div class="item active"> <img src="<?php echo base_url();?>assets/front/images/add-slide1.jpg" alt="slide1">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Sale Up to 50% off</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">shopping Now</a> </div>
                </div>
                <div class="item"> <img src="<?php echo base_url();?>assets/front/images/add-slide2.jpg" alt="slide2">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Smartwatch Collection</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    <a href="#" class="info">All Collection</a> </div>
                </div>
                <div class="item"> <img src="<?php echo base_url();?>assets/front/images/add-slide3.jpg" alt="slide3">
                  <div class="carousel-caption">
                    <h3><a href="single_product.html" title=" Sample Product">Summer Sale</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                  </div>
                </div>
              </div>-->
              
              <!-- Controls --> 
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
       
        </aside>
      </div>
    </div>
  </div>
  <!-- Main Container End --> 
  <!-- Footer -->