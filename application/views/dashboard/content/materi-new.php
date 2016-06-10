<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Buat Materi Baru</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="row">
			<?= $this->session->flashdata('action_msg') ? $this->session->flashdata('action_msg') : null; ?>
			<form method="POST" action="<?= base_url('DB_materi/materi_insert'); ?>">
				<div class="new-main col-md-8">
					<div class="form-group">
						<label for="PostTitle">Post Title</label>
						<input id="PostTitle" class="form-control" type="text" name="post_title" value="" placeholder="Post Title" required />
					</div>
					<div class="form-group">
						<label for="PostContent">Post Content</label>
						<textarea id="PostContent" class="form-control form-editor" placeholder="Post Content" name="post_content"></textarea>
					</div>
				</div><!-- .new-main -->
				<div class="new-side col-md-4">
					<div class="panel panel-default no-radius">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-tag fa-fw"></i> Category</h3>
						</div>
						<div class="panel-body">
							<select class="form-control" name="post_category" required>
								<option value="">- Select Category -</option>
								<?php foreach ($kategori as $item) : ?>
								<option value="<?= $item->id; ?>"><?= $item->nama; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div><!-- .panel -->
					<div class="panel panel-default no-radius">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-bullhorn fa-fw"></i> Publish</h3>
						</div>
						<div class="panel-body">
							<div class="form-group">
								<div id="inp-time" class="input-group date">
									<input type="text" name="post_time" class="form-control" placeholder="Post Time" value="<?= date('H:i:s'); ?>">
									<span class="input-group-addon">
										<span class="fa fa-clock-o fa-fw"></span>
									</span>
								</div>
							</div>
							<div class="form-group">
								<div id="inp-date" class="input-group date">
									<input type="text" name="post_date" class="form-control" placeholder="Post Date" value="<?= date('d F Y'); ?>">
									<span class="input-group-addon">
										<span class="fa fa-calendar fa-fw"></span>
									</span>
								</div>
							</div>
						</div><!-- .panel-body -->
						<div class="panel-footer clearfix">
							<div class="pull-left">
								<button class="btn btn-default no-radius" name="post_status" type="submit" value="draft">
									<i class="fa fa-save fa-fw"></i> Draft
								</button>
							</div>
							<div class="pull-right">
								<button class="btn btn-success no-radius" name="post_status" type="submit" value="publish">
									<i class="fa fa-bullhorn fa-fw"></i> Publish
								</button>
							</div>
						</div>
					</div><!-- .panel -->
				</div><!-- .new-side -->
			</form>
		</div><!-- .row -->
	</section>
</div><!-- .content-wrapper -->

<!-- Scripts for this page -->
<script src="<?= base_url('vendor/tinymce-4.3.11/tinymce.min.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap-datetimepicker-4.17.37/js/moment.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap-datetimepicker-4.17.37/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/editor.init.js'); ?>"></script>
