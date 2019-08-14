<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 *
 * @return string
 * render related box 1
 */
if ( ! function_exists( 'bingo_ruby_related_listing_style_1' ) ) {
	function bingo_ruby_related_listing_style_1( $data_query ) {

		$options = array(
			'excerpt' => '20',
		);
		$str     = '';

		while ( $data_query->have_posts() ) {

			$data_query->the_post();

			$str .= '<div class="post-outer">';
			$str .= bingo_ruby_post_list_1( $options );
			$str .= '</div><!--#post outer-->';
		}

		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 *
 * @return string
 * render related box 2
 */
if ( ! function_exists( 'bingo_ruby_related_listing_style_2' ) ) {
	function bingo_ruby_related_listing_style_2( $data_query ) {

		$str     = '';
		$options = array(
			'excerpt' => '20',
		);
		while ( $data_query->have_posts() ) {

			$data_query->the_post();

			$str .= '<div class="post-outer col-sm-6 col-xs-12">';
			$str .= bingo_ruby_post_grid_1( $options );
			$str .= '</div><!--#post outer-->';
		}


		return $str;

	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 *
 * @return string
 * render related box 3
 */
if ( ! function_exists( 'bingo_ruby_related_listing_style_3' ) ) {
	function bingo_ruby_related_listing_style_3( $data_query ) {

		$str     = '';
		$options = array();
		while ( $data_query->have_posts() ) {

			$data_query->the_post();

			$str .= '<div class="post-outer col-sm-4 col-xs-12">';
			$str .= bingo_ruby_post_grid_m2( $options );
			$str .= '</div><!--#post outer-->';
		}


		return $str;

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 *
 * @return string
 * render related box 4
 */
if ( ! function_exists( 'bingo_ruby_related_listing_style_4' ) ) {
	function bingo_ruby_related_listing_style_4( $data_query ) {

		$str     = '';
		$options = array();
		while ( $data_query->have_posts() ) {

			$data_query->the_post();

			$str .= '<div class="post-outer col-sm-6 col-xs-12">';
			$str .= bingo_ruby_post_feat_4( $options );
			$str .= '</div><!--#post outer-->';
		}


		return $str;

	}
}