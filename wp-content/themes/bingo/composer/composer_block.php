<?php
if ( ! class_exists( 'ruby_composer_block' ) ) {
	class ruby_composer_block {
		static function render( $section, $block ) {
			if ( 'section_full_width' == $section ) {
				switch ( $block['block_name'] ) {

					//render full-width blocks
					case 'bingo_ruby_fw_block_1' : {
						return bingo_ruby_fw_block_1::render( $block );
					}
					case 'bingo_ruby_fw_block_2' : {
						return bingo_ruby_fw_block_2::render( $block );
					}
					case 'bingo_ruby_fw_block_3' : {
						return bingo_ruby_fw_block_3::render( $block );
					}
					case 'bingo_ruby_fw_block_4' : {
						return bingo_ruby_fw_block_4::render( $block );
					}
					case 'bingo_ruby_fw_block_5' : {
						return bingo_ruby_fw_block_5::render( $block );
					}
					case 'bingo_ruby_fw_block_6' : {
						return bingo_ruby_fw_block_6::render( $block );
					}
					case 'bingo_ruby_fw_block_7' : {
						return bingo_ruby_fw_block_7::render( $block );
					}
					case 'bingo_ruby_fw_block_g1' : {
						return bingo_ruby_fw_block_g1::render( $block );
					}
					case 'bingo_ruby_fw_block_g2' : {
						return bingo_ruby_fw_block_g2::render( $block );
					}
					case 'bingo_ruby_fw_block_g3' : {
						return bingo_ruby_fw_block_g3::render( $block );
					}
					case 'bingo_ruby_fw_block_g4' : {
						return bingo_ruby_fw_block_g4::render( $block );
					}
					case 'bingo_ruby_fw_block_g5' : {
						return bingo_ruby_fw_block_g5::render( $block );
					}
					case 'bingo_ruby_fw_block_g6' : {
						return bingo_ruby_fw_block_g6::render( $block );
					}
					case 'bingo_ruby_fw_block_v1' : {
						return bingo_ruby_fw_block_v1::render( $block );
					}
					case 'bingo_ruby_fw_block_v2' : {
						return bingo_ruby_fw_block_v2::render( $block );
					}
					case 'bingo_ruby_fw_block_t1' : {
						return bingo_ruby_fw_block_t1::render( $block );
					}
					case 'bingo_ruby_fw_block_t2' : {
						return bingo_ruby_fw_block_t2::render( $block );
					}
					case 'bingo_ruby_fw_block_t3' : {
						return bingo_ruby_fw_block_t3::render( $block );
					}
					case 'bingo_ruby_fw_block_t4' : {
						return bingo_ruby_fw_block_t4::render( $block );
					}
					case 'bingo_ruby_fw_block_html' : {
						return bingo_ruby_fw_block_html::render( $block );
					}
					case 'bingo_ruby_fw_block_advertising' : {
						return bingo_ruby_fw_block_advertising::render( $block );
					}
					case 'bingo_ruby_fw_block_shortcode' : {
						return bingo_ruby_fw_block_shortcode::render( $block );
					}
					default :
						return false;
				}
			} else {
				switch ( $block['block_name'] ) {

					case 'bingo_ruby_hs_block_1' : {
						return bingo_ruby_hs_block_1::render( $block );
					}
					case 'bingo_ruby_hs_block_3' : {
						return bingo_ruby_hs_block_3::render( $block );
					}
					case 'bingo_ruby_hs_block_4' : {
						return bingo_ruby_hs_block_4::render( $block );
					}
					case 'bingo_ruby_hs_block_6' : {
						return bingo_ruby_hs_block_6::render( $block );
					}
					case 'bingo_ruby_hs_block_8' : {
						return bingo_ruby_hs_block_8::render( $block );
					}
					case 'bingo_ruby_hs_block_9' : {
						return bingo_ruby_hs_block_9::render( $block );
					}
					case 'bingo_ruby_hs_block_11' : {
						return bingo_ruby_hs_block_11::render( $block );
					}
					case 'bingo_ruby_hs_block_12' : {
						return bingo_ruby_hs_block_12::render( $block );
					}
					case 'bingo_ruby_hs_block_14' : {
						return bingo_ruby_hs_block_14::render( $block );
					}
					case 'bingo_ruby_hs_block_15' : {
						return bingo_ruby_hs_block_15::render( $block );
					}
					case 'bingo_ruby_hs_block_16' : {
						return bingo_ruby_hs_block_16::render( $block );
					}
					case 'bingo_ruby_hs_block_17' : {
						return bingo_ruby_hs_block_17::render( $block );
					}
					case 'bingo_ruby_hs_block_18' : {
						return bingo_ruby_hs_block_18::render( $block );
					}
					case 'bingo_ruby_hs_block_19' : {
						return bingo_ruby_hs_block_19::render( $block );
					}
					case 'bingo_ruby_hs_block_20' : {
						return bingo_ruby_hs_block_20::render( $block );
					}
					case 'bingo_ruby_hs_block_21' : {
						return bingo_ruby_hs_block_21::render( $block );
					}
					case 'bingo_ruby_hs_block_22' : {
						return bingo_ruby_hs_block_22::render( $block );
					}
					case 'bingo_ruby_hs_block_23' : {
						return bingo_ruby_hs_block_23::render( $block );
					}
					case 'bingo_ruby_hs_block_24' : {
						return bingo_ruby_hs_block_24::render( $block );
					}
					case 'bingo_ruby_hs_block_25' : {
						return bingo_ruby_hs_block_25::render( $block );
					}
					case 'bingo_ruby_hs_block_26' : {
						return bingo_ruby_hs_block_26::render( $block );
					}
					case 'bingo_ruby_hs_block_27' : {
						return bingo_ruby_hs_block_27::render( $block );
					}
					case 'bingo_ruby_hs_block_28' : {
						return bingo_ruby_hs_block_28::render( $block );
					}
					case 'bingo_ruby_hs_block_29' : {
						return bingo_ruby_hs_block_29::render( $block );
					}
					case 'bingo_ruby_hs_block_30' : {
						return bingo_ruby_hs_block_30::render( $block );
					}
					case 'bingo_ruby_hs_block_31' : {
						return bingo_ruby_hs_block_31::render( $block );
					}
					case 'bingo_ruby_hs_block_32' : {
						return bingo_ruby_hs_block_32::render( $block );
					}
					case 'bingo_ruby_hs_block_33' : {
						return bingo_ruby_hs_block_33::render( $block );
					}
					case 'bingo_ruby_hs_block_html' : {
						return bingo_ruby_hs_block_html::render( $block );
					}
					case 'bingo_ruby_hs_block_advertising' : {
						return bingo_ruby_hs_block_advertising::render( $block );
					}
					case 'bingo_ruby_hs_block_shortcode' : {
						return bingo_ruby_hs_block_shortcode::render( $block );
					}
					default :
						return false;
				}
			}
		}
	}
}

