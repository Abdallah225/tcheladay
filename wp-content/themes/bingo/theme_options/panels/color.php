<?php
//Color Set
if ( ! function_exists( 'bingo_ruby_theme_options_color' ) ) {
	function bingo_ruby_theme_options_color() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_section_color',
			'title'  => esc_html__( 'Color Options', 'bingo' ),
            'desc'   => esc_html__( 'select color options for your website.', 'bingo' ),
			'icon'   => 'el el-tint',
			'fields' => array(

				//Theme color
				array(
					'id'     => 'section_start_theme_color',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Global Color Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'          => 'main_theme_color',
					'type'        => 'color',
					'transparent' => false,
					'validate'    => 'color',
					'title'       => esc_html__( 'Global Color', 'bingo' ),
					'subtitle'    => esc_html__( 'Select a global color, It will be used for all links, menu, category overlays, main page and many contrasting elements. leave blank if you want set as default (#55acee).', 'bingo' ),
				),
				array(
					'id'     => 'section_end_theme_color',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
                //navigation color
                array(
                    'id'     => 'section_start_navigation_styling',
                    'type'   => 'section',
                    'class'  => 'ruby-section-start',
                    'title'  => esc_attr__( 'main Navigation Color Options', 'bingo' ),
                    'indent' => true
                ),
                array(
                    'id'          => 'main_nav_background',
                    'title'       => esc_attr__( 'Navigation - Background Color', 'bingo' ),
                    'subtitle'    => esc_attr__( 'Select background color for navigation, Leave blank if you want to set default', 'bingo' ),
                    'type'        => 'color',
                    'validate'    => 'color',
                    'transparent' => false,
                    'default'     => ''
                ),
                array(
                    'id'          => 'main_nav_text_color',
                    'type'        => 'color',
                    'transparent' => false,
                    'validate'    => 'color',
                    'title'       => esc_attr__( 'Navigation - text color', 'bingo' ),
                    'subtitle'    => esc_attr__( 'Select color for text of navigation.  Leave blank if you want set to default', 'bingo' ),
                ),
                array(
                    'id'          => 'main_nav_text_color_hover',
                    'type'        => 'color',
                    'transparent' => false,
                    'validate'    => 'color',
                    'title'       => esc_attr__( 'Navigation - text hover color', 'bingo' ),
                    'subtitle'    => esc_attr__( 'Select color for text of navigation when hover and focus.  Leave blank if you want set to default', 'bingo' ),
                ),
                array(
                    'id'     => 'section_end_main_navigation_stylist',
                    'type'   => 'section',
                    'class'  => 'ruby-section-end',
                    'indent' => false
                ),
                //sub navigation color
                array(
                    'id'     => 'section_start_main_sub_navigation',
                    'type'   => 'section',
                    'class'  => 'ruby-section-start',
                    'title'  => esc_attr__( 'main navigation Submenu color', 'bingo' ),
                    'indent' => true
                ),
                array(
                    'id'          => 'main_sub_nav_background',
                    'title'       => esc_attr__( 'Navigation - Submenu Background Color', 'bingo' ),
                    'subtitle'    => esc_html__( 'Select background color for sub navigation font, Leave Blank if you want to set default', 'bingo' ),
                    'type'        => 'color',
                    'validate'    => 'color',
                    'transparent' => false,
                    'default'     => ''
                ),
                array(
                    'id'          => 'main_nav_sub_level_text_color',
                    'type'        => 'color',
                    'transparent' => false,
                    'validate'    => 'color',
                    'title'       => esc_attr__( 'Navigation - Submenu text color', 'bingo' ),
                    'subtitle'    => esc_attr__( 'Select a background color for sub menu items of the main navigation. Leave blank if you want set to default', 'bingo' ),
                ),
                array(
                    'id'          => 'main_nav_sub_level_text_color_hover',
                    'type'        => 'color',
                    'transparent' => false,
                    'validate'    => 'color',
                    'title'       => esc_attr__( 'Navigation - Submenu text hover color', 'bingo' ),
                    'subtitle'    => esc_attr__( 'Select a color when hovering on submmenu text. Leave blank if you want set to default', 'bingo' ),
                ),
                array(
                    'id'       => 'mega_menu_cat_text_style',
                    'type'     => 'image_select',
                    'title'    => esc_attr__( 'Category Mega Menu Text', 'bingo' ),
                    'subtitle' => esc_attr__( 'Select a style for category mega menu post to suit with your background settings.', 'bingo' ),
                    'options'  => bingo_ruby_theme_config::text_style(),
                    'default'  => 'is-light-text'
                ),
                array(
                    'id'     => 'section_end_main_sub_navigation',
                    'type'   => 'section',
                    'class'  => 'ruby-section-end no-border',
                    'indent' => false
                ),
			)
		);
	}
}
