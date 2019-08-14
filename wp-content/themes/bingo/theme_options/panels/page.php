<?php
//page option
if ( ! function_exists( 'bingo_ruby_theme_options_page' ) ) {
	function bingo_ruby_theme_options_page() {

		return array(
			'id'    => 'bingo_ruby_theme_ops_section_pages',
			'title' => esc_html__( 'Pages Options', 'bingo' ),
			'desc'  => esc_html__( 'Select options for Pages', 'bingo' ),
			'icon'  => 'el el-gift',
		);
	}
}

//default page
if ( ! function_exists( 'bingo_ruby_default_page_config' ) ) {
	function bingo_ruby_default_page_config() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_section_single_page',
			'title'      => esc_html__( 'single page options', 'bingo' ),
			'desc'       => esc_html__( 'Select options for Pages', 'bingo' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				//page layout
				//featured image
				array(
					'id'     => 'section_start_section_layout_featured_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'featured image layout option', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_page_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'single page layout', 'bingo' ),
					'subtitle' => esc_html__( 'select default layout of single page', 'bingo' ),
					'options'  => bingo_ruby_theme_config::single_post_layout(),
					'default'  => '1',
				),
				array(
					'id'       => 'single_page_featured_size',
					'type'     => 'select',
					'title'    => esc_html__( 'featured page image size', 'bingo' ),
					'subtitle' => esc_html__( 'select a size for the featured page image, select full size if you want to display full images or crop size if you want single page load fast.', 'bingo' ),
					'options'  => array(
						'crop' => esc_html__( 'Crop Image', 'bingo' ),
						'full' => esc_html__( 'Full Image', 'bingo' ),
					),
					'default'  => 'crop',
				),
				array(
					'id'     => 'section_end_section_layout_featured_page',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//single page options
				array(
					'id'     => 'section_start_single_page_section',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'single page options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_page_title',
					'type'     => 'switch',
					'title'    => esc_html__( 'Single page title', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the page title, this options will apply to all single pages.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'default_single_page_box_comment',
					'type'     => 'switch',
					'title'    => esc_html__( 'Comment Box', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the comments on the pages, Default this option is enable', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'     => 'section_end_single_page_section',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				//single page options
				array(
					'id'     => 'section_start_single_page_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Single Sidebar Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'default_single_page_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Single sidebar name', 'bingo' ),
					'subtitle' => esc_html__( 'Select a default sidebar name for single pages, this option will apply to all single pages page. You can set an individual sidebar for each page in the page editor.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default',
				),
				array(
					'id'       => 'default_single_page_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Single Page Sidebar Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for single pages, this option will override default sidebar position. You can set an individual sidebar position for each page in the page editor.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_single_page_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}

//author page
if ( ! function_exists( 'bingo_ruby_author_page_config' ) ) {
	function bingo_ruby_author_page_config() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_section_author_page',
			'title'      => esc_html__( 'author page options', 'bingo' ),
			'desc'       => esc_html__( 'author page options (author.php), options below will apply authors pages.', 'bingo' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'     => 'section_start_author_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Author Layout Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'author_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Author Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a layout for author pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::blog_layout(),
					'default'  => 'layout_classic'
				),
				array(
					'id'       => 'author_big_post_first',
					'title'    => esc_html__( '1st Classic Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable classic layout at the first post of the blog listing, This option will not apply to classic layouts.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 0
				),
				array(
					'id'       => 'author_1st_classic_layout',
					'title'    => esc_html__( '1st classic style', 'bingo' ),
					'subtitle' => esc_html__( 'select style for 1st classic layout', 'bingo' ),
					'type'     => 'select',
					'required' => array( 'author_big_post_first', '=', '1' ),
					'options'  => array(
						'classic_1' => esc_html__( 'Classic 1', 'bingo' ),
						'classic_2' => esc_html__( 'Classic 2', 'bingo' ),
					),
					'default'  => 'classic_1'
				),
                array(
                    'id'     => 'section_end_author_page',
                    'type'   => 'section',
                    'class'  => 'ruby-section-end',
                    'indent' => false
                ),
				// =======================================================================//
				// ! author sidebar name
				// =======================================================================//
				array(
					'id'     => 'section_start_author_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'author sidebar options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'author_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Author Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar for author pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default'
				),
				array(
					'id'       => 'author_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Author sidebar position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for author pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_author_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//Search page
if ( ! function_exists( 'bingo_ruby_search_page_config' ) ) {
	function bingo_ruby_search_page_config() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_section_search_page',
			'title'      => esc_html__( 'Search page options', 'bingo' ),
			'desc'       => esc_html__( 'search page options (search.php), options below will apply the search page.', 'bingo' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'     => 'section_start_search_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Search Page options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'search_header_form',
					'title'    => esc_html__( 'Show search form', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable the search form in the search page.', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
				array(
					'id'       => 'search_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Search layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a blog layout for the search page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::blog_layout(),
					'default'  => 'layout_grid_small'
				),
				array(
					'id'       => 'search_posts_per_page',
					'title'    => esc_html__( 'Number of posts', 'bingo' ),
					'subtitle' => esc_html__( 'select number of posts for the search page, this option will override default settings in "Settings > Reading > blog pages show at most. Leave blank or set 0 if you want to set as default.', 'bingo' ),
					'type'     => 'text',
					'class'    => 'small-text',
					'validate' => 'numeric',
					'default'  => 0
				),
				array(
					'id'       => 'search_filter',
					'title'    => esc_html__( 'Search Filter', 'bingo' ),
					'subtitle' => esc_html__( 'remove pages from search result', 'bingo' ),
					'type'     => 'switch',
					'default'  => 1
				),
                array(
                    'id'     => 'section_end_search_page',
                    'type'   => 'section',
                    'class'  => 'ruby-section-end',
                    'indent' => false
                ),
				// =======================================================================//
				// ! search sidebar name
				// =======================================================================//
				array(
					'id'     => 'section_start_search_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'search sidebar options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'search_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Search Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar for the search page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default'
				),
				array(
					'id'       => 'search_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Search sidebar position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for the search page.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'none'
				),
				array(
					'id'     => 'section_end_search_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//archive page
if ( ! function_exists( 'bingo_ruby_archive_page_config' ) ) {
	function bingo_ruby_archive_page_config() {
		return array(
			'id'         => 'bingo_ruby_theme_ops_section_archive_page',
			'title'      => esc_html__( 'Archive page options', 'bingo' ),
			'desc'       => esc_html__( 'archive page options (archive.php), options below will apply archive pages, WordPress will automatically generate daily, monthly and yearly archives.', 'bingo' ),
			'subsection' => true,
			'icon'       => 'el el-list-alt',
			'fields'     => array(
				array(
					'id'     => 'section_start_archive_page',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Archive Page options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'archive_layout',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Archive Layout', 'bingo' ),
					'subtitle' => esc_html__( 'Select a blog layout for archive pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::blog_layout(),
					'default'  => 'layout_classic'
				),
				array(
					'id'       => 'archive_header_background',
					'type'     => 'media',
					'title'    => esc_html__( 'Archive header BG', 'bingo' ),
					'subtitle' => esc_html__( 'Upload a header background for archive headers.', 'bingo' )
				),
                array(
                    'id'     => 'section_end_archive_page',
                    'type'   => 'section',
                    'class'  => 'ruby-section-end',
                    'indent' => false
                ),
				// =======================================================================//
				// ! archive sidebar name
				// =======================================================================//
				array(
					'id'     => 'section_start_archive_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'archive sidebar options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'archive_sidebar',
					'type'     => 'select',
					'title'    => esc_html__( 'Archive Sidebar Name', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar for archive pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_name(),
					'default'  => 'bingo_ruby_sidebar_default'
				),
				array(
					'id'       => 'archive_sidebar_position',
					'type'     => 'image_select',
					'title'    => esc_html__( 'Archive Sidebar Position', 'bingo' ),
					'subtitle' => esc_html__( 'Select a sidebar position for archive pages.', 'bingo' ),
					'options'  => bingo_ruby_theme_config::sidebar_position(),
					'default'  => 'default'
				),
				array(
					'id'     => 'section_end_archive_sidebar',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}

//team author page
if ( ! function_exists( 'bingo_ruby_author_team_page_config' ) ) {
    function bingo_ruby_author_team_page_config() {
        return array(
            'id'         => 'bingo_ruby_theme_ops_section_author_team_page',
            'title'      => esc_html__( 'Author team options', 'bingo' ),
            'desc'       => esc_html__( 'Select options for author team page, to create author team page, please go to page -> add new and then assign "Author Team" Template in Page Attributes option  for that page', 'bingo' ),
            'subsection' => true,
            'icon'       => 'el el-list-alt',
            'fields'     => array(
                array(
                    'id'       => 'excepted_author_team_id',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Excepted Author IDs', 'bingo' ),
                    'subtitle' => esc_html__( 'Input author id if you do not want to display theme in this page, Separated by commas (example: 1,2,3) ', 'bingo' ),
                )
            )
        );
    }
}