
			<!-- Content area -->
			<div class="content">

	<?php if ($this->session->flashdata('success')) { ?>
		<div class="alert alert-success alert-styled-left alert-arrow-left alert-dismissible" id="deletesuccess">
		<button type="button" class="close" data-dismiss="alert"><span>×</span></button>
        <div class="font-weight-semibold"><?= $this->session->flashdata('success') ?> </div></div>
    <?php } ?>

				<!-- Dashboard content -->
				<div class="row">
					<div class="col-xl-8">
					
					
						<!-- Quick stats boxes -->
						<div class="row">
							<div class="col-lg-4">

								<!-- Members online -->
								<a href="<?php echo base_url('vendor');?>"><div class="card bg-teal-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0">
    										<?php echo $vencount?></h3>
					                	</div>
					                	
					                	<div>
											Registered Vendors
											<!--<div class="font-size-sm opacity-75">489 avg</div>-->
										</div>
									</div>

									<div class="container-fluid">
										<!-- <div id="members-online"></div> -->
									</div>
								</div></a>
								<!-- /members online -->

							</div>

							<div class="col-lg-4">

								<!-- Current server load -->
									<a href="<?php echo base_url('inquiry/user_enquiry');?>"><div class="card bg-pink-400">
								
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $inqcount	?></h3>
					                	</div>
					                	
					                	<div>
											Enquiry Counter
											<!--<div class="font-size-sm opacity-75">34.6% avg</div>-->
										</div>
									</div>

									<!-- <div id="server-load"></div> -->
								</div></a>
								<!-- /current server load -->

							</div>

							<div class="col-lg-4">

								<!-- Today's revenue -->
									<a href="<?php echo base_url('madmin/endusers');?>">
								<div class="card bg-blue-400">
									<div class="card-body">
										<div class="d-flex">
											<h3 class="font-weight-semibold mb-0"><?php echo $usecount	?></h3>
					                	</div>
					                	
					                	<div>
											Registered Users
											<!--<div class="font-size-sm opacity-75">$37,578 avg</div>-->
										</div>
									</div>
                                   
									<!-- <div id="today-revenue"></div> -->
								</div></a>
								<!-- /today's revenue -->

							</div>
							
						</div>
						<!-- /quick stats boxes -->


						<!-- Support tickets -->
						<div class="card">
							<div class="card-header header-elements-sm-inline">
								<!--<h6 class="card-title">Support tickets</h6>-->
								<div class="header-elements">
									<!-- <a class="text-default daterange-ranges font-weight-semibold cursor-pointer dropdown-toggle">
										<i class="icon-calendar3 mr-2"></i> -->
										<span></span>

			                	</div>
							</div>

							<!-- <div class="card-body d-md-flex align-items-md-center justify-content-md-between flex-md-wrap">
								<div class="d-flex align-items-center mb-3 mb-md-0">
									<div id="tickets-status"></div>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">14,327 <span class="text-success font-size-sm font-weight-normal"><i class="icon-arrow-up12"></i> (+2.9%)</span></h5>
										<span class="badge badge-mark border-success mr-1"></span> <span class="text-muted">Jun 16, 10:00 am</span>
									</div>
								</div>

								<div class="d-flex align-items-center mb-3 mb-md-0">
									<a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
										<i class="icon-alarm-add"></i>
									</a>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">1,132</h5>
										<span class="text-muted">total tickets</span>
									</div>
								</div>

								<div class="d-flex align-items-center mb-3 mb-md-0">
									<a href="#" class="btn bg-transparent border-indigo-400 text-indigo-400 rounded-round border-2 btn-icon">
										<i class="icon-spinner11"></i>
									</a>
									<div class="ml-3">
										<h5 class="font-weight-semibold mb-0">06:25:00</h5>
										<span class="text-muted">response time</span>
									</div>
								</div>

								<div>
									
								</div>
							</div> -->

							<!--<div class="table-responsive">
								<table class="table text-nowrap">
									<thead>
										<tr>
											<th style="width: 50px">Due</th>
											<th style="width: 300px;">User</th>
											<th>Description</th>
											<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
										</tr>
									</thead>
									<tbody>
										<tr class="table-active table-border-double">
											<td colspan="3">Active tickets</td>
											<td class="text-right">
												<span class="badge bg-blue badge-pill">24</span>
											</td>
										</tr>
										
										<tr>
											<td class="text-center">
												<h6 class="mb-0">20</h6>
												<div class="font-size-sm text-muted line-height-1">hours</div>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-blue rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Robert Hauber</a>
														<div class="text-muted font-size-sm"><span class="badge badge-mark border-blue mr-1"></span> Active</div>
													</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default">
													<div class="font-weight-semibold">[#1254] Inaccurate small pagination height</div>
													<span class="text-muted">The height of pagination elements is not consistent with...</span>
												</a>
											</td>
											<td class="text-center">
												<div class="list-icons">
													<div class="list-icons-item dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-undo"></i> Quick reply</a>
															<a href="#" class="dropdown-item"><i class="icon-history"></i> Full history</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-checkmark3 text-success"></i> Resolve issue</a>
															<a href="#" class="dropdown-item"><i class="icon-cross2 text-danger"></i> Close issue</a>
														</div>
													</div>
												</div>
											</td>
										</tr>

										<tr>
											<td class="text-center">
												<h6 class="mb-0">40</h6>
												<div class="font-size-sm text-muted line-height-1">hours</div>
											</td>
											<td>
												<div class="d-flex align-items-center">
													<div class="mr-3">
														<a href="#" class="btn bg-warning-400 rounded-round btn-icon btn-sm">
															<span class="letter-icon"></span>
														</a>
													</div>
													<div>
														<a href="#" class="text-default font-weight-semibold letter-icon-title">Robert Hauber</a>
														<div class="text-muted font-size-sm"><span class="badge badge-mark border-blue mr-1"></span> Active</div>
													</div>
												</div>
											</td>
											<td>
												<a href="#" class="text-default">
													<div class="font-weight-semibold">[#1184] Round grid column gutter operations</div>
													<span class="text-muted">Left rounds up, right rounds down. should keep everything...</span>
												</a>
											</td>
											<td class="text-center">
												<div class="list-icons">
													<div class="list-icons-item dropdown">
														<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu7"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item"><i class="icon-undo"></i> Quick reply</a>
															<a href="#" class="dropdown-item"><i class="icon-history"></i> Full history</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-checkmark3 text-success"></i> Resolve issue</a>
															<a href="#" class="dropdown-item"><i class="icon-cross2 text-danger"></i> Close issue</a>
														</div>
													</div>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>-->
						</div>
						<!-- /support tickets -->



					</div>

					<div class="col-xl-4">

						<!-- Progress counters -->
						<div class="row">
							<!-- <div class="col-sm-6">
								<div class="card text-center">
									<div class="card-body">
										<div class="svg-center position-relative" id="hours-available-progress"></div>
										<div id="hours-available-bars"></div>
									</div>
								</div>
							</div> -->

							<!-- <div class="col-sm-6">
								<div class="card text-center">
									<div class="card-body">
										<div class="svg-center position-relative" id="goal-progress"></div>
										<div id="goal-bars"></div>
									</div>
								</div>
							</div> -->
						</div>
						<!-- /progress counters -->

					</div>
				</div>
				<!-- /dashboard content -->

			</div>
			<!-- /content area -->
			<script type="text/javascript">
	$(document).ready (function(){
		$("#deletesuccess").alert();
		window.setTimeout(function () { 
		$("#deletesuccess").alert('close'); }, 2000);
	})
</script>
	
