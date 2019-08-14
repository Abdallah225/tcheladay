<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|string
 * check single related ajax type
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_ajax' ) ) {
	function bingo_ruby_single_post_check_ajax() {
		$post_id                 = get_the_ID();
		$infinite_scroll_related = get_post_meta( $post_id, 'bingo_ruby_post_infinite_scroll_related', true );
		//check if setting none
		if ( 1 == $infinite_scroll_related ) {
			return 'scroll_related';
		} elseif ( 'none' == $infinite_scroll_related ) {
			return false;
		} else {
			$default_infinite_scroll_related = bingo_ruby_core::get_option( 'default_single_post_infinite_scroll_related' );
			if ( ! empty( $default_infinite_scroll_related ) ) {
				return 'scroll_related';
			} else {
				return false;
			}
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check single post layout
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_layout' ) ) {
	function bingo_ruby_single_post_check_layout() {
		$data_layout                 = array();
		$data_layout['format']       = '';
		$data_layout['layout']       = '';
		$data_layout['video_popup']  = '';
		$data_layout['gallery_type'] = '';
		$post_id                     = get_the_ID();
		$check_post_format           = bingo_ruby_check_post_format();

		switch ( $check_post_format ) {
			case 'thumbnail' :
				$data_layout['format'] = 'thumbnail';
				$data_layout['layout'] = bingo_ruby_single_post_check_layout_featured();
				break;
			case 'video' :
				$type = get_post_meta( $post_id, 'bingo_ruby_meta_style_video', true );
				if ( empty( $type ) || 'default' == $type ) {
					$type = bingo_ruby_core::get_option( 'single_post_style_video' );
				}
				if ( 2 == $type ) {
					$data_layout['format']      = 'thumbnail';
					$data_layout['layout']      = bingo_ruby_single_post_check_layout_featured();
					$data_layout['video_popup'] = true;
				} else {
					$data_layout['format'] = 'video';
					$data_layout['layout'] = get_post_meta( $post_id, 'bingo_ruby_meta_layout_video', true );
					if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
						$data_layout['layout'] = bingo_ruby_core::get_option( 'single_post_layout_video' );
					}
				}
				break;
			case 'audio' :
				$data_layout['format'] = 'audio';
				$data_layout['layout'] = get_post_meta( $post_id, 'bingo_ruby_meta_layout_audio', true );
				if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
					$data_layout['layout'] = bingo_ruby_core::get_option( 'single_post_layout_audio' );
				}
				break;
			case 'gallery' :
				$data_layout['format']       = 'gallery';
				$data_layout['gallery_type'] = get_post_meta( $post_id, 'bingo_ruby_post_gallery_type', true );
				if ( 'slider' == $data_layout['gallery_type'] ) {
					$data_layout['layout'] = get_post_meta( $post_id, 'bingo_ruby_meta_layout_gallery_slider', true );
					if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
						$data_layout['layout'] = bingo_ruby_core::get_option( 'single_post_layout_gallery_slider' );
					}
				} else {
					$data_layout['layout'] = get_post_meta( $post_id, 'bingo_ruby_meta_layout_gallery_grid', true );
					if ( empty( $data_layout['layout'] ) || 'default' == $data_layout['layout'] ) {
						$data_layout['layout'] = bingo_ruby_core::get_option( 'single_post_layout_gallery_grid' );
					}
				}
				break;
		}

		return $data_layout;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check single layout layout featured
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_layout_featured' ) ) {
	function bingo_ruby_single_post_check_layout_featured() {
		if ( is_single() ) {
			$layout = get_post_meta( get_the_ID(), 'bingo_ruby_post_layout', true );
		} else {
			$layout = get_post_meta( get_the_ID(), 'bingo_ruby_page_layout', true );
		}
		if ( empty( $layout ) || 'default' == $layout ) {
			if ( is_single() ) {
				$layout = bingo_ruby_core::get_option( 'default_single_post_layout' );
			} else {
				$layout = bingo_ruby_core::get_option( 'default_single_page_layout' );
			}
		}

		return $layout;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * get sidebar position setting
 */
if ( ! function_exists( 'bingo_ruby_single_check_sidebar_position' ) ) {
	function bingo_ruby_single_check_sidebar_position() {

		//sidebar position
		$sidebar_position = get_post_meta( get_the_ID(), 'bingo_ruby_sidebar_position', true );

		//override sidebar position
		if ( 'default' == $sidebar_position || empty( $sidebar_position ) ) {
			if ( is_single() ) {
				if ( is_sticky() ) {
					$sidebar_position = 'none';
				} else {
					$sidebar_position = bingo_ruby_core::get_option( 'default_single_post_sidebar_position' );
				}
			} else {
				$sidebar_position = bingo_ruby_core::get_option( 'default_single_page_sidebar_position' );
			}
			if ( 'default' == $sidebar_position ) {
				$sidebar_position = bingo_ruby_core::get_option( 'site_sidebar_position' );
			}
		}

		return $sidebar_position;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param bool $disable_makeup
 * render single sidebar
 */
if ( ! function_exists( 'bingo_ruby_single_check_sidebar_name' ) ) {
	function bingo_ruby_single_check_sidebar_name() {

		$all_sidebar = bingo_ruby_theme_config::sidebar_name( true );

		//single sidebar name
		$sidebar_name = get_post_meta( get_the_ID(), 'bingo_ruby_sidebar_name', true );

		if ( ! array_key_exists( strval($sidebar_name), $all_sidebar ) ) {
			$sidebar_name = 'bingo_ruby_default_from_theme_options';
		}

		if ( 'bingo_ruby_default_from_theme_options' == $sidebar_name || empty( $sidebar_name ) ) {
			if ( is_single() ) {
				$sidebar_name = bingo_ruby_core::get_option( 'default_single_post_sidebar' );
			} else {
				$sidebar_name = bingo_ruby_core::get_option( 'default_single_page_sidebar' );
			}

		}

		return $sidebar_name;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return $bingo_ruby_comment_box
 * check comment box
 */
if ( ! function_exists( 'bingo_ruby_check_comment_box' ) ) {
	function bingo_ruby_check_comment_box() {

		$bingo_ruby_comment_box = get_post_meta( get_the_ID(), 'bingo_ruby_single_comment_box', true );

		if ( 'default' == $bingo_ruby_comment_box || empty( $bingo_ruby_comment_box ) ) {
			if ( is_single() ) {
				$bingo_ruby_comment_box = bingo_ruby_core::get_option( 'default_single_post_box_comment' );
			} else {
				$bingo_ruby_comment_box = bingo_ruby_core::get_option( 'default_single_page_box_comment' );
			}
		} else {
			//set none
			if ( 2 == $bingo_ruby_comment_box ) {
				$bingo_ruby_comment_box = '';
			}
		}

		return $bingo_ruby_comment_box;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check author box position
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_author_position' ) ) {
	function bingo_ruby_single_post_check_author_position() {
		$position = get_post_meta( get_the_ID(), 'bingo_ruby_single_author_box_position', true );
		if ( empty( $position ) || 'default' == $position ) {
			$position = bingo_ruby_core::get_option( 'single_post_box_author_position' );
		}

		return $position;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check page title
 */
if ( ! function_exists( 'bingo_ruby_check_page_title' ) ) {
	function bingo_ruby_check_page_title() {

		if ( ! is_singular() ) {
			return false;
		}

		$page_title = get_post_meta( get_the_ID(), 'bingo_ruby_page_title', true );
		if ( 'default' == $page_title || empty( $page_title ) ) {
			$page_title = bingo_ruby_core::get_option( 'default_single_page_title' );
		}

		return $page_title;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool|int|string
 * check video autoplay
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_autoplay' ) ) {
	function bingo_ruby_single_post_check_autoplay() {
		$autoplay = get_post_meta( get_the_ID(), 'bingo_ruby_meta_post_video_autoplay', true );
		if ( empty( $autoplay ) || 'default' == $autoplay ) {
			return bingo_ruby_core::get_option( 'single_post_video_autoplay' );
		} else {
			if ( 1 == $autoplay ) {
				return 1;
			} else {
				return false;
			}
		}
	}
}