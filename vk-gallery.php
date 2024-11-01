<?php

	/*
	  Plugin Name: VK Gallery
	  Plugin URI: http://ilovecode.ru/
	  Version: 2.0.0
	  Author: Vladimir Anokhin
	  Author URI: http://ilovecode.ru/
	  Description: Gallery with VK comments
	  Text Domain: vk-gallery
	  Domain Path: /languages
	  License: GPL2
	 */

	// Make plugin available for translation
	load_plugin_textdomain( 'vk-gallery', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	// Admin page
	require_once( dirname( __FILE__ ) . '/lib/functions.php' );
	require_once( dirname( __FILE__ ) . '/lib/admin.php' );
	require_once( dirname( __FILE__ ) . '/lib/shortcode.php' );
	require_once( dirname( __FILE__ ) . '/lib/wp-head.php' );
?>