<body class="shop_list_page">



  <!-- Main Container -->
  <div class="main-container col2-left-layout">
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-xs-12 col-sm-push-3">
          <div class="category-description std">
            <div class="slider-items-products">
              <!-- <div id="category-desc-slider" class="product-flexslider hidden-buttons">
               <div class="slider-items slider-width-col1 owl-carousel owl-theme"> 
                
                  <div class="item"> <a href="#x"><img alt="" src="<?php //echo base_url();?>assets/front/images/cat-slider-img1.jpg"></a>
                    <div class="inner-info">
                      <div class="cat-img-title"> <span>Our new range of</span>
                        <h2 class="cat-heading"><strong>Smartphone</strong></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
                        <a class="info" href="#">Shop Now</a> </div>
                    </div>
                  </div>
                 
                  <div class="item"> <a href="#x"><img alt="" src="<?php //echo base_url();?>assets/front/images/cat-slider-img2.jpg"></a> </div>
                  
                
                </div>
              </div>-->
            </div>
          </div>
          <?php if(count($sublist) == 0)  { ?>
        
                      <h1><?php echo "Oops...  Vendor List Not Found!"; ?></h1> 
    
          <?php } else { ?>
          <div class="shop-inner">
            <div class="page-title">
              <h2><?php echo $sublist[0]->sub_category_title;?></h2>
            </div>
            <div class="toolbar">
              <!--<div class="view-mode">
                <ul>
                  <li> <a href="shop_grid.html"> <i class="fa fa-th-large"></i> </a> </li>
                  <li class="active"> <a href="shop_list.html"> <i class="fa fa-th-list"></i> </a> </li>
                </ul>
              </div>-->
              <!--<div class="sorter">
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
                    <option selected="selected">9</option>
                    <option>12</option>
                    <option>16</option>
                    <option>30</option>
                  </select>
                </div>
              </div>-->
            </div>
            <div class="product-list-area">
              <br>
              <div class="row">
                <div class="col-md-6">
                  <p >If you want to send enquiry to all Vendors Click Here</p>
                  </div>
                  <div class="col-md-6">
                   <button id="sendtoall"  title="Send Enquiry to all vendors" class="button">&nbsp; <span>Send to all vendors</span></button>
                   <br><span id="enq_suc"></span>
                  
                </div>
                
              </div>
              <hr>
              <ul class="products-list" id="products-list">
                 <?php foreach ($sublist as $value ) {?>
                <li class="item ">
                  <div class="product-img">
                   <!--  <div class="icon-sale-label sale-left">Sale</div> -->
                    <a href="<?php echo base_url();?>User/busines_detils/<?php echo $value->bis_slug;?>/<?php echo $value->sub_category_id;?>" title="Ipsums Dolors Untra"  style="
    width: 150px;
">                  <?php if($value->bis_pic) {?>
           <figure> <img class="small-image" src="<?php echo base_url();?>\assets\uploads\vbusiness\<?php echo $value->bis_pic; ?>" alt="Ipsums Dolors Untra" ></figure>
            <?php 
            }else{ ?>
              <img src="<?php echo base_url();?>assets/uploads/no_image.jpg" id="img" class="avatar img-responsive rounded img_size" alt="avatar" >
          <?php } ?>


                    
                    </a> </div>
                  <div class="product-shop">
                     <h2 class="product-name text-capitalize" ><a href="<?php echo base_url();?>User/busines_detils/<?php echo $value->bis_slug;?>/<?php echo $value->sub_category_id;?>" title="<?php echo $value->bis_name;?>"><?php echo $value->bis_name;?></a></h2>
                    <!--<div class="ratings">
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">4 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>-->
                   <!--  <div class="price-box">
                      <p class="special-price"> <span class="price-label"></span> <span class="price"> $222.99 </span> </p>
                      <p class="old-price"> <span class="price-label"></span> <span class="price"> $442.99 </span> </p>
                    </div> -->
                    <div class="desc std">
                      <p><b>Address</b> : <?php echo $value->bis_address;?><!-- <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> --></p><p><b> Category :</b> <?php echo $value->category_title;?><span> ?? </span><?php echo $value->sub_category_title;?>
                       </p> 
                        <?php if (!empty($_SESSION['userid'])) { ?>
                          <p><b> Email :</b> <?php echo $value->bis_email;?><span></p> 
                          <p><b> Number</b>  : <?php echo $value->bis_mnumber ?>, <?php echo $value->bis_manumber; ?></p>
                        <?php } else { ?>
                          <p> <b> Email </b> :<?php $result = substr($value->bis_email,0,4); $result .= "****"; $result .= substr($value->bis_email, 7, 2); echo $result; ?></p>
                           <b> Number </b> :<?php $result = substr($value->bis_mnumber,0,4); $result .= "****"; $result .= substr($value->bis_mnumber, 7, 2); echo $result; ?> </p>
                        <?php } ?>

                    </div>
                    <div class="actions">
                      <a href="<?php echo base_url();?>User/busines_detils/<?php echo $value->bis_slug;?>/<?php echo $value->sub_cat_id;?>" title="Ipsums Dolors Untra">
                       <a href="<?php echo base_url();?>User/busines_detils/<?php echo $value->bis_slug;?>/<?php echo $value->sub_category_id;?>" title="<?php echo $value->bis_name;?>">
                      <input type="submit" title="Veiw Vendor Details" value="Veiw More" class="btn btn-warning"></a>
                      <!--<ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>-->
                    </div>
                  </div>
                </li>
              <?php }?>
            <?php }  ?>
               <!-- <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php echo base_url();?>assets/front/images/products/img02.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">3 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$99.99</span> </span> </div>
                    <div class="desc std">
                      <p>Aliquam et metus pharetra, bibendum massa nec, fermentum odio. Nunc id leo ultrices, mollis ligula in, finibus tortor. Mauris eu dui ut.
                      <p> Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </p>
                    </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img">
                    <div class="icon-new-label new-right">New</div>
                    <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php //echo base_url();?>assets/front/images/products/img03.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$699.99</span> </span> </div>
                    <div class="desc std">Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor Donec vitae hendrerit arcu, sit amet faucibus nisl. Cras pretium arcu ex. Aenean posuere libero eu augue condimentum rhoncus. Praesent ornare tortor Aenean posuere libero eu augue condimentum rhoncus. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php //echo base_url();?>assets/front/images/products/img04.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$399.99</span> </span> </div>
                    <div class="desc std">Aliquam quis dui at orci mattis tincidunt et vel risus. In odio quam, vestibulum non faucibus sit amet, posuere id lectus. In odio quam, vestibulum non faucibus sit amet, posuere id lectus. Nulla nunc felis, condimentum ac congue blandit, mattis a mauris. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php //echo base_url();?>assets/front/images/products/img05.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$99.00</span> </span> </div>
                    <div class="desc std">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php //echo base_url();?>assets/front/images/products/img06.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$299<span class="sub">.00</span></span> </span> </div>
                    <div class="desc std">
                      <p>Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi
                        accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a
                        ornare odio. Sed non mauris vitae erat consequat auctor eu in elit.</p>
                      <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </p>
                    </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php //echo base_url();?>assets/front/images/products/img07.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$49.99</span> </span> </div>
                    <div class="desc std">
                      <p>Vivamus dignissim nisl eu euismod ullamcorper. Donec 
                        pellentesque diam id est tristique vestibulum. Donec eget feugiat ante. 
                        Integerarcu libero, dictum nec congue sed, faucibus sit amet lectus. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </p>
                    </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php // echo base_url();?>assets/front/images/products/img08.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price"> <span class="price">$299.99</span> </span> </div>
                    <div class="desc std">Morbi accumsan ipsum velit. Nam
                      nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris itae 
                      erat conuat auctor eu in elitlass aptent taciti sociosqu ad litora. Morbi pretium sed velit in tempus. Nullam nec aliquam lorem. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>
                <li class="item ">
                  <div class="product-img"> <a href="single_product.html" title="Ipsums Dolors Untra">
                    <figure> <img class="small-image" src="<?php //echo base_url();?>assets/front/images/products/img09.jpg" alt="Ipsums Dolors Untra"></figure>
                    </a> </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a href="single_product.html" title="Ipsums Dolors Untra">Ipsums Dolors Untra</a></h2>
                    <div class="ratings">
                      <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                      <p class="rating-links"> <a href="#/">0 Review(s)</a> <span class="separator">|</span> <a href="#review-form">Add Your Review</a> </p>
                    </div>
                    <div class="price-box"> <span class="regular-price" > <span class="price">$79.00</span> </span> </div>
                    <div class="desc std">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ultrices sollicitudin justo, eget mollis justo semper vel. Duis tempor eget leo eget pretium. <a class="link-learn" title="Learn More" href="single_product.html">Learn More</a> </div>
                    <div class="actions">
                      <button class="button cart-button" title="Add to Cart" type="button"><i class="fa fa-shopping-cart"></i><span>Add to Cart</span></button>
                      <ul>
                        <li> <a href="wishlist.html"> <i class="fa fa-heart"></i><span> Add to Wishlist</span> </a> </li>
                        <li> <a href="compare.html"> <i class="fa fa-signal"></i><span> Add to Compare</span> </a> </li>
                      </ul>
                    </div>
                  </div>
                </li>-->
              </ul>
            </div>
            <div class="pagination-area ">
              <ul>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <aside class="sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <!--<div class="block category-sidebar">
            <div class="sidebar-title">
              <h3>Categories</h3>
            </div>
            <ul class="product-categories">
              <li class="cat-item current-cat cat-parent"><a href= "shop_grid.html">Women</a>
                <ul class="children">
                  <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Accessories</a>
                    <ul class="children">
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Dresses</a></li>
                      <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                        <ul style="display: none;" class="children">
                          <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                          <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Handbags</a>
                    <ul class="children">
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; backpack</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Beaded Handbags</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Fabric Handbags</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Sling bag</a></li>
                    </ul>
                  </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Jewellery</a> </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Swimwear</a> </li>
                </ul>
              </li>
              <li class="cat-item cat-parent"><a href="shop_grid.html">Men</a>
                <ul class="children">
                  <li class="cat-item cat-parent"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Dresses</a>
                    <ul class="children">
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Casual</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Designer</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Evening</a></li>
                      <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Hoodies</a></li>
                    </ul>
                  </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Jackets</a> </li>
                  <li class="cat-item"><a href="shop_grid.html"><i class="fa fa-angle-right"></i>&nbsp; Shoes</a> </li>
                </ul>
              </li>
              <li class="cat-item"><a href="shop_grid.html">Electronics</a></li>
              <li class="cat-item"><a href="shop_grid.html">Furniture</a></li>
              <li class="cat-item"><a href="shop_grid.html">KItchen</a></li>
            </ul>
          </div>
          <div class="block shop-by-side">
            <div class="sidebar-bar-title">
              <h3>Shop By</h3>
            </div>
            <div class="block-content">
              <p class="block-subtitle">Shopping Options</p>
              <div class="layered-Category">
                <h2 class="saider-bar-title">Categories</h2>
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
              <div class="manufacturer-area">
                <h2 class="saider-bar-title">Manufacturer</h2>
                <div class="saide-bar-menu">
                  <ul>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Aliquam</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Duis tempus id </a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Leo quis molestie. </a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Suspendisse </a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Nunc gravida </a></li>
                  </ul>
                </div>
              </div>
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
            </div>
          </div>
          <div class="block product-price-range ">
            <div class="sidebar-bar-title">
              <h3>Price</h3>
            </div>
            <div class="block-content">
              <div class="slider-range">
                <div data-label-reasult="Range:" data-min="0" data-max="500" data-unit="$" class="slider-range-price" data-value-min="50" data-value-max="350"></div>
                <div class="amount-range-price">Range: $10 - $550</div>
                <ul class="check-box-list">
                  <li>
                    <input type="checkbox" id="p1" name="cc" />
                    <label for="p1"> <span class="button"></span> $20 - $50<span class="count">(0)</span> </label>
                  </li>
                  <li>
                    <input type="checkbox" id="p2" name="cc" />
                    <label for="p2"> <span class="button"></span> $50 - $100<span class="count">(0)</span> </label>
                  </li>
                  <li>
                    <input type="checkbox" id="p3" name="cc" />
                    <label for="p3"> <span class="button"></span> $100 - $250<span class="count">(0)</span> </label>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="block sidebar-cart">
            <div class="sidebar-bar-title">
              <h3>My Cart</h3>
            </div>
            <div class="block-content">
              <p class="amount">There are <a href="shopping_cart.html">2 items</a> in your cart.</p>
              <ul>
                <li class="item"> <a href="shopping_cart.html" title="Sample Product" class="product-image"><img src="<?php echo base_url();?>assets/front/images/products/img07.jpg" alt="Sample Product "></a>
                  <div class="product-details">
                    <div class="access"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a></div>
                    <p class="product-name"> <a href="shopping_cart.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
                    <strong>1</strong> x <span class="price">$19.99</span> </div>
                </li>
                <li class="item last"> <a href="#" title="Sample Product" class="product-image"><img src="<?php echo base_url();?>assets/front/images/products/img08.jpg" alt="Sample Product"></a>
                  <div class="product-details">
                    <div class="access"> <a href="#" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a></div>
                    <p class="product-name"> <a href="shopping_cart.html">Consectetur utes anet adipisicing elit</a> </p>
                    <strong>1</strong> x <span class="price">$8.00</span> 
                   
                  </div>
                </li>
              </ul>
              <div class="summary">
                <p class="subtotal"> <span class="label">Cart Subtotal:</span> <span class="price">$27.99</span> </p>
              </div>
              <div class="cart-checkout">
                <button class="button button-checkout" title="Submit" type="submit"><i class="fa fa-check"></i> <span>Checkout</span></button>
              </div>
            </div>
          </div>
          <div class="block compare">
            <div class="sidebar-bar-title">
              <h3>Compare Products (2)</h3>
            </div>
            <div class="block-content">
              <ol id="compare-items">
                <li class="item"> <a href="compare.html" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>&nbsp; Vestibulum porta tristique porttitor.</a> </li>
                <li class="item"> <a href="compare.html" title="Remove This Item" class="remove-cart"><i class="icon-close"></i></a> <a href="#" class="product-name"><i class="fa fa-angle-right"></i>&nbsp; Lorem ipsum dolor sit amet</a> </li>
              </ol>
              <div class="ajax-checkout">
                <button type="submit" title="Submit" class="button button-compare"> <span><i class="fa fa-signal"></i> Compare</span></button>
                <button type="submit" title="Submit" class="button button-clear"> <span><i class="fa fa-eraser"></i> Clear All</span></button>
              </div>
            </div>
          </div>-->
          <div class="single-img-add sidebar-add-slider ">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel"> 
             
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
            
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
              

              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
          </div>
         <!-- <div class="block special-product">
            <div class="sidebar-bar-title">
              <h3>Special Products</h3>
            </div>
            <div class="block-content">
              <ul>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.html" title="Sample Product" class="product-image"><img src="<?php //echo base_url();?>assets/front/images/products/img01.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.html">Lorem ipsum dolor sit amet Consectetur</a> </p>
                    <span class="price">$19.99</span>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                  </div>
                </li>
                <li class="item">
                  <div class="products-block-left"> <a href="single_product.html" title="Sample Product" class="product-image"><img src="<?php //echo base_url();?>assets/front/images/products/img02.jpg" alt="Sample Product "></a></div>
                  <div class="products-block-right">
                    <p class="product-name"> <a href="single_product.html">Consectetur utes anet adipisicing elit</a> </p>
                    <span class="price">$89.99</span>
                    <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                  </div>
                </li>
              </ul>
              <a class="link-all" href="shop_grid.html">All Products</a> </div>
          </div>-->
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


 <!--enqtype Popup Start-->  <!-- updated on 6 dec 2018 -->
 <!-- <div id="EnqtypeModal" class="modal fade"  >
    <div class="modal-dialog login-popup">
        <div class="modal-content"> -->
           <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> -->
         <!--  <div class="modal-body" > 
              <form id="enquirytype-form"> -->

                  
                  <!--  <p class="before-login-text">Welcome back! Sign in to your account</p> -->

                  <!-- <div class="row">
                      <div class= "col-md-12">
                       <h4>Select how do you want to send your enquiry for "<span class="text-capitalize" style="color: orangered;"><?php //echo $sublist[0]->sub_category_title;?></span>"</h4>   <span id="error" class="price"> </span><br>
                      </div>
                  </div>
                 
                  <div class="row">
                      <div class= "col-md-12">
                        <div class= "col-md-6">
                         <input type="button" id="allven" onclick="Tst()" value="Test" class="button">&nbsp; <span>Send to All Vendors</span></button>
                        </div>
                        <div class= "col-md-6">
                         <button id="one" class="button">&nbsp; <span>Send to selected Vendor</span></button>
                        </div>
                      </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div> -->
