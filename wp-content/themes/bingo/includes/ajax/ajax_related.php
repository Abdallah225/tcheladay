<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax filter block
 */
if ( ! function_exists( 'bingo_ruby_related_data' ) ) {
	add_action( 'wp_ajax_nopriv_bingo_ruby_related_data', 'bingo_ruby_related_data' );
	add_action( 'wp_ajax_bingo_ruby_related_data', 'bingo_ruby_related_data' );

	function bingo_ruby_related_data() {

		$param         = array();
		$data_response = array();

		//get and validate request data
		if ( ! empty( $_POST['data'] ) ) {
			$param = bingo_ruby_data_validate( $_POST['data'] );
		}

		if ( empty( $param['related_page_next'] ) || empty( $param['related_style'] ) || empty( $param['related_post_id'] ) ) {
			die( json_encode( 0 ) );
		}

		$style   = $param['related_style'];
        $post_id = $param['related_post_id'];
		$paged   = $param['related_page_next'];

        $data_query = bingo_ruby_related_get( $post_id, $paged );

		switch ( $style ) {
			case '1' :
				$data_response['content'] = bingo_ruby_related_listing_style_1( $data_query );
				break;
			case '2' :
				$data_response['content'] = bingo_ruby_related_listing_style_2( $data_query );
				break;
			case '3' :
				$data_response['content'] = bingo_ruby_related_listing_style_3( $data_query );
				break;
			case '4' :
				$data_response['content'] = bingo_ruby_related_listing_style_4( $data_query );
				break;
		}
		$data_response['related_page_current'] = $paged + 1;

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}
