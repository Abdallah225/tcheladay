<?php
if ( ! function_exists( 'bingo_ruby_theme_options_logo' ) ) {
	function bingo_ruby_theme_options_logo() {
		return array(
			'id'     => 'bingo_ruby_theme_options_logo',
			'title'  => esc_html__( 'Logo Options', 'bingo' ),
			'desc'   => esc_html__( 'select logo for header', 'bingo' ),
			'icon'   => 'el el-th',
			'fields' => array(
				//header style
				array(
					'id'     => 'section_start_header_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Header Logo Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'header_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'logo upload', 'bingo' ),
					'subtitle' => esc_html__( 'Upload your logo (300x90)px, allowed extensions are .jpg, .png and .gif', 'bingo' )
				),
				array(
					'id'       => 'header_logo_retina',
					'type'     => 'media',
					'title'    => esc_html__( 'logo retina upload', 'bingo' ),
					'subtitle' => esc_html__( 'Upload your retina logo (520x180)px, allowed extensions are .jpg, .png and .gif', 'bingo' )
				),
				array(
					'id'       => 'header_logo_mobile',
					'type'     => 'media',
					'title'    => esc_html__( 'mobile logo upload', 'bingo' ),
					'subtitle' => esc_html__( 'Upload your navigation logo (170x54)px, allowed extensions are .jpg, .png and .gif', 'bingo' )
				),
				array(
					'id'       => 'header_logo_alt',
					'type'     => 'text',
					'title'    => esc_html__( 'logo alt attribute ', 'bingo' ),
					'subtitle' => esc_html__( 'input Alt attribute for the logo, This text cannot display. It\'s useful for SEO and generally is the name of the site', 'bingo' ),
					'validate' => 'url',
					'default'  => '',
				),
				array(
					'id'       => 'header_logo_title',
					'type'     => 'text',
					'title'    => esc_html__( 'logo title attribute', 'bingo' ),
					'subtitle' => esc_html__( 'input Title attribute for the logo, Most browsers will show a tooltip with this text on logo hover', 'bingo' ),
					'default'  => '',
				),
				array(
					'id'     => 'section_end_header_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}