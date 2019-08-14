<?php
//dynamic style
if ( ! function_exists( 'bingo_ruby_dynamic_css' ) ) {
	function bingo_ruby_dynamic_css() {

		//get cache
		$dynamic_css_cache = get_option( 'bingo_ruby_dynamic_css_cache', '' );
		$str               = '';

		if ( empty( $dynamic_css_cache ) ) {

			/************************** MAIN THEME COLOR ********************************/
			$global_color = bingo_ruby_core::get_option( 'main_theme_color' );
			if ( ! empty( $global_color ) && '#55acee' != strtolower( $global_color ) ) {

				//color text
				$str .= 'input[type="button"]:hover, button:hover, .header-search-not-found, .breaking-news-title span, .breaking-news-title .mobile-headline,';
				$str .= '.post-title a:hover, .post-title a:focus, .comment-title h3, h3.comment-reply-title, .comment-list .edit-link, .single-nav a:hover, .single-nav a:focus,';
				$str .= '.subscribe-icon-mail i, .flickr-btn-wrap a, .twitter-content a, .entry del, .entry blockquote p, .entry a:not(button),';
				$str .= '.entry p a, .comment-list .comment-content blockquote p, .author-content-wrap .author-title a:hover, .author-description a, #wp-calendar #today';
				$str .= '{ color: ' . esc_attr( $global_color ) . ';}';

				//color background
				$str .= '.page-numbers.current, a.page-numbers:hover, a.page-numbers:focus, .topbar-subscribe-button a span, .topbar-style-2 .topbar-subscribe-button a span:hover,';
				$str .= '.post-editor:hover, .cat-info-el, .comment-list .comment-reply-link, .single-nav a:hover .ruby-nav-icon, .single-nav a:focus .ruby-nav-icon, input[type="button"].ninja-forms-field,';
				$str .= '.page-search-form .search-submit input[type="submit"], .post-widget-inner .post-counter, .widget_search .search-submit input[type="submit"], .single-page-links .pagination-num > span,';
				$str .= '.single-page-links .pagination-num > a:hover > span, .subscribe-form-wrap .mc4wp-form-fields input[type="submit"], .widget-social-link-info a i, #ruby-back-top i, .entry ul li:before,';
				$str .= '.ruby-trigger .icon-wrap, .ruby-trigger .icon-wrap:before, .ruby-trigger .icon-wrap:after';
				$str .= '{ background-color: ' . esc_attr( $global_color ) . ';}';

				$str .= '.off-canvas-wrap::-webkit-scrollbar-corner, .off-canvas-wrap::-webkit-scrollbar-thumb, .video-playlist-iframe-nav::-webkit-scrollbar-corner, .video-playlist-iframe-nav::-webkit-scrollbar-thumb,';
				$str .= '.fw-block-v2 .video-playlist-iframe-nav::-webkit-scrollbar-corner, .fw-block-v2 .video-playlist-iframe-nav::-webkit-scrollbar-thumb,';
				$str .= '.ruby-coll-scroll::-webkit-scrollbar-corner, .ruby-coll-scroll::-webkit-scrollbar-thumb';
				$str .= '{ background-color: ' . esc_attr( $global_color ) . ' !important;}';


				//color border
				$str .= '.page-numbers.current, a.page-numbers:hover, a.page-numbers:focus, .entry blockquote p';
				$str .= '{ border-color: ' . esc_attr( $global_color ) . ';}';

				//woocommerce
				if ( class_exists( 'Woocommerce' ) ) {

					//color
					$str .= '.woocommerce ul.products li.product .price, .woocommerce div.product p.price';
					$str .= '{ color: ' . esc_attr( $global_color ) . ';}';

					//background
					$str .= '.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit:hover,';
					$str .= '.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce div.product form.cart .button,';
					$str .= 'ul.product_list_widget li.mini_cart_item .remove:hover, .woocommerce nav.woocommerce-pagination .page-numbers.current, .woocommerce nav.woocommerce-pagination a.page-numbers:hover, ';
					$str .= '.woocommerce nav.woocommerce-pagination a.page-numbers:focus ';
					$str .= '{ background-color: ' . esc_attr( $global_color ) . ' !important;}';

					$str .= '#ruby-mini-cart .wc-forward:first-child, #ruby-mini-cart .wc-forward';
					$str .= '{ background-color: ' . esc_attr( $global_color ) . ';}';

				}
			}

			/************************** Font ********************************/
			$post_font = bingo_ruby_core::get_option( 'font_post_title' );
			$meta_font = bingo_ruby_core::get_option( 'font_post_meta_info' );

			//entry h tag font
			if ( ! empty( $post_font['font-family'] ) ) {
				$str .= 'h1, h2, h3, h4, h5, h6,';
				$str .= '.post-meta-counter, .post-counter, .post-review-wrap, .total-number,';
				$str .= '.post-review-info .review-info-score';
				$str .= '{ font-family :' . $post_font['font-family'] . ';}';
			}

			//entry meta font
			if ( ! empty( $meta_font['font-family'] ) ) {
				$str .= '.total-caption ';
				$str .= '{ font-family :' . $meta_font['font-family'] . ';}';
			}

			/************************MAX SITE WIDTH**********************************/
			$ruby_max_width_site = bingo_ruby_core::get_option( 'site_container_width' );

			if ( ! empty( $ruby_max_width_site ) && 1140 != $ruby_max_width_site ) {
				$str .= '.ruby-container { max-width :' . esc_attr( $ruby_max_width_site ) . 'px;}';
				$str .= '.is-boxed .site-outer { max-width :' . esc_attr( intval( $ruby_max_width_site ) + 30 ) . 'px;}';
			}

			/*************************** LOGO HEADER *******************************/
			$header_background_color           = bingo_ruby_core::get_option( 'header_background_color' );
			$header_background_height          = bingo_ruby_core::get_option( 'header_background_height' );
			$is_parallax                       = bingo_ruby_core::get_option( 'header_parallax' );
			$bingo_ruby_header_background_url  = bingo_ruby_core::get_option( 'header_background_url' );
			$bingo_ruby_header_background_type = bingo_ruby_core::get_option( 'header_background_type' );

			if ( ! empty( $header_background_color ) ) {
				$str .= '.banner-background-color { background-color: ' . $header_background_color . '; }';
			}

			if ( $is_parallax == 1 ) {
				$image_height = intval( $header_background_height ) + 120;
			} else {
				$image_height = $header_background_height;
			}

			$table_header_bg_height = intval( $header_background_height ) - 60;
			$table_image_height     = intval( $image_height ) - 60;

			$mb_header_bg_height = intval( $header_background_height ) - 110;
			$mb_image_height     = intval( $image_height ) - 110;

			if ( 0 == $bingo_ruby_header_background_type && ! empty( $bingo_ruby_header_background_url['url'] ) ) {
				$str .= '.header-wrap .header-parallax-wrap { height: ' . esc_attr( $header_background_height ) . 'px; }';
				$str .= '.header-wrap #header-image-parallax { height : ' . esc_attr( $image_height ) . 'px !important; }';

				$str .= '@media only screen and (max-width: 992px) and (min-width: 768px) {';
				$str .= '.header-wrap .header-parallax-wrap { height: ' . esc_attr( $table_header_bg_height ) . 'px; }';
				$str .= '.header-wrap #header-image-parallax { height : ' . esc_attr( $table_image_height ) . 'px !important; }';
				$str .= '}';

				$str .= '@media only screen and (max-width: 767px){';
				$str .= '.header-wrap .header-parallax-wrap { height: ' . esc_attr( $mb_header_bg_height ) . 'px; }';
				$str .= '.header-wrap #header-image-parallax { height : ' . esc_attr( $mb_image_height ) . 'px !important; }';
				$str .= '}';
			}

			/*************************** MAIN NAVIGATION *******************************/
			$main_nav_background  = bingo_ruby_core::get_option( 'main_nav_background' );
			$main_nav_color       = bingo_ruby_core::get_option( 'main_nav_text_color' );
			$main_nav_color_hover = bingo_ruby_core::get_option( 'main_nav_text_color_hover' );

			if ( ! empty( $main_nav_background ) ) {
				$str .= '.navbar-wrap, .navbar-social a, .header-search-popup, .header-search-popup #ruby-search-input ';
				$str .= '{ background-color: ' . $main_nav_background . '; }';
			}

			if ( ! empty( $main_nav_color ) ) {
				$str .= '.navbar-inner, .header-search-popup .btn, .header-search-popup #ruby-search-input, .logo-mobile-text > * { color: ' . $main_nav_color . '; }';

				$str .= '.show-social .ruby-icon-show, .show-social .ruby-icon-show:before, .show-social .ruby-icon-show:after,';
				$str .= '.extend-social .ruby-icon-close:before, .extend-social .ruby-icon-close:after,';
				$str .= '.ruby-trigger .icon-wrap, .ruby-trigger .icon-wrap:before, .ruby-trigger .icon-wrap:after';
				$str .= '{ background-color: ' . $main_nav_color . '; }';

				$str .= '.show-social .ruby-icon-show, .show-social .ruby-icon-show:before, .show-social .ruby-icon-show:after, .extend-social .ruby-icon-close:before, .extend-social .ruby-icon-close:after';
				$str .= '{ border-color: ' . $main_nav_color . '; }';
			}

			if ( ! empty( $main_nav_color_hover ) ) {
				$str .= '.main-menu-inner > li:hover > a, .main-menu-inner > li:focus > a, .main-menu-inner > .current-menu-item > a { color: ' . $main_nav_color_hover . '; }';
			}

			/*************************** SUB NAVIGATION *******************************/
			$sub_nav_background  = bingo_ruby_core::get_option( 'main_sub_nav_background' );
			$sub_nav_color       = bingo_ruby_core::get_option( 'main_nav_sub_level_text_color' );
			$sub_nav_color_hover = bingo_ruby_core::get_option( 'main_nav_sub_level_text_color_hover' );

			if ( ! empty( $sub_nav_background ) ) {
				$str .= '.main-menu-inner .sub-menu { background-color: ' . $sub_nav_background . '; }';
				$str .= '.main-menu-inner > li.is-mega-menu:hover > a:after, .main-menu-inner > li.is-mega-menu:focus > a:after, .main-menu-inner > li.menu-item-has-children:hover > a:after, .main-menu-inner > li.menu-item-has-children:focus > a:after';
				$str .= '{ border-bottom-color: ' . $sub_nav_background . '; }';
				$str .= '.main-menu-inner > li.is-mega-menu:hover > a:before, .main-menu-inner > li.is-mega-menu:focus > a:before, .main-menu-inner > li.menu-item-has-children:hover > a:before, .main-menu-inner > li.menu-item-has-children:focus > a:before { border-bottom-color: ' . $sub_nav_background . '; }';
			}

			if ( ! empty( $sub_nav_color ) ) {
				$str .= '.main-menu-inner .sub-menu, .mega-category-menu .post-title,';
				$str .= '.mega-category-menu .post-meta-info, .mega-category-menu .post-meta-info .vcard';
				$str .= ' { color: ' . $sub_nav_color . '; }';
			}

			if ( ! empty( $sub_nav_color_hover ) ) {
				$str .= '.main-menu-inner .sub-menu.is-sub-default a:hover, .main-menu-inner .sub-menu .current-menu-item > a { color: ' . $sub_nav_color_hover . '; }';
			}

			/************************CATEGORY ICON COLOR**********************************/
			$taxonomy_cat = get_option( 'bingo_ruby_cat_option' ) ? get_option( 'bingo_ruby_cat_option' ) : array();
			foreach ( $taxonomy_cat as $cat_id => $val ) {
				if ( ! empty( $cat_id ) ) {
					if ( ! empty( $val['bingo_ruby_cat_icon_color_picker'] ) && '#55acee' != strtolower( $val['bingo_ruby_cat_icon_color_picker'] ) ) {
						$str .= '.cat-info-el.cat-info-id-' . esc_attr( $cat_id );
						$str .= '{ background-color: ' . esc_attr( $val['bingo_ruby_cat_icon_color_picker'] ) . ' !important;}';
					}
				}
			}

			/************************COPYRIGHT FOOTER**********************************/
			$copyright_text_color = bingo_ruby_core::get_option( 'copyright_text_color' );
			$copyright_background = bingo_ruby_core::get_option( 'background_copyright_color' );

			if ( ! empty( $copyright_text_color ) ) {
				$str .= '.footer-copyright-wrap p';
				$str .= ' { color: ' . $copyright_text_color . '; }';
			}

			if ( ! empty( $copyright_background ) ) {
				$str .= '.footer-copyright-wrap';
				$str .= ' { background-color: ' . $copyright_background . '; }';
			}

			/************************CUSTOM FONT**********************************/
			$font_size_excerpt = bingo_ruby_core::get_option( 'font_excerpt_size' );

			if ( ! empty( $font_size_excerpt ) ) {
				$str .= '.post-excerpt';
				$str .= '{ font-size :' . $font_size_excerpt . 'px;}';
			}


			//save to database
			$save_dynamic_css_cache = addslashes( $str );
			delete_option( 'bingo_ruby_dynamic_css_cache' );
			add_option( 'bingo_ruby_dynamic_css_cache', $save_dynamic_css_cache );

		} else {
			$str .= stripslashes( $dynamic_css_cache );
		}

		wp_add_inline_style( 'bingo_ruby_style_default', $str );
	}

	//add custom css
	add_action( 'wp_enqueue_scripts', 'bingo_ruby_dynamic_css' );
}

//delete css cache
if ( ! function_exists( 'bingo_ruby_delete_dynamic_css_cache' ) ) {
	function bingo_ruby_delete_dynamic_css_cache() {
		delete_option( 'bingo_ruby_dynamic_css_cache' );
	}
}

// delete css cache
add_action( 'redux/options/bingo_ruby_theme_options/saved', 'bingo_ruby_delete_dynamic_css_cache' );
add_action( 'redux/options/bingo_ruby_theme_options/reset', 'bingo_ruby_delete_dynamic_css_cache' );
add_action( 'redux/options/bingo_ruby_theme_options/section/reset', 'bingo_ruby_delete_dynamic_css_cache' );
add_action( 'save_post', 'bingo_ruby_delete_dynamic_css_cache' );
add_action( 'edit_category_form', 'bingo_ruby_delete_dynamic_css_cache' );