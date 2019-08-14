<?php
//theme version
define( 'BINGO_THEME_VERSION', '2.3' );

require_once ABSPATH . 'wp-admin/includes/plugin.php';
load_theme_textdomain( 'bingo', get_template_directory() . '/languages' );

if ( ! function_exists( 'bingo_ruby_theme_setup' ) ) {
	function bingo_ruby_theme_setup() {

		if ( ! isset( $GLOBALS['content_width'] ) ) {
			$GLOBALS['content_width'] = 1200;
		}

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		register_nav_menu( 'bingo_ruby_menu_main', esc_html__( 'Main Navigation', 'bingo' ) );
		register_nav_menu( 'bingo_ruby_menu_topbar', esc_html__( 'Top Navigation', 'bingo' ) );
		register_nav_menu( 'bingo_ruby_menu_offcanvas', esc_html__( 'Off Canvas Navigation', 'bingo' ) );
		register_nav_menu( 'bingo_ruby_menu_footer', esc_html__( 'Footer Navigation', 'bingo' ) );
	}

	add_action( 'after_setup_theme', 'bingo_ruby_theme_setup' );
}


if ( ! function_exists( 'bingo_ruby_register_script_frontend' ) ) {
	function bingo_ruby_register_script_frontend() {
		$bingo_ruby_rtl = bingo_ruby_core::get_option( 'ruby_rtl' );

		wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/external/bootstrap.css', array(), 'v3.3.1', 'all' );
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/external/font-awesome.css', array(), 'v4.7.0', 'all' );
		wp_enqueue_style( 'bingo_ruby_style_miscellaneous', get_template_directory_uri() . '/assets/external/miscellaneous.css', array(), BINGO_THEME_VERSION, 'all' );
		wp_enqueue_style( 'bingo_ruby_style_main', get_template_directory_uri() . '/assets/css/theme-style.css', array(
			'bootstrap',
			'font-awesome',
			'bingo_ruby_style_miscellaneous'
		), BINGO_THEME_VERSION, 'all' );
		wp_enqueue_style( 'bingo_ruby_style_responsive', get_template_directory_uri() . '/assets/css/theme-responsive.css', array(
			'bootstrap',
			'font-awesome',
			'bingo_ruby_style_miscellaneous',
			'bingo_ruby_style_main'
		), BINGO_THEME_VERSION, 'all' );

		if ( ! empty( $bingo_ruby_rtl ) ) {
			wp_enqueue_style( 'bingo_ruby_style_rtl_main', get_template_directory_uri() . '/assets/css/theme-style-rtl.css', array(
				'bootstrap',
				'font-awesome',
				'bingo_ruby_style_miscellaneous',
				'bingo_ruby_style_main'
			), BINGO_THEME_VERSION, 'all' );
			wp_enqueue_style( 'bingo_ruby_style_default', get_stylesheet_uri(), array(
				'bootstrap',
				'font-awesome',
				'bingo_ruby_style_miscellaneous',
				'bingo_ruby_style_main',
				'bingo_ruby_style_responsive',
				'bingo_ruby_style_rtl_main',
			), BINGO_THEME_VERSION );
		} else {
			wp_enqueue_style( 'bingo_ruby_style_default', get_stylesheet_uri(), array(
				'bootstrap',
				'font-awesome',
				'bingo_ruby_style_miscellaneous',
				'bingo_ruby_style_main',
				'bingo_ruby_style_responsive',
			), BINGO_THEME_VERSION );
		}


		if ( class_exists( 'Woocommerce' ) ) {
			wp_register_style( 'bingo_ruby_style_wc', get_template_directory_uri() . '/woocommerce/css/theme-wc.css', array(), BINGO_THEME_VERSION, 'all' );
			wp_enqueue_style( 'bingo_ruby_style_wc' );
		}

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/external/html5.min.js' ), array(), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/external/lib-modernizr.js', array( 'jquery' ), 'v2.8.3', true );
		wp_enqueue_script( 'uitotop', get_template_directory_uri() . '/assets/external/lib-totop.js', array( 'jquery' ), 'v1.2', true );
		wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/external/lib-imagesloaded.js', array( 'jquery' ), 'v3.1.8', true );
		wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/assets/external/lib-waypoints.js', array( 'jquery' ), 'v3.1.1', true );
		wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/external/lib-slick.js', array( 'jquery' ), 'v1.5.8', true );
		wp_enqueue_script( 'tipsy', get_template_directory_uri() . '/assets/external/lib-tipsy.js', array( 'jquery' ), 'v1.0', true );
		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/external/lib-magnificpopup.js', array( 'jquery' ), 'v1.1.0', true );
		wp_enqueue_script( 'justified-gallery', get_template_directory_uri() . '/assets/external/lib-justified.js', array( 'jquery' ), 'v1.1.0', true );
		wp_enqueue_script( 'backstretch', get_template_directory_uri() . '/assets/external/lib-backstretch.js', array( 'jquery' ), 'v2.0.4', true );
		wp_enqueue_script( 'smoothscroll', get_template_directory_uri() . '/assets/external/lib-smoothscroll.js', array( 'jquery' ), 'v1.2.1', true );
		wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/external/lib-bootstrap.js', array( 'jquery' ), 'v3.0', true );
		wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/assets/external/lib-fitvids.js', array( 'jquery' ), 'v1.1', true );
		wp_enqueue_script( 'sticky', get_template_directory_uri() . '/assets/external/lib-sticky.js', array( 'jquery' ), 'v1.0.3', true );
		wp_enqueue_script( 'ruby-sticky', get_template_directory_uri() . '/assets/external/lib-rubysticky.js', array( 'jquery' ), '1.0', true );

		wp_enqueue_script( 'bingo_ruby_script_main', get_template_directory_uri() . '/assets/js/theme-script.js', array(
			'jquery',
			'modernizr',
			'uitotop',
			'imagesloaded',
			'waypoints',
			'slick',
			'tipsy',
			'magnific-popup',
			'justified-gallery',
			'backstretch',
			'smoothscroll',
			'bootstrap',
			'fitvids',
			'sticky',
			'ruby-sticky'

		), BINGO_THEME_VERSION, true );

	}

	if ( ! is_admin() ) {
		add_action( 'wp_enqueue_scripts', 'bingo_ruby_register_script_frontend' );
	}
}


if ( ! function_exists( 'bingo_ruby_add_image_size' ) ) {
	function bingo_ruby_add_image_size() {

		add_theme_support( 'post-thumbnails' );

		add_image_size( 'bingo_ruby_crop_110x85', 110, 85, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_300x424', 300, 424, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_365x330', 365, 330, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_540x370', 540, 370, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_540x540', 540, 540, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_750x450', 750, 450, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_1000x550', 1000, 550, array( 'center', 'top' ) );
		add_image_size( 'bingo_ruby_crop_1200x750', 1200, 750, array( 'center', 'top' ) );
	}

	add_action( 'after_setup_theme', 'bingo_ruby_add_image_size' );
}

require_once get_template_directory() . '/includes/theme_includes.php';
require_once get_template_directory() . '/metaboxes/metabox_config.php';
require_once get_template_directory() . '/composer/composer.php';
require_once get_template_directory() . '/templates/template_includes.php';