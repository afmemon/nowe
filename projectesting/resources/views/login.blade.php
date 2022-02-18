@include("admin/layouts/header")

@section("ourCss")
<style type="text/css">
	body{
		background-color: grey;
	}
</style>
@endsection

<div class="container">
	<div class="main-content">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<h1 class="text-center">
					<span class="red">
						No Orphan Without Education (NOWE) 
					</span>
				</h1>
				<div class="login-container">
					<div class="center">
						<h4 class="blue" id="id-company-text">&copy; Login Here</h4>
					</div>

					<div class="space-6"></div>
					

					<div class="position-relative">
						<div id="login-box" class="login-box visible widget-box no-border" >
							<div class="widget-body">
								<div class="widget-main"  style="padding:10%;">
									<h4 class="header blue lighter bigger">
										<i class="ace-icon fa fa-coffee green"></i>
										Please Enter Your Information
									</h4>

									<div class="space-6"></div>

									<form method="POST" action="{{ route('loginProcess') }}">
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="email"  name="email" class="form-control" placeholder="Write Your Email Here" required/>
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>
											@csrf
											<br/>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" name="password" class="form-control" placeholder="Write Your Password Here" required />
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>
											<br/>

											<div class="space"></div>

											<div class="clearfix">
												<label class="inline">
													<input type="checkbox" class="ace" />
													<span class="lbl"> Remember Me</span>
												</label>

												<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
													<i class="ace-icon fa fa-key"></i>
													<span class="bigger-110">Login</span>
												</button>
											</div>

											<div class="space-4"></div>
										</fieldset>
									</form>
									@if(session('message') && session('class'))
										<div class="alert alert-{{session('class')}}">
											<button type="button" class="close" data-dismiss="alert">
												<i class="ace-icon fa fa-times"></i>
											</button>
											<strong>
												Message : 
											</strong>
											{{session('message')}}
											<br />
										</div>
									@endif
								</div>

								<div class="toolbar clearfix">
									<div>
										<a href="#" data-target="#forgot-box" class="forgot-password-link">
											<i class="ace-icon fa fa-arrow-left"></i>
											I forgot my password
										</a>
									</div>

									<div>
										<a href="#" data-target="#signup-box" class="user-signup-link">
											I want to register
											<i class="ace-icon fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>

						{{-- <div id="forgot-box" class="forgot-box widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header red lighter bigger">
										<i class="ace-icon fa fa-key"></i>
										Retrieve Password
									</h4>

									<div class="space-6"></div>
									<p>
										Enter your email and to receive instructions
									</p>

									<form>
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="email" class="form-control" placeholder="Email" />
													<i class="ace-icon fa fa-envelope"></i>
												</span>
											</label>

											<div class="clearfix">
												<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
													<i class="ace-icon fa fa-lightbulb-o"></i>
													<span class="bigger-110">Send Me!</span>
												</button>
											</div>
										</fieldset>
									</form>
								</div><!-- /.widget-main -->

								<div class="toolbar center">
									<a href="#" data-target="#login-box" class="back-to-login-link">
										Back to login
										<i class="ace-icon fa fa-arrow-right"></i>
									</a>
								</div>
							</div>
						</div>

						<div id="signup-box" class="signup-box widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header green lighter bigger">
										<i class="ace-icon fa fa-users blue"></i>
										New User Registration
									</h4>

									<div class="space-6"></div>
									<p> Enter your details to begin: </p>

									<form>
										<fieldset>
											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="email" class="form-control" placeholder="Email" />
													<i class="ace-icon fa fa-envelope"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="text" class="form-control" placeholder="Username" />
													<i class="ace-icon fa fa-user"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" placeholder="Password" />
													<i class="ace-icon fa fa-lock"></i>
												</span>
											</label>

											<label class="block clearfix">
												<span class="block input-icon input-icon-right">
													<input type="password" class="form-control" placeholder="Repeat password" />
													<i class="ace-icon fa fa-retweet"></i>
												</span>
											</label>

											<label class="block">
												<input type="checkbox" class="ace" />
												<span class="lbl">
													I accept the
													<a href="#">User Agreement</a>
												</span>
											</label>

											<div class="space-24"></div>

											<div class="clearfix">
												<button type="reset" class="width-30 pull-left btn btn-sm">
													<i class="ace-icon fa fa-refresh"></i>
													<span class="bigger-110">Reset</span>
												</button>

												<button type="button" class="width-65 pull-right btn btn-sm btn-success">
													<span class="bigger-110">Register</span>

													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>
											</div>
										</fieldset>
									</form>
								</div>

								<div class="toolbar center">
									<a href="#" data-target="#login-box" class="back-to-login-link">
										<i class="ace-icon fa fa-arrow-left"></i>
										Back to login
									</a>
								</div>
							</div><!-- /.widget-body -->
						</div> --}}

					</div>

					{{-- <div class="navbar-fixed-top align-right">
						<br />
						&nbsp;
						<a id="btn-login-dark" href="#">Dark</a>
						&nbsp;
						<span class="blue">/</span>
						&nbsp;
						<a id="btn-login-blur" href="#">Blur</a>
						&nbsp;
						<span class="blue">/</span>
						&nbsp;
						<a id="btn-login-light" href="#">Light</a>
						&nbsp; &nbsp; &nbsp;
					</div> --}}

				</div>
			</div>
		</div>
	</div>
</div>
@include("admin/layouts/footer")