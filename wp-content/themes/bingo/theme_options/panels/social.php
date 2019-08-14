<?php
//social profiles config
if ( ! function_exists( 'bingo_ruby_theme_options_social_profile' ) ) {
	function bingo_ruby_theme_options_social_profile() {
		return array(
			'id'     => 'social_theme_ops_social_profile',
			'title'  => esc_html__( 'Social Profiles', 'bingo' ),
			'icon'   => 'el el-twitter',
			'desc'   => esc_html__( 'Options below for setting up your site socials. To add users/authors socials, go to the Users -> your profile.', 'bingo' ),
			'fields' => array(
				//Social Profile
				array(
					'id'     => 'section_start_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-start',
					'title'  => esc_html__( 'Social Profiles', 'bingo' ),
					'indent' => true
				),
				array(
					'id'       => 'social_facebook',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Facebook URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_twitter',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Twitter URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_googleplus',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Google+ URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_pinterest',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Pinterest URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_linkedin',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'LinkedIn URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_tumblr',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Tumblr URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_flickr',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Flickr URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_instagram',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Instagram URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_skype',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Skype URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_snapchat',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Snapchat URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_myspace',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Myspace URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_youtube',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Youtube URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_bloglovin',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Bloglovin URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_digg',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Digg URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_dribbble',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Dribbble URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_soundcloud',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Soundcloud URL', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_vimeo',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Vimeo URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_reddit',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Reddit URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_whatsapp',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Whatsapp URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_vk',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'VKontakte URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'       => 'social_rss',
					'type'     => 'text',
					'validate' => 'url',
					'title'    => esc_html__( 'Rss URL ', 'bingo' ),
					'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
				),
				array(
					'id'     => 'section_end_social_profile',
					'type'   => 'section',
					'class'  => 'ruby-section-end',
					'indent' => false
				),
                //custom social profile
                array(
                    'id'     => 'section_start_social_profile_custom',
                    'type'   => 'section',
                    'class'  => 'ruby-section-start',
                    'title'  => esc_html__( 'Custom Site Social Profile', 'bingo' ),
                    'indent' => true
                ),
                //social 1
                array(
                    'id'       => 'custom_social_1_url',
                    'type'     => 'text',
                    'validate' => 'url',
                    'title'    => esc_html__( 'Custom social 1 - URL:', 'bingo' ),
                    'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
                ),
                array(
                    'id'       => 'custom_social_1_name',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Custom Social 1 - Name:', 'bingo' ),
                    'subtitle' => esc_html__( 'input name of social ie: facebook', 'bingo' )
                ),
                array(
                    'id'       => 'custom_social_1_icon',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Custom Social 1 - Icon:', 'bingo' ),
                    'subtitle' => esc_html__( 'input name of font icon, ie: fa-facebook, the theme support font awesome, you can find all icon here: http://fontawesome.io/icons/', 'bingo' ),
                    'default'  => '',
                ),
                //social 2
                array(
                    'id'       => 'custom_social_2_url',
                    'type'     => 'text',
                    'validate' => 'url',
                    'title'    => esc_html__( 'Custom social 2 - URL:', 'bingo' ),
                    'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
                ),
                array(
                    'id'       => 'custom_social_2_name',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Custom Social 2 - Name:', 'bingo' ),
                    'subtitle' => esc_html__( 'input name of social ie: facebook', 'bingo' )
                ),
                array(
                    'id'       => 'custom_social_2_icon',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Custom Social 2 - Icon:', 'bingo' ),
                    'subtitle' => esc_html__( 'input name of font icon, ie: fa-facebook, the theme support font awesome, you can find all icon here: http://fontawesome.io/icons/', 'bingo' ),
                    'default'  => '',
                ),
                //social 3
                array(
                    'id'       => 'custom_social_3_url',
                    'type'     => 'text',
                    'validate' => 'url',
                    'title'    => esc_html__( 'Custom social 3 - URL:', 'bingo' ),
                    'subtitle' => esc_html__( 'The URL to your account page', 'bingo' )
                ),
                array(
                    'id'       => 'custom_social_3_name',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Custom Social 3 - Name:', 'bingo' ),
                    'subtitle' => esc_html__( 'input name of social ie: facebook', 'bingo' )
                ),
                array(
                    'id'       => 'custom_social_3_icon',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Custom Social 3 - Icon:', 'bingo' ),
                    'subtitle' => esc_html__( 'input name of font icon, ie: fa-facebook, the theme support font awesome, you can find all icon here: http://fontawesome.io/icons/', 'bingo' ),
                    'default'  => '',
                ),
                array(
                    'id'     => 'section_end_social_profile_custom',
                    'type'   => 'section',
                    'class'  => 'ruby-section-end no-border',
                    'indent' => false
                ),
			)
		);
	}
}