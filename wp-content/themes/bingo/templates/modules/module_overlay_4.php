<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * bingo_ruby_post_overlay_4 (small overlay)
 */
if ( ! function_exists( 'bingo_ruby_post_overlay_4' ) ) {
	function bingo_ruby_post_overlay_4( $options = array() ) {
		$str = '';
        $str .= '<article class="post-wrap post-overlay-4">';

        $smooth_style = bingo_ruby_check_smooth_style();

        if ( has_post_thumbnail() ) {
            if ( empty( $smooth_style ) ) {
                $str .= '<div class="post-thumb-outer">';
            } else {
                $str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
            }
            $str .= bingo_ruby_post_thumb_overlay();
            $str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x370', 'is-bg-thumb');
            $str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
            $str .= bingo_ruby_post_review_info();
            $str .= '</div>';
        } else {
            $str .= '<div class="post-thumb-outer post-no-thumb"></div>';
        }

        $str .= '<div class="post-header-outer is-header-overlay is-absolute is-light-text">';
        $str .= '<div class="post-header">';
        $str .= bingo_ruby_post_title( 'is-size-5' );
        $str .= '</div><!--#post header-->';
        $str .= '</div>';

        $str .= '</article>';

		return $str;
	}
}

