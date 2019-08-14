<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * bingo_ruby_post_list_m1 (small list)
 */
if ( ! function_exists( 'bingo_ruby_post_list_m1' ) ) {
	function bingo_ruby_post_list_m1( $options = array() ) {

		$classes      = array();
		$classes[]    = 'post-wrap post-list-m1';

		if ( ! empty( $options['block_style'] ) && 'dark' == $options['block_style'] ) {
			$classes[] = 'is-light-text is-dark-post';
		}

		$classes = implode( ' ', $classes );

		$str = '';
		$str .= '<article class="' . esc_attr( $classes ) . '">';
		$str .= '<div class="post-body">';
		$str .= bingo_ruby_post_title( 'is-size-5' );
        $str .= '<div class="post-meta-info post-meta-s">';
        $str .= bingo_ruby_meta_info_date( true );
        $str .= '</div>';
		$str .= '</div><!--#post body-->';
		$str .= '</article>';

		return $str;
	}
}

