<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * bingo_ruby_post_gallery_1 ( gallery big thumbnail )
 */
if ( ! function_exists( 'bingo_ruby_post_gallery_1' ) ) {
	function bingo_ruby_post_gallery_1( $options = array() ) {

		$str = '';
		$str .= '<div data-post_gallery_index="' . $options['post_index'] . '" class="post-wrap post-gallery post-gallery-1" data-effect="mpf-ruby-effect" data-mfp-src="#block-gallery-' . $options['block_id'] . '">';
		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
			$str .= '<div class="post-thumb-outer">';
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x370', 'is-bg-thumb' );
			$str .= '</div>';
		}
		$str .= '</div><!--#post header-->';
		$str .= '</div>';

		return $str;
	}
}


