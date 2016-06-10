<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Materi</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<table id="data-materi" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>Title</td>
					<td>Author</td>
					<td>Category</td>
					<td>Date</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td>Title</td>
					<td>Author</td>
					<td>Category</td>
					<td>Date</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($data_post as $post) : ?>
				<tr>
					<td><?= $post->title; ?></td>
					<td><?= $post->author; ?></td>
					<td><?= $post->kategori; ?></td>
					<td><?= date('d-m-Y H:i', strtotime($post->datetime)); ?></td>
					<td><?= $post->status; ?></td>
					<td>
						<?php if ($username == $post->author || $user_lv == '1') : ?>
						<a class="btn btn-success no-radius" href="<?= base_url('dashboard/materi/edit/' . $post->url); ?>" title="Edit Post"><i class="fa fa-edit fa-fw"></i></a>
						<a class="btn btn-danger no-radius" title="Delete Post" data-toggle="modal" data-target="#modal-delete-materi" data-id-materi="<?= $post->id_materi; ?>"><i class="fa fa-trash fa-fw"></i></a>
						<?php endif; ?>
						<a class="btn btn-info no-radius" href="<?= base_url('dashboard/lihat/pelajaran/' . $post->url); ?>" title="View Post"><i class="fa fa-eye fa-fw"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>

<!-- Modal Deleting -->
<div id="modal-delete-materi" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-base="<?= base_url(); ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Materi</h4>
			</div>
			<div class="modal-body">
				Anda yakin akan menghapus materi?
			</div>
			<div class="modal-footer">
				<div id="modal_button">
					<button type="button" class="btn btn-success no-radius" data-dismiss="modal">Tidak</button>
					<button id="delete_materi" data-id-materi="" type="button" class="btn btn-danger no-radius">Hapus</button>
				</div>
				<div id="modal_loading" class="sr-only">
					<i class="fa fa-spinner fa-pulse"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Scripts for this page -->
<script src="<?= base_url('vendor/DataTables-1.10.11/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendor/DataTables-1.10.11/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('vendor/DataTables-1.10.11/js/natural.js'); ?>"></script>
<script src="<?= base_url('assets/js/materi.init.js'); ?>"></script>
