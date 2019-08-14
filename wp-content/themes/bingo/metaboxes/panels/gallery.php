<?php
//meta box post gallery config
if ( ! function_exists( 'bingo_ruby_metabox_single_post_gallery' ) ) {
	function bingo_ruby_metabox_single_post_gallery() {
		return array(
			'id'         => 'bingo_ruby_metabox_gallery_options',
			'title'      => esc_html__( 'GALLERY OPTIONS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'   => 'bingo_ruby_post_gallery_data',
					'name' => esc_html__( 'select gallery', 'bingo' ),
					'desc' => esc_html__( 'Select your pictures for gallery', 'bingo' ),
					'type' => 'image_advanced',
					'std'  => '',
				),
				array(
					'id'       => 'bingo_ruby_post_gallery_type',
					'name'     => esc_html__( 'gallery type', 'bingo' ),
					'desc'     => esc_html__( 'Select type for gallery', 'bingo' ),
					'type'     => 'select',
					'multiple' => false,
					'options'  => array(
						'slider' => esc_html__( 'Slider', 'bingo' ),
						'grid'   => esc_html__( 'Grid', 'bingo' )
					),
					'std'      => 'slider',
				),
				array(
					'id'      => 'bingo_ruby_meta_layout_gallery_slider',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Gallery Slider Layout', 'bingo' ),
					'desc'    => esc_html__( 'select a layout (gallery slider format) for this post, this option will override on default setting in theme option', 'bingo' ),
					'options' => bingo_ruby_theme_config::metabox_single_post_layout_gallery_slider(),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_meta_layout_gallery_grid',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Gallery Grid Layout', 'bingo' ),
					'desc'    => esc_html__( 'select a layout (gallery grid format) for this post, this option will override on default setting in theme option', 'bingo' ),
					'options' => bingo_ruby_theme_config::metabox_single_post_layout_gallery_grid(),
					'std'     => 'default'
				),
			)
		);
	}
}