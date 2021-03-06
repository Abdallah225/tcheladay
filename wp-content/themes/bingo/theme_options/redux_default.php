<?php
if ( ! function_exists( 'bingo_ruby_redux_default_config' ) ) {
	function bingo_ruby_redux_default_config() {
		return array(
			'main_site_layout'                            => 'is-full-width',
			'site_background'                             => array(
				'background-color'      => '#f9f9f9',
				'background-size'       => 'inherit',
				'background-attachment' => 'fixed',
				'background-position'   => 'left top',
				'background-repeat'     => 'repeat'
			),
			'site_background_link'                        => '',
			'site_container_width'                        => 1140,
			'site_smooth_scroll'                          => 0,
			'site_smooth_display'                         => 0,
			'site_smooth_display_style'                   => 'ruby-fade',
			'site_breadcrumb'                             => 1,
			'site_breadcrumb_current'                     => 1,
			'social_tooltip'                              => 1,
			'open_graph'                                  => 1,
			'facebook_app_id'                             => '',
			'post_meta_info_manager'                      => array(
				'enabled'  => array( 'author' => 'author', 'date' => 'date' ),
				'disabled' => array(
					'tag'     => 'tags',
					'comment' => 'comments',
					'view'    => 'views',
					'cate'    => 'category'
				)
			),
			'post_meta_info_right'                        => 'none',
			'post_meta_info_icon'                         => 1,
			'human_time'                                  => 0,
			'post_share_icon'                             => 1,
			'review_score_icon'                           => 1,
			'post_format'                                 => 1,
			'post_format_default'                         => 0,
			'post_format_video'                           => 1,
			'post_format_gallery'                         => 0,
			'post_format_audio'                           => 0,
			'post_classic_thumbnail_type'                 => 0,
			'show_thumbnail_gallery_popup'                => 1,
			'show_thumbnail_video_popup'                  => 1,
			'grid_excerpt_length'                         => 20,
			'list_excerpt_length'                         => 20,
			'small_list_excerpt_length'                   => 20,
			'classic_summary_type'                        => 'excerpt',
			'classic_excerpt_length'                      => 50,
			'classic_lite_excerpt_length'                 => 50,
			'header_style'                                => '1',
			'header_background_type'                      => 1,
			'header_background_color'                     => '#ffffff',
			'header_background_height'                    => '320',
			'header_parallax'                             => 1,
			'header_social_bar'                           => 0,
			'header_social_bar_style'                     => 1,
			'topbar'                                      => 1,
			'topbar_style'                                => '1',
			'topbar_navigation'                           => 1,
			'topbar_social'                               => 1,
			'topbar_social_color'                         => 0,
			'topbar_date'                                 => 1,
			'topbar_date_format'                          => '',
			'topbar_date_js'                              => 0,
			'topbar_phone'                                => '',
			'topbar_email'                                => '',
			'topbar_subscribe'                            => 0,
			'subscribe_text_style'                        => 'is-dark-text',
			'subscribe_title'                             => '',
			'subscribe_text'                              => '',
			'topbar_subscribe_shortcode'                  => '',
			'subscribe_social_bar'                        => 0,
			'subscribe_social_color'                      => 0,
			'navbar_sticky'                               => 1,
			'navbar_sticky_smart'                         => 1,
			'navbar_social'                               => 1,
			'navbar_social_color'                         => 0,
			'navbar_search'                               => 1,
			'off_canvas_button'                           => 1,
			'off_canvas_style'                            => 'light',
			'off_canvas_social_bar'                       => 1,
			'off_canvas_widget_section'                   => 1,
			'header_logo_alt'                             => '',
			'header_logo_title'                           => '',
			'breaking_news_page'                          => 0,
			'breaking_news_blog'                          => 0,
			'breaking_news_title'                         => 'breaking news',
			'breaking_news_cat'                           => '',
			'breaking_news_tag'                           => '',
			'breaking_news_sort'                          => 'date_post',
			'breaking_news_num'                           => 5,
			'breaking_news_offset'                        => 0,
			'breaking_news_right'                         => 0,
			'breaking_news_right_type'                    => 1,
			'breaking_news_right_num'                     => 3,
			'breaking_news_right_custom'                  => '',
			'site_sidebar_position'                       => 'right',
			'bingo_ruby_multi_sidebar'                    => array(),
			'sticky_sidebar'                              => 0,
			'footer_background'                           => array(
				'background-color'      => '#282828',
				'background-size'       => 'cover',
				'background-attachment' => 'fixed',
				'background-position'   => 'center center',
				'background-repeat'     => 'no-repeat'
			),
			'footer_text_style'                           => 'is-light-text',
			'footer_navigation'                           => 0,
			'footer_social_bar'                           => 0,
			'footer_social_color'                         => 0,
			'site_back_to_top'                            => 1,
			'site_back_to_top_mobile'                     => 0,
			'background_copyright_color'                  => '#242424',
			'copyright_text_color'                        => '#dddddd',
			'site_copyright'                              => '',
			'feat_style'                                  => 'none',
			'feat_cat'                                    => '',
			'feat_tag'                                    => '',
			'feat_sort'                                   => 'date_post',
			'slides_per_page'                             => 1,
			'feat_num'                                    => 1,
			'feat_offset'                                 => 0,
			'blog_layout'                                 => 'layout_classic',
			'big_post_first'                              => 0,
			'blog_index_1st_classic_layout'               => 'classic_1',
			'blog_sidebar'                                => 'bingo_ruby_sidebar_default',
			'blog_sidebar_position'                       => 'default',
			'single_post_meta_info_manager'               => array(
				'enabled'  => array(
					'author'  => 'Author',
					'date'    => 'Date',
					'comment' => 'Comment',
					'tag'     => 'Tags'
				),
				'disabled' => array( 'cate' => 'Category', 'view' => 'View' )
			),
			'single_post_meta_info_icon'                  => 1,
			'single_post_date_full'                       => 0,
			'single_post_counter_type'                    => 0,
			'single_popup_image'                          => 1,
			'single_post_content_padding'                 => 0,
			'default_single_review_box_position'          => 'bottom',
			'single_post_box_nav'                         => 1,
			'single_post_box_author'                      => 1,
			'single_post_box_author_position'             => 'bottom',
			'default_single_post_box_comment'             => 1,
			'single_post_box_comment_button'              => 0,
			'single_post_box_comment_web'                 => 0,
			'single_post_widget_section'                  => 0,
			'single_post_like'                            => 0,
			'default_single_post_sidebar'                 => 'bingo_ruby_sidebar_default',
			'default_single_post_sidebar_position'        => 'default',
			'default_single_post_layout'                  => '1',
			'single_post_featured_size'                   => 'crop',
			'single_post_style_video'                     => '1',
			'single_post_layout_video'                    => '1',
			'single_post_video_autoplay'                  => '0',
			'single_post_layout_audio'                    => '1',
			'single_post_layout_gallery_slider'           => '1',
			'single_post_layout_gallery_grid'             => '1',
			'single_post_box_related'                     => 1,
			'single_post_box_related_title'               => 'You Might Also Like',
			'single_post_box_related_layout'              => '1',
			'single_post_box_related_where'               => 'all',
			'single_post_box_related_num'                 => 4,
			'default_single_post_infinite_scroll_related' => 0,
			'single_post_box_related_video'               => 1,
			'single_post_box_related_video_title'         => 'You Might Also Like',
			'single_post_box_related_video_where'         => 'all',
			'single_post_box_related_video_num'           => 6,
			'single_post_share_top'                       => 1,
			'single_share_facebook'                       => 1,
			'single_share_twitter'                        => 1,
			'single_share_googleplus'                     => 1,
			'single_share_pinterest'                      => 1,
			'single_share_linkedin'                       => 0,
			'single_share_tumblr'                         => 0,
			'single_share_reddit'                         => 0,
			'single_share_vk'                             => 0,
			'single_share_email'                          => 0,
			'single_post_share_bottom'                    => 1,
			'single_share_big_facebook'                   => 1,
			'single_share_big_twitter'                    => 1,
			'single_share_big_googleplus'                 => 0,
			'single_share_big_pinterest'                  => 0,
			'single_share_big_linkedin'                   => 0,
			'single_share_big_tumblr'                     => 0,
			'single_share_big_reddit'                     => 0,
			'single_share_big_vk'                         => 0,
			'single_share_big_email'                      => 0,
			'category_featured_style'                     => 'none',
			'category_featured_tag'                       => '',
			'category_featured_sort'                      => 'date_post',
			'category_slides_per_page'                    => 1,
			'category_featured_num'                       => 1,
			'category_featured_offset'                    => 0,
			'category_layout'                             => 'layout_classic',
			'category_big_post_first'                     => 0,
			'category_1st_classic_layout'                 => 'classic_1',
			'category_sidebar'                            => 'bingo_ruby_sidebar_default',
			'category_sidebar_position'                   => 'default',
			'default_single_page_layout'                  => '1',
			'single_page_featured_size'                   => 'crop',
			'default_single_page_title'                   => 1,
			'default_single_page_box_comment'             => 1,
			'default_single_page_sidebar'                 => 'bingo_ruby_sidebar_default',
			'default_single_page_sidebar_position'        => 'default',
			'author_layout'                               => 'layout_classic',
			'author_big_post_first'                       => 0,
			'author_1st_classic_layout'                   => 'classic_1',
			'author_sidebar'                              => 'bingo_ruby_sidebar_default',
			'author_sidebar_position'                     => 'default',
			'search_header_form'                          => 1,
			'search_layout'                               => 'layout_grid_small',
			'search_posts_per_page'                       => 0,
			'search_filter'                               => 1,
			'search_sidebar'                              => 'bingo_ruby_sidebar_default',
			'search_sidebar_position'                     => 'none',
			'archive_layout'                              => 'layout_classic',
			'archive_sidebar'                             => 'bingo_ruby_sidebar_default',
			'archive_sidebar_position'                    => 'default',
			'share_facebook'                              => 0,
			'share_twitter'                               => 0,
			'share_googleplus'                            => 0,
			'share_pinterest'                             => 0,
			'share_linkedin'                              => 0,
			'share_tumblr'                                => 0,
			'share_reddit'                                => 0,
			'share_vk'                                    => 0,
			'share_email'                                 => 0,
			'font_topbar'                                 => array(
				'font-family'    => 'Lato',
				'font-size'      => '13px',
				'google'         => true,
				'font-weight'    => '400',
				'text-transform' => 'capitalize',
				'letter-spacing' => ''
			),
			'font_navbar'                                 => array(
				'font-family'    => 'Lato',
				'font-size'      => '15px',
				'google'         => true,
				'font-weight'    => '700',
				'text-transform' => 'uppercase',
				'letter-spacing' => '0'
			),
			'font_navbar_sub'                             => array(
				'font-family'    => 'Lato',
				'font-size'      => '14px',
				'google'         => true,
				'font-weight'    => '400',
				'text-transform' => 'capitalize',
				'letter-spacing' => '0'
			),
			'font_logo_text'                              => array(
				'font-family'    => 'Montserrat',
				'font-size'      => '40px',
				'google'         => true,
				'font-weight'    => '700',
				'letter-spacing' => '-1px',
				'text-transform' => 'uppercase'
			),
			'font_logo_text_mobile'                       => array(
				'font-family'    => 'Montserrat',
				'font-size'      => '32px',
				'google'         => true,
				'font-weight'    => '700',
				'letter-spacing' => '-1px',
				'text-transform' => 'uppercase'
			),
			'font_body'                                   => array(
				'font-family' => 'Lato',
				'google'      => true,
				'font-size'   => '15px',
				'line-height' => '24px',
				'font-weight' => '400',
				'color'       => '#282828'
			),
			'font_excerpt_size'                           => '14',
			'font_post_title_size_1'                      => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'font-size'      => '36px',
				'font-weight'    => '700',
				'color'          => '#282828',
				'letter-spacing' => ''
			),
			'font_post_title_size_2'                      => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'font-size'      => '30px',
				'letter-spacing' => '',
				'font-weight'    => '700',
				'color'          => '#282828'
			),
			'font_post_title_size_3'                      => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'font-size'      => '21px',
				'letter-spacing' => '',
				'font-weight'    => '700',
				'color'          => '#282828'
			),
			'font_post_title_size_4'                      => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'font-size'      => '18px',
				'letter-spacing' => '',
				'font-weight'    => '700',
				'color'          => '#282828'
			),
			'font_post_title_size_5'                      => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'font-size'      => '14px',
				'letter-spacing' => '',
				'font-weight'    => '700',
				'color'          => '#282828'
			),
			'font_post_title_size_6'                      => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'font-size'      => '13px',
				'letter-spacing' => '',
				'font-weight'    => '400',
				'color'          => '#282828'
			),
			'font_h_tags'                                 => array(
				'google'         => true,
				'font-family'    => 'Montserrat',
				'text-transform' => 'none',
				'font-weight'    => '700'
			),
			'font_post_meta_info'                         => array(
				'font-family'    => 'Lato',
				'font-size'      => '12px',
				'google'         => true,
				'font-weight'    => '400',
				'color'          => '#999',
				'text-transform' => ''
			),
			'font_post_cat_info'                          => array(
				'font-size'      => '11px',
				'google'         => true,
				'font-weight'    => '700',
				'font-family'    => 'Lato',
				'text-transform' => 'uppercase'
			),
			'font_heading_block'                          => array(
				'font-family'    => 'Montserrat',
				'font-size'      => '18px',
				'google'         => true,
				'font-weight'    => '600',
				'text-transform' => 'uppercase',
				'letter-spacing' => ''
			),
			'font_heading_right_block'                    => array(
				'font-family'    => 'Montserrat',
				'font-size'      => '11px',
				'google'         => true,
				'font-weight'    => '500',
				'text-transform' => 'uppercase',
				'letter-spacing' => ''
			),
			'font_heading_widget'                         => array(
				'font-family'    => 'Montserrat',
				'font-size'      => '14px',
				'google'         => true,
				'font-weight'    => '600',
				'text-transform' => 'uppercase',
				'letter-spacing' => ''
			),
			'font_breadcrumb'                             => array(
				'google'         => true,
				'font-family'    => 'Lato',
				'text-transform' => 'none',
				'font-weight'    => '400',
				'font-size'      => '13px',
				'color'          => '#999999'
			),
			'header_ad_type'                              => 'script',
			'header_ad_url'                               => '',
			'header_ad_type_single'                       => 'script',
			'header_ad_url_single'                        => '',
			'bottom_ad_type_single'                       => 'script',
			'bottom_ad_url_single'                        => '',
			'main_nav_background'                         => '',
			'main_sub_nav_background'                     => '',
			'mega_menu_cat_text_style'                    => 'is-light-text',

		);
	}
}


