<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * bingo_ruby_post_popup_gallery (post popup gallery)
 */
if ( ! function_exists( 'bingo_ruby_post_popup_gallery' ) ) {
	function bingo_ruby_post_popup_gallery( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-popup-gallery is-light-text">';
		$str .= '<div class="col-left col-sm-7 col-xs-12">';
		//render gallery
		if ( 'gallery' == get_post_format() ) {
			$str .= '<div class="post-thumb-outer post-thumb-gallery-outer">';
			$str .= bingo_ruby_post_popup_thumbnail_gallery_slider();
			$str .= '</div>';
		} else {
			if ( has_post_thumbnail() ) {
				$str .= '<div class="post-thumb-outer post-thumb-featured-outer">';
				$str .= bingo_ruby_post_popup_thumbnail_image();
				$str .= bingo_ruby_post_format( 'post-format-wrap is-big-icon is-absolute' );
				$str .= '</div>';
			}
		}
		$str .= '</div><!--#is left col -->';

		$str .= '<div class="col-right col-sm-5 col-xs-12">';
		$str .= '<div class="post-header">';
		$str .= bingo_ruby_post_cat_info( 'is-relative' );
		$str .= bingo_ruby_post_title( 'is-size-2' );
		$str .= bingo_ruby_post_meta_info();
		if ( ! empty( $options['excerpt'] ) ) {
			$str .= bingo_ruby_post_excerpt( $options['excerpt'] );
		}
		if ( function_exists( 'bingo_ruby_plugin_info_share' ) ) {
			$str .= bingo_ruby_plugin_info_share( 'is-relative' );
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div><!--# right coll-->';
		$str .= '</article>';

		return $str;
	}
}

