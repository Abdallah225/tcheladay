<?php
//meta box post video config
if ( ! function_exists( 'bingo_ruby_metabox_single_post_video' ) ) {
	function bingo_ruby_metabox_single_post_video() {
		return array(
			'id'         => 'bingo_ruby_metabox_video_options',
			'title'      => esc_html__( 'VIDEO OPTIONS', 'bingo' ),
			'post_types' => array( 'post' ),
			'priority'   => 'high',
			'context'    => 'normal',
			'fields'     => array(
				array(
					'id'   => 'bingo_ruby_post_video_url',
					'name' => esc_html__( 'Video URL', 'bingo' ),
					'desc' => esc_html__( 'Input link of video, support: Youtube, Vimeo, DailyMotion', 'bingo' ),
					'type' => 'text',
				),
				array(
					'id'   => 'bingo_ruby_post_video_embed',
					'name' => esc_html__( 'Embed Code', 'bingo' ),
					'desc' => esc_html__( 'Input embed code of video', 'bingo' ),
					'type' => 'text',
				),
				array(
					'id'   => 'bingo_ruby_post_video_self_hosted',
					'name' => esc_html__( 'Self-Hosted Video', 'bingo' ),
					'desc' => esc_html__( 'Please upload the mp4, m4v, webm, ogv, wmv, flv video file.', 'bingo' ),
					'type' => 'file_advanced',
				),
				array(
					'id'   => 'bingo_ruby_post_video_duration',
					'type' => 'text',
					'name' => esc_html__( 'video duration', 'bingo' ),
					'desc' => esc_html__( 'input the duration time of your video, ie: 1:32', 'bingo' ),
				),
				array(
					'id'      => 'bingo_ruby_meta_style_video',
					'type'    => 'select',
					'name'    => esc_html__( 'Video Iframe Style', 'bingo' ),
					'desc'    => esc_html__( 'Select video style for this post, select default if you want use the settings in theme options', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'bingo' ),
						'1'       => esc_html__( 'Replace Featured Image', 'bingo' ),
						'2'       => esc_html__( 'Popup with Play Button', 'bingo' ),
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_meta_layout_video',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Video Layout', 'bingo' ),
					'desc'    => esc_html__( 'select a layout (video format) for this post, this option will override on default setting in theme option', 'bingo' ),
					'options' => bingo_ruby_theme_config::metabox_single_post_layout_video(),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_meta_post_video_related',
					'type'    => 'select',
					'name'    => esc_html__( 'Video Related', 'bingo' ),
					'desc'    => esc_html__( 'enable or disable video related posts for this post.', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'bingo' ),
						'1'       => esc_html__( 'Enable', 'bingo' ),
						'2'       => esc_html__( 'Disable', 'bingo' ),
					),
					'std'     => 'default'
				),
				array(
					'id'      => 'bingo_ruby_meta_post_video_autoplay',
					'type'    => 'select',
					'name'    => esc_html__( 'Video Auto Play', 'bingo' ),
					'desc'    => esc_html__( 'enable or disable auto play featured video for this post.', 'bingo' ),
					'options' => array(
						'default' => esc_html__( 'Default from Theme Options', 'bingo' ),
						'1'       => esc_html__( 'Enable', 'bingo' ),
						'2'       => esc_html__( 'Disable', 'bingo' ),
					),
					'std'     => 'default'
				),
			)
		);
	}
}