<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Buat Kategori Baru</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-mg-10 col-lg-10">
				<?= $this->session->flashdata('action_msg') ? $this->session->flashdata('action_msg') : null; ?>
				<div id="form_kategori" class="form-horizontal">
					<form method="POST" action="<?= base_url('DB_kategori/kategori_simpan'); ?>">
						<div class="new-main col-md-8">
							<div class="form-group">
								<label for="catname" class="control-label col-xs-12 col-md-4">Tambah Kategori</label>
								<div class="col-xs-12 col-md-8">
									<input type="text" id="catname" name="kategori" class="form-control" placeholder="Nama Kategori" required/>
								</div>
							</div>
							<div class="form-group" style="text-align: center;">
								<input type="submit" name="submit" class="btn btn-default no-radius" value="Tambah" />
							</div>
						</div>
					</form>
				</div>
			</div>
		</div><!-- .row -->
	</section>
</div><!-- .content-wrapper -->
