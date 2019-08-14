<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @return $woocommerce
 */
if ( ! function_exists( 'bingo_ruby_wc_global_value' ) ) {
	function bingo_ruby_wc_global_value() {
		global $woocommerce;

		return $woocommerce;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return WC_Product
 */
if ( ! function_exists( 'bingo_ruby_wc_global_product' ) ) {
	function bingo_ruby_wc_global_product() {
		global $product;

		return $product;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed
 * max number of page
 */
if ( ! function_exists( 'bingo_ruby_max_posts_per_page' ) ) {
	function bingo_ruby_max_posts_per_page() {

		global $wp_query;

		return $wp_query->max_num_pages;
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return mixed|string|void
 * product per page
 */
if ( ! function_exists( 'bingo_ruby_wc_posts_per_page' ) ) {
	function bingo_ruby_wc_posts_per_page() {
		$posts_per_page = bingo_ruby_core::get_option( 'woocommerce_shop_posts_per_page' );
		if ( empty( $posts_per_page ) ) {
			$posts_per_page = get_option( 'posts_per_page' );
		}

		return $posts_per_page;
	}

	add_filter( 'loop_shop_per_page', 'bingo_ruby_wc_posts_per_page', 20 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * change number product per row
 */
if ( ! function_exists( 'bingo_ruby_wc_loop_columns' ) ) {
	function bingo_ruby_wc_loop_columns() {
		$sidebar_position = bingo_ruby_core::get_option( 'woocommerce_shop_sidebar_position' );

		if ( 'none' == $sidebar_position ) {
			return 4;
		} else {
			return 3;
		}
	}

	add_filter( 'loop_shop_columns', 'bingo_ruby_wc_loop_columns' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * bingo_ruby_wc_related_loop
 */
if ( ! function_exists( 'bingo_ruby_wc_related_loop' ) ) {
	function bingo_ruby_wc_related_loop( $columns ) {
		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'related';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_related_products_columns', $columns );
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * bingo_ruby_wc_upsells_loop
 */
if ( ! function_exists( 'bingo_ruby_wc_upsells_loop' ) ) {
	function bingo_ruby_wc_upsells_loop( $columns ) {
		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'up-sells';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_up_sells_columns', $columns );

	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * bingo_ruby_wc_crosssells_loop
 */
if ( ! function_exists( 'bingo_ruby_wc_crosssells_loop' ) ) {
	function bingo_ruby_wc_crosssells_loop( $columns ) {
		global $woocommerce_loop;

		$woocommerce_loop['name']    = 'cross-sells';
		$woocommerce_loop['columns'] = apply_filters( 'woocommerce_cross_sells_columns', $columns );
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 *  Woocommerce up sells total
 */

if ( ! function_exists( 'bingo_ruby_wc_upsells_total' ) ) {
	function bingo_ruby_wc_upsells_total() {
		$sidebar_position = bingo_ruby_core::get_option( 'woocommerce_product_sidebar_position' );
		if ( 'none' == $sidebar_position ) {
			return 4;
		} else {
			return 3;
		}
	}

	add_filter( 'woocommerce_up_sells_columns', 'bingo_ruby_wc_upsells_total' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * cross sell posts per page
 */
if ( ! function_exists( 'bingo_ruby_wc_crosssells_total' ) ) {
	function bingo_ruby_wc_crosssells_total() {
		$sidebar_position = bingo_ruby_core::get_option( 'woocommerce_product_sidebar_position' );
		if ( 'none' == $sidebar_position ) {
			return 2;
		} else {
			return 1;
		}
	}

	add_filter( 'woocommerce_cross_sells_total', 'bingo_ruby_wc_crosssells_total' );
	add_filter( 'woocommerce_cross_sells_column', 'bingo_ruby_wc_crosssells_total' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * woocommerce related product
 */
if ( ! function_exists( 'bingo_ruby_wc_output_related_products' ) ) {

	function bingo_ruby_wc_output_related_products() {

		$sidebar_position = bingo_ruby_core::get_option( 'woocommerce_product_sidebar_position' );
		if ( 'none' == $sidebar_position ) {
			$post_per_page = 4;
		} else {
			$post_per_page = 3;
		}

		woocommerce_related_products(
			array(
				'posts_per_page' => $post_per_page,
				'columns'        => $post_per_page
			)
		);
	}

	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
	remove_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 10 );
	add_action( 'woocommerce_after_single_product_summary', 'bingo_ruby_wc_output_related_products', 20 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return string
 * woo breadcrumb
 */
if ( ! function_exists( 'bingo_ruby_wc_breadcrumb' ) ) {
	function bingo_ruby_wc_breadcrumb() {
		$breadcrumb = bingo_ruby_core::get_option( 'site_breadcrumb' );
		if ( ! empty( $breadcrumb ) ) {
            echo '<div class="breadcrumb-outer">';
			$param = array(
				'delimiter'   => '<i class="fa fa-angle-right breadcrumb-next"></i>',
				'wrap_before' => '<div class="breadcrumb-wrap" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><div class="ruby-container breadcrumb-inner">',
				'wrap_after'  => '</div></div>'
			);
			woocommerce_breadcrumb( $param );
            echo '</div>';
		}
	}
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    add_action( 'woocommerce_before_main_content', 'bingo_ruby_wc_breadcrumb', 20, 0 );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * woo title
 */
if ( ! function_exists( 'bingo_ruby_wc_show_page_title' ) ) {

	function bingo_ruby_wc_show_page_title() {
		$bingo_ruby_shop_title = bingo_ruby_core::get_option( 'woocommerce_shop_title' );
		if ( ! empty( $bingo_ruby_shop_title ) ) {
			return true;
		} else {
			return false;
		}
	}

	add_filter( 'woocommerce_show_page_title', 'bingo_ruby_wc_show_page_title' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * woo before shop loop
 */
if ( ! function_exists( 'bingo_ruby_wc_before_shop_loop' ) ) {

    function bingo_ruby_wc_before_shop_loop() {
        if ( false === is_product() ) {
            $bingo_ruby_sidebar_position = bingo_ruby_core::get_option( 'woocommerce_shop_sidebar_position' );
        } else {
            $bingo_ruby_sidebar_position = bingo_ruby_core::get_option( 'woocommerce_product_sidebar_position' );
        }

        //render
        echo '<div class="single-page-wrap single-page-woo">';
        echo bingo_ruby_page_open_inner( 'single-wrap', $bingo_ruby_sidebar_position );
        echo bingo_ruby_page_content_open( 'single-inner', $bingo_ruby_sidebar_position );

    }

    remove_action( 'woocommerce_before_single_product', 'action_woocommerce_before_single_product', 10, 2 );
    remove_action( 'woocommerce_before_shop_loop', 'action_woocommerce_before_shop_loop', 10, 2 );
    add_action( 'woocommerce_before_shop_loop', 'bingo_ruby_wc_before_shop_loop', 10, 2 );
    add_action( 'woocommerce_before_single_product', 'bingo_ruby_wc_before_shop_loop', 10, 2 );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * woo after shop loop
 */
if ( ! function_exists( 'bingo_ruby_wc_after_shop_loop' ) ) {

    function bingo_ruby_wc_after_shop_loop() {

        if ( false === is_product() ) {
            $bingo_ruby_sidebar_name     = bingo_ruby_core::get_option( 'woocommerce_shop_sidebar_name' );
            $bingo_ruby_sidebar_position = bingo_ruby_core::get_option( 'woocommerce_shop_sidebar_position' );
        } else {
            $bingo_ruby_sidebar_name     = bingo_ruby_core::get_option( 'woocommerce_product_sidebar_name' );
            $bingo_ruby_sidebar_position = bingo_ruby_core::get_option( 'woocommerce_product_sidebar_position' );
        }

        echo bingo_ruby_page_content_close();
        if ( 'none' != $bingo_ruby_sidebar_position ) {
            echo bingo_ruby_page_sidebar( $bingo_ruby_sidebar_name, true );
        }
        echo bingo_ruby_page_close_inner();
        echo '</div>';

    }

    remove_action( 'woocommerce_after_single_product', 'action_woocommerce_after_single_product', 10, 2 );
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    remove_action( 'woocommerce_after_shop_loop', 'action_woocommerce_after_shop_loop', 10, 2 );
    add_action( 'woocommerce_after_shop_loop', 'bingo_ruby_wc_after_shop_loop', 10, 2 );
    add_action( 'woocommerce_after_single_product', 'bingo_ruby_wc_after_shop_loop', 10, 2 );
}