<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
      <div class="col-main col-sm-9 col-xs-12">
          <div class="product-view-area">
          <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
          <!--   <div class="icon-sale-label sale-left">Sale</div> -->
             <?php foreach ($vbusdetails as $value ) { ?> 
           
            <?php if($value->bis_pic) {?>
          <div class="large-image" > <a href="#" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="<?php echo base_url();?>\assets\uploads\vbusiness\<?php echo $value->bis_pic; ?>" style="width: 443px; height: 250px; "> </a> </div>
            <?php 
            }else{ ?>

              <div class="large-image" > <a href="#" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="<?php echo base_url();?>assets/uploads/no_image.jpg" style="width: 443px; height: 250px; "> </a> </div>

          <?php } ?>
          <!--   <div class="flexslider flexslider-thumb">
              <ul class="previews-list slides">
                <li><a href='images/products/img01.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img01.jpg' "><img src="images/products/img01.jpg" alt = "Thumbnail 2"/></a></li>
                <li><a href='images/products/img07.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img07.jpg' "><img src="images/products/img07.jpg" alt = "Thumbnail 1"/></a></li>
                <li><a href='images/products/img02.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img02.jpg' "><img src="images/products/img02.jpg" alt = "Thumbnail 1"/></a></li>
                <li><a href='images/products/img03.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img03.jpg' "><img src="images/products/img03.jpg" alt = "Thumbnail 2"/></a></li>
                <li><a href='images/products/img04.jpg' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: 'images/products/img04.jpg' "><img src="images/products/img04.jpg" alt = "Thumbnail 2"/></a></li>
              </ul>
            </div> -->
            
            <!-- end: more-images --> 
            
          </div>
          <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
           
              <div class="product-name">
                <h3 class="text-capitalize"><?php echo $value->bis_name; ?></h3>
              </div>
            <?php }?>
              <!--<div class="price-box">
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $329.99 </span> </p>
                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $359.99 </span> </p>
              </div>-->
               <?php if(!empty($_SESSION['user_id'])){ ?>
                	 <?php $name = $_SESSION['user_id'];?>
                	<?php }?>
                	
              <div class="rate" data-target="form-rate-instructor">
                      <div  onclick="rate();">

                        <?php $sql="SELECT avg(`star_rating`) as str FROM `tbl_rating` WHERE `venb_id`=".$value->bis_det_id;
                              $query= $this->db->query($sql);
                              $avg= $query->result();
                              ?>
                        
                        <i class="fa <?php echo ($avg['0']->str >='1') ? 'fa-star' : 'fa-star-o'; ?> text-info"></i>
                        <i class="fa <?php echo ($avg['0']->str >='2') ? 'fa-star' : 'fa-star-o'; ?> text-info"></i>
                        <i class="fa <?php echo ($avg['0']->str >='3') ? 'fa-star' : 'fa-star-o'; ?> text-info"></i>
                        <i class="fa <?php echo ($avg['0']->str >='4') ? 'fa-star' : 'fa-star-o'; ?> text-info"></i>
                        <i class="fa <?php echo ($avg['0']->str >='5') ? 'fa-star' : 'fa-star-o'; ?> text-info"></i>
                         <input type="hidden" name="form-rate-instructor" value="<?php echo $avg['0']->str;?>">
                      <p class="alert alert-success" id="results" style="display:none"><span>Thanks For Your Reating</span></p>
                      </div>

                    </div>
            
              <div class="ratings">
                <!--<div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>-->
               <!-- <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                <p class="availability in-stock pull-right">Availability: <span>verified</span></p>-->
              </div>
              <div class="short-description">
                   <input type="hidden" id="bsi" name="bsi" value="<?php echo $value->bis_det_id; ?>" >
                <p class="text-capitalize"><i class="fa fa-home"></i> Address : <?php echo $value->bis_address; ?></p>
                <p class="text-capitalize"><i class="fa fa-plus-circle" ></i> Category :
                  <?php echo $value->category_title; ?></p>
                <p class="text-capitalize"><i class="fa fa-plus-circle" ></i> Sub Category : <?php echo $value->sub_category_title; ?></p>
               
                <?php if (!empty($_SESSION['userid'])) { ?>
                     <p class="text-capitalize"><i class="fa fa-phone"></i> Contact Number  : <?php echo $value->bis_mnumber; ?></p>
                      <p class="text-capitalize"><i class="fa fa-envelope"></i> Email Id : <?php echo $value->bis_email; ?></p>
                <?php } else { ?>
                  <p class="text-capitalize"><i class="fa fa-envelope"></i> Email Id :<?php $result = substr($value->bis_email,0,4); $result .= "****"; $result .= substr($value->bis_email, 7, 2); echo $result; ?></p>
               <p class="text-capitalize"><i class="fa fa-phone"></i> Contact Number : <?php $result = substr($value->bis_mnumber,0,4); $result .= "****"; $result .= substr($value->bis_mnumber, 7, 2); echo $result; ?></p>
               <?php } ?>
                 
                 <p class="text-capitalize"><i class="fa fa-clock-o"></i> Opening Time: <?php echo $value->bis_op_time; ?>. Closing Time: <?php echo $value->bis_cls_time; ?>.</p>
                
              </div>
             <!-- <div class="product-color-size-area">
                <div class="color-area">
                  <h2 class="saider-bar-title">Color</h2>
                  <div class="color">
                    <ul>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                    </ul>
                  </div>
                </div>
                <div class="size-area">
                  <h2 class="saider-bar-title">Size</h2>
                  <div class="size">
                    <ul>
                      <li><a href="#">S</a></li>
                      <li><a href="#">L</a></li>
                      <li><a href="#">M</a></li>
                      <li><a href="#">XL</a></li>
                      <li><a href="#">XXL</a></li>
                    </ul>
                  </div>
                </div>
              </div>-->
              <div class="product-variation">
                 <button class="button cart-button"  title="Send personal enquiry to this vendor" id="single_product" type="button">Contact</span></button>
                <!--<form action="#" method="post">
                  <div class="cart-plus-minus">
                    <label for="qty">Qty:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="text" class="qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                  <button class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
                </form>-->  
              </div>
             <!-- <div class="product-cart-option">
                <ul>
                  <li><a href="#"><i class="fa fa-heart"></i><span>Add to Wishlist</span></a></li>
                  <li><a href="#"><i class="fa fa-retweet"></i><span>Add to Compare</span></a></li>
                  <li><a href="#"><i class="fa fa-envelope"></i><span>Email Friend</span></a></li>
                </ul>
          
            </div>-->
          </div>
        </div>
          <div class="product-overview-tab">
   <div class="product-tab-inner"> 
              <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>              <!--  <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                 <li><a href="#product_tags" data-toggle="tab">Tags</a></li>
                <li> <a href="#custom_tabs" data-toggle="tab">Custom Tab</a> </li>-->
              </ul>
              <div id="productTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <div class="std">
                    <p><?php echo $value->bis_description; ?></p>
                  </div>
                </div>
                
                
                  <div id="reviews" class="tab-pane fade">
              <!--<div class="col-sm-5 col-lg-5 col-md-5">
                <div class="reviews-content-left">
                  <h2>Customer Reviews</h2>
                  <div class="review-ratting">
                  <p><a href="#">Amazing</a> Review by Company</p>
                  <table>
                    <tbody><tr>
                      <th>Price</th>
                      <td>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Value</th>
                      <td>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Quality</th>
                      <td>
                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      </td>
                    </tr>
                  </tbody></table>
                  <p class="author">
                    Angela Mack<small> (Posted on 16/12/2015)</small>
                  </p>
                  </div>
                                    
                                    
                                    <div class="review-ratting">
                  <p><a href="#">Good!!!!!</a> Review by Company</p>
                  <table>
                    <tbody><tr>
                      <th>Price</th>
                      <td>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Value</th>
                      <td>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Quality</th>
                      <td>
                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      </td>
                    </tr>
                  </tbody></table>
                  <p class="author">
                    Lifestyle<small> (Posted on 20/12/2015)</small>
                  </p>
                  </div>
                                    
                                    
                                    <div class="review-ratting">
                  <p><a href="#">Excellent</a> Review by Company</p>
                  <table>
                    <tbody><tr>
                      <th>Price</th>
                      <td>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Value</th>
                      <td>
                        <div class="rating">
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star"></i>
                          <i class="fa fa-star-o"></i>
                          <i class="fa fa-star-o"></i>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <th>Quality</th>
                      <td>
                        <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      </td>
                    </tr>
                  </tbody></table>
                  <p class="author">
                    Jone Deo<small> (Posted on 25/12/2015)</small>
                  </p>
                  </div>
                                    
                </div>
              </div>-->
              <div class="col-sm-7 col-lg-7 col-md-7">
                <div class="reviews-content-right">
                  <h2>Write Your Own Review</h2>
                  <form>
                   <!-- <h3>You're reviewing: <span>Donec Ac Tempus</span></h3>
                    <h4>How do you rate this product?<em>*</em></h4>
                                        <div class="table-responsive reviews-table">
                    <table>
                      <tbody><tr>
                        <th></th>
                        <th>1 star</th>
                        <th>2 stars</th>
                        <th>3 stars</th>
                        <th>4 stars</th>
                        <th>5 stars</th>
                      </tr>
                      <tr>
                        <td>Quality</td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                      </tr>
                      <tr>
                        <td>Price</td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                      </tr>
                      <tr>
                        <td>Value</td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                        <td><input type="radio"></td>
                      </tr>
                    </tbody></table></div>-->
                    <div class="form-area">
                      <div class="form-element">
                        <label>Name <em>*</em></label>
                        <input type="text" id="rname"  required>
                      </div>
                      <div class="form-element">
                        <label>Email<em>*</em></label>
                        <input type="text" id="remail" required>
                      </div>
                       <div class="form-element">
                        <label>Mobile Number <em>*</em></label>
                        <input type="text" id="rnumber" required>
                      </div>
                      <div class="form-element">
                        <label>Review <em>*</em></label>
                        <textarea id="rreview"></textarea>
                      </div>  

                      <input type="Submit" class="btn btn-warning" id="btnSub"></i> 


                      <div class="buttons-set">
                       
                      <!--  <button class="button" id="btnSub" title="Submit Review" ><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>  -->
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
                <div class="tab-pane fade" id="product_tags">
                  <div class="box-collateral box-tags">
                    <div class="tags">
                                
                        
                      <form id="addTagForm" action="#" method="get">
                        <div class="form-add-tags">

                          
                         <!--  <div class="input-box"><label for="productTagName">Add Your Tags:</label>
                            <input class="input-text" name="productTagName" id="productTagName" type="text">
                            <button type="button" title="Add Tags" class="button add-tags"><i class="fa fa-plus"></i> &nbsp;<span>Add Tags</span> </button>
                          </div> -->
                          <!--input-box--> 
                        </div>
                      </form>
                    </div>
                    <!--tags-->
                   <!--  <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p> -->
                  </div>
                </div>
                <div class="tab-pane fade" id="custom_tabs">
                  <div class="product-tabs-content-inner clearfix">
                  <!--   <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                      simply dummy text of the printing and typesetting industry. Lorem Ipsum
                      has been the industry's standard dummy text ever since the 1500s, when 
                      an unknown printer took a galley of type and scrambled it to make a type
                      specimen book. It has survived not only five centuries, but also the 
                      leap into electronic typesetting, remaining essentially unchanged. It 
                      was popularised in the 1960s with the release of Letraset sheets 
                      containing Lorem Ipsum passages, and more recently with desktop 
                      publishing software like Aldus PageMaker including versions of Lorem 
                      Ipsum.</span></p> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
 
        </div>
        
         <aside class="right sidebar col-sm-3 col-xs-12">
          
          
         <!--  <div class="block shop-by-side">
            <div class="sidebar-bar-title">
              <h3>Products Services</h3>
            </div>
            <div class="block-content">
                           <div class="layered-Category">
                
                <div class="layered-content">
                  <ul class="check-box-list">
                    <li>
                      <input type="checkbox" id="jtv1" name="jtvc">
                      <label for="jtv1"> <span class="button"></span> Camera & Photo<span class="count">(12)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv2" name="jtvc">
                      <label for="jtv2"> <span class="button"></span> Computers<span class="count">(18)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv3" name="jtvc">
                      <label for="jtv3"> <span class="button"></span> Apple Store<span class="count">(15)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv4" name="jtvc">
                      <label for="jtv4"> <span class="button"></span> Car Electronic<span class="count">(03)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv5" name="jtvc">
                      <label for="jtv5"> <span class="button"></span> Accessories<span class="count">(04)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv7" name="jtvc">
                      <label for="jtv7"> <span class="button"></span> Game & Video<span class="count">(07)</span> </label>
                    </li>
                    <li>
                      <input type="checkbox" id="jtv8" name="jtvc">
                      <label for="jtv8"> <span class="button"></span> Best selling<span class="count">(05)</span> </label>
                    </li>
                  </ul>
                </div>
              </div>
              
              
              
            </div>
          </div>-->
          <!--<div class="block special-product">
            <div class="sidebar-bar-title">
              <h3>Special Products</h3>
            </div>
            <div class="block-content">
              <ul>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.html" title="Sample Product" class="product-image"><img src="images/products/img01.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
                    <span class="price">$19.99</span>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                  </div>
                </li>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.html" title="Sample Product" class="product-image"><img src="images/products/img02.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.html">Consectetur utes anet adipisicing elit</a> </p>
                    <span class="price">$89.99</span>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                  </div>
                </li>
              </ul>
              <a class="link-all" href="shop_grid.html">All Products</a> </div>
          </div>-->
          
          <div class="single-img-add sidebar-add-slider ">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
              
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
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
              </div>
              
              <!-- Controls --> 
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
          
          <!--<div class="block popular-tags-area ">
            <div class="sidebar-bar-title">
              <h3>Popular Tags</h3>
            </div>
            <div class="tag">
              <ul>
                <li><a href="#">Boys</a></li>
                <li><a href="#">Camera</a></li>
                <li><a href="#">good</a></li>
                <li><a href="#">Computers</a></li>
                <li><a href="#">Phone</a></li>
                <li><a href="#">clothes</a></li>
                <li><a href="#">girl</a></li>
                <li><a href="#">shoes</a></li>
                <li><a href="#">women</a></li>
                <li><a href="#">accessoties</a></li>
                <li><a href="#">View All Tags</a></li>
              </ul>
            </div>
          </div>-->
        </aside>
        
      </div>
    </div>
  </div>
  
  <!-- Main Container End --> 
 


