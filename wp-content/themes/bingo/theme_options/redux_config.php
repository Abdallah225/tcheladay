<?php
//template directory
$bingo_ruby_template_directory = get_template_directory();

//Redux config
require_once $bingo_ruby_template_directory . '/theme_options/redux_default.php';

if ( ! class_exists( 'Redux' ) ) {
	return false;
}

if ( class_exists( 'bingo_ruby_one_click_to_import' ) ) {
	add_action( 'redux/extensions/bingo_ruby_theme_options/before', array(
		'bingo_ruby_one_click_to_import',
		'bingo_ruby_register_extension_loader'
	), 0 );
}
require_once $bingo_ruby_template_directory . '/theme_options/redux_imported.php';

if ( ! function_exists( 'bingo_ruby_overload_textarea_field' ) ) {
	add_filter( 'redux/bingo_ruby_theme_options/field/class/textarea', 'bingo_ruby_overload_textarea_field' );
	function bingo_ruby_overload_textarea_field( $field ) {
		return get_template_directory() . '/theme_options/redux_field_script.php';
	}
}

require_once $bingo_ruby_template_directory . '/theme_options/redux_style.php';

//panels configs
require_once $bingo_ruby_template_directory . '/theme_options/panels/general.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/header.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/logo.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/styling.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/breaking_news.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/sidebar.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/blog.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/footer.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/mic.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/social.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/share.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/advertising.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/typo.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/color.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/woocommerce.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/single_post.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/single_post_styling.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/single_post_layout.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/single_post_related.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/single_post_share.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/category.php';
require_once $bingo_ruby_template_directory . '/theme_options/panels/page.php';


$bingo_ruby_theme    = wp_get_theme();
$bingo_ruby_opt_name = 'bingo_ruby_theme_options';

$bingo_ruby_args = array(
	'opt_name'             => $bingo_ruby_opt_name,
	'display_name'         => $bingo_ruby_theme->get( 'Name' ),
	'display_version'      => $bingo_ruby_theme->get( 'Version' ),
	'menu_type'            => 'menu',
	'allow_sub_menu'       => true,
	'menu_title'           => esc_html__( 'Bingo Options', 'bingo' ),
	'page_title'           => esc_html__( 'Bingo Options', 'bingo' ),
	'google_api_key'       => '',
	'google_update_weekly' => false,
	'async_typography'     => false,
	'admin_bar'            => true,
	'admin_bar_icon'       => 'dashicons-admin-generic',
	'admin_bar_priority'   => 50,
	'global_variable'      => $bingo_ruby_opt_name,
	'dev_mode'             => false,
	'update_notice'        => false,
	'customizer'           => true,
	'page_priority'        => 54,
	'page_parent'          => 'themes.php',
	'page_permissions'     => 'manage_options',
	'menu_icon'            => '',
	'last_tab'             => '',
	'page_icon'            => 'icon-themes',
	'page_slug'            => '',
	'save_defaults'        => true,
	'default_show'         => false,
	'default_mark'         => '',
	'show_import_export'   => true,
	'transient_time'       => 60 * MINUTE_IN_SECONDS,
	'use_cdn'              => true,
	'output'               => true,
	'output_tag'           => true,
	'disable_tracking'     => true,
	'database'             => '',
	'system_info'          => false,
	'show_options_object'  => false
);

//Set arguments for framework
Redux::setArgs( $bingo_ruby_opt_name, $bingo_ruby_args );

Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_general() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_styling() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_header() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_header_style() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_header_topbar() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_header_navbar() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_header_offcanvas() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_logo() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_breaking_news() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_sidebar() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_footer() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_blog() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_single_post() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_single_post_styling() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_single_post_layout() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_single_post_related() );
if ( function_exists( 'bingo_ruby_plugin_render_shares' ) ) {
	Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_single_post_share() );
}
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_category() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_page() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_default_page_config() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_author_page_config() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_search_page_config() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_archive_page_config() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_author_team_page_config() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_social_profile() );
if ( function_exists( 'bingo_ruby_plugin_render_shares' ) ) {
	Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_share_post() );
}
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography_header() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography_body() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography_post() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography_meta() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography_heading() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_typography_breadcrumb() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_advertising() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_advertising_header() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_advertising_single() );
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_color() );
if ( class_exists( 'Woocommerce' ) ) {
	Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_woocommerce() );
}
Redux::setSection( $bingo_ruby_opt_name, bingo_ruby_theme_options_import_export() );
