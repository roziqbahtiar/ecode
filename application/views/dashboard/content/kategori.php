<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Kategori</h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<table id="data-materi" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>Category</td>
					<td>Action</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td>Category</td>
					<td>Action</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($data_kategori as $kategori) : ?>
				<tr>
					<td><?= $kategori->nama; ?></td>
					<td>
						<?php if ($user_lv == '1') : ?>
						<a class="btn btn-danger no-radius" title="Delete Kategori" data-toggle="modal" data-target="#modal-delete-kategori" data-id-kategori="<?= $kategori->id; ?>"><i class="fa fa-trash fa-fw"></i></a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>

<!-- Modal Deleting -->
<div id="modal-delete-kategori" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-base="<?= base_url(); ?>">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Hapus Kategori</h4>
			</div>
			<div class="modal-body">
				Anda yakin akan menghapus Kategori?
			</div>
			<div class="modal-footer">
				<div id="modal_button">
					<button type="button" class="btn btn-success no-radius" data-dismiss="modal">Tidak</button>
					<button id="delete_kategori" data-id-kategori="" type="button" class="btn btn-danger no-radius">Hapus</button>
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
<script>
jQuery(function($) {
	$('#data-materi').DataTable();

	$('#modal-delete-kategori').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var id_kategori = button.data('id-kategori');
		var modal = $(this);
		modal.find('#delete_kategori').attr('data-id-kategori', id_kategori);
	});

	$('#modal-delete-kategori').on('hide.bs.modal', function (event) {
		var modal = $(this);
		modal.find('#delete_kategori').attr('data-id-kategori', '');
	});

	$('#delete_kategori').click(function() {
		var id_kategori = $(this).attr('data-id-kategori');
		var base = $('#modal-delete-kategori').attr('data-base');
		$('#modal_button').addClass('sr-only');
		$('#modal_loading').removeClass('sr-only');

		$.ajax({
			url: base + 'DB_kategori/kategori_delete',
			datatype: 'json',
			data: {id_kategori: id_kategori},
			method: 'POST',
			success: function(data) {
				$('#modal-delete-kategori').modal('hide');
				alert("Berhasil Menghapus kategori");
				window.location = base + 'dashboard/kategori';
			}
		});
	});

});
</script>
