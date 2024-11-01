<?php

	/**
	 * Register administration page
	 */
	function vkg_add_admin() {
		add_options_page( __( 'VK Gallery', 'vk-gallery' ), __( 'VK Gallery', 'vk-gallery' ), 'manage_options', 'vk-gallery', 'vkg_admin_page' );
	}

	/**
	 * Manage settings
	 */
	function vkg_manage_settings() {

		// Save main settings
		if ( isset( $_POST['save'] ) && $_GET['page'] == 'vk-gallery' ) {
			update_option( 'vkg_vk_app_id', $_POST['vkg_vk_app_id'] );
		}
	}

	add_action( 'admin_init', 'vkg_manage_settings' );

	/**
	 * Administration page
	 */
	function vkg_admin_page() {
		?>

		<!-- .wrap -->
		<div class="wrap">

			<div id="icon-options-general" class="icon32"><br /></div>
			<h2><?php _e( 'VK Gallery', 'vk-gallery' ); ?></h2>

			<!-- #vkg-wrapper -->
			<div id="vkg-wrapper">

				<div id="vkg-tabs">
					<a class="vkg-current"><span><?php _e( 'About', 'vk-gallery' ); ?></span></a>
					<a><span><?php _e( 'Settings', 'vk-gallery' ); ?></span></a>
					<a><span><?php _e( 'How to use', 'vk-gallery' ); ?></span></a>
				</div>
				<div class="vkg-pane">
					<p class="vkg-message vkg-message-error"><?php _e( 'For full functionality of this page it is recommended to enable JavaScript.', 'vk-gallery' ); ?> <a href="http://www.enable-javascript.com/" target="_blank"><?php _e( 'Instructions', 'vk-gallery' ); ?></a></p>
					<div class="vkg-onethird-column">
						<h3><?php _e( 'FREE Support', 'vk-gallery' ); ?></h3>
						<p><a href="http://wordpress.org/tags/vk-gallery?forum_id=10" target="_blank"><?php _e( 'Support forum', 'vk-gallery' ); ?></a></p>
						<p><a href="http://twitter.com/gn_themes" target="_blank"><?php _e( 'Twitter', 'vk-gallery' ); ?></a></p>
						<p><a href="http://ilovecode.ru/?p=335#commentform" target="_blank" style="color:red"><?php _e( 'Bug report', 'vk-gallery' ); ?></a></p>
					</div>

					<div class="vkg-twothird-column">
						<h3><?php _e( 'Do you love this plugin?', 'vk-gallery' ); ?></h3>
						<p><?php _e( 'Buy author a beer', 'vk-gallery' ); ?> - <a href="http://ilovecode.ru/donate/" target="_blank" style="color:red"><?php _e( 'Donate', 'vk-gallery' ); ?></a></p>
						<p><a href="http://wordpress.org/extend/plugins/vk-gallery/" target="_blank"><?php _e( 'Rate this plugin at wordpress.org', 'vk-gallery' ); ?></a> (<?php _e( '5 stars', 'vk-gallery' ); ?>)</p>
						<p><?php _e( 'Review this plugin in your blog', 'vk-gallery' ); ?></p>
						<p><iframe src="http://www.facebook.com/plugins/like.php?href=http://wordpress.org/extend/plugins/vk-gallery/&amp;layout=button_count&amp;show_faces=false&amp;width=130&amp;action=like&amp;colorscheme=light&amp;height=24" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:24px;" allowTransparency="true"></iframe></p>
					</div>

					<div class="vkg-clear"></div>
				</div>
				<div class="vkg-pane">
					<form action="" method="post" id="vkg-form-save-settings">
						<h4><?php _e( 'Vkontakte app_id' ) ?></h4>
						<p><input type="text" name="vkg_vk_app_id" value="<?php echo get_option( 'vkg_vk_app_id' ); ?>" id="" /></p>
						<input type="submit" value="<?php _e( 'Save settings', 'vk-gallery' ); ?>" class="button-primary vkg-submit" />
						<span class="vkg-spin"><img src="<?php echo vkg_plugin_url(); ?>/images/admin/spin.gif" alt="" /></span>
						<div class="vkg-clear"></div>
						<input type="hidden" name="save" value="true" />
					</form>
				</div>
				<div class="vkg-pane">
					<p>1. <?php _e( 'Go to', 'vk-gallery' ) ?> <a href="http://vkontakte.ru/editapp?act=create&site=1" target="_blank">vkontakte</a>.</p>
					<p>2. <?php _e( 'Create application and copy their app_ID', 'vk-gallery' ) ?>.</p>
					<p>3. <?php _e( 'Enter your app_id on settings tab and click "Save settings" button', 'vk-gallery' ) ?>.</p>
					<p>4. <?php _e( 'Create post or page and paste this shortcode', 'vk-gallery' ) ?> - <code>[vk_gallery]</code>.</p>
					<p>5. <?php _e( 'You can use this shortcode with next parameters', 'vk-gallery' ) ?> - <code>[vk_gallery thumb="100|150" margin="10" per_page="10"]</code>.</p>
				</div>
			</div>
			<!-- /#vkg-wrapper -->

		</div>
		<!-- /.wrap -->
		<?php
	}

	add_action( 'admin_menu', 'vkg_add_admin' );
?>