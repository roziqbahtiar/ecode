jQuery(function($) {
	$('#data-user').DataTable({
		lengthMenu: [
			[5, 10, 25, 50, 100, -1],
			[5, 10, 25, 50, 100, "All"]
			],
		order: [
			[3, 'desc'],
			[0, 'asc']
			],
		columnDefs: [
			{type: "natural", targets: '_all'},
			{orderable: false, targets: 4 }
			]
	});

	$('#modal-edit-user').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var username = button.data('username');
		var level = button.data('id-lv');
		var modal = $(this);
		modal.find('h4.modal-title').html('Edit Level ' + username);
		modal.find('option[value="' + level + '"]').prop({selected : true});
		modal.find('#edit_user').attr('data-username', username);
	});

	$('#edit_user').click(function() {
		var username = $(this).attr('data-username');
		var lv_selected = $('#level_id').val();
		var lv_name = $('#level_id option:selected').text();
		var base = $('#modal-edit-user').attr('data-base');
		$('#modal-edit-user #modal_button').addClass('sr-only');
		$('#modal-edit-user #modal_loading').removeClass('sr-only');

		$.ajax({
			url: base + 'DB_member/edit_lv',
			datatype: 'html',
			data: {username: username, new_lv : lv_selected},
			method: 'POST',
			success: function(data) {
				$('#modal-edit-user').modal('hide');
				alert("Berhasil merubah level " + username + " ke " + lv_name);
				window.location = base + 'dashboard/member';
			}
		});
	});

	$('#modal-delete-user').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var username = button.data('username');
		var modal = $(this);
		modal.find('h4.modal-title').html('Hapus ' + username);
		modal.find('.modal-body').html('Anda yakin akan menghapus ' + username + '?');
		modal.find('#delete_user').attr('data-username', username);
	});

	$('#delete_user').click(function() {
		var username = $(this).attr('data-username');
		var base = $('#modal-delete-user').attr('data-base');
		$('#modal-delete-user #modal_button').addClass('sr-only');
		$('#modal-delete-user #modal_loading').removeClass('sr-only');

		$.ajax({
			url: base + 'DB_member/delete_user',
			datatype: 'json',
			data: {username: username},
			method: 'POST',
			success: function(data) {
				$('#modal-delete-user').modal('hide');
				alert("Berhasil menghapus " + username);
				window.location = base + 'dashboard/member';
			}
		});
	});
});
