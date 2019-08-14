<?php
if ( ! function_exists( 'bingo_ruby_metabox_single_post_ajax' ) ) {
	function bingo_ruby_metabox_single_post_ajax() {
		return array(
			'id'         => 'bingo_ruby_metabox_single_post_ajax',
			'title'      => esc_html__( 'BOX RELATED OPTIONS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_post_infinite_scroll_related',
					'name'    => esc_html__( 'Infinite loading related posts', 'bingo' ),
					'desc'    => esc_html__( 'enable or disable infinite scrolling related posts, this option will work when you disable infinite loading older posts option. this options will be overridden on theme options setting', 'bingo' ),
					'type'    => 'select',
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'bingo' ),
						'1'       => esc_html__( 'Enable', 'bingo' ),
						'none'    => esc_html__( 'Disable', 'bingo' ),
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_single_post_box_related_layout',
					'name'    => esc_html__( 'Related box layout', 'bingo' ),
					'desc'    => esc_html__( 'Select a layout for the related box, select default if you want use the settings in theme options.', 'bingo' ),
					'type'    => 'image_select',
					'options' => bingo_ruby_theme_config::metabox_box_related_layout(),
					'std'     => 'default'
				),
			),
		);
	}
}