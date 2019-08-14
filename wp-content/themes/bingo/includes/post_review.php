<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return bool
 * check review
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_review' ) ) {
	function bingo_ruby_single_post_check_review() {

		//check
		$post_id       = get_the_ID();
		$total_score   = get_post_meta( $post_id, 'bingo_ruby_as', true );
		$enable_review = get_post_meta( $post_id, 'bingo_ruby_enable_review', true );
		if ( ( $total_score ) && ( $enable_review ) ) {
			return true;
		} else {
			return false;
		}
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string
 * check review position
 */
if ( ! function_exists( 'bingo_ruby_single_post_check_review_position' ) ) {
	function bingo_ruby_single_post_check_review_position() {
		$position = get_post_meta( get_the_ID(), 'bingo_ruby_review_box_position', true );
		if ( empty( $position ) || 'default' == $position ) {
			$position = bingo_ruby_core::get_option( 'default_single_review_box_position' );
		}

		return $position;
	}
}


