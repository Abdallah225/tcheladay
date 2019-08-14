<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * home page ajax load more
 */
if ( ! function_exists( 'bingo_ruby_pagination_data' ) ) {
	add_action( 'wp_ajax_nopriv_bingo_ruby_pagination_data', 'bingo_ruby_pagination_data' );
	add_action( 'wp_ajax_bingo_ruby_pagination_data', 'bingo_ruby_pagination_data' );

	function bingo_ruby_pagination_data() {

		$param = array();

		//get and validate request data
		if ( ! empty( $_POST['data'] ) ) {
			$param = bingo_ruby_data_validate( $_POST['data'] );
		}

		if ( empty( $param['block_page_next'] ) ) {
			$param['block_page_next'] = 2;
		}

		//get post data
		$data_query = bingo_ruby_query::get_data( $param, intval( $param['block_page_next'] ) );

		$data_response = array();
		if ( ! empty( $data_query->max_num_pages ) ) {
			$data_response['block_page_max'] = $data_query->max_num_pages;
		}

		if ( ! empty( $data_query->paged ) ) {
			$data_response['block_page_current'] = $data_query->paged;
		} else {
			$data_response['block_page_current'] = $param['block_page_next'];
		}

		//get post data
		$data_response['content'] = bingo_ruby_ajax_data_content( $data_query, $param );

		wp_reset_postdata();

		die( json_encode( $data_response ) );
	}
}
