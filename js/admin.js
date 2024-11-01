jQuery(document).ready(function($) {

	// Tabs
	$('#vkg-wrapper .vkg-pane:first').show();
	$('#vkg-tabs a').click(function() {
		$('.vkg-message').hide();
		$('#vkg-tabs a').removeClass('vkg-current');
		$(this).addClass('vkg-current');
		$('#vkg-wrapper .vkg-pane').hide();
		$('#vkg-wrapper .vkg-pane').eq($(this).index()).show();
		gn_custom_editor.refresh();
	});

	// AJAX forms
	$('#vkg-form-save-settings').ajaxForm({
		beforeSubmit: function() {
			$('#vkg-form-save-settings .vkg-spin').show();
			$('#vkg-form-save-settings .vkg-submit').attr('disabled', 'disabled');
		},
		success: function() {
			$('#vkg-form-save-settings .vkg-spin').hide();
			$('#vkg-form-save-settings .vkg-submit').attr('disabled', '');
		}
	});
});