<?php
//get header
get_header();

if ( have_posts() ) {
	if ( function_exists( 'bingo_ruby_plugin_view_add' ) ) {
		bingo_ruby_plugin_view_add();
	}
	echo bingo_ruby_render_single_post();
}

//get footer
get_footer();