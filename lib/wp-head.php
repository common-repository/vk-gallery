<?php
	// Register stylesheets and scripts
	wp_register_style( 'vk-gallery-fancybox', vkg_plugin_url() . '/css/fancybox.css', false, vkg_get_version(), 'all' );
	wp_register_style( 'vk-gallery-style', vkg_plugin_url() . '/css/style.css', false, vkg_get_version(), 'all' );
	wp_register_style( 'vk-gallery-admin', vkg_plugin_url() . '/css/admin.css', false, vkg_get_version(), 'all' );
	wp_register_script( 'vk-gallery-fancybox', vkg_plugin_url() . '/js/fancybox.js', false, vkg_get_version(), false );
	wp_register_script( 'vk-gallery-easing', vkg_plugin_url() . '/js/easing.js', false, vkg_get_version(), false );
	wp_register_script( 'vk-gallery-openapi', 'http://userapi.com/js/api/openapi.js?32', false, vkg_get_version(), false );
	wp_register_script( 'vk-gallery-init', vkg_plugin_url() . '/js/init.js', false, vkg_get_version(), false );
	wp_register_script( 'vk-gallery-form', vkg_plugin_url() . '/js/form.js', false, vkg_get_version(), false );
	wp_register_script( 'vk-gallery-admin', vkg_plugin_url() . '/js/admin.js', false, vkg_get_version(), false );


	// Front-end scripts and styles
	if ( !is_admin() ) {
		wp_enqueue_style( 'vk-gallery-fancybox' );
		wp_enqueue_style( 'vk-gallery-style' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'vk-gallery-fancybox' );
		wp_enqueue_script( 'vk-gallery-easing' );
		wp_enqueue_script( 'vk-gallery-openapi' );
		wp_enqueue_script( 'vk-gallery-init' );
	}

	// Back-end scripts and styles
	elseif ( isset( $_GET['page'] ) && $_GET['page'] == 'vk-gallery' ) {
		wp_enqueue_style( 'vk-gallery-admin' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'vk-gallery-form' );
		wp_enqueue_script( 'vk-gallery-admin' );
	}

	function vkg_print_app_id() {
		?>
		<meta name="vkg_vk_app_id" content="<?php echo get_option( 'vkg_vk_app_id' ); ?>" />
		<?php
	}

	add_action( 'wp_head', 'vkg_print_app_id' );
?>