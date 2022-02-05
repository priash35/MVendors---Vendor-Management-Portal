<div class="content">

				<!-- Form action components -->
				<div class="mb-3">
					<h6 class="mb-0 font-weight-semibold">
						Form action components
					</h6>
					<span class="text-muted d-block">Form actions with mixed elements</span>
				</div>

				<div class="row">
					<div class="col-md-4">
			        	
	                	<!-- Left aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left aligned buttons</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form enctype="multipart/form-data" action="Madmin/add_subadmin" role="form" method="post">
									<div class="form-group">
										<label>name:</label>
										<input type="text" name="name" class="form-control" placeholder="Name">
									</div>

									<div class="form-group">
										<label>Email:</label>
										<input type="text" name="email" class="form-control" placeholder="Email">
									</div>

									<div class="form-group">
										<label>Mobile:</label>
										<input type="text" name="mobile" class="form-control" placeholder="Mobile">
									</div>

									<div class="form-group">
										<label>Password:</label>
										<input type="password" name="password" class="form-control" placeholder="Password">
									</div>

									<!--<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>-->

									<div class="d-flex justify-content-start align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" id="btnsubmit" name="btnsubmit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left aligned buttons -->


		        		<!-- Text + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Text + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<span class="text-muted"><i class="icon-code"></i> &nbsp; Some HTML is supported</span>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /text + button -->


		        		<!-- Inline list + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Inline list + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
								<div class="form-group">
									<label>Your name:</label>
									<input type="text" class="form-control" placeholder="Eugene Kopyov">
								</div>

								<div class="form-group">
									<label>Your password:</label>
									<input type="password" class="form-control" placeholder="Your strong password">
								</div>

								<div class="form-group">
									<label>Your message:</label>
									<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
								</div>

								<div class="d-flex justify-content-between align-items-center">
									<div class="list-inline mb-0">
				                		<a href="#" class="list-inline-item text-default">Support</a>
				                		<a href="#" class="list-inline-item text-default">Terms</a>
				                		<a href="#" class="list-inline-item text-default">Policy</a>
				                	</div>

									<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
								</div>
								</form>
							</div>
		                </div>
		                <!-- /inline list + button -->


		        		<!-- Checkbox + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Checkbox + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<div class="form-check form-check-inline">
											<label class="form-check-label">
												<div class="uniform-checker"><span class="checked"><input type="checkbox" class="form-control-styled" checked="" data-fouc=""></span></div>
												Save as template
											</label>
										</div>

										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /checkbox + button -->

					</div>

					<div class="col-md-4">

		                <!-- Right aligned buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Right aligned buttons</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-end align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Preview</button>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /right aligned buttons -->


			        	<!-- Text link + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Text link + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<a href="#">Can't send message?</a>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /text link + button -->


		        		<!-- Icon list + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Icon list + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<div class="list-icons">
					                		<a href="#" class="list-icons-item mr-2"><i class="icon-github"></i></a>
					                		<a href="#" class="list-icons-item mr-2"><i class="icon-stackoverflow"></i></a>
					                		<a href="#" class="list-icons-item mr-2"><i class="icon-google-drive"></i></a>
					                	</div>

										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /icon list + button -->


		        		<!-- Switch + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Switch + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<div class="form-check form-check-switchery mb-0">
											<label class="form-check-label">
												<input type="checkbox" class="form-control-switchery" checked="" data-fouc="" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="background-color: rgb(100, 189, 99); border-color: rgb(100, 189, 99); box-shadow: rgb(100, 189, 99) 0px 0px 0px 10px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 18px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
												Start discussion
											</label>
										</div>

										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
	                	<!-- /switch + button -->

					</div>

					<div class="col-md-4">

			        	<!-- Left and right buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left/right buttons</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" class="btn bg-blue legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left and right buttons -->


		        		<!-- Status text + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Status text + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<span><i class="icon-spinner2 spinner mr-2"></i> Processing...</span>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /status text + button -->


		        		<!-- Left alternate button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left alternate button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-flex justify-content-between align-items-center">
										<a href="#" class="btn btn-light btn-icon legitRipple"><i class="icon-help"></i></a>
										<div class="d-inline-flex">
											<button type="reset" class="btn btn-light legitRipple">Cancel</button>
											<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
										</div>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left alternate button -->


		        		<!-- Select + button -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Select + button</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="d-lg-flex justify-content-between align-items-center flex-wrap">
										<div class="wmin-lg-200 mb-3 mb-lg-0">
											<select class="form-control form-control-select2 select2-hidden-accessible" data-placeholder="Actions" data-fouc="" tabindex="-1" aria-hidden="true">
												<option></option>
												<option value="1">Send to all contacts</option>
												<option value="2">Send to my contacts</option>
												<option value="3">Save as draft</option>
												<option value="4">Don't have in Sent</option>
											</select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-6x2v-container"><span class="select2-selection__rendered" id="select2-6x2v-container"><span class="select2-selection__placeholder">Actions</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
										</div>

										<button type="submit" class="btn bg-blue ml-lg-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /select + button -->

					</div>
				</div>
				<!-- /form action components -->


				<!-- Form actions positioning -->
				<div class="mb-3 pt-2">
					<h6 class="mb-0 font-weight-semibold">
						Form actions alignment
					</h6>
					<span class="text-muted d-block">Using text or flexbox utility classes</span>
				</div>

				<div class="row">
					<div class="col-md-4">
			        	
			        	<!-- Left alignment -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left aligned</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<button type="submit" class="btn bg-teal-400 legitRipple">Submit form <i class="icon-paperplane ml-2"></i></button>
								</form>
							</div>
		                </div>
		                <!-- /left alignment -->

					</div>

					<div class="col-md-4">
			        	
		        		<!-- Centered buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Centered actions</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="text-center">
										<button type="submit" class="btn bg-teal-400 legitRipple">Submit form <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /centered buttons -->

					</div>

					<div class="col-md-4">
			        	
		        		<!-- Right alignment -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Right aligned</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group">
										<label>Your name: </label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password: </label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group">
										<label>Your message: </label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>

									<div class="text-right">
										<button type="submit" class="btn bg-teal-400 legitRipple">Submit form <i class="icon-paperplane ml-2"></i></button>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /right alignment -->

					</div>
				</div>
				<!-- /form actions positioning -->


				<!-- Optional styles -->
				<div class="mb-3 pt-2">
					<h6 class="mb-0 font-weight-semibold">
						Optional styles
					</h6>
					<span class="text-muted d-block">White, grey and custom backgrounds</span>
				</div>

				<div class="row">
					<div class="col-md-4">

						<!-- Grey background -->
		                <form action="#">
				            <div class="card">
								<div class="card-header header-elements-inline">
					                <h6 class="card-title">Grey background</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

				                <div class="card-body">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group mb-0">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>
								</div>

								<div class="card-footer d-flex justify-content-between align-items-center">
									<button type="submit" class="btn btn-light legitRipple">Cancel</button>
									<button type="submit" class="btn bg-blue legitRipple">Submit form <i class="icon-paperplane ml-2"></i></button>
								</div>
			                </div>
			            </form>
			            <!-- /grey background -->

					</div>

					<div class="col-md-4">

						<!-- White background -->
		                <form action="#">
				            <div class="card">
								<div class="card-header header-elements-inline">
					                <h6 class="card-title">White background</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

				                <div class="card-body">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group mb-0">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>
								</div>

								<div class="card-footer d-flex justify-content-between align-items-center bg-white">
									<button type="submit" class="btn btn-light legitRipple">Cancel</button>
									<button type="submit" class="btn bg-blue legitRipple">Submit form <i class="icon-paperplane ml-2"></i></button>
								</div>
			                </div>
			            </form>
			            <!-- /white background -->

					</div>

					<div class="col-md-4">

						<!-- Custom background -->
		                <form action="#">
				            <div class="card">
								<div class="card-header header-elements-inline">
					                <h6 class="card-title">Custom background</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

				                <div class="card-body">
									<div class="form-group">
										<label>Your name:</label>
										<input type="text" class="form-control" placeholder="Eugene Kopyov">
									</div>

									<div class="form-group">
										<label>Your password:</label>
										<input type="password" class="form-control" placeholder="Your strong password">
									</div>

									<div class="form-group mb-0">
										<label>Your message:</label>
										<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
									</div>
								</div>

								<div class="card-footer d-flex justify-content-between align-items-center bg-teal-400 border-top-0">
									<button type="submit" class="btn bg-transparent text-white border-white border-2 legitRipple">Cancel</button>
									<button type="submit" class="btn btn-outline bg-white text-white border-white border-2 legitRipple">Submit form <i class="icon-paperplane ml-2"></i></button>
								</div>
			                </div>
			            </form>
			            <!-- /custom background -->

					</div>
				</div>
				<!-- /optional styles -->


				<!-- In horizontal forms -->
				<div class="mb-3 pt-2">
					<h6 class="mb-0 font-weight-semibold">
						In horizontal forms
					</h6>
					<span class="text-muted d-block">Styling and alignment options</span>
				</div>

				<div class="row">
					<div class="col-md-6">
		                
	                	<!-- Left buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left buttons</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-lg-10 ml-lg-auto">
											<button type="submit" class="btn btn-light legitRipple">Cancel</button>
											<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
										</div>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left buttons -->


		                <!-- Left and right buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left and right buttons</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-lg-10 ml-lg-auto">
											<div class="d-flex justify-content-between align-items-center">
												<button type="submit" class="btn btn-light legitRipple">Cancel</button>
												<button type="submit" class="btn bg-blue legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
											</div>
										</div>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left and right buttons -->

					</div>

					<div class="col-md-6">
		                
		                <!-- Right buttons -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Right buttons</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-lg-10 ml-lg-auto text-right">
											<button type="submit" class="btn btn-light legitRipple">Cancel</button>
											<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
										</div>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /right buttons -->


	                	<!-- Left and right buttons (reversed) -->
			            <div class="card">
							<div class="card-header header-elements-inline">
				                <h6 class="card-title">Left and right buttons (reversed)</h6>
								<div class="header-elements">
									<div class="list-icons">
				                		<a class="list-icons-item" data-action="collapse"></a>
				                		<a class="list-icons-item" data-action="reload"></a>
				                		<a class="list-icons-item" data-action="remove"></a>
				                	</div>
			                	</div>
							</div>

			                <div class="card-body">
			                	<form action="#">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-lg-10 ml-lg-auto">
											<div class="d-flex justify-content-between align-items-center">
												<button type="submit" class="btn bg-blue legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
												<button type="submit" class="btn btn-light legitRipple">Cancel</button>
											</div>
										</div>
									</div>
								</form>
							</div>
		                </div>
		                <!-- /left and right buttons (reversed) -->

					</div>
				</div>
				<!-- /in horizontal forms -->


				<!-- Optional button styles -->
				<div class="mb-3 pt-2">
					<h6 class="mb-0 font-weight-semibold">
						Optional button styles
					</h6>
					<span class="text-muted d-block">Action buttons placement and spacing</span>
				</div>

				<div class="row">
					<div class="col-md-6">

						<!-- Grey background, left button spacing -->
		                <form action="#">
				            <div class="card">
								<div class="card-header bg-white header-elements-inline">
					                <h6 class="card-title">Grey bg and left spacing</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-footer">
									<div class="row">
										<div class="col-lg-10 ml-lg-auto">
											<div class="d-flex justify-content-between align-items-center">
												<button type="submit" class="btn btn-light legitRipple">Cancel</button>
												<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
											</div>
										</div>
									</div>
								</div>

				                <div class="card-body">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>
								</div>

								<div class="card-footer">
									<div class="row">
										<div class="col-lg-10 ml-lg-auto">
											<div class="d-flex justify-content-between align-items-center">
												<button type="submit" class="btn btn-light legitRipple">Cancel</button>
												<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
											</div>
										</div>
									</div>
								</div>
			                </div>
			            </form>
			            <!-- /grey background, left button spacing -->


			            <!-- Grey background, no left button spacing -->
		                <form action="#">
				            <div class="card">
								<div class="card-header bg-white header-elements-inline">
					                <h6 class="card-title">Grey background</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-footer">
									<div class="d-flex justify-content-between align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</div>

				                <div class="card-body">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>
								</div>

								<div class="card-footer">
									<div class="d-flex justify-content-between align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</div>
			                </div>
			            </form>
			            <!-- /grey background, no left button spacing -->

					</div>

					<div class="col-md-6">

						<!-- White background, left button spacing -->
		                <form action="#">
				            <div class="card">
								<div class="card-header bg-white header-elements-inline">
					                <h6 class="card-title">White bg and left spacing</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-footer bg-white">
									<div class="row">
										<div class="col-lg-10 ml-lg-auto">
											<div class="d-flex justify-content-between align-items-center">
												<button type="submit" class="btn btn-light legitRipple">Cancel</button>
												<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
											</div>
										</div>
									</div>
								</div>

				                <div class="card-body">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>
								</div>

								<div class="card-footer bg-white">
									<div class="row">
										<div class="col-lg-10 ml-lg-auto">
											<div class="d-flex justify-content-between align-items-center">
												<button type="submit" class="btn btn-light legitRipple">Cancel</button>
												<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
											</div>
										</div>
									</div>
								</div>
			                </div>
			            </form>
			            <!-- /white background, left button spacing -->


			            <!-- White background, no left button spacing -->
		                <form action="#">
				            <div class="card">
								<div class="card-header bg-white header-elements-inline">
					                <h6 class="card-title">White background</h6>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-footer bg-white">
									<div class="d-flex justify-content-between align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</div>

				                <div class="card-body">
									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your name:</label>
										<div class="col-lg-10">
											<input type="text" class="form-control" placeholder="Eugene Kopyov">
										</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-2">Your password:</label>
										<div class="col-lg-10">
											<input type="password" class="form-control" placeholder="Your strong password">
										</div>
									</div>

									<div class="form-group row mb-0">
										<label class="col-form-label col-lg-2">Your message:</label>
										<div class="col-lg-10">
											<textarea rows="3" cols="3" class="form-control" placeholder="Enter your message here"></textarea>
										</div>
									</div>
								</div>

								<div class="card-footer bg-white">
									<div class="d-flex justify-content-between align-items-center">
										<button type="submit" class="btn btn-light legitRipple">Cancel</button>
										<button type="submit" class="btn bg-blue ml-3 legitRipple">Submit <i class="icon-paperplane ml-2"></i></button>
									</div>
								</div>
			                </div>
			            </form>
			            <!-- /white background, no left button spacing -->

					</div>
				</div>
				<!-- /optional button styles -->

			</div>
<script>
$('document').ready(function(){
	$('#btnsubmit').on('click', function(){
		alert('Test');
	});
});
</script>