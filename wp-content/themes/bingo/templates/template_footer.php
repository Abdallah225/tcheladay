<?php
/**-------------------------------------------------------------------------------------------------------------------------
 * render footer
 */
if ( ! function_exists( 'bingo_ruby_render_footer' ) ) {
	function bingo_ruby_render_footer() {
		$bingo_ruby_footer_bg         = bingo_ruby_core::get_option( 'footer_background' );
		$bingo_ruby_footer_text_style = bingo_ruby_core::get_option( 'footer_text_style' );

		//create class
		$class_name   = array();
		$class_name[] = 'footer-inner';
		$class_name[] = esc_attr( $bingo_ruby_footer_text_style );

		if ( ! empty( $bingo_ruby_footer_bg['background-image'] ) ) {
			$class_name[] = 'has-bg-image';
		}
		$class_name = implode( ' ', $class_name ); ?>

		<footer id="footer" class="footer-wrap" <?php bingo_ruby_schema::markup( 'footer', true ); ?>>
			<?php bingo_ruby_top_footer_fw(); ?>
			<div class="<?php echo esc_attr( $class_name ); ?>">
				<?php bingo_ruby_top_footer_column(); ?>
				<?php bingo_ruby_bottom_footer(); ?>
			</div>
		</footer><!--#footer -->
	<?php
	}
}


/**-------------------------------------------------------------------------------------------------------------------------
 * section top footer fw
 */
if ( ! function_exists( 'bingo_ruby_top_footer_fw' ) ) {
	function bingo_ruby_top_footer_fw() {
		if ( is_active_sidebar( 'bingo_ruby_sidebar_footer_fullwidth' ) )  : ?>
			<div class="top-footer-wrap">
				<div class="top-footer-inner">
					<?php dynamic_sidebar( 'bingo_ruby_sidebar_footer_fullwidth' ); ?>
				</div>
			</div>
		<?php endif;
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * section footer column
 */
if ( ! function_exists( 'bingo_ruby_top_footer_column' ) ) {
	function bingo_ruby_top_footer_column() {
		if ( is_active_sidebar( 'bingo_ruby_sidebar_footer_1' ) || is_active_sidebar( 'bingo_ruby_sidebar_footer_2' ) || is_active_sidebar( 'bingo_ruby_sidebar_footer_3' ) ) : ?>
			<div class="column-footer-wrap">
				<div class="ruby-container row">
					<div class="column-footer-inner">
						<div class="sidebar-footer col-sm-4 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'bingo_ruby_sidebar_footer_1' ) ) {
								dynamic_sidebar( 'bingo_ruby_sidebar_footer_1' );
							} ?>
						</div>
						<div class="sidebar-footer col-sm-4 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'bingo_ruby_sidebar_footer_2' ) ) {
								dynamic_sidebar( 'bingo_ruby_sidebar_footer_2' );
							} ?>
						</div>
						<div class="sidebar-footer col-sm-4 col-xs-12" role="complementary">
							<?php if ( is_active_sidebar( 'bingo_ruby_sidebar_footer_3' ) ) {
								dynamic_sidebar( 'bingo_ruby_sidebar_footer_3' );
							} ?>
						</div>
					</div>
				</div>
			</div><!--#footer columns-->
		<?php endif; ?>
	<?php
	}
}

/**-------------------------------------------------------------------------------------------------------------------------
 * section bottom footer
 */
if ( ! function_exists( 'bingo_ruby_bottom_footer' ) ) {
	function bingo_ruby_bottom_footer() {
		//get settings
		$bingo_ruby_footer_nav     = bingo_ruby_core::get_option( 'footer_navigation' );
		$bingo_ruby_footer_logo    = bingo_ruby_core::get_option( 'footer_logo' );
		$bingo_ruby_footer_social  = bingo_ruby_core::get_option( 'footer_social_bar' );
		$bingo_ruby_footer_color   = bingo_ruby_core::get_option( 'footer_social_color' );
		$bingo_ruby_copyright_text = bingo_ruby_core::get_option( 'site_copyright' );
		?>

		<?php if ( ! empty( $bingo_ruby_footer_logo['url'] ) || ! empty( $bingo_ruby_footer_social ) || ! empty( $bingo_ruby_copyright_text ) || ! empty( $bingo_ruby_footer_nav ) ) : ?>
			<div class="bottom-footer-wrap">
				<div class="ruby-container">
					<?php if ( ! empty( $bingo_ruby_footer_logo['url'] ) || ! empty( $bingo_ruby_footer_nav ) || ! empty( $bingo_ruby_footer_social ) ) : ?>
						<div class="bottom-footer-inner">
							<?php if ( ! empty( $bingo_ruby_footer_logo['url'] ) ) : ?>
								<div class="footer-logo">
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo"
									   title="<?php bloginfo( 'name' ); ?>">
										<img data-no-retina
										     src="<?php echo esc_url( $bingo_ruby_footer_logo['url'] ) ?>"
										     height="<?php echo esc_attr( $bingo_ruby_footer_logo['height'] ); ?>"
										     width="<?php echo esc_attr( $bingo_ruby_footer_logo['width'] ); ?>"
										     alt="<?php bloginfo( 'name' ); ?>">
									</a>
								</div>
							<?php endif; ?>
							<?php if ( ! empty( $bingo_ruby_footer_nav ) && has_nav_menu( 'bingo_ruby_menu_footer' ) ) : ?>
								<nav id="ruby-footer-navigation" class="footer-menu-wrap">
									<?php wp_nav_menu(
										array(
											'theme_location' => 'bingo_ruby_menu_footer',
											'menu_id'        => 'footer-nav',
											'menu_class'     => 'footer-menu-inner',
											'depth'          => 1,
											'echo'           => true,
											'fallback_cb'    => 'bingo_ruby_navigation_fallback'
										)
									); ?>
								</nav>
							<?php endif; ?>
							<?php if ( ! empty( $bingo_ruby_footer_social ) ) : ?>
								<div class="footer-social-wrap">
									<div class="footer-social-inner social-tooltips">
										<?php $bingo_ruby_social_profile = bingo_ruby_social_profile_web(); ?>
										<?php echo bingo_ruby_render_social_icon( $bingo_ruby_social_profile, $bingo_ruby_footer_color, true, false, true ); ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $bingo_ruby_copyright_text ) ) : ?>
					<div id="footer-copyright" class="footer-copyright-wrap">
						<p><?php echo html_entity_decode( esc_html( $bingo_ruby_copyright_text ) ) ?></p>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	<?php
	}
}