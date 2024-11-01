jQuery(document).ready(function($) {

	VK.init({apiId:jQuery('meta[name="vkg_vk_app_id"]').attr('content'),onlyWidgets:true});

	// Next click
	$('#fancybox-img').live('click', function() {
		$.fancybox.next();
	});

	$('#vk-gallery a').hover(function() {
		$(this).children('img').animate({
			'opacity': 0.6
		}, 400);
	}, function() {
		$(this).children('img').animate({
			'opacity': 1
		}, 200);
	});

	// Fire fancybox
	$('#vk-gallery a[rel="group"]').fancybox({
		'autoDimensions': false,
		'width': 700,
		'transitionIn': 'elastic',
		'transitionOut': 'elastic',
		'speedIn': 300,
		'speedOut': 200,
		'overlayColor': '#000',
		'overlayOpacity': 0.7,
		'titlePosition': 'inside',
		'cyclic': true,
		'titleFormat': function(title, currentArray, currentIndex, currentOpts) {
			var page_id = $('#vk-gallery a:eq(' + currentIndex + ') span').text();
			return '<div id="vkg_vk_comments"></div><script type="text/javascript">VK.Widgets.Comments("vkg_vk_comments", {limit: 5, width: "", attach: false}, ' + page_id + ');</script>';
		},
		'onComplete': function() {
			$('#fancybox-wrap').animate({
				'top': $(window).scrollTop() + 'px'
			}, 100);
		}
	});

});