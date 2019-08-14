<?php

//registering admin css and script
if ( ! function_exists( 'bingo_ruby_register_script_backend' ) ) {
	function bingo_ruby_register_script_backend( $hook ) {
		wp_register_style( 'bingo_ruby_style_admin', get_template_directory_uri() . '/backend/assets/admin-style.css', array(), BINGO_THEME_VERSION, 'all' );
		wp_enqueue_style( 'bingo_ruby_style_admin' );

		//load admin script
		if ( $hook == 'post.php' || $hook == 'post-new.php' ) {
			wp_register_script( 'bingo_ruby_script_admin', get_template_directory_uri() . '/backend/assets/admin-script.js', array( 'jquery' ), BINGO_THEME_VERSION, true );
			wp_enqueue_script( 'bingo_ruby_script_admin' );
		}
	}

	//check & do action
	if ( is_admin() ) {
		add_action( 'admin_enqueue_scripts', 'bingo_ruby_register_script_backend' );
	}
};
