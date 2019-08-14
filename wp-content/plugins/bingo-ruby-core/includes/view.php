<?php

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $post_id
 *
 * @return bool
 * add post view
 */
if ( ! function_exists( 'bingo_ruby_plugin_view_add' ) ) {
	function bingo_ruby_plugin_view_add( $post_id = null ) {

		global $post;

		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		//check
		if ( empty( $post_id ) ) {
			return false;
		}

		$total   = get_post_meta( $post_id, 'bingo_ruby_view_total', true );
		$forgery = get_post_meta( $post_id, 'bingo_ruby_post_forgery_view', true );

		if ( ! empty( $total ) ) {
			$total ++;
			update_post_meta( $post_id, 'bingo_ruby_view_total', $total );
		} else {
			//add real view
			update_post_meta( $post_id, 'bingo_ruby_view_total', 1 );
		}

		//set forgery
		$total_forgery = intval($total) + intval( $forgery );
		update_post_meta( $post_id, 'bingo_ruby_view_total_forgery', $total_forgery );

		return false;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $post_id
 *
 * @return bool
 * init save post
 */
if ( ! function_exists( 'bingo_ruby_plugin_view_init' ) ) {
	function bingo_ruby_plugin_view_init( $post_id ) {

		$total_forgery = get_post_meta( $post_id, 'bingo_ruby_view_total_forgery', true );
		$forgery       = get_post_meta( $post_id, 'bingo_ruby_post_forgery_view', true );

		if ( ! empty( $forgery ) && empty( $total_forgery ) ) {
			update_post_meta( $post_id, 'bingo_ruby_view_total_forgery', $forgery );
		}

		return false;
	}

	add_action( 'save_post', 'bingo_ruby_plugin_view_init' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param null $post_id
 *
 * @return int|mixed|string
 * get post view
 */
if ( ! function_exists( 'bingo_ruby_plugin_view_total' ) ) {
	function bingo_ruby_plugin_view_total( $post_id = null ) {

		global $post;

		//get view forgery
		if ( empty( $post_id ) ) {
			$post_id = get_the_ID();
		}

		$total = get_post_meta( $post_id, 'bingo_ruby_view_total_forgery', true );
		$total = bingo_ruby_core::show_over_100k( $total );

		return $total;
	}
}