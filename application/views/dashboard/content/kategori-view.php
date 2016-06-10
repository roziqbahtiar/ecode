<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><?= $post->title; ?></h1>
	</section>

	<!-- Main content -->
	<section class="content">
		<ul>
			<?php if ($soal) : foreach ($soal as $item) : ?>
			<li>
				<p><?= $item['soal']->soal; ?></p>
				<ul>
					<?php foreach ($item['pilihan'] as $pilihan) : ?>
					<li>
						<p><?= $pilihan->jawaban; ?></p>
					</li>
					<?php endforeach; ?>
				</ul>
			</li>
			<?php endforeach; endif; ?>
		</ul>
	</section>
</div><!-- .content-wrapper -->