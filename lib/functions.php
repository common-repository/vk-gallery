<?php

	/**
	 * Returns current plugin version.
	 *
	 * @return string Plugin version
	 */
	function vkg_get_version() {
		if ( !function_exists( 'get_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}
		$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
		$plugin_file = basename( ( __FILE__ ) );
		return $plugin_folder[$plugin_file]['Version'];
	}

	/**
	 * Returns current plugin url
	 *
	 * @return string Plugin url
	 */
	function vkg_plugin_url() {
		return str_replace( '/functions', '', plugins_url( basename( __FILE__, '.php' ), dirname( __FILE__ ) ) );
	}

	/**
	 * Hook to translate plugin info
	 */
	function vkg_add_locale_strings() {
		$strings = array(
			__( 'Vladimir Anokhin', 'vk-gallery' ),
			__( 'Gallery with VK comments', 'vk-gallery' )
		);
	}

?>