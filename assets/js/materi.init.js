jQuery(function($) {
	$('#data-materi').DataTable({
		lengthMenu: [
			[5, 10, 25, 50, 100, -1],
			[5, 10, 25, 50, 100, "All"]
			],
		order: [
			[3, 'desc']
			],
		columnDefs: [
			{type: "natural", targets: '_all'},
			{orderable: false, targets: 4 },
			{orderable: false, targets: 5 }
			]
	});

	$('#modal-delete-materi').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
		var id_materi = button.data('id-materi');
		var modal = $(this);
		modal.find('#delete_materi').attr('data-id-materi', id_materi);
	});

	$('#delete_materi').click(function() {
		var id_materi = $(this).attr('data-id-materi');
		var base = $('#modal-delete-materi').attr('data-base');
		$('#modal_button').addClass('sr-only');
		$('#modal_loading').removeClass('sr-only');

		$.ajax({
			url: base + 'DB_materi/materi_delete',
			datatype: 'json',
			data: {id_materi: id_materi},
			method: 'POST',
			success: function(data) {
				$('#modal-delete-materi').modal('hide');
				alert("Berhasil Menghapus Materi");
				window.location = base + 'dashboard/materi';
			}
		});
	});
});
