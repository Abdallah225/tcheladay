<?php
/**
 * this is general config
 */
if ( ! function_exists( 'bingo_ruby_theme_options_general' ) ) {
	function bingo_ruby_theme_options_general() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_section_general',
			'title'  => esc_html__( 'General Options', 'bingo' ),
			'desc'   => esc_html__( 'Select general options for your website.', 'bingo' ),
			'icon'   => 'el el-icon-globe',
			'fields' => array(
				array(
					'id'     => 'section_start_site_width',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'General Options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'main_site_layout',
					'type'     => 'select',
					'title'    => esc_html__( 'Main Site Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a layout for your site. The theme supports full width and boxed layouts.', 'bingo' ),
					'options'  => array(
						'is-full-width' => esc_html__( 'Full Width', 'bingo' ),
						'is-boxed'      => esc_html__( 'Boxed', 'bingo' )
					),
					'default'  => 'is-full-width'
				),
				array(
					'id'          => 'site_background',
					'type'        => 'background',
					'required'    => array( 'main_site_layout', '=', 'is-boxed' ),
					'transparent' => false,
					'title'       => esc_html__( 'Site Background', 'bingo' ),
					'subtitle'    => esc_html__( 'select a body background for your website.', 'bingo' ),
					'default'     => array(
						'background-color'      => '#f9f9f9',
						'background-size'       => 'inherit',
						'background-attachment' => 'fixed',
						'background-position'   => 'left top',
						'background-repeat'     => 'repeat'
					),
					'output'      => array( 'body' ),
				),
				array(
					'id'       => 'site_background_link',
					'type'     => 'text',
					'required' => array( 'main_site_layout', '=', 'is-boxed' ),
					'validate' => 'url',
					'title'    => esc_html__( 'BG Navigate URL', 'bingo' ),
					'subtitle' => esc_html__( 'input a destination URL when users click on the background. this option is useful if you have a plan to use the background as an ad banner.', 'bingo' ),
					'default'  => ''
				),
				array(
					'id'            => 'site_container_width',
					'type'          => 'slider',
					'title'         => esc_html__( 'Max width of Body', 'bingo' ),
					'subtitle'      => esc_html__( 'Controls the overall max width of the site body (in px), ie: 1080px. default value is 1140px', 'bingo' ),
					'default'       => 1140,
					'min'           => 1000,
					'max'           => 1200,
					'step'          => 10,
					'display_value' => 'text',
				),
				array(
					'id'     => 'section_end_site_width',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//rtl right to left
				array(
					'id'     => 'section_start_rtl',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'RTL Right To Left Options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'ruby_rtl',
					'type'     => 'switch',
					'title'    => esc_html__( 'RTL mode (right to left)', 'bingo' ),
					'subtitle' => esc_html__( 'Enable this option if you are using right to left writing/reading', 'bingo' ),
					'default'  => 0,
				),
				array(
					'id'     => 'section_end_rtl',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//smooth style
				array(
					'id'     => 'section_start_smooth_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Smooth Style Options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_smooth_scroll',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Scroll', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable smooth scrolling with the mouse wheel in all browsers.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'site_smooth_display',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smooth Display', 'bingo' ),
					'subtitle' => esc_html__( 'Adding animation to display featured images when scrolling down.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'site_smooth_display_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Animation Style', 'bingo' ),
					'required' => array( 'site_smooth_display', '=', '1' ),
					'subtitle' => esc_html__( 'Select an animation style for the smooth display feature.', 'bingo' ),
					'options'  => array(
						'ruby-fade'   => esc_html__( 'Fade In', 'bingo' ),
						'ruby-zoom'   => esc_html__( 'Zoom In', 'bingo' ),
						'ruby-bottom' => esc_html__( 'Fade Form Bottom', 'bingo' )
					),
					'default'  => 'ruby-fade'
				),
				array(
					'id'     => 'section_end_smooth_style',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				//breadcrumb config
				array(
					'id'     => 'section_start_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'breadcrumb options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'site_breadcrumb',
					'type'     => 'switch',
					'title'    => esc_html__( 'Breadcrumbs bar', 'bingo' ),
					'subtitle' => esc_html__( 'Breadcrumbs are a hierarchy of links displayed below the main navigation.', 'bingo' ),
					'default'  => 1,
				),
				array(
					'id'       => 'site_breadcrumb_current',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show current page', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the current page link on the breadcrumbs bar.', 'bingo' ),
					'default'  => 1,
				),
				array(
					'id'     => 'section_end_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				array(
					'id'     => 'section_start_miscellaneous',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Miscellaneous options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'apple_touch_ion',
					'type'     => 'media',
					'title'    => esc_html__( 'iOS Bookmarklet Icon', 'bingo' ),
					'subtitle' => esc_html__( 'Upload icon for the Apple touch (72 x 72px), allowed extensions are .jpg, .png, .gif', 'bingo' ),
					'desc'     => esc_html__( '72 x 72px', 'bingo' )
				),
				array(
					'id'       => 'metro_icon',
					'type'     => 'media',
					'title'    => esc_html__( 'Metro UI Bookmartlet Icon', 'bingo' ),
					'subtitle' => esc_html__( 'Upload icon for the Metro interface (144 x 144px), allowed extensions are .jpg, .png, .gif', 'bingo' ),
					'desc'     => esc_html__( '144 x 144px', 'bingo' )
				),
				array(
					'id'     => 'section_end_miscellaneous',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				array(
					'id'     => 'section_start_tooltips',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Tooltips Options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'social_tooltip',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Tooltips', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable tooltips on social icons when hovering on icons.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_tooltips',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false,
				),
				array(
					'id'     => 'section_start_open_graph',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'OpenGraph Options', 'bingo' ),
					'indent' => true,
				),
				array(
					'id'       => 'open_graph',
					'type'     => 'switch',
					'title'    => esc_html__( 'Open Graph', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable open graph. Please disable it if you use a 3rd plugin for SEO', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'facebook_app_id',
					'type'     => 'text',
					'required' => array( 'open_graph', '=', '1' ),
					'title'    => esc_html__( 'Facebook APP ID', 'bingo' ),
					'subtitle' => esc_html__( 'input your facebook app ID.', 'bingo' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_meta_open_graph',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false,
				),
			)
		);
	}
}
