<?php
$bingo_ruby_off_canvas_style          = bingo_ruby_core::get_option( 'off_canvas_style' );
$bingo_ruby_off_canvas_social         = bingo_ruby_core::get_option( 'off_canvas_social_bar' );
$bingo_ruby_off_canvas_widget_section = bingo_ruby_core::get_option( 'off_canvas_widget_section' );

if ( 'light' == $bingo_ruby_off_canvas_style ) {
	$bingo_ruby_classes = 'off-canvas-wrap is-dark-text';
} else {
	$bingo_ruby_classes = 'off-canvas-wrap is-light-text';
} ?>
<div class="<?php echo esc_attr( $bingo_ruby_classes ); ?>">
	<div class="off-canvas-inner">
		<a href="#" id="ruby-off-canvas-close-btn"><i class="ruby-close-btn" aria-hidden="true"></i></a>
		<nav id="ruby-offcanvas-navigation" class="off-canvas-nav-wrap">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'bingo_ruby_menu_offcanvas',
					'menu_id'        => 'offcanvas-nav',
					'menu_class'     => 'off-canvas-nav-inner',
					'depth'          => 4,
					'echo'           => true,
					'fallback_cb'    => 'bingo_ruby_navigation_fallback'
				)
			); ?>
		</nav>
		<?php if ( ! empty( $bingo_ruby_off_canvas_social ) ) : ?>
			<?php $bingo_ruby_social_data = bingo_ruby_social_profile_web();
			$bingo_ruby_social_render     = bingo_ruby_render_social_icon( $bingo_ruby_social_data ); ?>
			<?php if ( ! empty( $bingo_ruby_social_render ) ) : ?>
				<div class="off-canvas-social-wrap">
					<?php echo bingo_ruby_render_social_icon( $bingo_ruby_social_data, false, true, false, true ); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ! empty( $bingo_ruby_off_canvas_widget_section ) && is_active_sidebar( 'bingo_ruby_sidebar_off_canvas' )  ) : ?>
			<div class="off-canvas-widget-section-wrap canvas-sidebar-wrap">
				<div class="canvas-sidebar-inner">
					<?php dynamic_sidebar( 'bingo_ruby_sidebar_off_canvas' ); ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>