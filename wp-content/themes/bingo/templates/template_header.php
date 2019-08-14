<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * render header
 */
if ( ! function_exists( 'bingo_ruby_render_header' ) ) {
	function bingo_ruby_render_header() {
		$header_style = bingo_ruby_core::get_option( 'header_style' );

        if (empty($header_style)) {
            $header_style = '1';
        }

		switch ( $header_style ) {
			case 1 :
				get_template_part( 'templates/header/style', '1' );
				break;
			case 2 :
				get_template_part( 'templates/header/style', '2' );
				break;
			case 3 :
				get_template_part( 'templates/header/style', '3' );
				break;
			case 4 :
				get_template_part( 'templates/header/style', '4' );
				break;
			case 5 :
				get_template_part( 'templates/header/style', '5' );
				break;
			case 6 :
				get_template_part( 'templates/header/style', '6' );
				break;
			case 7 :
				get_template_part( 'templates/header/style', '7' );
				break;
			case 8 :
				get_template_part( 'templates/header/style', '8' );
				break;
			case 9 :
				get_template_part( 'templates/header/style', '9' );
				break;
		}
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * render top bar
 */
if ( ! function_exists( 'bingo_ruby_render_topbar' ) ) {
	function bingo_ruby_render_topbar() {

		//check
		$topbar = bingo_ruby_core::get_option( 'topbar' );
		if ( empty( $topbar ) ) {
			return false;
		}

		$topbar_style = bingo_ruby_core::get_option( 'topbar_style' );

		switch ( $topbar_style ) {
			case 1 :
				get_template_part( 'templates/header/topbar', 'style_1' );
				break;
			case 2 :
				get_template_part( 'templates/header/topbar', 'style_2' );
				break;
		}


	}
}