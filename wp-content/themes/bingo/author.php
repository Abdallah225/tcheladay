<?php
//get header
get_header();

//get options
$bingo_ruby_options                          = array();
$bingo_ruby_options['blog_layout']           = bingo_ruby_core::get_option( 'author_layout' );
$bingo_ruby_options['blog_sidebar_name']     = bingo_ruby_core::get_option( 'author_sidebar' );
$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'author_sidebar_position' );
$bingo_ruby_options['big_first']             = bingo_ruby_core::get_option( 'author_big_post_first' );
$bingo_ruby_options['1st_classic_layout']    = bingo_ruby_core::get_option( 'author_1st_classic_layout' );
$bingo_ruby_options['summary_type']          = bingo_ruby_core::get_option( 'classic_summary_type' );
$bingo_ruby_options['excerpt_classic']       = bingo_ruby_core::get_option( 'classic_excerpt_length' );

//check excerpt for author page
if ( $bingo_ruby_options['blog_layout'] == 'layout_list' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_list_small' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'small_list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_grid' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'grid_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_classic_lite' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'classic_lite_excerpt_length' );
}

if ( 'default' == $bingo_ruby_options['blog_sidebar_position'] ) {
	$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'site_sidebar_position' );
}

//render layout
echo bingo_ruby_blog_author_layout( $bingo_ruby_options );

//get footer
get_footer();