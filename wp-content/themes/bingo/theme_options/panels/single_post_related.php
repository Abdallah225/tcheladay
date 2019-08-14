<?php
//post options
if ( ! function_exists( 'bingo_ruby_theme_options_single_post_related' ) ) {
	function bingo_ruby_theme_options_single_post_related() {

		return array(
			'title'      => esc_html__( 'Single Related Options', 'bingo' ),
			'id'         => 'bingo_ruby_config_section_single_post_related',
			'desc'       => esc_html__( 'Select options for related box, the theme also support infinite scrolling for the related posts, You can enable this feature in "Single Ajax Options" or in post editor page.', 'bingo' ),
			'icon'       => 'el el-paper-clip ',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_box_related',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Related Box Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_related',
					'type'     => 'switch',
					'title'    => esc_html__( 'Related Box', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable related boxes in single post pages.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_related_title',
					'type'     => 'text',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Related title', 'bingo' ),
					'subtitle' => esc_html__( 'Input a title for related boxes.', 'bingo' ),
					'default'  => 'You Might Also Like'
				),
				array(
					'id'       => 'single_post_box_related_layout',
					'type'     => 'image_select',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Related box layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a layout for related boxes.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::related_layout(),
					'default'  => '1'
				),
				array(
					'id'       => 'single_post_box_related_where',
					'type'     => 'select',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Related Post Filter', 'bingo' ),
					'subtitle' => esc_html__( 'What posts should be displayed in related boxes.', 'bingo' ),
					'options'  => array(
						'all' => esc_html__( 'Same tags & categories', 'bingo' ),
						'tag' => esc_html__( 'Same tags', 'bingo' ),
						'cat' => esc_html__( 'Same categories', 'bingo' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_box_related_num',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'required' => array( 'single_post_box_related', '=', '1' ),
					'title'    => esc_html__( 'Number Of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of posts to show at once.', 'bingo' ),
					'default'  => 4
				),
				array(
					'id'       => 'default_single_post_infinite_scroll_related',
					'title'    => esc_html__( 'infinite loading related posts', 'bingo' ),
					'required' => array( 'single_post_box_related', '=', '1' ),
					'subtitle' => esc_html__( 'enable or disable infinite scrolling related posts, this option will work when you disable infinite loading older posts option', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_box_related',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box_related_video',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Video Format - Related Box Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_related_video',
					'type'     => 'switch',
					'title'    => esc_html__( 'Video Format - Related Box', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable special related boxes for video post pages.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_related_video_title',
					'type'     => 'text',
					'required' => array( 'single_post_box_related_video', '=', '1' ),
					'title'    => esc_html__( 'Video Format - Related Title', 'bingo' ),
					'subtitle' => esc_html__( 'Input a title for related boxes.', 'bingo' ),
					'default'  => 'You Might Also Like'
				),
				array(
					'id'       => 'single_post_box_related_video_where',
					'type'     => 'select',
					'required' => array( 'single_post_box_related_video', '=', '1' ),
					'title'    => esc_html__( 'Video Format - Related Post Filter', 'bingo' ),
					'subtitle' => esc_html__( 'What video posts should be displayed in related boxes.', 'bingo' ),
					'options'  => array(
						'all' => esc_html__( 'Same Tags & Categories', 'bingo' ),
						'tag' => esc_html__( 'Same Tags', 'bingo' ),
						'cat' => esc_html__( 'Same Categories', 'bingo' ),
					),
					'default'  => 'all'
				),
				array(
					'id'       => 'single_post_box_related_video_num',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'required' => array( 'single_post_box_related_video', '=', '1' ),
					'title'    => esc_html__( 'Number of Posts', 'bingo' ),
					'subtitle' => esc_html__( 'Select number of posts to show at once.', 'bingo' ),
					'default'  => 6
				),
				array(
					'id'     => 'section_end_single_post_box_related_video',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}
