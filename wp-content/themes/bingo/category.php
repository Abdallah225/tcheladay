<?php
//get header
get_header();

$bingo_ruby_page_cat_id = bingo_ruby_core::get_page_cat_id();

//get home options
$bingo_ruby_meta_cat = get_option( 'bingo_ruby_cat_option' ) ? get_option( 'bingo_ruby_cat_option' ) : array();
if ( array_key_exists( $bingo_ruby_page_cat_id, $bingo_ruby_meta_cat ) ) {
	$bingo_ruby_meta_cat = $bingo_ruby_meta_cat[ $bingo_ruby_page_cat_id ];
}

//get settings category layout
$bingo_ruby_options = array();
if ( ! empty( $bingo_ruby_meta_cat['bingo_ruby_cat_layout'] ) && 'default' != $bingo_ruby_meta_cat['bingo_ruby_cat_layout'] ) {
	$bingo_ruby_options['blog_layout'] = $bingo_ruby_meta_cat['bingo_ruby_cat_layout'];
} else {
	$bingo_ruby_options['blog_layout'] = bingo_ruby_core::get_option( 'category_layout' );
}

//get settings category sidebar name
if ( ! empty( $bingo_ruby_meta_cat['bingo_ruby_cat_sidebar'] ) && 'bingo_ruby_default_from_theme_options' != $bingo_ruby_meta_cat['bingo_ruby_cat_sidebar'] ) {
	$bingo_ruby_options['blog_sidebar_name'] = $bingo_ruby_meta_cat['bingo_ruby_cat_sidebar'];
} else {
	$bingo_ruby_options['blog_sidebar_name'] = bingo_ruby_core::get_option( 'category_sidebar' );
}

//get settings category sidebar position
if ( ! empty( $bingo_ruby_meta_cat['bingo_ruby_cat_sidebar_position'] ) && 'default' != $bingo_ruby_meta_cat['bingo_ruby_cat_sidebar_position'] ) {
	$bingo_ruby_options['blog_sidebar_position'] = $bingo_ruby_meta_cat['bingo_ruby_cat_sidebar_position'];
} else {
	$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'category_sidebar_position' );
}

//feat category style
if ( ! empty( $bingo_ruby_meta_cat['bingo_ruby_cat_feat'] ) && 'default' != $bingo_ruby_meta_cat['bingo_ruby_cat_feat'] ) {
	$bingo_ruby_feat_cat_style = $bingo_ruby_meta_cat['bingo_ruby_cat_feat'];
} else {
	$bingo_ruby_feat_cat_style = bingo_ruby_core::get_option( 'category_featured_style' );
}

$bingo_ruby_options['big_first']          = bingo_ruby_core::get_option( 'category_big_post_first' );
$bingo_ruby_options['1st_classic_layout'] = bingo_ruby_core::get_option( 'category_1st_classic_layout' );
$bingo_ruby_options['summary_type']       = bingo_ruby_core::get_option( 'classic_summary_type' );
$bingo_ruby_options['excerpt_classic']    = bingo_ruby_core::get_option( 'classic_excerpt_length' );

//check excerpt for category layout
if ( $bingo_ruby_options['blog_layout'] == 'layout_list' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_list_small' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'small_list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_grid' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'grid_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_classic_lite' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'classic_lite_excerpt_length' );
}

//render category header
echo bingo_ruby_render_page_header_category( $bingo_ruby_meta_cat );
//render category feat
echo bingo_ruby_render_feat_cat( $bingo_ruby_feat_cat_style );
//render category layout
echo bingo_ruby_blog_layout( $bingo_ruby_options );

//get footer
get_footer();