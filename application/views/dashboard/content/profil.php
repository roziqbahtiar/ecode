<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">
		<div class="profile-header">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="box box-widget widget-user">
						<div class="widget-user-header bg-black" style="background: url('<?= base_url('assets/img/photo1.png'); ?>') center center;">
							<h3 class="widget-user-username"><?= $user->fname . ' ' . $user->lname; ?></h3>
							<h5 class="widget-user-desc"><?= $user->email; ?></h5>
						</div>
						<div class="widget-user-image">
							<img class="img-circle" src="<?= base_url('assets/img/avatar.png'); ?>" alt="User Avatar">
						</div>
						<div class="box-footer">
							<div class="row">
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header"><?= $user->username; ?></h5>
										<span class="description-text">Username</span>
									</div>
								</div>
								<div class="col-sm-4 border-right">
									<div class="description-block">
										<h5 class="description-header"><?= $avr_score; ?></h5>
										<span class="description-text">Score</span>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="description-block">
										<h5 class="description-header"><?= $user->phone ? $user->phone : "-"; ?></h5>
										<span class="description-text">Phone</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- .content -->
</div><!-- .content-wrapper -->
