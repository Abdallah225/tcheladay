<?php
$bingo_ruby_topbar_navigation = bingo_ruby_core::get_option( 'topbar_navigation' );
if ( ! empty( $bingo_ruby_topbar_navigation ) && has_nav_menu( 'bingo_ruby_menu_topbar' ) ) : ?>
	<nav id="ruby-topbar-navigation" class="topbar-menu-wrap">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'bingo_ruby_menu_topbar',
				'menu_id'        => 'topbar-nav',
				'menu_class'     => 'topbar-menu-inner',
				'depth'          => 4,
				'echo'           => true,
				'fallback_cb'    => 'bingo_ruby_navigation_fallback'
			)
		); ?>
	</nav>
<?php endif; ?>