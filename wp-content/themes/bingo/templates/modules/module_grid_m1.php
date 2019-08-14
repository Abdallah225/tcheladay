<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * bingo_ruby_post_grid_m1 ( only thumbnail )
 */
if ( ! function_exists( 'bingo_ruby_post_grid_m1' ) ) {
	function bingo_ruby_post_grid_m1( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-grid-m1">';

		$str .= '<div class="post-header">';
		//render thumbnail
		if ( has_post_thumbnail() ) {
            $smooth_style = bingo_ruby_check_smooth_style();
            if ( empty( $smooth_style ) ) {
                $str .= '<div class="post-thumb-outer">';
            } else {
                $str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
            }
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x370' );
			$str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
			$str .= '</div>';
		}
		$str .= '</div><!--#post header-->';

		$str .= '<div class="post-body">';
		$str .= bingo_ruby_post_title( 'is-size-6' );
		$str .= '</div><!--#post body-->';

		$str .= '</article>';

		return $str;
	}
}


