<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax search
 */
if ( ! function_exists( 'bingo_ruby_ajax_playlist_video' ) ) {
	add_action( 'wp_ajax_nopriv_bingo_ruby_ajax_playlist_video', 'bingo_ruby_ajax_playlist_video' );
	add_action( 'wp_ajax_bingo_ruby_ajax_playlist_video', 'bingo_ruby_ajax_playlist_video' );

	function bingo_ruby_ajax_playlist_video() {

		//get and validate request data
		$options = array();
		$str     = '';

		if ( ! empty( $_POST['post_id'] ) ) {
			$post_id = bingo_ruby_data_validate( $_POST['post_id'] );
		}

		if ( ! empty( $post_id ) ) {
			$options['post_id'] = $post_id;
			$str .= bingo_ruby_post_iframe($options);
		}

		wp_reset_postdata();

		die( json_encode( $str ) );
	}
}
