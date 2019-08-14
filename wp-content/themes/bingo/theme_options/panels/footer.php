<?php
if ( ! function_exists( 'bingo_ruby_theme_options_footer' ) ) {
	function bingo_ruby_theme_options_footer() {
		//footer options
		return array(
			'id'     => 'bingo_ruby_theme_ops_section_footer',
			'title'  => esc_html__( 'Footer Options', 'bingo' ),
			'desc'   => esc_html__( 'Select options for the footer.', 'bingo' ),
			'icon'   => 'el el-th',
			'fields' => array(

				//footer options configs
				array(
					'id'     => 'section_start_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'footer options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'          => 'footer_background',
					'type'        => 'background',
					'transparent' => false,
					'title'       => esc_html__( 'Footer Background', 'bingo' ),
					'subtitle'    => esc_html__( 'Select a background for the footer: image, color, etc', 'bingo' ),
					'default'     => array(
						'background-color'      => '#282828',
						'background-size'       => 'cover',
						'background-attachment' => 'fixed',
						'background-position'   => 'center center',
						'background-repeat'     => 'no-repeat'
					),
					'output'      => array( '.footer-inner' )
				),
				array(
					'id'       => 'footer_text_style',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Footer Text Style', 'bingo' ),
					'subtitle' => esc_html__( 'Select a color style for footer text.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::text_style(),
					'default'  => 'is-light-text'
				),
				array(
					'id'     => 'section_end_footer',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//footer logo bar config
				array(
					'id'     => 'section_start_footer_bar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer logo Section Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'footer_logo',
					'type'     => 'media',
					'title'    => esc_html__( 'Footer - Logo', 'bingo' ),
					'subtitle' => esc_html__( 'Upload your footer logo.', 'bingo' )
				),
				array(
					'id'       => 'footer_navigation',
					'title'    => esc_html__( 'footer - menu', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the footer menu.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'footer_social_bar',
					'type'     => 'switch',
					'title'    => esc_html__( 'Footer - Social Bar', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the footer social bar.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'footer_social_color',
					'type'     => 'switch',
					'title'    => esc_html__( 'Footer - Social Color', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable color style for footer social icons.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_footer_bar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//back to top
				array(
					'id'     => 'section_start_back_to_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Back Top options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'site_back_to_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Back Top Button', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the back to top button.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'site_back_to_top_mobile',
					'type'     => 'switch',
					'required' => array( 'site_back_to_top', '=', '1' ),
					'title'    => esc_html__( 'Enable On Mobile', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable back to top button on touch/mobile devices.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_back_to_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//footer copyright config
				array(
					'id'     => 'section_start_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Footer Copyright Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'          => 'background_copyright_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_attr__( 'Copyright BG color', 'bingo' ),
					'subtitle'    => esc_attr__( 'Select background color for copyright. Leave blank if you want set to as default.', 'bingo' ),
					'default'     => '#242424',
				),
				array(
					'id'          => 'copyright_text_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_attr__( 'Copyright text color', 'bingo' ),
					'subtitle'    => esc_attr__( 'Select color for copyright text. Leave blank if you want set to as default', 'bingo' ),
					'default'     => '#dddddd',
				),
				array(
					'id'       => 'site_copyright',
					'type'     => 'textarea',
					'title'    => esc_html__( 'footer copyright text', 'bingo' ),
					'subtitle' => esc_html__( 'Input your copyright text or HTML.', 'bingo' ),
					'default'  => '',
				),
				array(
					'id'     => 'section_end_copyright',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}


