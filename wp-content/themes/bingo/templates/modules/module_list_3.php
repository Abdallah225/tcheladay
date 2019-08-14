<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post list 3, small list with thumbnail
 */
if ( ! function_exists( 'bingo_ruby_post_list_3' ) ) {
	function bingo_ruby_post_list_3( $options = array() ) {

		$classes   = array();
		$classes[] = 'post-wrap post-list-3 clearfix';

		if ( ! empty( $options['block_style'] ) && 'dark' == $options['block_style'] ) {
			$classes[] = 'is-light-text is-dark-post';
		}

		$classes = implode( ' ', $classes );

		$str = '';
		$str .= '<article class="' . esc_attr( $classes ) . '">';
		if ( has_post_thumbnail() ) {
            $smooth_style = bingo_ruby_check_smooth_style();
            if ( empty( $smooth_style ) ) {
                $str .= '<div class="post-thumb-outer">';
            } else {
                $str .= '<div class="post-thumb-outer ruby-animated-image ' . esc_attr( $smooth_style ) . '">';
            }
			$str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_110x85' );
			$str .= bingo_ruby_post_format( 'is-small-icon is-absolute' );
			$str .= '</div>';
		}
		$str .= '<div class="post-body">';
		$str .= bingo_ruby_post_title( 'is-size-5' );
        $str .= '<div class="post-meta-info post-meta-s">';
        $str .= bingo_ruby_meta_info_date( true );
		$str .= '</div>';
        $str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}

