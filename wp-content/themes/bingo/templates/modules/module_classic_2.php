<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * bingo_ruby_post_classic_2
 */
if ( ! function_exists( 'bingo_ruby_post_classic_2' ) ) {
	function bingo_ruby_post_classic_2( $options = array() ) {

		$classes   = array();
		$post_type    = bingo_ruby_check_post_format();
		$enable_popup = bingo_ruby_core::get_option( 'show_thumbnail_video_popup' );

		$classes[] = 'post-wrap post-classic-2';
		if ( ! empty( $options['block_style'] ) && 'dark' == $options['block_style'] ) {
			$classes[] = 'is-light-text is-dark-post';
		}

		if ( ! has_post_thumbnail() ) {
			$classes[] = 'is-no-featured';
		}

		if ( 'video' == $post_type && ! empty( $enable_popup ) ) {
			$classes[] = 'post-popup-video';
		}
		$classes = implode( ' ', $classes );

		$str = '';
		$str .= '<article class="' . esc_attr( $classes ) . '">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
			$smooth_style = bingo_ruby_check_smooth_style();
			if ( empty( $smooth_style ) ) {
				$str .= '<div class="post-thumb-outer">';
			} else {
				$str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
			}
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_750x450' );
			$str .= bingo_ruby_post_format( 'is-big-icon is-absolute is-top-format' );
			$str .= bingo_ruby_post_review_info( 'is-absolute is-big-review' );

			//video popup
			if ( 'video' == $post_type ) {
				$str .= bingo_ruby_post_thumbnail_video_popup();
			}
			$str .= '</div>';
		}
		$str .= '</div>';

		$str .= '<div class="post-body">';
		$str .= bingo_ruby_post_cat_info( 'is-relative is-dark-text' );
		$str .= bingo_ruby_post_title( 'is-size-2' );
		$str .= bingo_ruby_post_meta_info();
		//classic excerpt
		if ( ! empty( $options['excerpt_classic'] ) ) {
			$str .= bingo_ruby_post_excerpt( $options['excerpt_classic'] );
		}

		if ( function_exists( 'bingo_ruby_plugin_info_share' ) ) {
			$str .= bingo_ruby_plugin_info_share();
		}

		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}