<!-- Related Product Slider -->
  
  <!--<div class="container">
  <div class="row">
  <div class="col-xs-12">
   <div class="related-product-area">       
 <div class="page-header">
        <h2>Related Products Category</h2>
      </div>
      <div class="related-products-pro">
                <div class="slider-items-products">
                  <div id="related-product-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4 fadeInUp">
                      <!--<div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <!--<div class="icon-sale-label sale-left">Sale</div>
                            <div class="icon-new-label new-right">New</div>-->
                            <!--<div class="pr-img-area"> <img class="first-img" src="<?php// echo base_url();?>assets/front/images/products/img12.jpg" alt=""> <img class="hover-img" src="images/products/img12.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="icon-sale-label sale-left">Sale</div>
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img15.jpg" alt=""> <img class="hover-img" src="images/products/img15.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img03.jpg" alt=""> <img class="hover-img" src="images/products/img03.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img04.jpg" alt=""> <img class="hover-img" src="images/products/img04.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>

                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img05.jpg" alt=""> <img class="hover-img" src="images/products/img05.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img06.jpg" alt=""> <img class="hover-img" src="images/products/img06.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div></div>-->
        
                </div>
                </div>
              </div>
              </div>
<!-- Related Product Slider End --> 

<!-- Upsell Product Slider -->
 <!-- <section class="upsell-product-area">
  <div class="container">
  <div class="row">
  <div class="col-xs-12">
          
 <div class="page-header">
        <h2>UpSell Products</h2>
      </div>
                <div class="slider-items-products">
                  <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4">
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="icon-sale-label sale-left">Sale</div>
                            <div class="icon-new-label new-right">New</div>
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img01.jpg" alt=""> <img class="hover-img" src="images/products/img01.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img02.jpg" alt=""> <img class="hover-img" src="images/products/img02.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img03.jpg" alt=""> <img class="hover-img" src="images/products/img03.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="icon-sale-label sale-left">Sale</div>
                          <div class="icon-new-label new-right">New</div>
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img04.jpg" alt=""> <img class="hover-img" src="images/products/img04.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="icon-new-label new-left">New</div>
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img05.jpg" alt=""> <img class="hover-img" src="images/products/img05.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box">
                                    <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $456.00 </span> </p>
                                    <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $567.00 </span> </p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="product-item">
                        <div class="item-inner fadeInUp">
                          <div class="product-thumbnail">
                            <div class="pr-img-area"> <img class="first-img" src="images/products/img06.jpg" alt=""> <img class="hover-img" src="images/products/img06.jpg" alt="">
                              <button type="button" class="add-to-cart-mt"> <i class="fa fa-shopping-cart"></i><span> Add to Cart</span> </button>
                            </div>
                            <div class="pr-info-area">
                              <div class="pr-button">
                                <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart"></i> </a> </div>
                                <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-signal"></i> </a> </div>
                                <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                              </div>
                            </div>
                          </div>
                          <div class="item-info">
                            <div class="info-inner">
                              <div class="item-title"> <a title="Ipsums Dolors Untra" href="single_product.html">Ipsums Dolors Untra </a> </div>
                              <div class="item-content">
                                <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                <div class="item-price">
                                  <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
        
                </div>
                </div>
              </div>
              </section>-->
