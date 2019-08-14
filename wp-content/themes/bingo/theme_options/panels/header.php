<?php
if ( ! function_exists( 'bingo_ruby_theme_options_header' ) ) {
	function bingo_ruby_theme_options_header() {
		return array(
			'id'    => 'bingo_ruby_theme_options_header',
			'title' => esc_html__( 'Header Options', 'bingo' ),
			'desc'  => esc_html__( 'select options for the header', 'bingo' ),
			'icon'  => 'el el-th',
		);
	}
}

//header style config
if ( ! function_exists( 'bingo_ruby_theme_options_header_style' ) ) {
	function bingo_ruby_theme_options_header_style() {
		return array(
			'id'         => 'bingo_ruby_config_section_header_style',
			'title'      => esc_html__( 'Header Style Options', 'bingo' ),
			'desc'       => esc_html__( 'select header style options for your website.', 'bingo' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				//header style
				array(
					'id'     => 'section_start_header_style',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Style', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'header_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Header style', 'bingo' ),
					'subtitle' => esc_html__( 'Select a style for the header.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::header_style(),
					'default'  => '1'
				),
				array(
					'id'     => 'section_end_header_layout',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//logo section area
				array(
					'id'     => 'section_start_header_logo_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Banner Area Layout Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'header_background_type',
					'type'     => 'switch',
					'title'    => esc_html__( 'Banner Area Background Type', 'bingo' ),
					'subtitle' => esc_html__( 'Select background type for the banner area (with the section that is with logo and advertising), Ad will not display when you select image background type and these options will be overridden on header style options.', 'bingo' ),
					'default'  => 1,
					'on'       => 'Color',
					'off'      => 'Image',
				),
				array(
					'id'          => 'header_background_color',
					'required'    => array( 'header_background_type', '=', '1' ),
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'default'     => '#ffffff',
					'title'       => esc_html__( 'Banner Area background color', 'bingo' ),
					'subtitle'    => esc_html__( 'Select a background color for the banner area.', 'bingo' ),
				),
				array(
					'id'       => 'header_background_url',
					'type'     => 'media',
					'required' => array( 'header_background_type', '=', '0' ),
					'title'    => esc_html__( 'Logo Header Background Image', 'bingo' ),
					'subtitle' => esc_html__( 'Upload background for logo area. We recommended image size have at least 1366px width and less than 500px height', 'bingo' )
				),
                array(
                    'id'       => 'hide_background_url',
                    'type'     => 'switch',
                    'required' => array( 'header_background_type', '=', '0' ),
                    'title'    => esc_html__( 'Hide Header Background Image', 'bingo' ),
                    'subtitle' => esc_html__( 'Enable / Disable hide background image in single style 2, 3 and 4.', 'bingo' ),
                    'default'  => 1,
                ),
				array(
					'id'       => 'header_background_height',
					'type'     => 'text',
					'required' => array( 'header_background_type', '=', '0' ),
					'class'    => 'small-text',
					'title'    => esc_html__( 'Banner Area Background Height.', 'bingo' ),
					'subtitle' => esc_html__( 'select a height vaule for this section, default is 320px. Please note: select a value is less than the height of image for parallax animation.', 'bingo' ),
					'default'  => '320'
				),
				array(
					'id'       => 'header_parallax',
					'type'     => 'switch',
					'required' => array( 'header_background_type', '=', '0' ),
					'title'    => esc_html__( 'Parallax Scrolling Animation', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable parallax animation when scrolling', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'       => 'header_social_bar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Social Bar', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable social icon in the section. This options will not work in header styles without this section.', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'       => 'header_social_bar_style',
					'type'     => 'switch',
					'required' => array( 'header_social_bar', '=', '1' ),
					'title'    => esc_html__( 'Social Icon Color Style', 'bingo' ),
					'subtitle' => esc_html__( 'select a color style for social icons.', 'bingo' ),
					'default'  => 1,
					'on'       => 'Light',
					'off'      => 'Dark',
				),
				array(
					'id'     => 'section_end_header_logo_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


//header topbar config
if ( ! function_exists( 'bingo_ruby_theme_options_header_topbar' ) ) {
	function bingo_ruby_theme_options_header_topbar() {
		return array(
			'id'         => 'bingo_ruby_theme_options_header_topbar',
			'title'      => esc_html__( 'Top Bar Options', 'bingo' ),
			'desc'       => esc_html__( 'select options for the top bar.', 'bingo' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				//topbar configs
				array(
					'id'     => 'section_start_header_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top bar Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'topbar',
					'title'    => esc_html__( 'top bar', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the top bar', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'topbar_style',
					'type'     => 'select',
					'title'    => esc_html__( 'Top bar style', 'bingo' ),
					'subtitle' => esc_html__( 'Select a style for the top bar.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::topbar_style(),
					'required' => array( 'topbar', '=', '1' ),
					'default'  => '1'
				),
				array(
					'id'       => 'topbar_navigation',
					'title'    => esc_html__( 'Top Bar Navigation', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the menu in the top bar', 'bingo' ),
					'type'     => 'switch',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => 1
				),
                array(
                    'id'       => 'topbar_cart_icon',
                    'required' => array( 'topbar', '=', '1' ),
                    'title'    => esc_html__( 'Cart icon', 'bingo' ),
                    'subtitle' => esc_html__( 'enable or disable the cart icon of Woocommerce plugin at the top bar', 'bingo' ),
                    'type'     => 'switch',
                    'default'  => 0
                ),
				array(
					'id'       => 'topbar_social',
					'title'    => esc_html__( 'Social bar', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the social bar in the top bar.', 'bingo' ),
					'type'     => 'switch',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => 1
				),
				array(
					'id'       => 'topbar_social_color',
					'title'    => esc_html__( 'Social Color', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable color for the social bar in the top bar', 'bingo' ),
					'type'     => 'switch',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_header_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//topbar elements
				array(
					'id'       => 'section_start_header_topbar_elements',
					'required' => array( 'topbar', '=', '1' ),
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Top Bar Elements Options', 'bingo' ),
					'indent'   => true
				),
				array(
					'id'       => 'topbar_date',
					'title'    => esc_html__( 'Date text', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable date text in the top bar', 'bingo' ),
					'type'     => 'switch',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => 1
				),
				array(
					'id'       => 'topbar_date_format',
					'title'    => esc_html__( 'Date Format', 'bingo' ),
					'subtitle' => html_entity_decode( esc_html__( 'Input the <a href="https://codex.wordpress.org/Formatting_Date_and_Time">date format</a>', 'bingo' ) ),
					'type'     => 'text',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => ''
				),
				array(
					'id'       => 'topbar_date_js',
					'title'    => esc_html__( 'Javascript date', 'bingo' ),
					'subtitle' => esc_html__( 'Date ajax. enable this option if you have a plan to use 3rd cache plugins.', 'bingo' ),
					'type'     => 'switch',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => 0
				),
				array(
					'id'       => 'topbar_phone',
					'title'    => esc_html__( 'Phone Number Info', 'bingo' ),
					'subtitle' => esc_html__( 'Input a company phone, Leave blank if you want to remove it.', 'bingo' ),
					'type'     => 'text',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => ''
				),
				array(
					'id'       => 'topbar_email',
					'title'    => esc_html__( 'Email Info', 'bingo' ),
					'subtitle' => esc_html__( 'Input a email address, Leave blank if you want to remove it.', 'bingo' ),
					'type'     => 'text',
					'required' => array( 'topbar', '=', '1' ),
					'default'  => ''
				),
				array(
					'id'     => 'section_end_header_topbar_elements',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//Topbar subscribe
				array(
					'id'       => 'section_start_header_topbar_subscribe',
					'required' => array( 'topbar', '=', '1' ),
					'type'     => 'section',
					'class'    => 'ruby-section-start',
					'title'    => esc_html__( 'Top Bar Subscribe Popup Options', 'bingo' ),
					'indent'   => true
				),
				array(
					'id'       => 'topbar_subscribe',
					'required' => array( 'topbar', '=', '1' ),
					'type'     => 'switch',
					'title'    => esc_html__( 'subscribe button', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable MailChimp subscribe button in the top bar. This option requests to install MailChimp for WordPress plugin to work.', 'bingo' ),
					'default'  => 0
				),
                array(
                    'id'       => 'subscribe_button_text',
                    'required' => array( 'topbar_subscribe', '=', '1' ),
                    'type'     => 'text',
                    'title'    => esc_html__( 'Subscribe button text', 'bingo' ),
                    'subtitle' => esc_html__( 'Enter subscribe button text.', 'bingo' ),
                    'default'  => 'subscribe',
                ),
				array(
					'id'       => 'subscribe_text_style',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'image_select',
					'title'    => esc_html__( 'Subscribe Text Style', 'bingo' ),
					'subtitle' => esc_html__( 'Select text color for subscribe form.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::text_style(),
					'default'  => 'is-dark-text'
				),
				array(
					'id'       => 'subscribe_logo',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'media',
					'title'    => esc_html__( 'subscribe logo upload', 'bingo' ),
					'subtitle' => esc_html__( 'upload your logo (100x30)px, allowed extensions are .jpg, .png and .gif', 'bingo' )
				),
				array(
					'id'       => 'subscribe_title',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'text',
					'title'    => esc_html__( 'Subscribe title', 'bingo' ),
					'subtitle' => esc_html__( 'Enter subscribe title.', 'bingo' ),
					'default'  => '',
				),
				array(
					'id'       => 'subscribe_text',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'textarea',
					'title'    => esc_html__( 'Subscribe Description', 'bingo' ),
					'subtitle' => esc_html__( 'Enter a short subscribe description (text and HTML is allowed).', 'bingo' ),
					'default'  => '',
				),
				array(
					'id'       => 'topbar_subscribe_shortcode',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'text',
					'title'    => esc_html__( 'subscribe shortcode', 'bingo' ),
					'subtitle' => esc_html__( 'input your mailChimp subscribe shortcode.', 'bingo' ),
					'default'  => ''
				),
				array(
					'id'       => 'subscribe_social_bar',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'switch',
					'title'    => esc_html__( 'Subscribe Social Bar', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the subscribe social bar.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'subscribe_social_color',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'type'     => 'switch',
					'title'    => esc_html__( 'Subscribe Social Color', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable color style for the subscribe social bar.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'topbar_subscribe_background',
					'type'     => 'media',
					'required' => array( 'topbar_subscribe', '=', '1' ),
					'title'    => esc_html__( 'subscribe background', 'bingo' ),
					'subtitle' => esc_html__( 'Upload a background for the subscribe popup.', 'bingo' )
				),
				array(
					'id'     => 'section_end_header_topbar_subscribe',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//header navigation config
if ( ! function_exists( 'bingo_ruby_theme_options_header_navbar' ) ) {
	function bingo_ruby_theme_options_header_navbar() {
		return array(
			'id'         => 'bingo_ruby_theme_options_header_navbar',
			'title'      => esc_html__( 'Navigation Options', 'bingo' ),
			'desc'       => esc_html__( 'select options for the main navigation.', 'bingo' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				//main navigation
				array(
					'id'     => 'section_start_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Main navigation options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'navbar_sticky',
					'type'     => 'switch',
					'title'    => esc_html__( 'Sticky Navigation', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the sticky feature for the main navigation.', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'       => 'navbar_sticky_smart',
					'type'     => 'switch',
					'title'    => esc_html__( 'Smart sticky', 'bingo' ),
					'subtitle' => esc_html__( 'Only stick the main navigation when scrolling up.', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_main_navigation',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//navigation elements
				array(
					'id'     => 'section_start_navigation_elements',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Navigation elements options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'navbar_social',
					'type'     => 'switch',
					'title'    => esc_html__( 'social icons', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable social icons at the right of the main navigation bar. This option will not show on some header style ie: style 3, 5, 6, 9', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'       => 'navbar_social_color',
					'type'     => 'switch',
					'title'    => esc_html__( 'social color', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable color for social icons.', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'       => 'navbar_search',
					'type'     => 'switch',
					'title'    => esc_html__( 'search icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the search icon at the right of the main navigation bar.', 'bingo' ),
					'default'  => 1
				),
                array(
                    'id'       => 'navbar_ajax_search',
                    'required' => array( 'navbar_search', '=', '1' ),
                    'type'     => 'switch',
                    'title'    => esc_html__( 'ajax search', 'bingo' ),
                    'subtitle' => esc_html__( 'Enable or disable the ajax search.', 'bingo' ),
                    'default'  => 1
                ),
				array(
					'id'       => 'off_canvas_button',
					'type'     => 'switch',
					'title'    => esc_attr__( 'Show Off Canvas Button', 'bingo' ),
					'subtitle' => esc_attr__( 'Enable or disable the off-canvas button at the left of the main navigation bar.', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_navigation_elements',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//header off-canvas config
if ( ! function_exists( 'bingo_ruby_theme_options_header_offcanvas' ) ) {
	function bingo_ruby_theme_options_header_offcanvas() {
		return array(
			'id'         => 'bingo_ruby_config_section_header_offcanvas',
			'title'      => esc_html__( 'Off-Canvas Options', 'bingo' ),
			'desc'       => esc_html__( 'select options for the off-canvas section (the section displays the mobile navigation on mobile devices)', 'bingo' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_off_canvas_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_attr__( 'off-canvas options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'off_canvas_style',
					'type'     => 'select',
					'title'    => esc_attr__( 'off-canvas style', 'bingo' ),
					'subtitle' => esc_attr__( 'Select a style for the off-canvas section.', 'bingo' ),
					'options'  => array(
						'light' => esc_html__( 'Light Style', 'bingo' ),
						'dark'  => esc_html__( 'Dark Style', 'bingo' )
					),
					'default'  => 'light'
				),
				array(
					'id'       => 'off_canvas_social_bar',
					'type'     => 'switch',
					'title'    => esc_attr__( 'Social Icons', 'bingo' ),
					'subtitle' => esc_attr__( 'Enable or disable social icons in the off-canvas section.', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'       => 'off_canvas_widget_section',
					'type'     => 'switch',
					'title'    => esc_attr__( 'Widgets Section', 'bingo' ),
					'subtitle' => esc_attr__( 'Enable or disable the widgets section in the off-canvas section.', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_off_canvas_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}