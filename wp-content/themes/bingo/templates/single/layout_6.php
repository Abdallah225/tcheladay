<?php
if ( ! function_exists( 'bingo_ruby_render_single_post_layout_6' ) ) {
    function bingo_ruby_render_single_post_layout_6( $param = array() ) {
        $date_full                     = bingo_ruby_core::get_option( 'single_post_date_full' );
        $author_position               = bingo_ruby_single_post_check_author_position();
        $sidebar_name                  = bingo_ruby_single_check_sidebar_name();
        $sidebar_position              = bingo_ruby_single_check_sidebar_position();
        $review                        = bingo_ruby_single_post_check_review();
        $bingo_ruby_author_social_data = bingo_ruby_social_profile_author( get_the_author_meta( 'ID' ) );
        $bingo_ruby_render_social      = bingo_ruby_render_social_icon( $bingo_ruby_author_social_data, false, true );
        $bingo_ruby_author_decs        = get_the_author_meta( 'description' );
        $check_breadcrumb              = bingo_ruby_core::get_option( 'site_breadcrumb' );

        if ( ! empty( $date_full ) ) {
            $class_name = 'single-post-wrap single-post-6 is-date-full';
        } else {
            $class_name = 'single-post-wrap single-post-6';
        }

        $str = '';
        $str .= bingo_ruby_page_open( $class_name, $review );
        $str .= bingo_ruby_page_open_inner( 'single-wrap is-author-' . esc_attr( $author_position ) . '', $sidebar_position );
        $str .= bingo_ruby_page_content_open( 'single-inner', $sidebar_position );

        $str .= '<div class="single-post-content-outer single-box">';

        $str .= '<div class="single-post-header">';
        if ( ! empty( $check_breadcrumb ) || ! empty( $date_full ) ) {
            $str .= '<div class="single-post-top">';
            //render breadcrumb
            $str .= bingo_ruby_dimox_breadcrumb( true );
            if ( ! empty( $date_full ) ) {
                //render post date
                $str .= bingo_ruby_single_post_info_date_full();
            }
            $str .= '</div><!--#single post top -->';
        }

        $str .= bingo_ruby_post_cat_info();
        $str .= bingo_ruby_single_post_title();
        $str .= bingo_ruby_single_post_subtitle();
        $str .= bingo_ruby_single_post_meta_info();
        $str .= '</div><!--#single post header-->';
        $str .= bingo_ruby_single_post_action();

        // render single add top
        $str .= bingo_ruby_single_post_ad_top();

        //body
        $str .= '<div class="single-post-body">';

        if ( $author_position == 'top' && ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) ) {
            $str .= '<div class="single-post-right">';
        }
        $str .= '<div class="single-content-wrap">';
        $str .= '<div class="single-entry-wrap">';
        $str .= bingo_ruby_single_post_entry();
        $str .= bingo_ruby_single_post_ad_bottom();
        $str .= '</div><!--#single entry wrap-->';
        $str .= bingo_ruby_single_post_tag();
        if ( function_exists( 'bingo_ruby_plugin_social_like' ) ) {
            $str .= bingo_ruby_plugin_social_like();
        }
        if ( function_exists( 'bingo_ruby_plugin_share_big' ) ) {
            $str .= bingo_ruby_plugin_share_big();
        }
        $str .= bingo_ruby_single_comment();
        $str .= '</div><!--#single content wrap -->';
        if ( $author_position == 'top' && ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) ) {
            $str .= '</div><!--#single post right -->';
            $str .= '<div class="single-post-left">';
            $str .= bingo_ruby_single_post_box_author( $author_position );
            $str .= '</div><!--#single post left -->';
        }
        $str .= bingo_ruby_single_post_schema_markup();
        $str .= '</div><!--#single post body -->';

        $str .= '</div><!--#single post content outer -->';

        $str .= '<div class="single-post-box-outer">';
        if ( $author_position == 'bottom' && ( ! empty( $bingo_ruby_author_decs ) || ! empty( $bingo_ruby_render_social ) ) ) {
            $str .= '<div class="single-box single-box-author">';
            $str .= bingo_ruby_single_post_box_author( $author_position );
            $str .= '</div>';
        }

        $str .= bingo_ruby_single_post_box_nav();
        $str .= bingo_ruby_single_post_widget_section();
        $str .= bingo_ruby_single_post_box_related();
        $str .= '</div><!--#single post box outer -->';

        $str .= bingo_ruby_page_content_close();

        if ( 'none' != $sidebar_position ) {
            $str .= bingo_ruby_page_sidebar( $sidebar_name, true );
        }

        $str .= bingo_ruby_page_close_inner();
        $str .= bingo_ruby_page_close();

        return $str;
    }
}