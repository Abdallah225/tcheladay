<?php
if ( ! function_exists( 'bingo_ruby_theme_options_import_export' ) ) {
	function bingo_ruby_theme_options_import_export() {
		return array(
			'id'     => 'bingo_ruby_theme_ops_section_import_export',
			'title'  => esc_attr__( 'Backup/Restore', 'bingo' ),
			'desc'   => esc_attr__( 'Backup and restore all options of the theme options panel from/to JSON files, text or URL.', 'bingo' ),
			'icon'   => 'el el-inbox',
			'fields' => array(
				array(
					'id'         => 'ruby-import-export',
					'type'       => 'import_export',
					'title'      => 'Backup/Restore Options',
					'subtitle'   => esc_html__('Backup and restore your theme options settings.','bingo'),
					'full_width' => false,
				),
			),
		);
	}
}

