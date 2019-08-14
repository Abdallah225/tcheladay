<?php
//Sidebar & Widget
if ( ! function_exists( 'bingo_ruby_theme_options_sidebar' ) ) {
	function bingo_ruby_theme_options_sidebar() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_section_sidebar',
			'title'  => esc_html__( 'Sidebar Options', 'bingo' ),
			'desc'   => esc_html__( 'select options for sidebars, options below will apply to whole the website.', 'bingo' ),
			'icon'   => 'el el-th',
			'fields' => array(
				array(
					'id'     => 'section_start_sidebar_general',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Sidebar General Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'site_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'sidebar position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for your website, This option will be overridden by other "sidebar position" configs.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position( false ),
					'default'  => 'right'
				),
				array(
					'id'       => 'bingo_ruby_multi_sidebar',
					'type'     => 'multi_text',
					'class'    => 'medium-text',
					'title'    => esc_html__( 'custom multi sidebar', 'bingo' ),
					'subtitle' => esc_html__( 'Create or delete an existing sidebar, don\'t forget input ID/name for your sidebars.', 'bingo' ),
					'desc'     => esc_html__( 'Click on "Create Sidebar" button and then input a ID/name to the form to create a new sidebar ie: sb1', 'bingo' ),
					'add_text' => esc_html__( 'Create Sidebar', 'bingo' ),
					'default'  => array()
				),
				array(
					'id'       => 'sticky_sidebar',
					'type'     => 'switch',
					'title'    => esc_html__( 'sticky sidebar', 'bingo' ),
					'subtitle' => esc_html__( 'Making sidebar permanently visible when scrolling up and down. This features will not apply to mobile devices.', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_sidebar_general',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