<!-- Upsell Product Slider End --> 
 <!-- Footer -->
  
   <!--Login Popup Start--> 
<!--  <div id="loginModal" class="modal fade">
   
        
            <div class="modal-body"> 
           
                 <form id="login-form">
                  
                  <h4>Send Business Enquiry "<span class="text-capitalize" style="color: orangered;"><?php //echo $vbusdetails[0]->bis_name;?></span>"</h4>   <span id="error" class="price"> </span><br>
                
                   <input id="cat_id" type="hidden" value="<?php //echo $vbusdetails[0]->bis_vendor_id;?>" class="form-control">
                   <input id="user_id" type="hidden" value="<?php //echo $userpro[0]->user_id;?>" class="form-control">
                  <label for="emmail_login">Your Name <span class="required">*</span></label>
                  <input id="uname" type="text" class="form-control">
                  <label for="password_login">Your Mobile Number <span class="required">*</span></label>
                  <input id="unumber" type="text" class="form-control">
                  <label for="password_login">Your Email Id <span class="required">*</span></label>
                  <input id="uemail" type="email" class="form-control">
                  <label for="password_login">Your Message<span class="required">*</span></label>
                  <textarea id="utext"  class="form-control">
                  </textarea>

                <p class="forgot-pass"><a href="#">Lost your password?</a></p> 
                  <br>
                  <button id="btnSubmit" class="button">&nbsp; <span>Send</span></button><label class="inline" for="rememberme">
                         
              </form>
      
            </div>
            
        </div>
    </div>
