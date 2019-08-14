<?php
//get header
get_header();

//render
echo bingo_ruby_page_open( 'single-wrap page-wrap ruby-container', 'none' );
echo bingo_ruby_page_open_inner( 'single-inner attachment-inner', 'none' );
echo bingo_ruby_dimox_breadcrumb();
if ( have_posts() ) {
	while ( have_posts() ) {

		the_post();

		echo '<div class="single-post-content-outer">';

		echo '<div class="single-page-header">';
		echo '<div class="single-title post-title entry-title is-size-1">';
		echo '<h1>' . get_the_title() . '</h1>';
		echo '</div>';
		echo '<div class="entry-attachment">';
		echo wp_get_attachment_image( get_the_ID(), 'full' );
		if ( has_excerpt() ) {
			echo '<div class="wp-caption-text">';
			the_excerpt();
			echo '</div>';
		};
		echo '</div>';
		echo '</div>';

		echo '<div class="entry single-entry clearfix">';
		the_content();
		wp_link_pages(
			array(
				'before'      => '<div class="single-page-links clearfix"><div class="pagination-num">',
				'after'       => '</div></div>',
				'link_before' => '<span class="page-numbers">',
				'link_after'  => '</span>',
				'echo'        => false
			)
		);
		echo '</div>';

		echo '<div class="single-post-box single-post-box-comment">';
		echo '<div class="box-comment-content">';
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		echo '</div>';
		echo '</div>';
	}

	echo '</div>';

}
echo bingo_ruby_page_close_inner();
echo bingo_ruby_page_close();

//get footer
get_footer();