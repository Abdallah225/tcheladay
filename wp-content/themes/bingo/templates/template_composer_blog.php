<?php
if (!function_exists('bingo_ruby_composer_blog_layout')) {
    function bingo_ruby_composer_blog_layout()
    {

        $post_id = get_the_ID();

        $composer_blog = get_post_meta($post_id, 'bingo_ruby_composer_blog', true);

        if (empty($composer_blog)) {
            return false;
        }

        //get page
        $get_paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $get_page = get_query_var('page') ? get_query_var('page') : 1;
        if ($get_paged > $get_page) {
            $paged = $get_paged;
        } else {
            $paged = $get_page;
        }

        $bingo_ruby_options = array();

        $bingo_ruby_latest_title = esc_html(get_post_meta($post_id, 'bingo_ruby_composer_blog_title', true));

        $bingo_ruby_options['big_first'] = get_post_meta($post_id, 'bingo_ruby_composer_blog_1st_classic', true);
        $bingo_ruby_options['blog_layout'] = get_post_meta($post_id, 'bingo_ruby_composer_blog_layout', true);
        if (empty($bingo_ruby_options['blog_layout'])) {
            $bingo_ruby_options['blog_layout'] = 'classic_1';
        }
        $bingo_ruby_options['category_ids'] = esc_attr(get_post_meta($post_id, 'bingo_ruby_composer_blog_category', true));
        $bingo_ruby_options['posts_per_page'] = esc_attr(get_post_meta($post_id, 'bingo_ruby_composer_blog_number', true));
        if (empty($bingo_ruby_options['posts_per_page'])) {
            $bingo_ruby_options['posts_per_page'] = get_option('posts_per_page');
        }

        $options['offset'] = get_post_meta($post_id, 'bingo_ruby_composer_blog_offset', true);
        $bingo_ruby_options['blog_sidebar_name'] = esc_attr(get_post_meta($post_id, 'bingo_ruby_composer_blog_sidebar_name', true));
        $bingo_ruby_options['blog_sidebar_position'] = esc_attr(get_post_meta($post_id, 'bingo_ruby_composer_blog_sidebar_position', true));
        $bingo_ruby_options['summary_type'] = bingo_ruby_core::get_option('classic_summary_type');
        $bingo_ruby_options['excerpt_classic'] = bingo_ruby_core::get_option('classic_excerpt_length');

        //check excerpt for post layout
        if ( $bingo_ruby_options['blog_layout'] == 'layout_list' ) {
            $bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'list_excerpt_length' );
        } elseif ( $bingo_ruby_options['blog_layout'] == 'layout_list_small' ) {
            $bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'small_list_excerpt_length' );
        } elseif ( $bingo_ruby_options['blog_layout'] == 'layout_grid' ) {
            $bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'grid_excerpt_length' );
        } elseif ( $bingo_ruby_options['blog_layout'] == 'layout_classic_lite' ) {
            $bingo_ruby_options['excerpt'] = bingo_ruby_core::get_option( 'classic_lite_excerpt_length' );
        }

        //get data query
        $data_query = bingo_ruby_query::get_data($bingo_ruby_options, $paged);

        //check empty
        if (!$data_query->have_posts()) {
            return false;
        }

        //create class
        $classes = array();
        $classes[] = 'blog-wrap';
        $classes[] = 'latest-blog-wrap';
        $classes[] = 'is-' . esc_attr($bingo_ruby_options['blog_layout']);
        if (!empty($bingo_ruby_options['big_first'])) {
            $classes[] = 'has-big-first';
        } else {
            $classes[] = 'no-big-first';
        }
        $classes = implode(' ', $classes);

        $str = '';

        $str .= '<div class="' .esc_attr( $classes ). '">';
        //block title
        $str .= bingo_ruby_page_open_inner('blog-inner', $bingo_ruby_options['blog_sidebar_position']);
        $str .= bingo_ruby_page_content_open('content-wrap', $bingo_ruby_options['blog_sidebar_position']);

        if ( ! empty( $bingo_ruby_latest_title ) ) {
            $str .= bingo_ruby_render_block_title( $bingo_ruby_latest_title );
        }

        //check empty
        if ($data_query->have_posts()) {
            switch ($bingo_ruby_options['blog_layout']) {
                case 'layout_classic':
                    $str .= bingo_ruby_render_latest_classic_1($data_query, $bingo_ruby_options);
                    break;
                case 'layout_classic_lite':
                    $str .= bingo_ruby_render_latest_classic_2($data_query, $bingo_ruby_options);
                    break;
                case 'layout_grid' :
                    $str .= bingo_ruby_render_latest_grid($data_query, $bingo_ruby_options);
                    break;
                case 'layout_grid_small' :
                    $str .= bingo_ruby_render_latest_grid_small( $data_query, $bingo_ruby_options );
                    break;
                case 'layout_list' :
                    $str .= bingo_ruby_render_latest_list( $data_query, $bingo_ruby_options );
                    break;
                case 'layout_list_small' :
                    $str .= bingo_ruby_render_latest_list_small( $data_query, $bingo_ruby_options );
                    break;
                case 'layout_overlay_small':
                    $str .= bingo_ruby_render_latest_overlay_small( $data_query, $bingo_ruby_options );
                    break;

            }
        }

        //reset post data
        wp_reset_postdata();

        $str .= bingo_ruby_page_close_inner();

        //render sidebar
        if (!empty($bingo_ruby_options['blog_sidebar_position']) && 'none' != $bingo_ruby_options['blog_sidebar_position']) {
            $str .= bingo_ruby_page_sidebar($bingo_ruby_options['blog_sidebar_name'], true);
        }

        $str .= bingo_ruby_page_close_inner();
        $str .= '</div>';

        return $str;

    }
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param string $block_title
 *
 * @return string
 * render header
 */
