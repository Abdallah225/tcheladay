<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * @param $demo_active_import
 * setup menu & sidebar
 */
if ( ! function_exists( 'bingo_ruby_imported_demo' ) ) {
	function bingo_ruby_imported_demo( $demo_active_import ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		//setup menu
		$menu_array = array(
			'default',
			'fashion',
			'video',
			'healthy',
			'tech',
			'sport',
			'foodies'
		);

		if ( isset( $demo_active_import[ $current_key ]['directory'] ) && ! empty( $demo_active_import[ $current_key ]['directory'] ) && in_array( $demo_active_import[ $current_key ]['directory'], $menu_array ) ) {
			$main_menu   = get_term_by( 'name', 'main menu', 'nav_menu' );
			$top_menu    = get_term_by( 'name', 'top menu', 'nav_menu' );
			$footer_menu = get_term_by( 'name', 'footer menu', 'nav_menu' );

			if ( isset( $main_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
					'bingo_ruby_menu_main'      => $main_menu->term_id,
					'bingo_ruby_menu_offcanvas' => $main_menu->term_id,
					'bingo_ruby_menu_topbar'    => $top_menu->term_id,
					'bingo_ruby_menu_footer'    => $footer_menu->term_id,
				) );
			}
		}


		//setup homepage
		$home_pages = array(
			'default' => 'Home Default',
			'fashion' => 'home Fashion',
			'video'   => 'Home Video',
			'healthy' => 'Home Healthy',
			'tech'    => 'Home Tech',
			'sport'   => 'Home Sport',
			'foodies' => 'Home Foodies',
		);

		if ( isset( $demo_active_import[ $current_key ]['directory'] ) && ! empty( $demo_active_import[ $current_key ]['directory'] ) && array_key_exists( $demo_active_import[ $current_key ]['directory'], $home_pages ) ) {

			if ( ! empty( $home_pages[ $demo_active_import[ $current_key ]['directory'] ] ) ) {
				$page = get_page_by_title( $home_pages[ $demo_active_import[ $current_key ]['directory'] ] );
				if ( ! empty( $page->ID ) ) {
					//setup page
					update_option( 'page_on_front', $page->ID );
					update_option( 'show_on_front', 'page' );

					//setup blog
					$blog = get_page_by_title( 'Blog' );
					if ( ! empty( $blog->ID ) ) {
						update_option( 'page_for_posts', $blog->ID );
					}

				}
			} else {
				update_option( 'page_on_front', 0 );
				update_option( 'show_on_front', 'posts' );
			}
		}

		if ( class_exists( 'WC_Install' ) ) {
			WC_Install::create_pages();
		}
	}

	//setup menu
	add_action( 'wbc_importer_after_content_import', 'bingo_ruby_imported_demo', 10, 2 );
}


if ( ! function_exists( 'bingo_ruby_init_before_import' ) ) {
	function bingo_ruby_init_before_import() {

		$sidebars_widgets['bingo_ruby_sidebar_multi_sb1']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb2']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb3']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb4']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb5']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb6']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb7']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb8']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_multi_sb9']        = array();
		$sidebars_widgets['bingo_ruby_sidebar_default']          = array();
		$sidebars_widgets['bingo_ruby_sidebar_off_canvas']       = array();
		$sidebars_widgets['bingo_ruby_single_post_section']      = array();
		$sidebars_widgets['bingo_ruby_sidebar_footer_fullwidth'] = array();
		$sidebars_widgets['bingo_ruby_sidebar_footer_1']         = array();
		$sidebars_widgets['bingo_ruby_sidebar_footer_2']         = array();
		$sidebars_widgets['bingo_ruby_sidebar_footer_3']         = array();

		update_option( 'sidebars_widgets', $sidebars_widgets );

		//register sidebars
		register_sidebar( array(
			'name'          => 'sb1',
			'id'            => 'bingo_ruby_sidebar_multi_sb1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb2',
			'id'            => 'bingo_ruby_sidebar_multi_sb2',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb3',
			'id'            => 'bingo_ruby_sidebar_multi_sb3',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb4',
			'id'            => 'bingo_ruby_sidebar_multi_sb4',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb5',
			'id'            => 'bingo_ruby_sidebar_multi_sb5',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb6',
			'id'            => 'bingo_ruby_sidebar_multi_sb6',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb7',
			'id'            => 'bingo_ruby_sidebar_multi_sb7',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb8',
			'id'            => 'bingo_ruby_sidebar_multi_sb8',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
		register_sidebar( array(
			'name'          => 'sb9',
			'id'            => 'bingo_ruby_sidebar_multi_sb9',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<div class="widget-title block-title"><h3>',
			'after_title'   => '</h3></div>'
		) );
	}

	//remove widget
	add_action( 'wbc_importer_before_widget_import', 'bingo_ruby_init_before_import', 10, 2 );
}
