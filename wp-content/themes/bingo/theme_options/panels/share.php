<?php
if ( ! function_exists( 'bingo_ruby_theme_options_share_post' ) ) {
	function bingo_ruby_theme_options_share_post() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_share_social',
			'title'  => esc_html__( 'Shares To Socials', 'bingo' ),
			'desc'   => esc_html__( 'These are options for setting up the sites social and share post to social. To add author social, go to the Users -> Your Profile', 'bingo' ),
			'icon'   => 'el el-share',
			'fields' => array(
				//share to socials
				array(
					'id'     => 'section_start_share_social',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'share on socials', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'share_facebook',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Facebook', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Facebook, This default of option is enable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_twitter',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Twitter', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Twitter, This default of option is enable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_googleplus',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Google Plus', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Google +, This default of option is enable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_pinterest',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Pinterest', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Pinsterest, This default of option is enable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_linkedin',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On LinkedIn', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on LinkedIn, This default of option is disable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_tumblr',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Tumblr', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Tumblr, This default of option is disable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_reddit',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Reddit', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Reddit, This default of option is disable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_vk',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Vkontakte', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Vkontakte, This default of option is disable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'       => 'share_email',
					'type'     => 'switch',
					'title'    => esc_html__( 'Share On Email', 'bingo' ),
					'subtitle' => esc_html__( 'Enable or disable share on Email, This default of option is disable', 'bingo' ),
					'switch'   => true,
					'default'  => 0
				),
				array(
					'id'     => 'section_end_share_social',
					'type'   => 'section',
					'class'  => 'ruby-section-end no-border',
					'indent' => false
				),
			)
		);
	}
}
