<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Buat Latihan Baru</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-mg-10 col-lg-10">
				<div id="form_latihan" class="form-horizontal" data-base="<?= base_url(); ?>">
					<div class="form-group">
						<label for="form_kategori" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Kategori</label>
						<div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
							<select id="form_kategori" class="form-control selectpicker" data-live-search="true" data-live-search-placeholder="Category Name">
								<option value="0">- Select Category -</option>
								<?php foreach ($kategori as $item) : ?>
								<option value="<?= $item->id; ?>"><?= $item->nama; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div id="kategori_loader" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 sr-only" style="padding: 5px;padding-left: 0;">
							<i class="fa fa-spinner fa-pulse"></i>
						</div>
					</div>
					<div class="form-group">
						<label for="form_materi" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Materi</label>
						<div class="col-xs-10 col-sm-8 col-md-8 col-lg-8">
							<select id="form_materi" class="form-control" data-live-search="true" data-live-search-placeholder="Materi Name" disabled></select>
						</div>
						<div id="num_soal" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 sr-only" style="padding: 5px;padding-left: 0;"><i class="fa fa-spinner fa-pulse"></i></div>
					</div>
					<div class="form-group">
						<label for="form_soal" class="col-sm-2 control-label">Soal Latihan</label>
						<div class="col-sm-8">
							<textarea id="form_soal" class="form-control" style="resize: none" placeholder="Soal Latihan" disabled required></textarea>
						</div>
					</div>
					<div id="save_soal_parent" class="form-group" style="text-align: center;">
						<div id="save_button">
							<div id="save_soal" class="btn btn-default no-radius"><i class="fa fa-save fa-fw"></i> Save</div>
						</div>
						<div id="save_loading" class="sr-only">
							<i class="fa fa-spinner fa-pulse"></i>
						</div>
					</div>
					<div id="form_jawaban" class="sr-only">
						<div class="form-group">
							<label class="col-sm-2 control-label">Jawaban ke-1</label>
							<div class="col-sm-8">
								<input class="jawaban form-control" type="text" placeholder="Jawaban ke-1" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jawaban ke-2</label>
							<div class="col-sm-8">
								<input class="jawaban form-control" type="text" placeholder="Jawaban ke-2" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jawaban ke-3</label>
							<div class="col-sm-8">
								<input class="jawaban form-control" type="text" placeholder="Jawaban ke-3" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Jawaban ke-4</label>
							<div class="col-sm-8">
								<input class="jawaban form-control" type="text" placeholder="Jawaban ke-4" required/>
							</div>
						</div>
						<div id="save_jawaban_parent" class="form-group" style="text-align: center;">
							<div id="save_jawaban_button">
								<div id="save_jawaban_soal" class="btn btn-default no-radius"><i class="fa fa-save fa-fw"></i> Save</div>
							</div>
							<div id="save_jawaban_loading" class="sr-only">
								<i class="fa fa-spinner fa-pulse"></i>
							</div>
						</div>
					</div><!-- #form-jawaban -->
					<div id="form_select_jawaban" class="sr-only">
						<div class="form-group">
							<label for="form_soal" class="col-sm-2 control-label">Jawaban Benar</label>
							<div class="col-sm-8">
								<select id="select_jawaban_benar" class="form-control" required></select>
							</div>
						</div>
						<div id="save_jawaban_benar_parent" class="form-group" style="text-align: center;">
							<div id="save_jawaban_benar_button">
								<div id="save_jawaban_benar" class="btn btn-default no-radius"><i class="fa fa-save fa-fw"></i> Save</div>
							</div>
							<div id="save_jawaban_benar_loading" class="sr-only">
								<i class="fa fa-spinner fa-pulse"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!-- .row -->
	</section>
</div><!-- .content-wrapper -->

<!-- Scripts for this page -->
<script src="<?= base_url('vendor/bootstrap-select-1.10.0/js/bootstrap-select.min.js') ?>"></script>
<script src="<?= base_url('assets/js/latihan-new.init.js') ?>"></script>
