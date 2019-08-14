<?php
//typography options
if ( ! function_exists( 'bingo_ruby_theme_options_typography' ) ) {
	function bingo_ruby_theme_options_typography() {
		return array(
			'id'    => 'bingo_ruby_theme_ops_typography',
			'title' => esc_html__( 'Typography Options', 'bingo' ),
			'icon'  => 'el el-font',
		);
	}
}

//typography header config
if ( ! function_exists( 'bingo_ruby_theme_options_typography_header' ) ) {
	function bingo_ruby_theme_options_typography_header() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_typography_header',
			'title'      => esc_html__( 'Header typography', 'bingo' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select typography for the header of your website.', 'bingo' ),
			'fields'     => array(
				array(
					'id'     => 'section_start_font_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top Bar Typography Option', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_topbar',
					'type'           => 'typography',
					'title'          => esc_html__( 'Top bar font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for the top bar.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Lato',
						'font-size'      => '13px',
						'google'         => true,
						'font-weight'    => '400',
						'text-transform' => 'capitalize',
						'letter-spacing' => ''
					),
					'output'         => array(
						'.topbar-wrap',
					)
				),
				array(
					'id'     => 'section_end_font_topbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Navigation Bar Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_navbar',
					'type'           => 'typography',
					'title'          => esc_html__( 'Main Navigation Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for the main navigation.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Lato',
						'font-size'      => '15px',
						'google'         => true,
						'font-weight'    => '700',
						'text-transform' => 'uppercase',
						'letter-spacing' => '0'
					),
					'output'         => array(
						'.main-menu-inner',
						'.off-canvas-nav-inner'
					)
				),
				array(
					'id'             => 'font_navbar_sub',
					'type'           => 'typography',
					'title'          => esc_html__( 'Sub-menu Navigation Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for sub-menus of the main navigation.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Lato',
						'font-size'      => '14px',
						'google'         => true,
						'font-weight'    => '400',
						'text-transform' => 'capitalize',
						'letter-spacing' => '0'
					),
					'output'         => array(
						'.main-menu-inner .sub-menu',
						'.off-canvas-nav-inner .sub-menu'
					)
				),
				array(
					'id'     => 'section_end_font_navbar',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//logo font
				array(
					'id'     => 'section_start_font_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Text Logo Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_logo_text',
					'type'           => 'typography',
					'title'          => esc_html__( 'Text Logo font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for the text logo if you use this.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Montserrat',
						'font-size'      => '40px',
						'google'         => true,
						'font-weight'    => '700',
						'letter-spacing' => '-1px',
						'text-transform' => 'uppercase',
					),
					'output'         => array(
						'.logo-wrap.is-logo-text .logo-text h1',
					)
				),
				array(
					'id'             => 'font_logo_text_mobile',
					'type'           => 'typography',
					'title'          => esc_html__( 'Mobile - Text Logo font', 'bingo' ),
					'subtitle'       => esc_html__( 'select font for the text mobile logo if you use text logo.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Montserrat',
						'font-size'      => '28px',
						'google'         => true,
						'font-weight'    => '700',
						'letter-spacing' => '-1px',
						'text-transform' => 'uppercase'
					),
					'output'         => array(
						'.logo-mobile-text span',
					)
				),
				array(
					'id'     => 'section_end_font_logo',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//typography body config
if ( ! function_exists( 'bingo_ruby_theme_options_typography_body' ) ) {
	function bingo_ruby_theme_options_typography_body() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_typography_body',
			'title'      => esc_html__( 'Body Typography', 'bingo' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select font values for site body. These options will apply to your pages, posts content.', 'bingo' ),
			'fields'     => array(
				//Body font config
				array(
					'id'     => 'section_start_font_body',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Body Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_body',
					'type'           => 'typography',
					'title'          => esc_html__( 'Body Font', 'bingo' ),
					'subtitle'       => esc_html__( 'These options will apply to almost contents (body and p tags) on your website.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => true,
					'all_styles'     => true,
					'units'          => 'px',
					'default'        => array(
						'font-family' => 'Lato',
						'google'      => true,
						'font-size'   => '15px',
						'line-height' => '24px',
						'font-weight' => '400',
						'color'       => '#282828',
					),
					'output'         => array( 'body, p' )
				),
				array(
					'id'     => 'section_end_font_body',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//block excerpt text
				array(
					'id'     => 'section_start_font_excerpt_size',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Excerpt Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'font_excerpt_size',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Post Excerpt Font Size', 'bingo' ),
					'subtitle' => esc_html__( 'Select a font-size value for post excerpts.', 'bingo' ),
					'default'  => '14'
				),
				array(
					'id'     => 'section_end_font_excerpt_size',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			)
		);
	}
}

//typography post title config
if ( ! function_exists( 'bingo_ruby_theme_options_typography_post' ) ) {
	function bingo_ruby_theme_options_typography_post() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_typography_post',
			'title'      => esc_html__( 'Post Title Typography', 'bingo' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select font values for post titles for your website.', 'bingo' ),
			'fields'     => array(

				//block title font
				array(
					'id'     => 'section_start_block_font_post_title',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Post Title Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_post_title_size_1',
					'type'           => 'typography',
					'title'          => esc_html__( 'Extra Big Title Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for extra big titles. These options will apply to full-screen title ie: single title, full-screen sliders and full-screen carousels layouts... [ CSS classname: .is-size-1 ]', 'bingo' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'font-size'      => '36px',
						'font-weight'    => '700',
						'color'          => '#282828',
						'letter-spacing' => '',
					),
					'output'         => array(
						'.post-title.is-size-1',
					)
				),
				array(
					'id'             => 'font_post_title_size_2',
					'type'           => 'typography',
					'title'          => esc_html__( 'Big Title Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for big titles. These options will apply to full-width title ie: classic, small slider, big gird and list layouts.... [ CSS classname: .is-size-2 ]', 'bingo' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'font-size'      => '30px',
						'letter-spacing' => '',
						'font-weight'    => '700',
						'color'          => '#282828',
					),
					'output'         => array(
						'.post-title.is-size-2',
					)
				),
				array(
					'id'             => 'font_post_title_size_3',
					'type'           => 'typography',
					'title'          => esc_html__( 'Medium Title Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for medium titles. These options will apply to: big list, big grid layouts... [ CSS classname: .is-size-3 ].', 'bingo' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'font-size'      => '21px',
						'letter-spacing' => '',
						'font-weight'    => '700',
						'color'          => '#282828',
					),
					'output'         => array(
						'.post-title.is-size-3',
					)
				),
				array(
					'id'             => 'font_post_title_size_4',
					'type'           => 'typography',
					'title'          => esc_html__( 'Semi Medium Title Font ', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for semi medium titles. These options will apply to: default list, grid layouts... [ CSS classname: .is-size-4 ].', 'bingo' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'font-size'      => '18px',
						'letter-spacing' => '',
						'font-weight'    => '700',
						'color'          => '#282828',
					),
					'output'         => array(
						'.post-title.is-size-4',
					)
				),
				array(
					'id'             => 'font_post_title_size_5',
					'type'           => 'typography',
					'title'          => esc_html__( 'Small Title Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for small titles. These options will apply to: small list, grid layouts... [ CSS classname: .is-size-5 ].', 'bingo' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'font-size'      => '14px',
						'letter-spacing' => '',
						'font-weight'    => '700',
						'color'          => '#282828',
					),
					'output'         => array(
						'.post-title.is-size-5',
					)
				),
				array(
					'id'     => 'section_end_block_font_post_title',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'             => 'font_post_title_size_6',
					'type'           => 'typography',
					'title'          => esc_html__( 'Mini Title Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for small titles. These options will apply to all elements would the website... [ CSS classname: .is-size-6 ].', 'bingo' ),
					'google'         => true,
					'font-family'    => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'font-size'      => '13px',
						'letter-spacing' => '',
						'font-weight'    => '400',
						'color'          => '#282828',
					),
					'output'         => array(
						'.post-title.is-size-6',
					)
				),
				array(
					'id'     => 'section_end_block_font_post_title',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_font_h_tags',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'H Tags Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_h_tags',
					'type'           => 'typography',
					'title'          => esc_html__( 'H1 to H6 Font', 'bingo' ),
					'subtitle'       => esc_html__( 'select font values for H tags, Those options will apply to all H tags and additional elements..', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => false,
					'line-height'    => false,
					'font-size'      => false,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Montserrat',
						'text-transform' => 'none',
						'font-weight'    => '700',
					),
					'output'         => array(
						'h1',
						'h2',
						'h3',
						'h4',
						'h5',
						'h6'
					)
				),
				array(
					'id'     => 'section_end_font_h_tags',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//typography meta info config
if ( ! function_exists( 'bingo_ruby_theme_options_typography_meta' ) ) {
	function bingo_ruby_theme_options_typography_meta() {
		return array(
			'id'         => 'bingo_ruby_config_section_typo_meta',
			'title'      => esc_html__( 'Meta Info Typography', 'bingo' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => html_entity_decode( esc_html__( 'select font values for entry meta info in your website.', 'bingo' ) ),
			'fields'     => array(
				//meta fonts
				array(
					'id'     => 'section_start_section_font_post_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Info Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_post_meta_info',
					'type'           => 'typography',
					'title'          => esc_html__( 'entry meta info font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for entry meta info: date, author, view, comment...', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Lato',
						'font-size'      => '12px',
						'google'         => true,
						'font-weight'    => '400',
						'color'          => '#999',
						'text-transform' => '',
					),
					'output'         => array(
						'.post-meta-info',
						'.single-post-top',
						'.counter-element'
					)
				),
				array(
					'id'     => 'section_end_section_font_post_meta',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//category info font
				array(
					'id'     => 'section_start_section_font_post_cat',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Category Info Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_post_cat_info',
					'type'           => 'typography',
					'title'          => esc_html__( 'Category Info Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for the category info.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'font-weight'    => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-size'      => '11px',
						'google'         => true,
						'font-weight'    => '700',
						'font-family'    => 'Lato',
						'text-transform' => 'uppercase',
					),
					'output'         => array(
						'.post-cat-info',
					)
				),
				array(
					'id'     => 'section_end_section_font_post_cat',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//typography blocks & widgets config
if ( ! function_exists( 'bingo_ruby_theme_options_typography_heading' ) ) {
	function bingo_ruby_theme_options_typography_heading() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_typography_heading',
			'title'      => esc_html__( 'Block/Widget Header', 'bingo' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select typography options for block headers and widgets', 'bingo' ),
			'fields'     => array(
				//Block header
				array(
					'id'     => 'section_start_font_heading_block',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Block Header Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_heading_block',
					'type'           => 'typography',
					'title'          => esc_html__( 'Block Title font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for block titles, these options will apply to all blocks built with "Ruby Composer".', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Montserrat',
						'font-size'      => '18px',
						'google'         => true,
						'font-weight'    => '600',
						'text-transform' => 'uppercase',
						'letter-spacing' => ''
					),
					'output'         => array(
						'.block-header-wrap',
					)
				),
				array(
					'id'             => 'font_heading_right_block',
					'type'           => 'typography',
					'title'          => esc_html__( 'Block Ajax Filter Font', 'bingo' ),
					'subtitle'       => esc_html__( 'select font values for block ajax filter at the right of the block header.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Montserrat',
						'font-size'      => '11px',
						'google'         => true,
						'font-weight'    => '500',
						'text-transform' => 'uppercase',
						'letter-spacing' => ''
					),
					'output'         => array(
						'.block-ajax-filter-wrap',
					)
				),
				array(
					'id'     => 'section_end_font_heading_block',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//widget heading font
				array(
					'id'     => 'section_start_font_heading_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Widget Header Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_heading_widget',
					'type'           => 'typography',
					'title'          => esc_html__( 'Widget title font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select font values for widget titles, these options will apply to all widget headers.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => false,
					'text-transform' => true,
					'letter-spacing' => true,
					'line-height'    => false,
					'units'          => 'px',
					'default'        => array(
						'font-family'    => 'Montserrat',
						'font-size'      => '14px',
						'google'         => true,
						'font-weight'    => '600',
						'text-transform' => 'uppercase',
						'letter-spacing' => ''
					),
					'output'         => array(
						'.widget-title',
					)
				),
				array(
					'id'     => 'section_end_font_heading_widget',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//typography breadcrumb config
if ( ! function_exists( 'bingo_ruby_theme_options_typography_breadcrumb' ) ) {
	function bingo_ruby_theme_options_typography_breadcrumb() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_typography_breadcrumb',
			'title'      => esc_html__( 'Breadcrumb Typography', 'bingo' ),
			'icon'       => 'el el-font',
			'subsection' => true,
			'desc'       => esc_html__( 'select font values for breadcrumb for your website.', 'bingo' ),
			'fields'     => array(
				//block title font
				array(
					'id'     => 'section_start_block_font_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Breadcrumb Typography Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'             => 'font_breadcrumb',
					'type'           => 'typography',
					'title'          => esc_html__( 'Breadcrumb Font', 'bingo' ),
					'subtitle'       => esc_html__( 'Select a font-family value and a color for breadcrumb, these options will apply to all breadcrumb.', 'bingo' ),
					'google'         => true,
					'font-backup'    => true,
					'text-align'     => false,
					'color'          => true,
					'text-transform' => true,
					'letter-spacing' => false,
					'line-height'    => false,
					'font-size'      => true,
					'units'          => 'px',
					'default'        => array(
						'google'         => true,
						'font-family'    => 'Lato',
						'text-transform' => 'none',
						'font-weight'    => '400',
						'font-size'      => '12px',
						'color'          => '#777777',
					),
					'output'         => array(
						'.breadcrumb-wrap'
					)
				),
				array(
					'id'     => 'section_end_block_font_breadcrumb',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}