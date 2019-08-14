<?php
//post options
if ( ! function_exists( 'bingo_ruby_theme_options_single_post_layout' ) ) {
	function bingo_ruby_theme_options_single_post_layout() {

		return array(
			'title'      => esc_html__( 'Layout Options', 'bingo' ),
			'id'         => 'bingo_ruby_theme_options_section_single_post_layout',
			'desc'       => esc_html__( 'Select default layout for the single post page, this option will apply to all single posts page. You can set an individual layout for each post in the post editor page.', 'bingo' ),
			'icon'       => 'el el-laptop',
			'subsection' => true,
			'fields'     => array(
				//featured image
				array(
					'id'     => 'section_start_section_layout_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Featured Image Post Layouts (Default Post Format)', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_post_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Featured Image Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select layout for the single post page (default post format), this option will apply to the default post format type.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::single_post_layout(),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_featured_size',
					'type'     => 'select',
					'title'    => esc_html__( 'featured image size', 'bingo' ),
					'subtitle' => esc_html__( 'Select size for the featured image, this option will apply to all single post layouts.', 'bingo' ),
					'options'  => array(
						'crop' => esc_html__( 'Crop Image', 'bingo' ),
						'full' => esc_html__( 'Full Image', 'bingo' ),
					),
					'default'  => 'crop',
				),
				array(
					'id'     => 'section_end_section_layout_featured',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//video
				array(
					'id'     => 'section_start_section_layout_video',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Video Post Format Layouts (Video Post Format)', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_style_video',
					'type'     => 'select',
					'title'    => esc_html__( 'Video Iframe Style', 'bingo' ),
					'subtitle' => esc_html__( 'Select iframe style for all video post format', 'bingo' ),
					'options'  => array(
						'1' => esc_html__( 'Replace featured image', 'bingo' ),
						'2' => esc_html__( 'Popup with play button', 'bingo' ),
					),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_layout_video',
					'type'     => 'image_select',
					'required' => array( 'single_post_style_video', '=', '1' ),
					'title'    => esc_html__( 'Video Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select layout for the single post page (video post format), this option will apply to the video format type.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::single_post_layout_video(),
					'default'  => '1',
				),
				array(
					'id'       => 'single_post_video_autoplay',
					'type'     => 'switch',
					'required' => array( 'single_post_style_video', '=', '1' ),
					'title'    => esc_html__( 'Auto Play Video', 'bingo' ),
					'subtitle' => esc_html__( 'Auto play the featured video when opened single video post format', 'bingo' ),
					'default'  => '0',
				),
				array(
					'id'     => 'section_end_section_layout_video',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//audio
				array(
					'id'     => 'section_start_section_layout_audio',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Audio Post Format Layouts (Audio Post Format)', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_layout_audio',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Audio layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select layout for the single post page. this option will apply to the audio post format type.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::single_post_layout_audio(),
					'default'  => '1',
				),
				array(
					'id'     => 'section_end_section_layout_audio',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//gallery
				array(
					'id'     => 'section_start_section_layout_gallery',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Gallery Layout', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_layout_gallery_slider',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Gallery slider layout', 'bingo' ),
					'subtitle' => esc_html__( 'select default for the single post page. this options will apply to the gallery post format style (slider).', 'bingo' ),
					'options'  => bingo_ruby_theme_config::single_post_layout_gallery_slider(),
					'default'  => '1',

				),
				array(
					'id'       => 'single_post_layout_gallery_grid',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Gallery grid layout', 'bingo' ),
					'subtitle' => esc_html__( 'select default for the single post page. this options will apply to the gallery post format style (grid).', 'bingo' ),
					'options'  => bingo_ruby_theme_config::single_post_layout_gallery_grid(),
					'default'  => '1',
				),
				array(
					'id'     => 'section_end_section_layout_gallery',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				)
			),
		);
	}
}
