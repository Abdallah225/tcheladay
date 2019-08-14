<?php
/**
 * Plugin Name:    Bingo Core
 * Plugin URI:     http://themeruby.com/
 * Description:    Core Features for BINGO, this is required plugin for this theme.
 * Version:        1.8
 * Text Domain:    bingo-core
 * Domain Path:    /languages/
 * Author:         Theme-Ruby
 * Author URI:     https://themeforest.net/user/theme-ruby/
 * @package        bingo-ruby-core
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Plugin Folder URL
if ( ! defined( 'BINGO_RUBY_PLUGIN_URL' ) ) {
	define( 'BINGO_RUBY_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

//load translate
if ( ! function_exists( 'bingo_ruby_plugin_language_load' ) ) {
	add_action( 'init', 'bingo_ruby_plugin_language_load' );
	function bingo_ruby_plugin_language_load() {
		$plugin_dir = basename( dirname( __FILE__ ) ) . '/languages/';
		load_plugin_textdomain( 'bingo-core', false, $plugin_dir );
	}
}

if ( ! function_exists( 'bingo_ruby_plugin_enqueue_scripts' ) ) {
	function bingo_ruby_plugin_enqueue_scripts() {

		wp_enqueue_style( 'bingo_ruby_plugin_style', BINGO_RUBY_PLUGIN_URL . 'assets/style.css', array(), '1.6', 'all' );
		wp_enqueue_script( 'bingo_ruby_plugin_scripts', BINGO_RUBY_PLUGIN_URL . 'assets/script.js', array( 'jquery' ), '1.6', true );

	}

	add_action( 'wp_enqueue_scripts', 'bingo_ruby_plugin_enqueue_scripts', 1 );
}

global $bingo_ruby_theme_options;
if ( ! class_exists( 'ReduxFramework' ) ) {
	include_once( 'lib/redux-framework/framework.php' );
}

if ( ! class_exists( 'RW_Taxonomy_Meta' ) ) {
	include_once( 'includes/taxonomy-meta.php' );
}

include_once( 'includes/shortcode.php' );
include_once( 'includes/social.php' );
include_once( 'includes/social_media.php' );
include_once( 'includes/view.php' );
include_once( 'widgets/sb_widget_post.php' );
include_once( 'widgets/sb_widget_tabs.php' );
include_once( 'widgets/sb_widget_tweet.php' );
include_once( 'widgets/sb_widget_flickr.php' );
include_once( 'widgets/sb_widget_subscribe.php' );
include_once( 'widgets/sb_widget_social_counter.php' );
include_once( 'widgets/sb_widget_video.php' );
include_once( 'widgets/sb_widget_ad.php' );
include_once( 'widgets/sb_widget_cat_banner.php' );
include_once( 'widgets/sb_widget_comment.php' );
include_once( 'widgets/sb_widget_quote.php' );
include_once( 'widgets/sb_widget_fb.php' );
include_once( 'widgets/sb_widget_contact_info.php' );
include_once( 'widgets/sb_widget_about.php' );
include_once( 'widgets/sb_widget_social_icon.php' );
include_once( 'widgets/sb_widget_instagram.php' );
include_once( 'widgets/widget_instagram.php' );