if (!function_exists('bingo_ruby_render_block_title')) {
    function bingo_ruby_render_block_title($block_title = '')
    {
        $str = '';
        $str .= '<div class="block-header-wrap">';
        $str .= '<div class="block-header-inner">';
        $str .= '<div class="block-title"><h3>' . esc_html($block_title) . '</h3></div>';
        $str .= '</div>';
        $str .= '</div>';

        return $str;
    }
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * @return string
 * render layout classic
 */
if (!function_exists('bingo_ruby_render_latest_classic_1')) {
    function bingo_ruby_render_latest_classic_1($data_query, $bingo_ruby_options)
    {
        $str = '';
        while ($data_query->have_posts()) :
            $data_query->the_post();
            $str .= bingo_ruby_post_classic_1($bingo_ruby_options);
        endwhile;

        //blog pagination
        $str .= bingo_ruby_page_pagination($data_query);

        return $str;
    }
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * @return string
 * render layout classic
 */
if (!function_exists('bingo_ruby_render_latest_classic_2')) {
    function bingo_ruby_render_latest_classic_2($data_query, $bingo_ruby_options)
    {
        $str = '';
        while ($data_query->have_posts()) :
            $data_query->the_post();
            $str .= bingo_ruby_post_classic_2($bingo_ruby_options);
        endwhile;

        //blog pagination
        $str .= bingo_ruby_page_pagination($data_query);

        return $str;
    }
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * @return string
 * render grid layout
 */
if (!function_exists('bingo_ruby_render_latest_grid')) {
    function bingo_ruby_render_latest_grid($data_query, $bingo_ruby_options)
    {

        $flag = true;
        $str = '';

        //check fullwidth
        if (!empty($bingo_ruby_options['blog_sidebar_position']) && 'none' == $bingo_ruby_options['blog_sidebar_position']) {
            $classes_col = 'post-outer col-sm-4 col-xs-12';
        } else {
            $classes_col = 'post-outer col-sm-6 col-xs-12';
        }

        if (empty($bingo_ruby_options['big_first'])) {
            $str .= '<div class="blog-content-inner">';
        }

        while ($data_query->have_posts()) {
            $data_query->the_post();

            if ((true === $flag) && !empty($bingo_ruby_options['big_first'])) {
                $str .= '<div class="post-outer first-post-wrap col-sx-12">';
                $str .= bingo_ruby_post_classic_1($bingo_ruby_options);
                $str .= '</div>';

                $str .= '<div class="blog-content-inner">';

                $flag = false;
                continue;
            } else {

                //render block
                $str .= '<div class="' . esc_attr($classes_col) . '">';
                $str .= bingo_ruby_post_grid_2($bingo_ruby_options);
                $str .= '</div><!--#grid outer-->';
            }

        }

        $str .= '</div>';

        //blog pagination
        $str .= bingo_ruby_page_pagination($data_query);

        return $str;
    }
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * render gird small layout
 */
if ( ! function_exists( 'bingo_ruby_render_grid_small' ) ) {
    function bingo_ruby_render_latest_grid_small( $data_query, $bingo_ruby_options ) {

        $flag = true;
        $str  = '';

        //check fullwidth
        if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' == $bingo_ruby_options['blog_sidebar_position'] ) {
            $classes_col = 'post-outer col-sm-3 col-xs-6';
        } else {
            $classes_col = 'post-outer col-sm-4 col-xs-6';
        }

        if ( empty( $bingo_ruby_options['big_first'] ) ) {
            $str .= '<div class="blog-content-inner">';
        }

        while ( $data_query->have_posts() ) {
            $data_query->the_post();

            if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
                $str .= '<div class="post-outer first-post-wrap col-sx-12">';
                $str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
                $str .= '</div>';

                $str .= '<div class="blog-content-inner">';

                $flag = false;
                continue;
            } else {
                //render block
                $str .= '<div class="' . esc_attr( $classes_col ) . '">';
                $str .= bingo_ruby_post_grid_m2( $bingo_ruby_options );
                $str .= '</div><!--#grid outer-->';
            }

        }

        $str .= '</div>';

        //blog pagination
        $str .= bingo_ruby_page_pagination( $data_query );

        return $str;
    }
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * @return string
 * render list layout
 */
if ( ! function_exists( 'bingo_ruby_render_latest_list' ) ) {
    function bingo_ruby_render_latest_list( $data_query, $bingo_ruby_options ) {

        $flag = true;
        $str  = '';

        while ( $data_query->have_posts() ) {
            $data_query->the_post();

            if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
                $str .= '<div class="first-post-wrap col-sx-12">';
                $str .= bingo_ruby_post_classic_1( $bingo_ruby_options );
                $str .= '</div>';
                $flag = false;
                continue;
            }

            $str .= bingo_ruby_post_list_1( $bingo_ruby_options );

        }

        //blog pagination
        $str .= bingo_ruby_page_pagination( $data_query );

        return $str;
    }
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * render small list layout
 */
if ( ! function_exists( 'bingo_ruby_render_latest_list_small' ) ) {
    function bingo_ruby_render_latest_list_small( $data_query, $bingo_ruby_options ) {

        $flag = true;
        $str  = '';

        while ( $data_query->have_posts() ) {
            $data_query->the_post();

            if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
                $str .= '<div class="first-post-wrap col-sx-12">';
                $str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
                $str .= '</div>';
                $flag = false;
                continue;
            }

            $str .= bingo_ruby_post_list_2( $bingo_ruby_options );

        }

        //blog pagination
        $str .= bingo_ruby_page_pagination( $data_query );

        return $str;
    }
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $data_query
 * @param $bingo_ruby_options
 *
 * render gird overlay small
 */
if ( ! function_exists( 'bingo_ruby_render_latest_overlay_small' ) ) {
    function bingo_ruby_render_latest_overlay_small( $data_query, $bingo_ruby_options ) {

        $flag = true;
        $str  = '';

        //check fullwidth
        if ( ! empty( $bingo_ruby_options['blog_sidebar_position'] ) && 'none' == $bingo_ruby_options['blog_sidebar_position'] ) {
            $classes_col = 'post-outer col-sm-4 col-xs-12';
        } else {
            $classes_col = 'post-outer col-sm-6 col-xs-12';
        }

        if ( empty( $bingo_ruby_options['big_first'] ) ) {
            $str .= '<div class="blog-content-inner">';
        }

        while ( $data_query->have_posts() ) {
            $data_query->the_post();

            if ( ( true === $flag ) && ! empty( $bingo_ruby_options['big_first'] ) ) {
                $str .= '<div class="post-outer first-post-wrap col-sx-12">';
                $str .= bingo_ruby_post_classic_2( $bingo_ruby_options );
                $str .= '</div>';

                $str .= '<div class="blog-content-inner">';

                $flag = false;
                continue;
            } else {

                //render block
                $str .= '<div class="' . esc_attr( $classes_col ) . '">';
                $str .= bingo_ruby_post_feat_4( $bingo_ruby_options );
                $str .= '</div><!--#overlay outer-->';

            }

        }

        $str .= '</div>';

        //blog pagination
        $str .= bingo_ruby_page_pagination( $data_query );

        return $str;

    }
}

