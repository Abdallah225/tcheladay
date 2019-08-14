<?php
//meta box post audio config
if ( ! function_exists( 'bingo_ruby_metabox_single_post_audio' ) ) {
	function bingo_ruby_metabox_single_post_audio() {
		return array(
			'id'         => 'bingo_ruby_metabox_audio_options',
			'title'      => esc_html__( 'AUDIO OPTIONS', 'bingo' ),
            'post_types' => array( 'post' ),
            'priority'   => 'high',
            'context'    => 'normal',
			'fields'     => array(
				array(
					'id'   => 'bingo_ruby_post_audio_url',
					'name' => esc_html__( 'audio URL', 'bingo' ),
					'desc' => esc_html__( 'Input link of audio, support: SoundCloud, MixCloud', 'bingo' ),
					'type' => 'text',
				),
				array(
					'id'   => 'bingo_ruby_post_audio_self_hosted',
					'name' => esc_html__( 'Self-Hosted Audio', 'bingo' ),
					'desc' => esc_html__( 'Please upload the mp3, ogg, wma, m4a, wav audio file.', 'bingo' ),
					'type' => 'file_advanced',
				),
				array(
					'id'   => 'bingo_ruby_post_audio_duration',
					'type' => 'text',
					'name' => esc_html__( 'audio duration', 'bingo' ),
					'desc' => esc_html__( 'input the duration time of your audio, ie: 1:32', 'bingo' ),
				),
				array(
					'id'      => 'bingo_ruby_meta_layout_audio',
					'type'    => 'image_select',
					'name'    => esc_html__( 'Audio Layout', 'bingo' ),
					'desc'    => esc_html__( 'select a layout (audio format) for this post, this option will override on default setting in theme option', 'bingo' ),
					'options' => bingo_ruby_theme_config::metabox_single_post_layout_audio(),
					'std'     => 'default'
				),
			)
		);
	}
}