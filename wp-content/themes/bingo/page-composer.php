<?php
/*
Template Name: Ruby Page Composer
*/

//get header
get_header();

//render breaking news
if ( 1 == bingo_ruby_core::get_option( 'breaking_news_page' ) ) {
	get_template_part( 'templates/header/section', 'breaking_news' );
}

//render page layouts
echo bingo_ruby_composer_render::render_page();

//render composer blog
echo bingo_ruby_composer_blog_layout();

//get footer
get_footer();
