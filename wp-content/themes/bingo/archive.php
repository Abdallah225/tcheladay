<?php
//get header
get_header();

//get options
$bingo_ruby_options                          = array();
$bingo_ruby_options['blog_layout']           = bingo_ruby_core::get_option( 'archive_layout' );
$bingo_ruby_options['blog_sidebar_name']     = bingo_ruby_core::get_option( 'archive_sidebar' );
$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'archive_sidebar_position' );
$bingo_ruby_options['big_first']             = 0;

if ( 'default' == $bingo_ruby_options['blog_sidebar_position'] ) {
	$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'site_sidebar_position' );
}

$bingo_ruby_options['summary_type']    = bingo_ruby_core::get_option( 'classic_summary_type' );
$bingo_ruby_options['excerpt_classic'] = bingo_ruby_core::get_option( 'classic_excerpt_length' );

//check excerpt for archive page
if ( $bingo_ruby_options['blog_layout'] == 'layout_list' || $bingo_ruby_options['blog_layout'] == 'layout_list_small' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_grid' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'grid_excerpt_length' );
}

//render breadcrumb
echo bingo_ruby_dimox_breadcrumb();

//render featured area
echo bingo_ruby_render_header_page_archive();

//render layout
echo bingo_ruby_blog_layout( $bingo_ruby_options );

//get footer
get_footer();