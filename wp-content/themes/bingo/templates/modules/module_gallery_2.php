<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * bingo_ruby_post_gallery_2 ( gallery small thumbnail )
 */
if ( ! function_exists( 'bingo_ruby_post_gallery_2' ) ) {
	function bingo_ruby_post_gallery_2( $options = array() ) {

		$str = '';
		$str .= '<div data-post_gallery_index="' . $options['post_index'] . '" class="post-wrap post-gallery post-gallery-2" data-effect="mpf-ruby-effect" data-mfp-src="#block-gallery-' . $options['block_id'] . '">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x540');
			$str .= bingo_ruby_post_format('post-format-wrap is-absolute is-top-format');
			$str .= '</div>';
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div>';

		return $str;
	}
}


