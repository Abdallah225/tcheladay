<?php
//meta box sidebar config
if ( ! function_exists( 'bingo_ruby_metabox_sidebar' ) ) {
	function bingo_ruby_metabox_sidebar() {
		return array(
			'id'         => 'bingo_ruby_metabox_sidebar_options',
			'title'      => esc_html__( 'SIDEBAR OPTIONS', 'bingo' ),
			'post_types' => array( 'post', 'page' ),
			'priority'   => 'default',
			'context'    => 'side',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_sidebar_name',
					'type'    => 'select',
					'name'    => esc_html__( 'sidebar name', 'bingo' ),
					'desc'    => esc_html__( 'Select sidebar for this post, This option will override "Theme Options -> Single Post -> Default Sidebar" option', 'bingo' ),
					'options' => bingo_ruby_theme_config::sidebar_name( true ),
					'std'     => 'bingo_ruby_default_from_theme_options'
				),
				array(
					'id'       => 'bingo_ruby_sidebar_position',
					'name'     => esc_html__( 'sidebar position', 'bingo' ),
					'desc'     => esc_html__( 'Select sidebar position for this post, This option will override "Theme Options -> Single Post -> Default Sidebar Position" option', 'bingo' ),
					'class'    => 'ruby-sidebar-select',
					'type'     => 'image_select',
					'multiple' => false,
					'options'  => bingo_ruby_theme_config::metabox_sidebar_position(),
					'std'      => 'default'
				),
			)
		);
	}
}