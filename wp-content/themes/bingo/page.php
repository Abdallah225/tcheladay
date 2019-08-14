<?php
//get header
get_header();

if ( have_posts() ) {
	echo bingo_ruby_render_single_page_layout();
}

//get footer
get_footer();