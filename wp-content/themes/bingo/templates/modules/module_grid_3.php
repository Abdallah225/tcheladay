<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $options
 *
 * @return string
 * render post grid 2
 */
if ( ! function_exists( 'bingo_ruby_post_grid_3' ) ) {
	function bingo_ruby_post_grid_3( $options = array() ) {

		$classes   = array();
		$classes[] = 'post-wrap post-grid-3';

		if ( ! empty( $options['block_style'] ) && 'dark' == $options['block_style'] ) {
			$classes[] = 'is-light-text is-dark-post';
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
            $str .= bingo_ruby_post_thumbnail( 'bingo_ruby_crop_540x370' );
            $str .= bingo_ruby_post_format( 'is-absolute is-top-format' );
            $str .= bingo_ruby_post_review_info();
            $str .= bingo_ruby_post_cat_info( 'is-absolute' );
			$str .= '</div>';
		}
		$str .= '</div>';

		$str .= '<div class="post-body">';
        $str .= bingo_ruby_post_title( 'is-size-3' );
        $str .= bingo_ruby_post_meta_info();
        if ( ! empty( $options['excerpt'] ) ) {
            $str .= bingo_ruby_post_excerpt( $options['excerpt'] );
        }
		$str .= '</div>';

		$str .= '</article>';

		return $str;
	}
}
