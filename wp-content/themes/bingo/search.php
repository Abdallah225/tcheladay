<?php
//get header
get_header();

//get options
$bingo_ruby_options                          = array();
$bingo_ruby_options['big_first']             = 0;
$bingo_ruby_options['blog_layout']           = bingo_ruby_core::get_option( 'search_layout' );
$bingo_ruby_options['blog_sidebar_name']     = bingo_ruby_core::get_option( 'search_sidebar' );
$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'search_sidebar_position' );
if ( 'default' == $bingo_ruby_options['blog_sidebar_position'] ) {
	$bingo_ruby_options['blog_sidebar_position'] = bingo_ruby_core::get_option( 'site_sidebar_position' );
}
$bingo_ruby_search_header_form = bingo_ruby_core::get_option( 'search_header_form' );

$bingo_ruby_options['summary_type']    = bingo_ruby_core::get_option( 'classic_summary_type' );
$bingo_ruby_options['excerpt_classic'] = bingo_ruby_core::get_option( 'classic_excerpt_length' );

//check excerpt for search page
if ( $bingo_ruby_options['blog_layout'] == 'layout_list' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_list_small' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'small_list_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_grid' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'grid_excerpt_length' );
} elseif ( $bingo_ruby_options['blog_layout'] == 'layout_classic_lite' ) {
	$bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'classic_lite_excerpt_length' );
}

//render breadcrumb
echo bingo_ruby_dimox_breadcrumb();

if ( have_posts() ) {
	//render
	echo '<div class="ruby-container">';
	echo '<div class="archive-header">';
	//render category header
	echo bingo_ruby_render_page_header_search();
	//render search form
	if ( ! empty( $bingo_ruby_search_header_form ) ) {
		echo '<div class="page-search-form">';
		get_search_form( true );
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	echo bingo_ruby_blog_layout( $bingo_ruby_options );
} else {
	echo '<div class="row ruby-container">';
	echo '<div class="search-page-content page-not-found">';
	echo '<div class="nothing-found-wrap">';
	echo bingo_ruby_render_page_header_search();
	echo '<div class="entry entry-content">';
	echo '<p>' . esc_html__( 'Aucun résultat pour votre recherche, veuillez réessayer avec un autre mot clé.', 'bingo' ) . '</p>';
	//render search form
	if ( ! empty( $bingo_ruby_search_header_form ) ) {
		echo '<div class="page-search-form">';
		get_search_form( true );
		echo '</div>';
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

//get footer
get_footer();