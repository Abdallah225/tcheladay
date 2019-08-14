<?php
//post options
if ( ! function_exists( 'bingo_ruby_theme_options_single_post_styling' ) ) {
	function bingo_ruby_theme_options_single_post_styling() {

		return array(
			'title'      => esc_html__( 'Single Styling', 'bingo' ),
			'id'         => 'bingo_ruby_config_section_single_post_styling',
			'desc'       => esc_html__( 'options will apply to single post page', 'bingo' ),
			'icon'       => 'el el-adjust-alt',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Meta Info Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_meta_info_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'entry meta bar manager', 'bingo' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta bar to appear in the single post page.', 'bingo' ),
					'options'  => array(
						'enabled'  => array(
							'author'  => esc_html__( 'Author', 'bingo' ),
							'date'    => esc_html__( 'Date', 'bingo' ),
							'comment' => esc_html__( 'Comment', 'bingo' ),
							'tag'     => esc_html__( 'Tags', 'bingo' ),
						),
						'disabled' => array(
							'cate' => esc_html__( 'Category', 'bingo' ),
							'view' => esc_html__( 'View', 'bingo' ),
						)
					),
				),
				array(
					'id'       => 'single_post_meta_info_icon',
					'title'    => esc_html__( 'show meta icons', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable meta info icons in the single post page.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'single_post_date_full',
					'type'     => 'switch',
					'title'    => esc_attr__( 'Date Full', 'bingo' ),
					'subtitle' => esc_attr__( 'Enable or disable date full in the single post page.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_post_counter_type',
					'title'    => esc_html__( 'Share/View Type', 'bingo' ),
					'subtitle' => esc_html__( 'Select a total counter type to display at the bottom of featured images in single post pages. This option needs to active Bingo Core plugin to work.', 'bingo' ),
					'type'     => 'select',
					'options'  => bingo_ruby_theme_config::single_counter_type_element(),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),

				array(
					'id'     => 'section_start_single_post_image_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Image Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_popup_image',
					'title'    => esc_html__( 'Images Popup', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable popup images as a gallery in single post content.', 'bingo' ),
					'desc'     => esc_html__( 'This feature only can work if images have been set link to "media file".', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_post_image_popup',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_content_padding',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Content options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_content_padding',
					'type'     => 'switch',
					'title'    => esc_html__( 'Content Padding', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable left/right padding in single post content.', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_content_padding',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box_review',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Review Box Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_review_box_position',
					'title'    => esc_html__( 'Review Box Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select position for review boxes in single post pages.', 'bingo' ),
					'type'     => 'image_select',
					'options'  => bingo_ruby_theme_config::review_box_position(),
					'default'  => 'bottom'
				),
				array(
					'id'     => 'section_end_single_post_box_review',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_box',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Box options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_box_nav',
					'type'     => 'switch',
					'title'    => esc_html__( 'Next/Prev Navigation', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the next/previous link navigation in single post pages.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_author',
					'type'     => 'switch',
					'title'    => esc_html__( 'Author Card Box', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the author card in single post page.', 'bingo' ),
					'desc'     => esc_html__( 'The author card box requests author information (Users > Your profiles) for displaying.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_author_position',
					'required' => array( 'single_post_box_author', '=', '1' ),
					'type'     => 'select',
					'title'    => esc_html__( 'Author Box Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select position for Author box in single post pages.', 'bingo' ),
					'options'  => array(
						'top'    => esc_html__( 'Top Position', 'bingo' ),
						'bottom' => esc_html__( 'Bottom Position', 'bingo' )
					),
					'default'  => 'bottom'
				),
				array(
					'id'       => 'default_single_post_box_comment',
					'type'     => 'switch',
					'title'    => esc_html__( 'Comment Box', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the comment box in single post pages.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_post_box_comment_button',
					'type'     => 'switch',
					'required' => array( 'default_single_post_box_comment', '=', '1' ),
					'title'    => esc_html__( 'Button To Show Comment Box', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable show/hide comment box buttons in single post pages.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_post_box_comment_web',
					'type'     => 'switch',
					'required' => array( 'default_single_post_box_comment', '=', '1' ),
					'title'    => esc_html__( 'Disable Website Form', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable website input form in the comment box.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_post_widget_section',
					'type'     => 'switch',
					'title'    => esc_attr__( 'Single post widget section', 'bingo' ),
					'subtitle' => esc_attr__( 'enable or disable the widget section in single post pages.', 'bingo' ),
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_box',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_like',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'LIKE/TWEET/G+ options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_like',
					'type'     => 'switch',
					'title'    => esc_html__( 'Show Post LIKE/TWEET/G+', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the post like/tweet/g+ on single posts. This option needs to active Bingo Core plugin to work.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_like',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_single_post_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single sidebar options', 'bingo' ),
					'indent' => true
				),
				//default sidebar
				array(
					'id'       => 'default_single_post_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Single Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'Select default sidebar name the single post page, this option will apply to all single posts page. you can set an individual sidebar for each post in the post editor page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default'
				),
				//default sidebar position
				array(
					'id'       => 'default_single_post_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Sidebar Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select default sidebar position for the single post page, this option will override default sidebar position option and will apply to all single posts, you can set an individual sidebar position for each post in the post editor page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_single_post_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}
