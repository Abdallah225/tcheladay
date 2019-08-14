<?php
//post options
if ( ! function_exists( 'bingo_ruby_theme_options_single_post_share' ) ) {
	function bingo_ruby_theme_options_single_post_share() {

		return array(
			'title'      => esc_html__( 'Share Options', 'bingo' ),
			'id'         => 'bingo_ruby_theme_options_section_single_post_share',
			'desc'       => esc_html__( 'select share on socials options for single post pages.', 'bingo' ),
			'icon'       => 'el el-share',
			'subsection' => true,
			'fields'     => array(
				array(
					'id'     => 'section_start_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Top - share button options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_share_top',
					'type'     => 'switch',
					'title'    => esc_html__( 'Top - Share On Social', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on socials bars at top of single post contents.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_facebook',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Facebook', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_twitter',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Twitter', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_googleplus',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Google Plus', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Google +.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_pinterest',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Pinterest', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinsterest.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_linkedin',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On LinkedIn', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_tumblr',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Tumblr', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_reddit',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Reddit', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_vk',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Vkontakte', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_email',
					'type'     => 'switch',
					'required' => array( 'single_post_share_top', '=', '1' ),
					'title'    => esc_html__( 'Share On Email', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_social_top',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
				// =======================================================================//
				// ! bottom share button config
				// =======================================================================//
				array(
					'id'     => 'section_start_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Bottom - Share Bar(Big) Options', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'single_post_share_bottom',
					'type'     => 'switch',
					'title'    => esc_html__( 'Bottom - Share On Social Bar', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on socials bars at bottom of single post contents.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_big_facebook',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Facebook', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_big_twitter',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Twitter', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter.', 'bingo' ),
					'switch'   => true,
					'default'  => 1
				),
				array(
					'id'       => 'single_share_big_googleplus',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Google Plus', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Google +.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_pinterest',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Pinterest', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinsterest.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_linkedin',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On LinkedIn', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_tumblr',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Tumblr', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_reddit',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Reddit', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_vk',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Vkontakte', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'single_share_big_email',
					'type'     => 'switch',
					'required' => array( 'single_post_share_bottom', '=', '1' ),
					'title'    => esc_html__( 'Share On Email', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email.', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_single_post_social_bottom',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			),
		);
	}
}
