<?php
//check
$bingo_ruby_topbar_social = bingo_ruby_core::get_option( 'topbar_social' );
$bingo_ruby_topbar_social_color = bingo_ruby_core::get_option( 'topbar_social_color' );

if ( empty( $bingo_ruby_topbar_social ) ) {
	return false;
}

$bingo_ruby_social_profile = bingo_ruby_social_profile_web(); ?>

<?php if ( ! empty( $bingo_ruby_social_profile ) ) : ?>
	<div class="topbar-social social-tooltips">
		<?php echo bingo_ruby_render_social_icon( $bingo_ruby_social_profile, $bingo_ruby_topbar_social_color, true, false, true ); ?>
	</div>
<?php endif; ?>