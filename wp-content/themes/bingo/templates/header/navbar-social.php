<?php
//render social icons
$bingo_ruby_navbar_social_enable = bingo_ruby_core::get_option( 'navbar_social' );
$bingo_ruby_navbar_social_color = bingo_ruby_core::get_option( 'navbar_social_color' );

if ( empty( $bingo_ruby_navbar_social_enable ) ) {
	return false;
}
$bingo_ruby_social_profile = bingo_ruby_social_profile_web();

if ( ! empty( $bingo_ruby_social_profile ) ) : ?>
	<div class="navbar-social-wrap">
		<div class="navbar-social social-tooltips">
			<?php echo bingo_ruby_render_social_icon( $bingo_ruby_social_profile, $bingo_ruby_navbar_social_color, true, true, true ); ?>
		</div>
	</div>
<?php endif; ?>
