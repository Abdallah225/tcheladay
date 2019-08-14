<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render module rectangle big
 */
if ( ! function_exists( 'bingo_ruby_post_overlay_1' ) ) {
	function bingo_ruby_post_overlay_1( $option = array() ) {
		$str = '';
		$str .= '<article class="post-wrap post-overlay-1">';
        $smooth_style = bingo_ruby_check_smooth_style();

		if ( has_post_thumbnail() ) {
            if ( empty( $smooth_style ) ) {
                $str .= '<div class="post-thumb-outer">';
            } else {
                $str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
            }
			$str .= bingo_ruby_post_thumb_overlay();
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x540', 'is-bg-thumb' );
			$str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
			$str .= bingo_ruby_post_review_info();
            $str .= '</div>';
		}else {
            $str .= '<div class="post-thumb-outer post-no-thumb"></div>';
        }

		$str .= '<div class="post-header-outer is-absolute is-header-overlay is-light-text">';
		$str .= '<div class="post-header">';
		$str .= bingo_ruby_post_cat_info( 'is-light-text' );
		$str .= bingo_ruby_post_title( 'is-size-3' );
		$str .= bingo_ruby_post_meta_info();
		$str .= '</div><!--#post header-->';
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}

