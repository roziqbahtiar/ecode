jQuery(function($) {
	$('#data-materi').DataTable({
		lengthMenu: [
			[10, 25, 50, 100, -1],
			[10, 25, 50, 100, "All"]
			],
		order: [
			[0, 'asc']
			],
		columnDefs: [
			{type: "natural", targets: '_all'},
			{orderable: false, targets: 1 },
			{orderable: false, targets: 2 }
			]
	});
});
