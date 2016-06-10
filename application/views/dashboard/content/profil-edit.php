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
		<?= $this->session->flashdata('action_msg') ? $this->session->flashdata('action_msg') : null; ?>
		<div id="edit-profil">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2 class="panel-title">Edit Profil</h2>
				</div>
				<form class="form-horizontal" method="POST" action="<?= base_url('DB_profil/save_profil'); ?>">
					<div class="panel-body">
						<div class="form-group col-xs-12 col-md-8">
							<label for="fname" class="control-label col-xs-12 col-md-4">First Name</label>
							<div class="col-xs-12 col-md-8">
								<input type="text" id="fname" class="form-control" name="fname" placeholder="First Name" value="<?= $user->fname; ?>" required/>
							</div>
						</div>
						<div class="form-group col-xs-12 col-md-8">
							<label for="lname" class="control-label col-xs-12 col-md-4">Last Name</label>
							<div class="col-xs-12 col-md-8">
								<input type="text" id="lname" class="form-control" name="lname" placeholder="Last Name" value="<?= $user->lname; ?>" required/>
							</div>
						</div>
						<div class="form-group col-xs-12 col-md-8">
							<label for="nick" class="control-label col-xs-12 col-md-4">Nick Name</label>
							<div class="col-xs-12 col-md-8">
								<input type="text" id="nick" class="form-control" name="nick" placeholder="Nick Name" value="<?= $user->nick; ?>" required/>
							</div>
						</div>
						<div class="form-group col-xs-12 col-md-8">
							<label for="email" class="control-label col-xs-12 col-md-4">Email</label>
							<div class="col-xs-12 col-md-8">
								<input type="email" id="email" class="form-control" name="email" placeholder="Email" value="<?= $user->email; ?>" required/>
							</div>
						</div>
						<div class="form-group col-xs-12 col-md-8">
							<label for="phone" class="control-label col-xs-12 col-md-4">Phone Number</label>
							<div class="col-xs-12 col-md-8">
								<input type="text" id="phone" class="form-control" name="phone" placeholder="Phone Number" value="<?= $user->phone; ?>" required/>
							</div>
						</div>
						<div class="form-group col-xs-12 col-md-8">
							<label for="dob" class="control-label col-xs-12 col-md-4">Date of Birth</label>
							<div class="col-xs-12 col-md-8">
								<input type="date" id="dob" class="form-control" name="dob" placeholder="Date of Birth" value="<?= ($user->dob == '0000-00-00') ? date('Y-d-m') : $user->dob; ?>" required/>
							</div>
						</div>
					</div>
					<div class="panel-footer clearfix">
						<div class="pull-left">
							<button type="reset" class="btn btn-danger no-radius">Reset</button>
						</div>
						<div class="pull-right">
							<button type="submit" class="btn btn-success no-radius">Simpan</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section><!-- .content -->
</div><!-- .content-wrapper -->
