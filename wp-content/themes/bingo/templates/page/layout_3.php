<?php
if ( ! function_exists( 'bingo_ruby_render_single_page_layout_3' ) ) {
	function bingo_ruby_render_single_page_layout_3() {

		$bingo_ruby_page_title  = bingo_ruby_check_page_title();
		$sidebar_name           = bingo_ruby_single_check_sidebar_name();
		$sidebar_position       = bingo_ruby_single_check_sidebar_position();
		$bingo_ruby_comment_box = bingo_ruby_check_comment_box();
		$class_name             = 'single-page-wrap single-page-3 single-post-3';

		//render
		$str = '';

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				if ( has_post_thumbnail() ) {
					$str .= '<div class="is-absolute-breadcrumb">';
					$str .= bingo_ruby_dimox_breadcrumb();
					$str .= '</div>';
					$str .= '<div class="single-post-feat-bg-outer">';
					$str .= bingo_ruby_page_thumb_classic();
					$str .= '</div>';
				}

				$str .= bingo_ruby_page_open_inner( 'single-wrap', $sidebar_position );
				$str .= bingo_ruby_page_content_open( 'single-inner', $sidebar_position );
				$str .= '<div class="single-page-post entry single-box">';
				if ( ! empty( $bingo_ruby_page_title ) && 'none' != $bingo_ruby_page_title ) {
					$str .= '<div class="page-header">';
					$str .= '<div class="page-title post-title is-size-1">';
					$str .= '<h1>' . get_the_title() . '</h1>';
					$str .= '</div><!-- page title -->';
					$str .= '</div><!-- page header -->';
				}

				$str .= '<div class="entry clearfix">';

				ob_start();
				the_content();
				wp_link_pages(
					array(
						'before'      => '<div class="single-page-links clearfix"><div class="pagination-num">',
						'after'       => '</div></div>',
						'link_before' => '<span class="page-numbers">',
						'link_after'  => '</span>',
						'echo'        => true
					)
				);
				$str .= ob_get_clean();

				$str .= '</div>';

				if ( ! empty( $bingo_ruby_comment_box ) ) {
					$str .= '<div class="single-page-comment">';
					ob_start();
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
					$str .= ob_get_clean();
					$str .= '</div>';
				}


				$str .= '</div>';
				$str .= bingo_ruby_page_content_close();

				//render sidebar
				if ( 'none' != $sidebar_position ) {
					$str .= bingo_ruby_page_sidebar( $sidebar_name, true );
				}

				$str .= bingo_ruby_page_close_inner();
				$str .= '</div>';
			}
		}

		return $str;
	}
}