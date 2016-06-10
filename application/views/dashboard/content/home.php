<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Welcome back <?= $this->session->userdata('logged_in')->username; ?></small>
		</h1>
		<ol class="breadcrumb">
			<li class="active"><i class="fa fa-home fa-fw"></i> Home</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div id="dashboard-header">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="small-box bg-aqua">
						<div class="inner">
							<h3>10</h3>
							<p>Materi</p>
						</div>
						<div class="icon">
							<i class="fa fa-file-text"></i>
						</div>
						<a href="#" class="small-box-footer">More info</a>
					</div>
				</div><!-- .col-* -->
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="small-box bg-green">
						<div class="inner">
							<h3>10</h3>
							<p>Latihan</p>
						</div>
						<div class="icon">
							<i class="fa fa-edit"></i>
						</div>
						<a href="#" class="small-box-footer">More info</a>
					</div>
				</div><!-- .col-* -->
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="small-box bg-orange">
						<div class="inner">
							<h3>10</h3>
							<p>Kategori</p>
						</div>
						<div class="icon">
							<i class="fa fa-tags"></i>
						</div>
						<a href="#" class="small-box-footer">More info</a>
					</div>
				</div><!-- .col-* -->
				<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
					<div class="small-box bg-red">
						<div class="inner">
							<h3>10</h3>
							<p>User</p>
						</div>
						<div class="icon">
							<i class="fa fa-users"></i>
						</div>
						<a href="#" class="small-box-footer">More info</a>
					</div>
				</div><!-- .col-* -->
			</div>
		</div>
	</section><!-- .content -->
</div><!-- .content-wrapper -->
