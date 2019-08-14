<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * ajax search
 */
if ( ! function_exists( 'bingo_ruby_ajax_search' ) ) {
	add_action( 'wp_ajax_nopriv_bingo_ruby_ajax_search', 'bingo_ruby_ajax_search' );
	add_action( 'wp_ajax_bingo_ruby_ajax_search', 'bingo_ruby_ajax_search' );

	function bingo_ruby_ajax_search() {


		//get and validate request data
		$param_search = '';
		$str          = '';

		if ( ! empty( $_POST['s'] ) ) {
			$param_search = bingo_ruby_data_validate( $_POST['s'] );
		}

		$param = array(
			's'           => $param_search,
			'post_type'   => array( 'post' ),
			'post_status' => 'publish',
		);

		$data_query = new WP_Query( $param );

		$str .= '<div class="header-search-result-inner">';

		if ( $data_query->have_posts() ) {

			$counter = 1;

			while ( $data_query->have_posts() ) {
				$data_query->the_post();
				$str .= '<div class="post-outer col-xs-3">';
				$str .= bingo_ruby_post_feat_7();
				$str .= '</div>';

				if ( $counter > 7 ) {
					$str .= '<div class="clearfix"></div>';
					$str .= '<div class="header-search-more post-btn"><button type="submit">' . esc_html__( 'View all results', 'bingo' ) . '</button></div>';
					break;
				}
				$counter ++;
			}
		} else {
			$str = '<div class="header-search-not-found">' . esc_html__( 'No results for your search, please try another search.', 'bingo' ) . '</div>';
		}

		$str .= '</div>';

		wp_reset_postdata();

		die( json_encode( $str ) );
	}
}
