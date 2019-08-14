<?php
//register custom theme options style
if ( ! function_exists( 'bingo_ruby_register_style_redux' ) ) {
	function bingo_ruby_register_style_redux() {
		wp_register_style( 'bingo_ruby_redux_style', get_template_directory_uri() . '/theme_options/assets/redux-style.css', array( 'redux-admin-css' ), BINGO_THEME_VERSION, 'all' );
		wp_enqueue_style( 'bingo_ruby_redux_style' );
	}

	//Check & do action
	if ( is_admin() ) {
		add_action( 'redux/page/bingo_ruby_theme_options/enqueue', 'bingo_ruby_register_style_redux' );
	}
};

