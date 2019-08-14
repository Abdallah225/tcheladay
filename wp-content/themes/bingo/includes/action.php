<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * redirect to active plugin
 */
if ( ! function_exists( 'bingo_ruby_after_theme_active' ) ) {
	function bingo_ruby_after_theme_active() {

		global $pagenow;

		if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {

			$first_active = get_option( 'bingo_ruby_first_active_theme', '' );
			if ( ! empty( $first_active ) ) {
				update_option( 'bingo_ruby_first_active_theme', '1' );
			} else {
				add_option( 'bingo_ruby_first_active_theme', '1' );
			}

			wp_redirect( admin_url( 'admin.php?page=bingo-plugins' ) );
			exit;
		}
	}

	add_action( 'after_switch_theme', 'bingo_ruby_after_theme_active' );
}


//default fonts
if ( ! function_exists( 'bingo_ruby_font_urls' ) ) {
	function bingo_ruby_font_urls() {

		$fonts_url       = '';
		$font_lato       = _x( 'on', 'Lato font: on or off', 'bingo' );
		$font_montserrat = _x( 'on', 'Montserrat font: on or off', 'bingo' );

		if ( 'off' !== $font_lato || 'off' !== $font_montserrat ) {
			$font_families = array();

			if ( 'off' !== $font_lato ) {
				$font_families[] = 'Lato:400,700,400italic,700italic';
			}

			if ( 'off' !== $font_montserrat ) {
				$font_families[] = 'Montserrat:300,400,500,600,700';
			}

			$params = array(
				'family' => urlencode( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin,latin-ext' ),
			);

			$fonts_url = add_query_arg( $params, 'https://fonts.googleapis.com/css' );

		}

		return $fonts_url;
	}
}

//add default fonts
if ( ! class_exists( 'ReduxFramework' ) && ! function_exists( 'bingo_ruby_add_default_font' ) ) {
	function bingo_ruby_add_default_font() {
		wp_enqueue_style( 'google-font-lato-montserrat', esc_url_raw( bingo_ruby_font_urls() ), array(), null );
	}

	add_action( 'wp_enqueue_scripts', 'bingo_ruby_add_default_font' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $body_classes
 *
 * @return array
 * add class to body
 */
if ( ! function_exists( 'bingo_ruby_body_add_classes' ) ) {
	function bingo_ruby_body_add_classes( $body_classes ) {

		$body_classes[] = 'ruby-body';

		//sticky navigation
		$navbar_sticky                     = bingo_ruby_core::get_option( 'navbar_sticky' );
		$navbar_sticky_smart               = bingo_ruby_core::get_option( 'navbar_sticky_smart' );
		$site_layout                       = bingo_ruby_core::get_option( 'main_site_layout' );
		$site_bg                           = bingo_ruby_core::get_option( 'site_background' );
		$site_background_link              = bingo_ruby_core::get_option( 'site_background_link' );
		$site_bg_fw                        = bingo_ruby_core::get_option( 'site_background_fw' );
		$single_content_padding            = bingo_ruby_core::get_option( 'single_post_content_padding' );
		$bingo_ruby_header_background_type = bingo_ruby_core::get_option( 'header_background_type' );
		$bingo_ruby_header_background_url  = bingo_ruby_core::get_option( 'header_background_url' );
		$bingo_ruby_rtl                    = bingo_ruby_core::get_option( 'ruby_rtl' );
		$hide_header_bg                    = bingo_ruby_core::get_option( 'hide_background_url' );
		$data_layout_single                = bingo_ruby_single_post_check_layout();
		$site_smooth_displays_style        = bingo_ruby_check_smooth_style();
		$social_twitter                    = bingo_ruby_core::get_option( 'social_twitter' );

		if ( $site_layout == 'is-boxed' || ! empty( $site_bg_fw['background-image'] ) ) {
			$body_classes[] = 'is-boxed';
			if ( ! empty( $site_bg ) ) {
				$body_classes[] = 'is-site-bg';
			}
			if ( ! empty( $site_background_link ) ) {
				$body_classes[] = 'is-site-link';
			}
		} else {
			$body_classes[] = 'is-full-width';
			if ( ! empty( $site_bg_fw ) ) {
				$body_classes[] = 'is-site-bg-fw';
			}
		}

		if ( ! empty( $navbar_sticky ) ) {
			$body_classes[] = 'is-navbar-sticky';
		}

		if ( ! empty( $navbar_sticky_smart ) ) {
			$body_classes[] = 'is-smart-sticky';
		}

		if ( ! empty( $site_smooth_displays_style ) ) {
			$body_classes[] = 'is-site-smooth-display';
		}

		if ( ! empty( $bingo_ruby_rtl ) ) {
			$body_classes[] = 'rtl';
			$body_classes[] = 'is-style-rtl';
		}

		if ( is_singular() ) {
			if ( class_exists( 'MyTwitter' ) && ! empty( $social_twitter ) ) {
				$body_classes[] = 'is-widget-twitter';
			}
		}

		if ( is_single() ) {
			if ( ! empty( $single_content_padding ) ) {
				$body_classes[] = 'is-entry-padding';
			}

			if ( ! empty( $hide_header_bg ) && 0 == $bingo_ruby_header_background_type && ! empty( $bingo_ruby_header_background_url['url'] ) && ( $data_layout_single['layout'] == '2' || $data_layout_single['layout'] == '3' || $data_layout_single['layout'] == '4' ) ) {
				$body_classes[] = 'hide-header-background';
			}
		}

		//return
		return $body_classes;
	}

	add_filter( 'body_class', 'bingo_ruby_body_add_classes' );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * Mailchimp for WP.
 */
if ( function_exists( '_mc4wp_load_plugin' ) ) {
	function bingo_ruby_mc4wp_form_after_form( $str ) {
		$str .= '<p class="newsletter-privacy">' . esc_html__( 'Don\'t worry we don\'t spam', 'bingo' ) . '</p>';

		return $str;
	}

	function bingo_ruby_mc4wp_form_content( $str ) {
		$str .= '<span class="ruby-icon-mail"><i class="fa fa-envelope-o"></i></span>';

		return $str;
	}


	add_filter( 'mc4wp_form_after_fields', 'bingo_ruby_mc4wp_form_after_form', 10, 2 );
	add_filter( 'mc4wp_form_content', 'bingo_ruby_mc4wp_form_content', 10, 3 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * remove page in search
 */
if ( ! function_exists( 'bingo_ruby_filter_search' ) ) {
	function bingo_ruby_filter_search() {

		if ( is_admin() ) {
			return false;
		}

		$ruby_search_filter = bingo_ruby_core::get_option( 'search_filter' );
		if ( empty( $ruby_search_filter ) ) {
			return false;
		}

		global $wp_post_types;
		$wp_post_types['page']->exclude_from_search = true;
	}

	add_action( 'pre_get_posts', 'bingo_ruby_filter_search' );
};


/**-------------------------------------------------------------------------------------------------------------------------
 * search posts per page
 */
if ( ! function_exists( 'bingo_ruby_filter_search_per_page' ) ) {
	function bingo_ruby_filter_search_per_page( $query ) {

		if ( is_admin() ) {
			return false;
		}

		if ( $query->is_main_query() ) {
			if ( $query->is_search() ) {
				$search_posts_per_page = bingo_ruby_core::get_option( 'search_posts_per_page' );
				if ( ! empty( $search_posts_per_page ) ) {
					$query->set( 'posts_per_page', $search_posts_per_page );
				}
			}
		}
	}

	add_action( 'pre_get_posts', 'bingo_ruby_filter_search_per_page' );
};


/**-------------------------------------------------------------------------------------------------------------------------
 * add options to javascript
 */
if ( ! function_exists( 'bingo_ruby_script_options_value' ) ) {
	function bingo_ruby_script_options_value() {

		$back_to_top        = bingo_ruby_core::get_option( 'site_back_to_top' );
		$back_to_top_mobile = bingo_ruby_core::get_option( 'site_back_to_top_mobile' );
		$smooth_scroll      = bingo_ruby_core::get_option( 'site_smooth_scroll' );
		$social_tooltip     = bingo_ruby_core::get_option( 'social_tooltip' );
		$single_image_popup = bingo_ruby_core::get_option( 'single_popup_image' );
		$main_site_bg_link  = bingo_ruby_core::get_option( 'site_background_link' );

		//move to js script
		if ( ! empty( $back_to_top ) ) {
			wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_to_top', '1' );
		}

		if ( ! empty( $back_to_top_mobile ) ) {
			wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_to_top_mobile', '1' );
		}

		if ( ! empty( $smooth_scroll ) ) {
			wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_site_smooth_scroll', '1' );
		}

		if ( ! empty( $social_tooltip ) ) {
			wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_social_tooltip', '1' );
		}

		if ( ! empty( $single_image_popup ) ) {
			wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_single_image_popup', strval( $single_image_popup ) );
		}

		if ( 'is-boxed' == bingo_ruby_core::get_option( 'main_site_layout' ) && ! empty( $main_site_bg_link ) ) {
			wp_localize_script( 'bingo_ruby_script_main', 'bingo_ruby_site_bg_link', strval( $main_site_bg_link ) );
		}
	}

	add_action( 'wp_footer', 'bingo_ruby_script_options_value', 10 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * add BookmarkLet to header
 */
if ( ! function_exists( 'bingo_ruby_wp_header' ) ) {
	function bingo_ruby_wp_header() {

		//get theme options
		$apple_icon = bingo_ruby_core::get_option( 'apple_touch_ion' );
		$metro_icon = bingo_ruby_core::get_option( 'metro_icon' );

		//iso bookmark
		if ( ! empty( $apple_icon['url'] ) ) {
			echo '<link rel="apple-touch-icon" href="' . esc_url( $apple_icon['url'] ) . '" />';
		}

		//metro bookmark
		if ( ! empty( $metro_icon['url'] ) ) {
			echo '<meta name="msapplication-TileColor" content="#ffffff">';
			echo '<meta name="msapplication-TileImage" content="' . esc_url( $metro_icon['url'] ) . '" />';
		}
	}

	add_action( 'wp_head', 'bingo_ruby_wp_header', 3 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @param $image
 * @param $attachment_id
 * @param $size
 * @param $icon
 *
 * @return array|false
 * support gif
 */
if ( ! function_exists( 'bingo_ruby_support_gif' ) ) {
	function bingo_ruby_support_gif( $image, $attachment_id, $size, $icon ) {

		$gif_support = bingo_ruby_core::get_option( 'gif_support' );
		if ( ! empty( $gif_support ) ) {
			$format = wp_check_filetype( $image[0] );

			if ( ! empty( $format ) && 'gif' == $format['ext'] && 'full' != $size ) {
				return wp_get_attachment_image_src( $attachment_id, $size = 'full', $icon );
			}
		}

		return $image;
	}

	add_filter( 'wp_get_attachment_image_src', 'bingo_ruby_support_gif', 10, 4 );
}


/**-------------------------------------------------------------------------------------------------------------------------
 * add span tag for default categories widget
 */
if ( ! function_exists( 'bingo_ruby_category_widget_span' ) ) {
	function bingo_ruby_category_widget_span( $str ) {
		$pos = strpos( $str, '</a> (' );
		if ( false != $pos ) {
			$str = str_replace( '</a> (', '<span class="number-post-count">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}

	add_filter( 'wp_list_categories', 'bingo_ruby_category_widget_span' );
};


/**-------------------------------------------------------------------------------------------------------------------------
 * add span tag for default archive widget
 */
if ( ! function_exists( 'bingo_ruby_archives_widget_span' ) ) {
	function bingo_ruby_archives_widget_span( $str ) {
		$pos = strpos( $str, '</a>&nbsp;(' );
		if ( false != $pos ) {
			$str = str_replace( '</a>&nbsp;(', '<span class="number-post-count">', $str );
			$str = str_replace( ')', '</span></a>', $str );
		}

		return $str;
	}

	add_filter( 'get_archives_link', 'bingo_ruby_archives_widget_span' );
}

/**-------------------------------------------------------------------------------------------------------------------------
 * @param $redirect_url
 *
 * @return bool
 * permalinks
 */
if ( ! function_exists( 'bingo_ruby_pagination_redirect' ) ) {
	function bingo_ruby_pagination_redirect( $redirect_url ) {
		global $wp_query;

		if ( is_page() && ! is_feed() && isset( $wp_query->queried_object ) && get_query_var( 'page' ) && 'page-composer.php' == get_page_template_slug( $wp_query->queried_object->ID ) ) {
			return false;
		}

		return $redirect_url;
	}

	add_filter( 'redirect_canonical', 'bingo_ruby_pagination_redirect', 10 );
}
