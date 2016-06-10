jQuery(function($) {
	tinymce.init({
		selector: '.form-editor',
		menubar: false,
		toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
		plugins: 'advlist autolink link image code',
		height: 300,
		resize: false
		});
	$('#inp-time').datetimepicker({
		format: 'HH:mm:ss'
	});
	$('#inp-date').datetimepicker({
		format: 'DD MMMM YYYY'
	});
});