<!--------End-->

 <!--enquiry Popup Start-->  <!-- updated on 6 dec 2018 -->
 <div id="EnqModal" class="modal fade"  style="margin-top: -90px;">
    <div class="modal-dialog modal-lg login-popup">
        <div class="modal-content" style="height: auto;">
        
            <div class="modal-body" > 
                
                 <form id="enquiry-form" method="post" enctype="multipart/form-data" >
                  <?php
                     //print_r($userpro);
                   //echo $_SESSION['user_id'];
                    if($_SESSION['user_id']!=''){
                    foreach($userpro as $val) { 

                    ?>

                  <h4>Send Business Enquiry "<span class="text-capitalize" style="color: orangered;"><?php echo $sublist[0]->sub_category_title;?></span>"</h4><span id="error1" class="price"> </span><br>
              
                <div class= "row">
                     <div class= "col-md-6">
                   <!-- <input id="cat_id" type="hidden" value="<?php //echo $sublist[0]->bis_category;?>" class="form-control"> -->
                   
                  <input id="u_id" type="hidden" value="<?php echo $val->user_id;?>" class="form-control">
                  <input type="hidden" id="pro_ser" value="<?php echo $sublist[0]->sub_category_pro_serv?>" class="form-control">

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

                  <?php if($sublist[0]->sub_category_pro_serv=="PRODUCT"){?>
                   <label for="product">Product<span class="required" style="color: red;">*</span></label>
                    <input id="pro_sub_cat_id" type="text" placeholder="<?php echo $sublist[0]->sub_category_id;?>" value="<?php echo $sublist[0]->sub_category_title;?>" class="form-control" readonly>
                  <?php } ?>


                   <?php if($sublist[0]->sub_category_pro_serv=="SERVICE"){?>
                    <label for="category">Category<span class="required" style="color: red;">*</span></label>
                    <input id="cat_id" type="text" placeholder="<?php echo $sublist[0]->category_id;?>" value="<?php echo $sublist[0]->category_title;?>" class="form-control" readonly>
                   <?php } ?>
                 
                 <?php if($sublist[0]->sub_category_pro_serv=="PRODUCT"){?> 
                  <label for="cr_time">Credit Time(Days)<span class="required"></span></label>
                  <input id="cr_time" type="number" class="form-control">
                 <?php  } ?>


                 <?php if($sublist[0]->sub_category_pro_serv=="SERVICE"){?> 
                  <label for="exp_time">Expected Date<span class="required" style="color: red;">*</span></label>
                  <input id="exp_time" type="date" class="form-control"required >
                 <?php  } ?>
              
              </div> 

              <div class="col-md-6">
                   <label for="org_Name">Your Organisation Name <span class="required"></span></label>
                  <input id="org_name" type="text" class="form-control"value="<?php echo $val->uorganization;?>">


                  <label for="email">Your Email Id <span class="required" style="color: red;">*</span></label>
                  <input id="uemail" type="email" class="form-control" value="<?php echo $val->uemail;?>" readonly>

                  <label for="referal">Your Referal Id<span class="required"></span></label>
                  <input id="ref_id" type="text" class="form-control" >

                 <?php if($sublist[0]->sub_category_pro_serv =="SERVICE"){?>
                  <label for="sub_category">Sub Category<span class="required" style="color: red;">*</span></label>
                    <input id="subcat_id" type="text" value="<?php echo $sublist[0]->sub_category_title;?>" placeholder="<?php echo $sublist[0]->sub_category_id;?>" class="form-control" readonly>
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



                  <?php if($sublist[0]->sub_category_pro_serv=="PRODUCT"){?> 
                  <div class="row">
                  <div class="col-md-6">
                    <label for="qty">Quantity<span class="required" style="color: red;">*</span></label>
                    <input id="qty" type="number" class="form-control "required >
                  </div>

                  <div class="col-md-6">
                    <label for="unit">Unit<span class="required" style="color: red;">*</span></label>
                    <input id="unit" type="text" class="form-control" Value="Unit" >
                    <!-- <select class="form-control " id="unit">
                      <option value="Unit">Unit</option> 
                     
                    </select>-->
                  </div>
                </div>
                <?php } ?>

                 <?php if($sublist[0]->sub_category_pro_serv=="PRODUCT"){?> 
                  <label for="o_time">Order required Time(Days)<span class="required" style="color: red;">*</span></label>
                  <input id="o_time" type="number" class="form-control "required>
                  <?php } } ?>
             </div>
              </div>

  <?php } ?>
                  <div class="row">
                    <div class= "col-md-12">
                   <label for="Message">Your Message<span ></span></label>
                  <textarea id="utext" class="form-control "></textarea>
                  
                   <label for="upload">Attach file<span ></span></label>
                    <!--17/01/2019 --> 
                  <input type="file" name="userfile" id="userfile"  class="fileUpload" />

                  <br>

                              <div class="upload-demo">
                        <div class="upload-demo-wrap"><img alt="your image" class="portimg" src="#"></div>
                    </div>

                  <!--17/01/2019 --> 
   
                   <!--  <p class="forgot-pass"><a href="#">Lost your password?</a></p> -->
                  <br>
                  <button id="btnSubmit" name='sendtoall' title="Fill all compulsory fields and Submit enquiry" class="button btnSubmit">&nbsp; <span>Submit</span></button>
                
                  </div>
                </div>
         </form>
         </div>
      
            </div>
            
        </div>
    </div>
</div>
 <!--End of enquiry Popup--> 
 