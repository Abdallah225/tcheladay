<?php
if ( ! function_exists( 'bingo_ruby_render_single_page_layout_5' ) ) {
	function bingo_ruby_render_single_page_layout_5() {

		$bingo_ruby_page_title  = bingo_ruby_check_page_title();
		$sidebar_name           = bingo_ruby_single_check_sidebar_name();
		$sidebar_position       = bingo_ruby_single_check_sidebar_position();
		$bingo_ruby_comment_box = bingo_ruby_check_comment_box();
		$class_name             = 'single-page-wrap single-page-5 single-post-5';

		//render
		$str = '';

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				$str .= '<div class="' . esc_attr( $class_name ) . '">';
				$str .= bingo_ruby_dimox_breadcrumb();
				$str .= bingo_ruby_page_open_inner( 'single-wrap', $sidebar_position );
				$str .= bingo_ruby_page_content_open( 'single-inner', $sidebar_position );

				if ( has_post_thumbnail() ) {
					$str .= '<div class="single-post-overlay-outer">';
					$str .= bingo_ruby_page_thumb_classic( $param = array() );
					$str .= bingo_ruby_post_thumb_overlay();
					if ( ! empty( $bingo_ruby_page_title ) && 'none' != $bingo_ruby_page_title ) {
						$str .= '<div class="page-header single-post-header is-absolute is-light-text">';
						$str .= '<div class="page-title post-title is-size-1">';
						$str .= '<h1>' . get_the_title() . '</h1>';
						$str .= '</div><!-- page title -->';
						$str .= '</div><!--#single post header-->';
					}
					$str .= '</div><!-- single post overlay outer -->';
				}

				$str .= '<div class="single-page-post entry single-box">';

				if ( ! has_post_thumbnail() && ! empty( $bingo_ruby_page_title ) && 'none' != $bingo_ruby_page_title ) {
					$str .= '<div class="page-title single-title post-title is-size-1">';
					$str .= '<h1>' . get_the_title() . '</h1>';
					$str .= '</div><!-- page title -->';
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