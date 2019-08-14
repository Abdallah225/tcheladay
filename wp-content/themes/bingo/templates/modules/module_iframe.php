<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * bingo_ruby_post_iframe
 */
if ( ! function_exists( 'bingo_ruby_post_iframe' ) ) {
	function bingo_ruby_post_iframe( $options = array() ) {

		//setup post data if post ajax
		if ( ! empty( $options['post_id'] ) ) {
			global $post;
			$post = get_post( $options['post_id'] );
			setup_postdata( $post );
		}

		$str = '';
		$str .= '<div class="post-wrap post-iframe">';
		//render thumbnail
		$post_type = bingo_ruby_check_post_format();
		if ( 'video' == $post_type ) {
			$str .= '<div class="post-thumb-outer post-thumb-video-outer">';
			$str .= '<div class="post-thumb iframe-video">';
			$str .= bingo_ruby_iframe_video();
			$str .= '</div>';
			$str .= '</div>';
		} else {
			//render featured image
			$str .= '<div class="post-thumb-outer">';
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_370x250' );
			$str .= bingo_ruby_post_format( 'is-big-icon is-absolute is-top-format' );
            $str .= bingo_ruby_post_review_info('is-absolute is-big-review');
			$str .= '</div>';
		}

		$str .= '</div>';

		return $str;
	}
}
