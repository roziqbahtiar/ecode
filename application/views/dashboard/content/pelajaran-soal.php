<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">
		<div class="panel panel-default no-radius">
			<div class="panel-heading">
				<h2 class="panel-title"><?= $post->title; ?></h2>
			</div>
			<form action="<?= base_url('DB_pelajaran/hasil_jawaban') ?>" method="POST">
				<div class="panel-body">
					<ol style="list-style-type: decimal-leading-zero;">
						<?php if ($soal) : foreach ($soal as $item) : ?>
						<li>
							<p><?= $item['soal']->soal; ?></p>
							<ol style="list-style-type: lower-alpha;">
								<?php foreach ($item['pilihan'] as $pilihan) : ?>
								<li>
									<p>
										<input id="jawaban_<?= $pilihan->id_jawaban ?>" type="radio" name="jawaban[<?= $item['soal']->id_soal; ?>]" value="<?= $pilihan->id_jawaban ?>"/>
										<label for="jawaban_<?= $pilihan->id_jawaban; ?>" class="control-label"><?= $pilihan->jawaban; ?></label>
									</p>
								</li>
								<?php endforeach; ?>
							</ol>
						</li>
						<?php endforeach; endif; ?>
					</ol>
				</div>
				<div class="panel-footer clearfix">
					<div class="pull-left">
						<a href="<?= base_url('dashboard/lihat/pelajaran/' . $post->url); ?>" class="btn btn-default no-radius"><i class="fa fa-book fa-fw"></i> Lihat Materi</a>
					</div>
					<div class="pull-right">
						<input type="hidden" name="id_materi" value="<?= $post->id_materi; ?>" />
						<input type="hidden" name="nama_materi" value="<?= $post->title; ?>" />
						<input type="hidden" name="url_kategori" value="<?= $post->url_kategori; ?>" />
						<button type="submit" class="btn btn-success no-radius"><i class="fa fa-edit fa-fw"></i> Lihat Hasil</button>
					</div>
				</div>
			</form>
		</div>
	</section>
</div>
