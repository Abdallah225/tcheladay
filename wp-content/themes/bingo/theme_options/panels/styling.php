<?php
if ( ! function_exists( 'bingo_ruby_theme_options_styling' ) ) {
	function bingo_ruby_theme_options_styling() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_styling',
			'title'  => esc_html__( 'Block Styling', 'bingo' ),
			'desc'   => esc_html__( 'Select styles for blog post elements, options below will apply to all blocks, pages, and modules on your website.', 'bingo' ),
			'icon'   => 'el el-magic',
			'fields' => array(
				array(
					'id'     => 'section_start_block_entry_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Entry Meta Info Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'post_meta_info_manager',
					'type'     => 'sorter',
					'title'    => esc_html__( 'Left - Entry Meta Info', 'bingo' ),
					'subtitle' => esc_html__( 'Organize how you want the entry meta info to appear on blog listing.', 'bingo' ),
					'options'  => array(
						'enabled'  => array(
							'author' => esc_html__( 'author', 'bingo' ),
							'date'   => esc_html__( 'date', 'bingo' ),
						),
						'disabled' => array(
							'tag'     => esc_html__( 'tags', 'bingo' ),
							'comment' => esc_html__( 'comments', 'bingo' ),
							'view'    => esc_html__( 'views', 'bingo' ),
							'cate'    => esc_html__( 'category', 'bingo' ),
						)
					),
				),
				array(
					'id'       => 'post_meta_info_right',
					'type'     => 'select',
					'title'    => esc_html__( 'Right - Entry Meta Info', 'bingo' ),
					'subtitle' => esc_html__( 'Select a element for displaying at the right of meta info bars. This option needs to active Bingo Core plugin to work.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::post_meta_right_element(),
					'default'  => 'none'
				),
				array(
					'id'       => 'post_meta_info_icon',
					'title'    => esc_html__( 'Meta Info Icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable meta info icons.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'human_time',
					'title'    => esc_html__( 'Human Time (Ago)', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the human time ("ago" time), Please note: this option is not compatible with cache plugins.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'gif_support',
					'type'     => 'switch',
					'title'    => esc_html__( 'GIF Support', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable GIF image support.', 'bingo' ),
					'default'  => 1
				),
				array(
					'id'     => 'section_end_block_entry_meta_info',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//post share icons
				array(
					'id'     => 'section_start_block_post_share_icon',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Share Icons Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'post_share_icon',
					'title'    => esc_html__( 'Share on social icons', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable share on socials in blog listing.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_post_share_icon',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_review_score_intro',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_attr__( 'Review score icon option', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'review_score_icon',
					'title'    => esc_attr__( 'review score icon', 'bingo' ),
					'subtitle' => esc_attr__( 'Enable or disable total score icons on featured images, post format and video duration icons can be removed if this icon is visible.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_review_score_intro',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_post_format',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Format Icon Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'post_format',
					'type'     => 'switch',
					'title'    => esc_html__( 'show format icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable format icons on featured images.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'post_format_default',
					'type'     => 'switch',
					'title'    => esc_html__( 'show default icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable default format icons on blog listing.', 'bingo' ),
					'required' => array( 'post_format', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'post_format_video',
					'type'     => 'switch',
					'title'    => esc_html__( 'show video icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable video format icons on blog listing.', 'bingo' ),
					'required' => array( 'post_format', '=', '1' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'post_format_gallery',
					'type'     => 'switch',
					'title'    => esc_html__( 'show gallery icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable gallery format icons on blog listing.', 'bingo' ),
					'required' => array( 'post_format', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'post_format_audio',
					'type'     => 'switch',
					'title'    => esc_html__( 'show audio icon', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable audio format icons on blog listing.', 'bingo' ),
					'required' => array( 'post_format', '=', '1' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_post_format',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				array(
					'id'     => 'section_start_post_classic_thumbnail',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'featured classic options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'post_classic_thumbnail_type',
					'title'    => esc_html__( 'Iframe/Gallery on classic', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable featured iframe and gallery style for the classic layout on post listing', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'show_thumbnail_gallery_popup',
					'title'    => esc_html__( 'Gallery Popup', 'bingo' ),
					'subtitle' => esc_html__( 'enable or disable popup gallery popup when click on gallery', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'show_thumbnail_video_popup',
					'title'    => esc_html__( 'Video Popup', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable popup video when clicking on video icon of classic layouts', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'     => 'section_end_post_classic_thumbnail',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//block excerpt section
				array(
					'id'     => 'section_start_block_excerpt_length',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Excerpt Length options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'grid_excerpt_length',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'Grid - Excerpt Length', 'bingo' ),
					'subtitle' => esc_html__( 'Select length of excerpts for the grid layout, leave blank or set is 0 if you want to disable it.', 'bingo' ),
					'default'  => 20
				),
				array(
					'id'       => 'list_excerpt_length',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'List 1 - Excerpt Length', 'bingo' ),
					'subtitle' => esc_html__( 'select length of excerpt for the list layout, leave blank or set is 0 if you want disable excerpt', 'bingo' ),
					'default'  => 20
				),
				array(
					'id'       => 'small_list_excerpt_length',
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'title'    => esc_html__( 'List 2 - Excerpt Length', 'bingo' ),
					'subtitle' => esc_html__( 'Select length of excerpts for the list 2 layout, leave blank or set is 0 if you want to disable it.', 'bingo' ),
					'default'  => 20
				),
				array(
					'id'       => 'classic_summary_type',
					'type'     => 'select',
					'title'    => esc_html__( 'Classic 1 - Summary Type', 'bingo' ),
					'subtitle' => esc_html__( 'Select a summary type for the classic 1 layout.', 'bingo' ),
					'options'  => array(
						'moretag' => esc_html__( 'Use Read More Tag', 'bingo' ),
						'excerpt' => esc_html__( 'Use Excerpt', 'bingo' )
					),
					'default'  => 'excerpt'
				),
				array(
					'id'       => 'classic_excerpt_length',
					'type'     => 'text',
					'title'    => esc_html__( 'Classic 1 - Excerpt Length', 'bingo' ),
					'subtitle' => esc_html__( 'Select length of excerpts for the classic 1 layout, leave blank or set is 0 if you want to disable it.', 'bingo' ),
					'required' => array( 'classic_summary_type', '=', 'excerpt' ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 50
				),
				array(
					'id'       => 'classic_lite_excerpt_length',
					'type'     => 'text',
					'title'    => esc_html__( 'Classic 2 - Excerpt Length', 'bingo' ),
					'subtitle' => esc_html__( 'Select length of excerpts for the classic 2 layout, leave blank or set is 0 if you want to disable it.', 'bingo' ),
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 50
				),
				array(
					'id'     => 'section_end_block_excerpt_length',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}