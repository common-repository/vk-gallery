<?php

	/**
	 * Vk Gallery shortcode
	 */
	function vkg_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
				'thumb' => "100|150",
				'margin' => 10,
				'per_page' => 10
				), $atts ) );

		// Get post data
		global $post, $wp_rewrite;

		// Pagination
		$current_page = ( isset( $_GET['vkg-page'] ) ) ? intval( htmlspecialchars( $_GET['vkg-page'] ) ) : 1;
		$offset = ( $current_page > 1 ) ? ( $current_page * $per_page ) - $per_page : 0;
		$count_items = count( get_posts( 'post_type=attachment&numberposts=-1&post_parent=' . $post->ID ) );
		$total_pages = ceil( $count_items / $per_page );

		// If pages needed
		if ( $per_page < $count_items ) {
			// For permalinks like http://xxx/post-name/
			if ( $wp_rewrite->permalink_structure )
				$page_prefix = '?vkg-page=';

			// For permalinks like http://xxx/?p=1
			else
				$page_prefix = '&vkg-page=';

			$pagination = '<div id="vkg-pagination">';
			for ( $i = 0; $i < $total_pages; $i++ ) {
				if ( $i + 1 == $current_page )
					$pagination .= '<span class="current">' . ( $i + 1 ) . '</span>';
				else
					$pagination .= '<a href="' . get_permalink( $post->ID ) . $page_prefix . ( $i + 1 ) . '">' . ( $i + 1 ) . '</a>';
			}
			$pagination .= '</div>';
		}

		// No pagination
		else {
			$pagination = '';
		}

		// Set args to get attachmets
		$args = array(
			'post_type' => 'attachment',
			'offset' => $offset,
			'numberposts' => $per_page,
			'order' => 'ASC',
			'post_status' => null,
			'post_parent' => $post->ID
		);

		// Get attachments
		$attachments = get_posts( $args );

		// Set sizes
		$thumb_size = explode( '|', $thumb );
		$container_width = 600;
		$thumb_width = $thumb_size[0];
		$thumb_height = $thumb_size[1];

		// If post has attachments
		if ( $attachments ) {

			$return = '<div id="vk-gallery">';

			// Attachments loop
			foreach ( $attachments as $attachment ) {
				$title = apply_filters( 'the_title', $attachment->post_title );
				$image = wp_get_attachment_image_src( $attachment->ID, 'full', false );
				$return .= '<a href="' . vkg_plugin_url() . '/lib/timthumb.php?src=' . $image[0] . '&amp;w=' . $container_width . '&amp;q=100&amp;zc=0" title="' . $title . '" style="width:' . $thumb_width . 'px;height:' . $thumb_height . 'px;margin: 0 ' . $margin . 'px ' . $margin . 'px ' . '0" rel="group"><img src="' . vkg_plugin_url() . '/lib/timthumb.php?src=' . $image[0] . '&amp;w=' . $thumb_width . '&amp;h=' . $thumb_height . '&amp;q=100&amp;zc=3" width="' . $thumb_width . '" height="' . $thumb_height . '" style="width:' . $thumb_width . 'px;height:' . $thumb_height . 'px;" alt="' . $title . '" /><span>' . $attachment->ID . '</span></a>';
			}

			$return .= '<div class="vkg-clear"></div></div>';
			$return .= $pagination;
		}

		// No attachments
		else {
			$return = '<div id="vk-gallery">' . __( 'VK Gallery: images not found! Upload images via buttons above the visual editor.', 'vk-gallery' ) . '</div>';
		}

		return $return;
	}

	add_shortcode( 'vk_gallery', 'vkg_shortcode' );
?>