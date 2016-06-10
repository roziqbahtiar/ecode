<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Pelajaran <?= $cat->nama_kategori; ?></h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<?= $this->session->flashdata('action_msg') ? $this->session->flashdata('action_msg') : null; ?>
		<table id="data-materi" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
			<thead>
				<tr>
					<td>Title</td>
					<td>Score</td>
					<td>Action</td>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td>Title</td>
					<td>Score</td>
					<td>Action</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach ($posts as $post) : $score = $this->Crud->GetScoreUser($username, $post->id_materi)->result(); ?>
				<tr>
					<td><?= $post->title; ?></td>
					<td><?= $score ? $score[0]->score : "N/A"; ?></td>
					<td>
						<a class="btn btn-success no-radius" href="<?= base_url('dashboard/lihat/pelajaran/' . $post->url); ?>" title="Lihat Pelajaran"><i class="fa fa-eye fa-fw"></i></a>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</section>
</div>

<!-- Scripts for this page -->
<script src="<?= base_url('vendor/DataTables-1.10.11/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('vendor/DataTables-1.10.11/js/dataTables.bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('vendor/DataTables-1.10.11/js/natural.js'); ?>"></script>
<script src="<?= base_url('assets/js/pelajaran.init.js'); ?>"></script>
