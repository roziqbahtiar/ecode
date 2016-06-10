jQuery(function($) {
	$('#form_kategori').change(function() {
		$('#kategori_loader').removeClass('sr-only');
		$('#num_soal').addClass('sr-only');
		$('#form_materi').attr('disabled', true);
		$('#form_soal').attr('disabled', true);
		var cat_id = $(this).val();

		$.ajax({
			url: $('#form_latihan').attr('data-base') + "DB_latihan/ajax_materi",
			datatype: 'html',
			data: {id_kategori : cat_id, rule : 'materi'},
			method: 'POST',
			success: function(data) {
				var getDataMateri = $(data);
				$('#form_materi').html(getDataMateri);
				$('#kategori_loader').addClass('sr-only');
				$('#form_materi').removeAttr('disabled');
				$('#form_materi').selectpicker('refresh');
			}
		});
	});

	$('#form_materi').change(function() {
		$('#num_soal').removeClass('sr-only');
		var id_materi = $(this).val();
		$.ajax({
			url: $('#form_latihan').attr('data-base') + "DB_latihan/ajax_materi",
			datatype: 'html',
			data: {id_materi : id_materi, rule : 'num_soal'},
			method: 'POST',
			success: function(data) {
				$('#num_soal').html(data);
			}
		});
		$('#form_soal').removeAttr('disabled');
	});

	$('#save_soal').click(function() {
		var id_materi = $('#form_materi').val();
		var soal = $('#form_soal').val();

		if (soal == '') {
			alert("Soal latihan tidak boleh kosong!");
		} else {
			$(this).addClass('sr-only');
			$('#save_loading').removeClass('sr-only');

			$.ajax({
				url: $('#form_latihan').attr('data-base') + "DB_latihan/ajax_insert_latihan",
				datatype: 'json',
				data: {id_materi : id_materi, soal : soal},
				method: 'POST',
				success: function(data) {
					var get = JSON.parse(data);
					var info = get.info;
					var number = get.num_soal;
					var id_soal = get.id_soal;

					if (info == 'error') {
						alert('Gagal menyimpan soal latihan!');
					} else {
						$('#form_kategori').attr('disabled', true);
						$('#form_materi').attr('disabled', true);
						$('#form_soal').attr('disabled', true);
						$('#form_soal').attr('data-id-soal', id_soal);
						$('#save_soal_parent').addClass('sr-only');
						$('#form_jawaban').removeClass('sr-only');
						$('#num_soal').html('Q : ' + number);
					}

					$('#save_loading').addClass('sr-only');
				}
			});
		};
	});

	$('#save_jawaban_soal').click(function() {
		var DataJawaban = [];
		var ItemNull = false;
		var id_soal = $('#form_soal').attr('data-id-soal');
		$('.jawaban').each(function() {
			item = {};
			item ["id_soal"] = id_soal;
			item ["id_materi"] = $('#form_materi').val();
			item ["jawaban"] = $(this).val();
			DataJawaban.push(item);
			if ($(this).val() == '') {
				ItemNull = true;
			};
		});

		if (ItemNull) {
			alert("Jawaban tidak boleh kosong!");
		} else {
			var Jawaban = JSON.stringify(DataJawaban);
			$(this).addClass('sr-only');
			$('#save_jawaban_loading').removeClass('sr-only');
			
			$.ajax({
				url: $('#form_latihan').attr('data-base') + "DB_latihan/ajax_insert_jawaban",
				datatype: 'json',
				data: {id_soal : id_soal, jawaban : Jawaban},
				method: 'POST',
				success: function(data) {
					var get = JSON.parse(data);

					if (get.info == "error") {
						alert('Gagal menyimpan jawaban soal!');
					} else {
						$(get.jawaban).each(function(i, val) {
							$('#select_jawaban_benar').append('<option value="' + val.id_jawaban + '">' + val.jawaban + '</option>');
						});
						$('#form_jawaban').addClass('sr-only');
						$('#form_select_jawaban').removeClass('sr-only');
					}

					$('#save_jawaban_loading').addClass('sr-only');
				}
			});
		};
	});

	$('#save_jawaban_benar').click(function() {
		$(this).addClass('sr-only');
		$('#save_jawaban_benar_loading').removeClass('sr-only');
		var jawaban = $('#select_jawaban_benar').val();
		var id_soal = $('#form_soal').attr('data-id-soal');
		$.ajax({
			url: $('#form_latihan').attr('data-base') + "DB_latihan/ajax_insert_jawaban_soal",
			datatype: 'html',
			data: {id_soal : id_soal, jawaban : jawaban},
			method: 'POST',
			success: function(data) {
				var GetData = $(data);
				$('#select_jawaban_benar').attr('disabled', true);
				$('#save_jawaban_benar_loading').addClass('sr-only');
				$('#form_latihan').append(GetData);
			}
		});
	});
});
