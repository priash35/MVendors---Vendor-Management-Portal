<div class="content">

	    		<!-- Pricing table one -->
				<div class="mb-3 pt-2">
					<h6 class="mb-0 font-weight-semibold">
						Pricing
					</h6>
				</div>

				<div class="row">
					<?php foreach ($package as  $value) { ?>
					<div class="col-sm-6 col-lg-3">
						<div class="card">
		                    <div class="card-body text-center">
		                        <h4 class="mt-2 mb-3"><?php echo $value->package_name; ?></h4>
		                        <h1 class="pricing-table-price"><span class="mr-1">₹</span><?php echo $value->package_price; ?></h1>
		                        <ul class="pricing-table-list list-unstyled mb-3">
		                            <li><strong> <?php echo $value->package_duration; ?> Days</strong></li>
		                            <li><strong><?php echo $value->package_category; ?> Category</strong> </li>
		                            <li><strong><?php echo $value->package_video; ?> Videos</strong> </li>
		                            <li><strong><?php echo $value->package_images; ?> Images</strong> </li>
		                            <li><strong><?php echo $value->package_keywords; ?> Keywords</strong> </li>
		                        </ul>
		                        <a href="#" class="btn bg-success-400 btn-lg text-uppercase font-size-sm font-weight-semibold">Buy Now</a>
		                    </div>
						</div>
					</div>
				<?php } ?>
				
				</div>
                <!-- /pricing table one -->
			</div>