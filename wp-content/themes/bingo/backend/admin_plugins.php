<?php
//include the TGM_Plugin_Activation class
require_once get_template_directory() . '/backend/class-tgm-plugin-activation.php';

if ( ! function_exists( 'bingo_ruby_theme_register_required_plugins' ) ) {
	function bingo_ruby_theme_register_required_plugins() {
		$plugins = array(
			array(
				'name'               => 'Bingo Core',
				'slug'               => 'bingo-ruby-core',
				'source'             => get_template_directory() . '/plugins/bingo-ruby-core.zip',
				'required'           => true,
				'version'            => '1.8',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'Meta Box',
				'slug'               => 'meta-box',
				'required'           => true,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
			),
			array(
				'name'               => 'Bingo Importer',
				'slug'               => 'bingo-ruby-import',
				'source'             => get_template_directory() . '/plugins/bingo-ruby-import.zip',
				'required'           => true,
				'version'            => '1.1',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'     => 'oAuth Twitter Feed for Developers',
				'slug'     => 'oauth-twitter-feed-for-developers',
				'required' => true,
			),
			array(
				'name'               => 'Envato Market',
				'slug'               => 'envato-market',
				'source'             => get_template_directory() . '/plugins/envato-market.zip',
				'required'           => true,
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
			),
		);


		$bingo_ruby_config = array(
			'id'           => 'bingo',
			'default_path' => '',
			'menu'         => 'bingo-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
			'strings'      => array(
				'page_title'                      => esc_html__( 'Install Required Plugins', 'bingo' ),
				'menu_title'                      => esc_html__( 'Install Plugins', 'bingo' ),
				'installing'                      => esc_html__( 'Installing Plugin: %s', 'bingo' ),
				'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'bingo' ),
				'notice_can_install_required'     => _n_noop( 'bingo the following plugin: %1$s.', 'bingo requires the following plugins: %1$s.', 'bingo' ),
				'notice_can_install_recommended'  => _n_noop( 'bingo recommends the following plugin: %1$s.', 'bingo recommends the following plugins: %1$s.', 'bingo' ),
				'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'bingo' ),
				'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'bingo' ),
				'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'bingo' ),
				'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'bingo' ),
				'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with bingo: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with bingo: %1$s.', 'bingo' ),
				'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'bingo' ),
				'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'bingo' ),
				'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'bingo' ),
				'return'                          => esc_html__( 'Return to Required Plugins Installer', 'bingo' ),
				'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'bingo' ),
				'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'bingo' ),
				'nag_type'                        => 'updated'
			)
		);

		tgmpa( $plugins, $bingo_ruby_config );
	}

	add_action( 'tgmpa_register', 'bingo_ruby_theme_register_required_plugins' );
}