</div> -->
 <!--End of Login Popup--> 

<!--enquiry Popup Start-->  <!-- updated on 8,22 Dec 2018 -->
 <div id="EnqModal1" class="modal fade"  style="margin-top: -90px;">
    <div class="modal-dialog modal-lg login-popup">
        <div class="modal-content" style="height: auto;">
        
            <div class="modal-body" > 
                
                 <form id="enquiry-form">
                  <?php
                 
                    if($_SESSION['user_id']!=''){
                      foreach($userpro as $val) { 

                    ?>
                  <h4>Send Business Enquiry to "<span class="text-capitalize" style="color: orangered;"><?php echo $vbusdetails[0]->bis_name;?></span>"</h4><span id="error1" class="price"> </span><br>
               
                <div class= "row">
                     <div class= "col-md-6">
                    <input id="vendor_id" type="hidden" value="<?php echo $vbusdetails[0]->bis_vendor_id;?>" class="form-control">
                   
                  <input id="u_id" type="hidden" value="<?php echo $val->user_id;?>" class="form-control">
                  <input type="hidden" id="pro_ser" value="<?php echo $vbusdetails[0]->sub_category_pro_serv?>" class="form-control">

                  <label for="Name">Your Name <span class="required" style="color: red;">*</span></label>
                  <input id="uname" type="text" class="form-control"value="<?php echo $val->ufname.'&nbsp;'.$val->ulname;?>" readonly>

                  <label for="mobile">Your Mobile Number <span class="required" style="color: red;">*</span></label>
                  <input id="unumber" type="text" class="form-control" value="<?php echo $val->umobile;?>" readonly>
<!-- updated 19 Jan 2019 -->

                  <label for=" Billing address">Your Billing Address<span class="required" style="color: red;">*</span></label>
                  <textarea id="uadd" class="form-control" style="height: 34px;" readonly=""><?php echo $val->uaddress?></textarea>


                  <label for="Shipping address">Your Shipping Address<span class="required" style="color: red;">*</span></label>
                  <textarea id="uship_add" class="form-control" style="height: 34px;" ><?php echo $val->uaddress?></textarea>
<!-- updated 19 Jan 2019 -->

                  <?php if($vbusdetails[0]->sub_category_pro_serv=="PRODUCT"){?>
                   <label for="product">Product<span class="required" style="color: red;">*</span></label>
                    <input id="pro_sub_cat_id" type="text" placeholder="<?php echo $vbusdetails[0]->sub_category_id;?>" value="<?php echo $vbusdetails[0]->sub_category_title;?>" class="form-control" readonly>
                  <?php } ?>


                   <?php if($vbusdetails[0]->sub_category_pro_serv=="SERVICE"){?>
                    <label for="category">Category<span class="required" style="color: red;">*</span></label>
                    <input id="cat_id" type="text" placeholder="<?php echo $vbusdetails[0]->category_id;?>" value="<?php echo $vbusdetails[0]->category_title;?>" class="form-control" readonly>
                   <?php } ?>
                 
                 <?php if($vbusdetails[0]->sub_category_pro_serv=="PRODUCT"){?> 
                  <label for="cr_time">Credit Time(Days)<span class="required"></span></label>
                  <input id="cr_time" type="number" class="form-control" >
                 <?php  } ?>


                 <?php if($vbusdetails[0]->sub_category_pro_serv=="SERVICE"){?> 
                  <label for="exp_time">Expected Date<span class="required" style="color: red;">*</span></label>
                  <input id="exp_time" type="date" class="form-control" >
                 <?php  } ?>
              
              </div> 

              <div class="col-md-6">
                   <label for="org_Name">Your Organisation Name <span class="required"></span></label>
                  <input id="org_name" type="text" class="form-control"value="<?php echo $val->uorganization;?>">


                  <label for="email">Your Email Id <span class="required" style="color: red;"></span></label>
                  <input id="uemail" type="email" class="form-control" value="<?php echo $val->uemail;?>" readonly>

                  <label for="referal">Your Referal Id<span class="required"></span></label>
                  <input id="ref_id" type="text" class="form-control" >

                 <?php if($vbusdetails[0]->sub_category_pro_serv =="SERVICE"){?>
                  <label for="sub_category">Sub Category<span class="required" style="color: red;">*</span></label>
                    <input id="subcat_id" type="text" value="<?php echo $vbusdetails[0]->sub_category_title;?>" placeholder="<?php echo $vbusdetails[0]->sub_category_id;?>" class="form-control" readonly>
                  <?php }  ?>

                  <!-- updated 22 Dec 2018 -->                
                   
                  <div class="row">
<!-- updated on 19 Jan 2019 -->

                  <div class="col-md-4">
                 
                  <!-- updated on 22 Dec 2018 -->

                   <label for="product">Country<span class="required" style="color: red;">*</span></label>
                   <!-- <input id="country1" name="country1" type="text" class="form-control" value="<?php //echo $userpro[0]->country_name;?>" readonly> 
                   <input id="country" name="country" type="hidden" class="form-control" value="<?php //echo $val->ucountry;?>" >  -->
                    <select class="form-control " id="country" name="country" required >
                    <option value="<?php echo $userpro[0]->ucountry; ?>" ><?php echo $userpro[0]->country_name; ?></option>
                      <?php foreach($country as $row) {
                          if( $userpro[0]->ucountry!= $row->id ){ ?>
                                  <option value="<?php echo $row->id; ?>"><?php echo $row->country_name; ?></option>
                             <?php } } ?>
                    </select> 

<!-- updated on 22 Dec 2018 -->
                    </div>
                    <div class="col-md-4">
                      <label for="state">State<span class="required" style="color: red;">*</span></label>
                      <!--  <input id="state1" name="state1" type="text" value="<?php //echo $userpro[0]->state_name;?>"  class="form-control" readonly >
                       <input id="state" name="state" type="hidden" class="form-control" value="<?php //echo $val->ustate;?>" >  -->

                      <select id="state" name="state" type="number" class="form-control "required >
                        <option value="<?php echo $userpro[0]->ustate; ?>" ><?php echo $userpro[0]->state_name; ?></option>
                         <?php                                           //19 Jan 2019
                           $sql= 'SELECT * FROM tbl_states WHERE country_id='.$userpro[0]->ucountry;
                           $query= $this->db->query($sql);
                           $value= $query->result(); 

                              foreach($value as $row) {
                                if($row->id != $userpro[0]->ustate){ ?>
                                  <option value="<?php echo $row->id; ?>">
                                   <?php echo $row->state_name; ?></option>
                                  <?php } }?>
                       </select> 
                    </div>

                    <div class="col-md-4">
                      <label for="city">City<span class="required" style="color: red;">*</span></label>
                      <!-- <input id="city1" name ="city1" type="text" value="<?php //echo $userpro[0]->city_name;?>"  class="form-control" readonly>
                      <input id="city" name="city" type="hidden" class="form-control" value="<?php //echo $val->ucity;?>" >  -->
                    
                     <select class="form-control" id="city" name ="city" required >
                        <option value="<?php echo $userpro[0]->ucity; ?>" ><?php echo $userpro[0]->city_name; ?></option>
                           <?php                           //19 Jan 2019
                           $sql= 'SELECT * FROM tbl_city WHERE state_id='.$userpro[0]->ustate;
                           $query= $this->db->query($sql);
                           $value= $query->result(); 

                              foreach($value as $row) {
                                if($row->id != $userpro[0]->ucity){ ?>
                                  <option value="<?php echo $row->id; ?>">
                                   <?php echo $row->city_name; ?></option>
                                  <?php } }?>

                     </select> 
                    </div>
                </div>
                
<!-- updated 22 Dec 2018 -->
<!-- updated on 19 Jan 2019 -->

                  <?php if($vbusdetails[0]->sub_category_pro_serv=="PRODUCT"){?> 
                  <div class="row">
                  <div class="col-md-6">
                    <label for="qty">Quantity<span class="required" style="color: red;">*</span></label>
                    <input id="qty" type="number" class="form-control" >
                  </div>

                  <div class="col-md-6">
                     <label for="unit">Unit<span class="required" style="color: red;">*</span></label>
                    <input id="unit" type="text" class="form-control" Value="Unit" >
                    <!-- <select class="form-control " id="unit">
                      <option value="Unit">Unit</option> 
                     
                    </select>-->
                  </div>
                </div>
                <?php } } ?>
                 <?php if($vbusdetails[0]->sub_category_pro_serv=="PRODUCT"){?> 
                  <label for="o_time">Order required Time(Days)<span class="required" style="color: red;" >*</span></label>
                  <input id="o_time" type="number" class="form-control">
                  <?php } ?>
             </div>
              </div>

                  <?php   } ?>
                  <div class="row">
                    <div class= "col-md-12">
                   <label for="Message">Your Message<span class="required"></span></label>
                  <textarea id="utext" class="form-control"></textarea>
                  
                   <label for="upload">Attach file<span class="required"></span></label>
                  <!--17/01/2019 --> 
                  <input type="file" name="userfile" id="userfile" class="fileUpload" />

                  <br>

                    <div class="upload-demo">
                        <div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
                    </div>

                  <!--17/01/2019 --> 

                  <br>
                  <button type="button" id="btnSubmit1" class="button btnSubmit" title="Fill all compulsory fields and Submit enquiry" >&nbsp; <span>Submit</span></button>
                
                  </div>
                </div>
         </form>
         </div>
      
            </div>
            
        </div>
    </div>
