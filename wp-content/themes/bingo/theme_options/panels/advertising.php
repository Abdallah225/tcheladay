<?php
if ( ! function_exists( 'bingo_ruby_theme_options_advertising' ) ) {
	function bingo_ruby_theme_options_advertising() {
		return array(
			'id'    => 'bingo_ruby_config_section_advertising',
			'title' => esc_html__( 'Advertising Options', 'bingo' ),
			'desc'  => esc_html__( 'Input your scrips or custom advertising for your website, this panel will support adverting for header and single', 'bingo' ),
			'icon'  => 'el el-graph',
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * header advertising configs
 */
if ( ! function_exists( 'bingo_ruby_theme_options_advertising_header' ) ) {
	function bingo_ruby_theme_options_advertising_header() {
		return array(
			'id'         => 'bingo_ruby_config_section_header_ad',
			'title'      => esc_html__( 'Header Advertising', 'bingo' ),
			'desc'       => esc_html__( 'setup your advertising banners for the header', 'bingo' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_header_ad',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'header advertising options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'header_ad_type',
					'type'     => 'select',
					'title'    => esc_html__( 'header advertising type', 'bingo' ),
					'subtitle' => esc_html__( 'Select advertising type for the header, this advertising will display at the header of your website', 'bingo' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'bingo' ),
						'custom' => esc_html__( 'Custom Image', 'bingo' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'header_ad_script',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'header_ad_type', '=', 'script' ),
					'title'    => esc_html__( 'Advertising code', 'bingo' ),
					'subtitle' => esc_html__( 'Paste in your advertising code (with "script" tag), the theme will modify the codes to responsive your advertising on all devices.', 'bingo' ),
				),
				array(
					'id'       => 'header_ad_image',
					'type'     => 'media',
					'required' => array( 'header_ad_type', '=', 'custom' ),
					'title'    => esc_html__( 'advertising image', 'bingo' ),
					'subtitle' => esc_html__( 'upload your advertising image (recommended size is about 728x90px)', 'bingo' ),
				),
				array(
					'id'       => 'header_ad_url',
					'type'     => 'text',
					'required' => array( 'header_ad_type', '=', 'custom' ),
					'title'    => esc_html__( 'advertising URL', 'bingo' ),
					'subtitle' => esc_html__( 'input your custom advertising URL', 'bingo' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_header_ad',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * @return array
 * single advertising configs
 */
if ( ! function_exists( 'bingo_ruby_theme_options_advertising_single' ) ) {
	function bingo_ruby_theme_options_advertising_single() {
		return array(
			'id'         => 'bingo_ruby_config_section_single_ad',
			'title'      => esc_html__( 'Single Advertising', 'bingo' ),
			'desc'       => esc_html__( 'setup your advertising banners for the single post page', 'bingo' ),
			'icon'       => 'el el-th',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single post top advertising', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'header_ad_type_single',
					'type'     => 'select',
					'title'    => esc_html__( 'single post - top advertising type', 'bingo' ),
					'subtitle' => esc_html__( 'select advertising type, this advertising will display at the top post content of single post page', 'bingo' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'bingo' ),
						'custom' => esc_html__( 'Custom Image', 'bingo' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'header_ad_script_single',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'header_ad_type_single', '=', 'script' ),
					'title'    => esc_html__( 'advertising code', 'bingo' ),
					'subtitle' => esc_html__( 'Paste in your advertising code (with "script" tag), the theme will modify the codes to responsive your advertising on all devices.', 'bingo' ),
				),
				array(
					'id'       => 'header_ad_image_single',
					'type'     => 'media',
					'required' => array( 'header_ad_type_single', '=', 'custom' ),
					'title'    => esc_html__( 'advertising image', 'bingo' ),
					'subtitle' => esc_html__( 'upload your advertising image (recommended size is about 728x90px)', 'bingo' ),
				),
				array(
					'id'       => 'header_ad_url_single',
					'type'     => 'text',
					'required' => array( 'header_ad_type_single', '=', 'custom' ),
					'title'    => esc_html__( 'advertising URL', 'bingo' ),
					'subtitle' => esc_html__( 'input your custom advertising URL', 'bingo' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_single_ad_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_ad_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'single post bottom advertising', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'bottom_ad_type_single',
					'type'     => 'select',
					'title'    => esc_html__( 'single post - bottom advertising type', 'bingo' ),
					'subtitle' => esc_html__( 'select advertising type, this advertising will display at the bottom post content of single post page', 'bingo' ),
					'options'  => array(
						'script' => esc_html__( 'Script', 'bingo' ),
						'custom' => esc_html__( 'Custom Image', 'bingo' ),
					),
					'default'  => 'script',
				),
				array(
					'id'       => 'bottom_ad_script_single',
					'type'     => 'textarea',
					'validate' => 'js',
					'required' => array( 'bottom_ad_type_single', '=', 'script' ),
					'title'    => esc_html__( 'advertising code', 'bingo' ),
					'subtitle' => esc_html__( 'Paste in your entire advertising code', 'bingo' ),
				),
				array(
					'id'       => 'bottom_ad_image_single',
					'type'     => 'media',
					'required' => array( 'bottom_ad_type_single', '=', 'custom' ),
					'title'    => esc_html__( 'advertising image', 'bingo' ),
					'subtitle' => esc_html__( 'upload your advertising image (recommended size is about 728x90px)', 'bingo' ),
				),
				array(
					'id'       => 'bottom_ad_url_single',
					'type'     => 'text',
					'required' => array( 'bottom_ad_type_single', '=', 'custom' ),
					'title'    => esc_html__( 'advertising URL', 'bingo' ),
					'subtitle' => esc_html__( 'input your custom advertising URL', 'bingo' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'     => 'section_end_single_ad_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}