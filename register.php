<? require_once 'top.php'; ?>

<div class="account-create-area">
				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<div class="area-title">
								<h3 class="title-group gfont-1">Create an Account</h3>
							</div>
						</div>
					</div>
					<div class="account-create">
						<form action="/register" id="register_form" class="form-horizontal" enctype="multipart/form-data" method="post">
							<div class="row">
								<div class="col-md-12">
									<div class="account-create-box">
										<h2 class="box-info">Personal Information</h2>
										<div class="row">
											<div class="col-sm-4 col-xs-12">
												<div class="single-create">
													<p>Username <sup>*</sup></p>
													<input class="form-control" name="username" placeholder="Username" type="text">
												</div>
											</div>
											<div class="col-sm-4 col-xs-12">
												<div class="single-create">
													<p>E-mail address <sup>*</sup></p>
													<input class="form-control" type="text" name="email" placeholder="E-mail">
												</div>
											</div>
											<div class="col-sm-4 col-xs-12">
												<div class="single-create">
													<p>Confirmation of the e-mail address <sup>*</sup></p>
													<input class="form-control" type="text" name="email_confirm" placeholder="E-mail">
												</div>
											</div>
										</div>
									</div>
									<div class="account-create-box">
										<h2 class="box-info">Login Information</h2>
										<div class="row">
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="single-create">
													<p>Password <sup>*</sup></p>
													<input class="form-control" name="password" placeholder="Password" type="password">
												</div>
											</div>
											<div class="col-md-4 col-sm-6 col-xs-12">
												<div class="single-create">
													<p>Confirm Password <sup>*</sup></p>
													<input class="form-control" name="password_confirm" placeholder="Password" type="password">
												</div>
											</div>
										</div>
									</div>
									<div class="submit-area">
										<p class="required text-right">* Required Fields</p>
										<button type="submit" class="btn btn-primary floatright">submit</button>
										<a href="/login" class="float-left"><span><i class="fa fa-angle-double-left"></i></span> Back</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

<br>

<? require_once 'bottom.php'; ?>