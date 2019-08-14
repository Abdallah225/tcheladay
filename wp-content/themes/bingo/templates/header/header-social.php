<?php
//render header social icons
$bingo_ruby_header_social_bar   = bingo_ruby_core::get_option( 'header_social_bar' );
$bingo_ruby_header_social_style = bingo_ruby_core::get_option( 'header_social_bar_style' );
$header_style                   = bingo_ruby_core::get_option( 'header_style' );

if ( empty( $bingo_ruby_header_social_bar ) || '3' == $header_style || '7' == $header_style ) {
	return false;
}

$bingo_ruby_social_profile = bingo_ruby_social_profile_web();

if ( ! empty( $bingo_ruby_social_profile )) : ?>
<div class="header-social-wrap">
		<?php if ( ! empty( $bingo_ruby_header_social_style )) : ?>
		<div class="header-social-inner social-tooltips is-light-style">
		<?php else: ?>
		<div class="header-social-inner social-tooltips is-dark-style">
		<?php endif;
		echo bingo_ruby_render_social_icon( $bingo_ruby_social_profile, false, true, false, true ); ?>
		</div>
	</div>
<?php endif; ?>