<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * render post list 2, small list with title
 */
if ( ! function_exists( 'bingo_ruby_post_list_m2' ) ) {
	function bingo_ruby_post_list_m2( $options = array() ) {

		$str = '';
		$str .= '<article class="post-wrap post-list-m2">';
		$str .= '<div class="post-body">';
		$str .= bingo_ruby_post_title( 'is-size-6' );
        $str .= '<div class="post-meta-info post-meta-s">';
        $str .= bingo_ruby_meta_info_date( true );
        $str .= '</div>';
		$str .= '</div><!--#post body-->';
		$str .= '</article>';

		return $str;
	}
}

