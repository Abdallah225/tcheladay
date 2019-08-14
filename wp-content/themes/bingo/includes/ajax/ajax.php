<?php

//include page ajax
$bingo_ruby_template_directory = get_template_directory();
require_once $bingo_ruby_template_directory . '/includes/ajax/ajax_search.php';
require_once $bingo_ruby_template_directory . '/includes/ajax/ajax_filter.php';
require_once $bingo_ruby_template_directory . '/includes/ajax/ajax_pagination.php';
require_once $bingo_ruby_template_directory . '/includes/ajax/ajax_playlist.php';

//single
require_once $bingo_ruby_template_directory . '/includes/ajax/ajax_related.php';

/**-------------------------------------------------------------------------------------------------------------------------
 * registering ajax action
 */
if ( ! function_exists( 'bingo_ruby_ajax_url' ) ) {
	function bingo_ruby_ajax_url() {
		echo '<script type="application/javascript">var bingo_ruby_ajax_url = "' . admin_url( 'admin-ajax.php' ) . '"</script>';
	}

	add_action( 'wp_enqueue_scripts', 'bingo_ruby_ajax_url' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * registering admin ajax action
 */
if ( ! function_exists( 'bingo_ruby_ajax_admin_url' ) ) {
	function bingo_ruby_ajax_admin_url() {
		echo '<script type="application/javascript">var bingo_ruby_ajax_admin_url = "' . admin_url( 'admin-ajax.php' ) . '"</script>';
	}

	add_action( 'admin_enqueue_scripts', 'bingo_ruby_ajax_admin_url' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $param
 *
 * @return array|string
 * validate input data
 */
if ( ! function_exists( 'bingo_ruby_data_validate' ) ) {
	function bingo_ruby_data_validate( $param ) {
		if ( is_array( $param ) ) {
			foreach ( $param as $key => $val ) {
				$key           = sanitize_text_field( $key );
				$param[ $key ] = sanitize_text_field( $val );
			}
		} elseif ( is_string( $param ) ) {
			$param = sanitize_text_field( $param );
		} else {
			$param = '';
		}

		return $param;
	}
}

if ( ! function_exists( 'bingo_ruby_ajax_data_content' ) ) {
	function bingo_ruby_ajax_data_content( $data_query, $param ) {

		if ( empty( $param['block_name'] ) ) {
			return false;
		}

		switch ( $param['block_name'] ) {

			//render mega category (without sub)
			case 'bingo_ruby_mega_block_cat' :
				return bingo_ruby_mega_block_cat::listing( $data_query, $param );
			case 'bingo_ruby_mega_block_cat_sub' :
				return bingo_ruby_mega_block_cat_sub::listing( $data_query, $param );

			//render block fullwidth
			case 'bingo_ruby_fw_block_g1' :
				return bingo_ruby_fw_block_g1::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_g2' :
				return bingo_ruby_fw_block_g2::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_g3' :
				return bingo_ruby_fw_block_g3::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_g4' :
				return bingo_ruby_fw_block_g4::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_t1' :
				return bingo_ruby_fw_block_t1::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_t2' :
				return bingo_ruby_fw_block_t2::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_t3' :
				return bingo_ruby_fw_block_t3::listing( $data_query, $param );
			case 'bingo_ruby_fw_block_t4' :
				return bingo_ruby_fw_block_t4::listing( $data_query, $param );

			//render block has sidebar
			case 'bingo_ruby_hs_block_1' :
				return bingo_ruby_hs_block_1::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_3' :
				return bingo_ruby_hs_block_3::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_4' :
				return bingo_ruby_hs_block_4::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_6' :
				return bingo_ruby_hs_block_6::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_8' :
				return bingo_ruby_hs_block_8::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_9' :
				return bingo_ruby_hs_block_9::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_11' :
				return bingo_ruby_hs_block_11::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_12' :
				return bingo_ruby_hs_block_12::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_14' :
				return bingo_ruby_hs_block_14::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_15' :
				return bingo_ruby_hs_block_15::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_16' :
				return bingo_ruby_hs_block_16::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_17' :
				return bingo_ruby_hs_block_17::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_18' :
				return bingo_ruby_hs_block_18::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_19' :
				return bingo_ruby_hs_block_19::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_20' :
				return bingo_ruby_hs_block_20::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_21' :
				return bingo_ruby_hs_block_21::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_22' :
				return bingo_ruby_hs_block_22::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_23' :
				return bingo_ruby_hs_block_23::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_24' :
				return bingo_ruby_hs_block_24::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_25' :
				return bingo_ruby_hs_block_25::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_26' :
				return bingo_ruby_hs_block_26::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_27' :
				return bingo_ruby_hs_block_27::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_28' :
				return bingo_ruby_hs_block_28::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_29' :
				return bingo_ruby_hs_block_29::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_30' :
				return bingo_ruby_hs_block_30::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_31' :
				return bingo_ruby_hs_block_31::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_32' :
				return bingo_ruby_hs_block_32::listing( $data_query, $param );
			case 'bingo_ruby_hs_block_33' :
				return bingo_ruby_hs_block_33::listing( $data_query, $param );
			default :
				return false;
		}
	}
}