</div>
 <!--End of enquiry Popup--> 
 
 <script>
$($(this).parent().parent().find("input")[0]).val($(this).parent().find(".fa-star").length)

$(function() {
  $(".rate i").css('cursor', 'pointer');
  $(".rate i").click(function() {
    $(this).add($(this).prevAll("i")).removeClass("fa-star-o").addClass("fa-star");
    $(this).nextAll("i").removeClass("fa-star").addClass("fa-star-o");
    $($(this).parent().parent().find("input")[0]).val($(this).parent().find(".fa-star").length)
    console.log($(this).closest('.rate').data('target') + ': ' + $('input[name="' + $(this).closest('.rate').data('target') + '"]').val());
  });
});

function rate(id){
   var uid = '';
    <?php if (isset($_SESSION['user_id'])) { ?>
     uid = '<?php echo $_SESSION['user_id']; ?>';
    <?php }?>
var rat=$("input[name=form-rate-instructor]").val();
        // var uid='<?php //echo $name;?>';
         if (uid!=='') {
         var bis = $('#bsi').val();
         $.ajax({
          type: "POST",
          url: '<?php echo base_url("User/add_reating");?>',
        data:{uid:uid,rat:rat,bis:bis},
        success: function(html){
              // $('#results').html(html).fadeIn('slow');
                //$('#results').delay(5000).fadeOut('slow');
                 $("#results").show();
                setTimeout(function() { $("#results").hide(); }, 2000);
                location.reload();

         // $("#results").append('Thanks For Your Reating');
        }
      });
    }else
    {
      hello();
    }
}
</script>

<script>
  function hello()
  {
    jQuery('#myModallogin').modal('show');
    $(document).on('submit', '#submit-form', function(event) {
     //$("#btnlogin").click(function(event){
      event.preventDefault();
      var unum = $("#unum").val();
      var upass = $("#upass").val();
      if (unum !=='') {
       $.ajax({
                type:'POST',
                url:'<?php echo base_url("User/ajexUserLogin"); ?>',
                data: {unum:unum,upass:upass},
               success: function(html) {
                    if (html=='0')
                    {
                       $('#errors').text('Email and Password Incorrent Pleaes Try Again');
                      event.preventDefault();
                    }else
                    {
                       location.reload();
                    }
   
                   },
                  error: function (error) {
                  }
            });
       }else
             {
               $('#errors').text('email name required');
                event.preventDefault();

             }
            // event.preventDefault()
    //window.location = "<?php //echo base_url('User/login'); ?>";
     });
  }

</script>