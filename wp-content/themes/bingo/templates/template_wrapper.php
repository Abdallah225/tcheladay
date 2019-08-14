<?php
/**
 * Class bingo_ruby_template_wrapper
 * This file render wrapper for page and single
 */

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 * @param string $sidebar_position
 * @param bool $disable_wrapper
 * open page wrap
 */
if ( ! function_exists( 'bingo_ruby_page_open' ) ) {
	function bingo_ruby_page_open( $class_name = '', $review = false ) {

		if ( false === $review ) {
			return '<article class="' . implode( ' ', get_post_class( esc_attr( $class_name ) ) ) . '" ' . bingo_ruby_schema::markup( 'article', false ) . '>';
		} else {
			return '<article class="' . implode( ' ', get_post_class( esc_attr( $class_name ) ) ) . '" ' . bingo_ruby_schema::markup( 'review', false ) . '>';
		}

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * close single post wrap
 */
if (!function_exists('bingo_ruby_page_close')) {
    function bingo_ruby_page_close()
    {
        return '</article><!--#single post-->';
    }
}

/**-------------------------------------------------------------------------------------------------------------------------
 * close page wrap
 */
if ( ! function_exists( 'bingo_ruby_page_content_close' ) ) {
	function bingo_ruby_page_content_close() {
		return '</div><!--#page-->';
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $class_name
 * @param string $sidebar_position
 * @param string $blog_layout
 * @param bool $big_first
 * open page inner
 */
if ( ! function_exists( 'bingo_ruby_page_open_inner' ) ) {
	function bingo_ruby_page_open_inner( $class_name = '', $sidebar_position = '', $disable_wrapper = false ) {

		//create wrap class
		$classes   = array();
		$classes[] = 'ruby-page-wrap ruby-section row';
		$classes[] = esc_attr( $class_name );
		$classes[] = 'is-sidebar-' . esc_attr( $sidebar_position );
		if ( false === $disable_wrapper ) {
			$classes[] = 'ruby-container';
		}
		$classes = implode( ' ', $classes );

		//render
		return '<div class="' . esc_attr( $classes ) . '">';

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render close single tag
 */
if ( ! function_exists( 'bingo_ruby_page_close_inner' ) ) {
	function bingo_ruby_page_close_inner() {
		return '</div><!--#page content-->';
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param      $name
 * @param bool $disable_markup
 * render sidebar
 */
if ( ! function_exists( 'bingo_ruby_page_sidebar' ) ) {
	function bingo_ruby_page_sidebar( $name, $disable_markup = false ) {

		$str = '';
		//sticky config
		$sticky = bingo_ruby_core::get_option( 'sticky_sidebar' );

		//markup
		if ( false === $disable_markup ) {
			$markup = bingo_ruby_schema::markup( 'sidebar', false );
		} else {
			$markup = '';
		}

		if ( ! empty( $sticky ) ) {
			$str .= '<aside class="sidebar-wrap col-sm-4 col-xs-12 clearfix" ' . $markup . '><div class="ruby-sidebar-sticky">';
			$str .= '<div class="sidebar-inner">';
			if ( is_active_sidebar( $name ) ) {
				ob_start();
				dynamic_sidebar( $name );
				$str .= ob_get_clean();
			}
			$str .= '</div>';
			$str .= '</div></aside>';
		} else {
			$str .= '<aside class="sidebar-wrap col-sm-4 col-xs-12 clearfix" ' . $markup . '>';
			$str .= '<div class="sidebar-inner">';
			if ( is_active_sidebar( $name ) ) {
				ob_start();
				dynamic_sidebar( $name );
				$str .= ob_get_clean();
			}
			$str .= '</div>';
			$str .= '</aside>';
		}

		return $str;
	}
}
