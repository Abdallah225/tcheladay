<?php
if ( ! function_exists( 'bingo_ruby_metabox_single_post_options' ) ) {
	function bingo_ruby_metabox_single_post_options() {
		return array(
			'id'         => 'bingo_ruby_metabox_single_post_options',
			'title'      => esc_html__( 'POST OPTIONS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'      => 'bingo_ruby_post_layout',
					'type'    => 'image_select',
					'name'    => esc_html__( 'post layout', 'bingo' ),
					'desc'    => esc_html__( 'Select a layout for this post, select default if you want use the settings in theme options', 'bingo' ),
					'options' => bingo_ruby_theme_config::metabox_post_layout(),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_single_post_featured_size',
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
				array(
					'id'   => 'bingo_ruby_post_title_sub',
					'name' => esc_html__( 'Subtitle', 'bingo' ),
					'desc' => esc_html__( 'input a subtitle for this post, This will display under the title in the single page', 'bingo' ),
					'type' => 'text',
					'std'  => ''
				),
				array(
					'name'        => esc_html__( 'Primary Category', 'bingo' ),
					'id'          => 'bingo_ruby_post_primary_category',
					'type'        => 'taxonomy_advanced',
					'taxonomy'    => 'category',
					'placeholder' => esc_html__( 'Select a category', 'bingo' ),
					'desc'        => esc_html__( 'If the post has multiple categories, You can one select here and it will appears in the meta category info.', 'bingo' ),
					'field_type'  => 'select',
					'std'         => ''
				)
			),
		);
	}
}