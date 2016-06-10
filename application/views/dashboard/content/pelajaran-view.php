<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">
		<div class="panel panel-default no-radius">
			<div class="panel-heading">
				<h2 class="panel-title"><?= $post->title; ?></h2>
			</div>
			<div class="panel-body">
				<?= $post->content; ?>
			</div>
			<div class="panel-footer clearfix">
				<div class="pull-left">
					<a href="<?= base_url('dashboard/pelajaran/' . $post->url_kategori); ?>" class="btn btn-default no-radius"><i class="fa fa-tag fa-fw"></i> <?= $post->kategori; ?></a>
				</div>
				<div class="pull-right">
					<a <?= ($score != null || $soal == null) ? null : "href=\"" . base_url('dashboard/lihat/soal/' . $post->url) . "\""; ?> class="btn btn-success no-radius" <?= ($score != null || $soal == null) ? "disabled" : null; ?>><i class="fa fa-edit fa-fw"></i> Latihan Soal</a>
				</div>
			</div>
		</div>
	</section>
</div>
