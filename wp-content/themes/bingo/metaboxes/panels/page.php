<?php
//meta box page config
if ( ! function_exists( 'bingo_ruby_metabox_single_page' ) ) {
	function bingo_ruby_metabox_single_page() {
		return array(
			'id'         => 'bingo_ruby_metabox_single_page_options',
			'title'      => esc_html__( 'PAGE OPTIONS', 'bingo' ),
			'post_types' => array( 'page' ),
			'context'    => 'normal',
			'priority'   => 'high',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_page_layout',
					'type'    => 'image_select',
					'name'    => esc_html__( 'page layout', 'bingo' ),
					'desc'    => esc_html__( 'Select a layout for this page, select default if you want use the settings in theme options. Do not forget to add featured images if you want to use extra page layout.', 'bingo' ),
					'options' => bingo_ruby_theme_config::metabox_post_layout(),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_page_title',
					'type'    => 'select',
					'name'    => esc_html__( 'page title', 'bingo' ),
					'desc'    => esc_html__( 'Enable or disable for this page, This option will override "Theme Options -> Page Settings -> Single Page -> Title" option', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'bingo' ),
						'show'    => esc_html__( 'Show', 'bingo' ),
						'none'    => esc_html__( 'None', 'bingo' )
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_page_featured_size',
					'type'    => 'select',
					'name'    => esc_html__( 'featured image size', 'bingo' ),
					'desc'    => esc_html__( 'select a size for the featured image, select full size if you want to display full images or crop size if you want single page load fast.', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default From Theme Options', 'bingo' ),
						'crop'    => esc_html__( 'Crop Image', 'bingo' ),
						'full'    => esc_html__( 'Full Image', 'bingo' ),
					),
					'std'     => 'default'
				),
			),
		);
	}
}