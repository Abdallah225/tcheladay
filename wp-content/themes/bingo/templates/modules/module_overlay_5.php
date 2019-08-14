<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * bingo_ruby_post_overlay_5 (overlay medium)
 */
if ( ! function_exists( 'bingo_ruby_post_overlay_5' ) ) {
	function bingo_ruby_post_overlay_5( $options = array() ) {
		$str = '';
		$str .= '<article class="post-wrap post-overlay-5">';

		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';
			$str .= bingo_ruby_post_thumb_overlay();
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x540', 'is-bg-thumb' );
			if ( function_exists( 'bingo_ruby_plugin_info_share' ) ) {
				$str .= bingo_ruby_plugin_info_share();
			}
			$str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
			$str .= bingo_ruby_post_review_info();
			$str .= '</div>';
		} else {
			$str .= '<div class="post-thumb-outer post-no-thumb"></div>';
		}

		$str .= '<div class="post-header-outer is-header-overlay is-absolute is-light-text">';
		$str .= '<div class="post-header">';
		$str .= bingo_ruby_post_cat_info();
		$str .= bingo_ruby_post_title( 'is-size-2' );
		$str .= bingo_ruby_post_meta_info();
		$str .= '</div><!--#post header-->';
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}

