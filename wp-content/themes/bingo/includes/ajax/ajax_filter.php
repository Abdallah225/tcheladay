<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax filter block
 */
if ( ! function_exists( 'bingo_ruby_ajax_filter_data' ) ) {
	add_action( 'wp_ajax_nopriv_bingo_ruby_ajax_filter_data', 'bingo_ruby_ajax_filter_data' );
	add_action( 'wp_ajax_bingo_ruby_ajax_filter_data', 'bingo_ruby_ajax_filter_data' );

	function bingo_ruby_ajax_filter_data() {

		$param = array();

		//get and validate request data
		if ( ! empty( $_POST['data'] ) ) {
			$param = bingo_ruby_data_validate( $_POST['data'] );
		}

		//get post data
		$data_query = bingo_ruby_query::get_data( $param );

		$data_response            = array();
		$data_response['content'] = '';

		if ( ! empty( $data_query->max_num_pages ) ) {
			$data_response['block_page_max'] = $data_query->max_num_pages;
		}

		//get post data
		$data_response['content'] = bingo_ruby_ajax_data_content( $data_query, $param );

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}
