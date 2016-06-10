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
		<link href="<?= base_url('vendor/AdminLTE-2.3.0/css/AdminLTE.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('vendor/AdminLTE-2.3.0/css/skins/skin-green.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('vendor/bootstrap-datetimepicker-4.17.37/css/bootstrap-datetimepicker.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('vendor/DataTables-1.10.11/css/dataTables.bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('vendor/bootstrap-select-1.10.0/css/bootstrap-select.min.css'); ?>" rel="stylesheet">
		<link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
		<script src="<?= base_url('assets/js/jQuery-2.1.4.min.js'); ?>"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="hold-transition skin-green sidebar-mini">
		<div class="wrapper">
			
			<header class="main-header">
				
				<!-- Logo Start -->
				<a href="<?= base_url('dashboard'); ?>" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>E</b>CD</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>E-</b>Code</span>
				</a>
				
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>

					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- User Account -->
							<li class="dropdown user user-menu">
								<?php $uimg = ($user->pict) ? base_url('assets/picture/' . $user->pict) : base_url('assets/img/avatar.png'); ?>
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?= $uimg; ?>" class="user-image" alt="User Image">
									<span class="hidden-xs"><?= $user->nick; ?></span>
								</a>
								<ul class="dropdown-menu">
									<!-- User image -->
									<li class="user-header">
										<img src="<?= $uimg; ?>" class="img-circle" alt="User Image">
										<p>
											<?= $user->nick; ?>
											<small>Member since <?= date('M. Y', strtotime($user->regdate)); ?></small>
										</p>
									</li>

									<!-- Menu Footer-->
									<li class="user-footer">
										<div class="pull-left">
											<a href="<?= base_url('dashboard/profil'); ?>" class="btn btn-default btn-flat">Profile</a>
										</div>
										<div class="pull-right">
											<a href="<?= base_url('logout'); ?>" class="btn btn-default btn-flat">Logout</a>
										</div>
									</li>
								</ul>
							</li><!-- .user-menu -->
						</ul><!-- .navbar-nav -->
					</div><!-- .navbar-custom-menu -->
				</nav><!-- .navbar -->
			</header>

			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar -->
				<section class="sidebar">

					<!-- sidebar menu -->
					<ul class="sidebar-menu">
						<li class="header">MAIN NAVIGATION</li>
						<?php if ($menu) : foreach ($menu as $item) : ?>
						<li <?= $item->have_child ? "class=\"treeview\"" : null; ?>>
							<a href="<?= ($item->url != '#') ? base_url($item->url) : '#'; ?>">
								<i class="fa fa-<?= $item->icon; ?> fa-fw"></i> <span><?= $item->name; ?></span> <?= $item->have_child ? "<i class=\"fa fa-angle-left pull-right\"></i>" : null; ?>
							</a>
							<?php if ($item->have_child) : ?>
							<ul class="treeview-menu">
								<?php foreach ($this->Crud->GetChildMenu($item->id_menu)->result() as $child) : ?>
								<li>
									<a href="<?= ($child->url != '#') ? base_url($child->url) : '#'; ?>">
										<i class="fa fa-<?= $child->icon; ?> fa-fw"></i> <?= $child->name; ?>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
							<?php endif; ?>
						</li>
						<?php endforeach; endif; ?>
					</ul><!-- .sidebar-menu -->
				</section><!-- .sidebar-->
			</aside><!-- .main-sidebar -->
