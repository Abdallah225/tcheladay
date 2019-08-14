<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post list 1, standard list
 */
if ( ! function_exists( 'bingo_ruby_post_list_1' ) ) {
	function bingo_ruby_post_list_1( $options = array() ) {

		$classes = array();

		$classes[] = 'post-wrap post-list-1 clearfix';
		if ( ! has_post_thumbnail() ) {
			$classes[] = 'is-no-featured';
		}
		if ( ! empty( $options['block_style'] ) && 'dark' == $options['block_style'] ) {
			$classes[] = 'is-dark-post is-light-text';
		}
		if ( ! empty( $options['thumb_position'] ) ) {
			$classes[] = 'is-right-thumb';
		}

		$classes = implode( ' ', $classes );
		$str     = '';
		$str .= '<article class="' . esc_attr( $classes ) . '">';
		$str .= '<div class="post-list-inner">';
		if ( has_post_thumbnail() ) {
			$str .= '<div class="col-sm-6 col-left">';
			$smooth_style = bingo_ruby_check_smooth_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_365x330' );
			$str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
			$str .= bingo_ruby_post_review_info();
			$str .= '</div>';
			$str .= '</div>';
		}

		if ( has_post_thumbnail() ) {
			$str .= '<div class="col-sm-6 col-right">';
		} else {
			$str .= '<div class="col-right">';
		}
		$str .= '<div class="post-body">';
		$str .= '<div class="post-list-content">';
		$str .= bingo_ruby_post_cat_info();
		$str .= bingo_ruby_post_title( 'is-size-3' );
		$str .= bingo_ruby_post_meta_info();
		if ( has_post_thumbnail() ) {
			if ( ! empty( $options['excerpt'] ) ) {
				$str .= bingo_ruby_post_excerpt( $options['excerpt'] );
			}
		} else {
			$str .= bingo_ruby_post_excerpt( '90' );
		}
		$str .= '</div>';
		if ( function_exists( 'bingo_ruby_plugin_info_share' ) ) {
			$str .= bingo_ruby_plugin_info_share( 'is-relative' );
		}
		$str .= '</div>';

		$str .= '</div>';
		$str .= '</div>';
		$str .= '</article>';

		return $str;
	}
}

