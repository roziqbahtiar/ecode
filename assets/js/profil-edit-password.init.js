jQuery(function($) {
	$('#password-lama').keyup(function() {
		var val = $(this).val();
		$.ajax({
			url: $('#ubah-password').attr('data-base') + 'DB_profil/check_password',
			datatype: 'json',
			data: {password_lama : val},
			method: 'POST',
			success: function(data) {
				var get = JSON.parse(data);
				$('#password_lama_parent').removeClass().addClass('form-group ' + get.class + ' has-feedback');
				$('#password_lama_icon').removeClass().addClass('glyphicon form-control-feedback ' + get.icon);
			}
		});
	});

	$('#password-baru-ulang').keyup(function() {
		var val = $(this).val();
		var clas = '';
		var icon = '';

		if (val == $('#password-baru').val()) {
			clas = 'has-success';
			icon = 'glyphicon-ok';
		} else {
			clas = 'has-error';
			icon = 'glyphicon-remove';
		}

		$('#password_baru_ulang_parent').removeClass().addClass('form-group ' + clas + ' has-feedback');
		$('#password_baru_ulang_icon').removeClass().addClass('glyphicon form-control-feedback ' + icon);
	});
});
