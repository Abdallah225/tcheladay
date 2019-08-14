<?php
/**
 * Plugin Name: Bingo Importer
 * Plugin URI: http://themeruby.com/
 * Description: one-click to import demos for BINGO
 * Version: 1.1
 * Author: Theme Ruby
 * Author URI: http://themeruby.com/
 * @package   bingo-ruby-import
 * @copyright Copyright (c) 2017, Theme Ruby
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class bingo_ruby_one_click_to_import {
	static function bingo_ruby_register_extension_loader( $ReduxFramework ) {

		$path    = dirname( __FILE__ ) . '/extensions/';
		$folders = scandir( $path, 1 );
		foreach ( $folders as $folder ) {
			if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
				continue;
			}
			$extension_class = 'ReduxFramework_Extension_' . $folder;
			if ( ! class_exists( $extension_class ) ) {
				// In case you wanted override your override, hah.
				$class_file = $path . $folder . '/extension_' . $folder . '.php';
				$class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
				if ( $class_file ) {
					require_once( $class_file );
				}
			}
			if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
				$ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
			}
		}
	}
}