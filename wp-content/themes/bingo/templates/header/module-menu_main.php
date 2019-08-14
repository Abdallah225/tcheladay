<nav id="ruby-main-menu" class="main-menu-wrap" <?php echo bingo_ruby_schema::markup( 'menu' ) ?>>
	<?php wp_nav_menu(
		array(
			'theme_location' => 'bingo_ruby_menu_main',
			'menu_id'        => 'main-nav',
			'menu_class'     => 'main-menu-inner',
			'walker'         => new bingo_ruby_walker,
			'depth'          => 4,
			'echo'           => true,
			'fallback_cb'    => 'bingo_ruby_navigation_fallback'
		)
	); ?>
</nav>