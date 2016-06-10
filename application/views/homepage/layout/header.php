<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>E-Code | Learn Your Programming Skill</title>

		<!-- Cascanding Stylesheet -->
		<link href="<?= base_url('vendor/bootstrap-3.3.6/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('vendor/font-awesome-4.5.0/css/font-awesome.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('vendor/animate-3.5.0/animate.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		
		<header>
			<nav class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?= base_url(); ?>">E-Code</a>
					</div>

					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li id="register_form" class="dropdown dropdown-fw">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Register</a>
								<div class="dropdown-menu drop-form no-radius" style="padding: 15px;">
									<form class="form-inline" action="<?= base_url('daftar'); ?>" method="POST">
										<div class="form-group">
											<label for="reg_username">Name</label>
											<input id="reg_username" name="username" type="text" class="form-control no-radius" placeholder="Username" required/>
										</div>
										<div class="form-group">
											<label for="reg_password">Password</label>
											<input id="reg_password" name="password" type="password" class="form-control no-radius" placeholder="Password" required/>
										</div>
										<div class="form-group">
											<label for="reg_password">Re-Password</label>
											<input id="reg_password" name="re_password" type="password" class="form-control no-radius" placeholder="Re-Password" required/>
										</div>
										<button type="submit" class="btn btn-success no-radius">Register</button>
									</form>
								</div>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Login</a>
								<div class="dropdown-menu drop-form" style="padding: 15px;">
									<form class="form" action="<?= base_url('login'); ?>" method="POST">
										<div class="form-group">
											<input name="username" type="text" class="form-control no-radius" placeholder="Username" required/>
										</div>
										<div class="form-group">
											<input name="password" type="password" class="form-control no-radius" placeholder="Password" required/>
										</div>
										<div class="pull-left">
											<div class="checkbox">
												<label>
													<input name="remember_me" type="checkbox" /> Remember
												</label>
											</div>
										</div>
										<div class="pull-right">
											<button type="submit" class="btn btn-primary no-radius">Login</button>
										</div>
									</form>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
