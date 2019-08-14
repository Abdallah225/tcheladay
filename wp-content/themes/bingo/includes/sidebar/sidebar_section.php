<?php

if ( ! function_exists( 'bingo_ruby_register_theme_sidebar' ) ) {
	function bingo_ruby_register_theme_sidebar() {

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_sidebar_default',
				'name'          => esc_html__( 'Default Sidebar', 'bingo' ),
				'description'   => esc_html__( 'default sidebar of the theme.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		if ( get_option( 'bingo_ruby_custom_multi_sidebars', false ) ) {
			$theme_current_sidebars = get_option( 'bingo_ruby_custom_multi_sidebars', '' );
			if ( ! empty( $theme_current_sidebars ) && is_array( $theme_current_sidebars ) ) {
				foreach ( $theme_current_sidebars as $current_sidebar ) {

					if ( $current_sidebar['id'] == 'bingo_ruby_sidebar_default' ) {
						continue;
					};

					register_sidebar(
						array(
							'name'          => $current_sidebar['name'],
							'id'            => $current_sidebar['id'],
							'description'   => esc_html__( 'a sidebar section of your website.', 'bingo' ),
							'before_widget' => '<section id="%1$s" class="widget %2$s">',
							'after_widget'  => '</section>',
							'before_title'  => '<div class="widget-title block-title"><h3>',
							'after_title'   => '</h3></div>',
						)
					);
				};
			};
		};

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_sidebar_off_canvas',
				'name'          => esc_html__( 'Off-Canvas Section', 'bingo' ),
				'description'   => esc_html__( 'The hidden section at the left of your website. This section contains mobile navigation and widgets for displaying mobile devices.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_single_post_section',
				'name'          => esc_html__( 'Single section', 'bingo' ),
				'description'   => esc_html__( 'Display [SIDEBAR] - Subscribe Box at bellow content of the single pages.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_sidebar_footer_fullwidth',
				'name'          => esc_html__( 'Top Footer (Full-Width)', 'bingo' ),
				'description'   => esc_html__( 'Full-width section at the top of the footer area.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_sidebar_footer_1',
				'name'          => esc_html__( 'Footer 1', 'bingo' ),
				'description'   => esc_html__( 'one of the columns of the footer area.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_sidebar_footer_2',
				'name'          => esc_html__( 'Footer 2', 'bingo' ),
				'description'   => esc_html__( 'one of the columns of the footer area.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);

		register_sidebar(
			array(
				'id'            => 'bingo_ruby_sidebar_footer_3',
				'name'          => esc_html__( 'Footer 3', 'bingo' ),
				'description'   => esc_html__( 'one of the columns of the footer area.', 'bingo' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="widget-title block-title"><h3>',
				'after_title'   => '</h3></div>'
			)
		);
	}

	add_action( 'widgets_init', 'bingo_ruby_register_theme_sidebar' );
}
