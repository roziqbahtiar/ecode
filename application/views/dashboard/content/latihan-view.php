<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content">
		<div class="panel panel-default no-radius">
			<div class="panel-heading">
				<h2 class="panel-title"><?= $post->title; ?></h2>
			</div>
			<div class="panel-body">
				<ol style="list-style-type: decimal-leading-zero;">
					<?php if ($soal) : foreach ($soal as $item) : ?>
					<li>
						<p><?= $item['soal']->soal; ?></p>
						<ol style="list-style-type: lower-alpha;">
							<?php foreach ($item['pilihan'] as $pilihan) : ?>
							<li>
								<p class="<?= ($item['soal']->id_jawaban == $pilihan->id_jawaban) ? "has-success" : null; ?>">
									<input id="jawaban_<?= $pilihan->id_jawaban ?>" type="checkbox" name="jawaban[<?= $item['soal']->id_soal; ?>]" value="<?= $pilihan->id_jawaban ?>" <?= ($item['soal']->id_jawaban == $pilihan->id_jawaban) ? "checked" : null; ?> disabled/>
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
					<a href="<?= base_url('dashboard/latihan'); ?>" class="btn btn-default no-radius"><i class="fa fa-angle-double-left fa-fw"></i> Semua Latihan</a>
				</div>
			</div>
		</div>
	</section>
</div><!-- .content-wrapper -->
