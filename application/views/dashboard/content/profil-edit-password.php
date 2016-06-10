<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Ubah Password</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<?php if ($this->session->flashdata('msg')) : ?>
			<div class="col-md-12">
				<div class="alert alert-<?= $this->session->flashdata('msg')->class; ?> alert-dismissible no-radius" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?= $this->session->flashdata('msg')->pesan; ?>
				</div>
			</div>
		<?php endif; ?>
		<form id="ubah-password" class="form-horizontal col-xs-12 col-md-8" method="POST" action="<?= base_url('DB_profil/save_password'); ?>" data-base="<?= base_url(); ?>">
			<div id="password_lama_parent" class="form-group">
				<label for="password-lama" class="control-label col-xs-12 col-md-4">Password Lama</label>
				<div class="col-xs-12 col-md-8">
					<input id="password-lama" class="form-control" type="password" name="password_lama" placeholder="Password Lama" required/>
					<span id="password_lama_icon" class="glyphicon form-control-feedback sr-only" aria-hidden="true"></span>
				</div>
			</div>
			<div class="form-group">
				<label for="password-baru" class="control-label col-xs-12 col-md-4">Password Baru</label>
				<div class="col-xs-12 col-md-8">
					<input id="password-baru" class="form-control" type="password" name="password_baru" placeholder="Password Baru" required/>
				</div>
			</div>
			<div id="password_baru_ulang_parent" class="form-group">
				<label for="password-baru-ulang" class="control-label col-xs-12 col-md-4">Ulangi Password Baru</label>
				<div class="col-xs-12 col-md-8">
					<input id="password-baru-ulang" class="form-control" type="password" name="password_baru_ulang" placeholder="Ulangi Password Baru" required/>
					<span id="password_baru_ulang_icon" class="glyphicon form-control-feedback sr-only" aria-hidden="true"></span>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-12 col-md-2 col-md-offset-10" style="text-align: right;">
					<button class="btn btn-success no-radius" type="sumbit">Simpan</button>
				</div>
			</div>
		</form>
	</section><!-- .content -->
</div><!-- .content-wrapper -->

<!-- Scripts for this page -->
<script src="<?= base_url('assets/js/profil-edit-password.init.js'); ?>"></script>
