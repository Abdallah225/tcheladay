<?php
$bingo_ruby_logo_mobile        = bingo_ruby_core::get_option( 'header_logo_mobile' );
$bingo_ruby_logo_mobile_alt    = bingo_ruby_core::get_option( 'header_logo_alt' );
$bingo_ruby_logo_mobile_title  = bingo_ruby_core::get_option( 'header_logo_title' );

if ( empty( $bingo_ruby_logo_mobile_title ) ) {
	$bingo_ruby_logo_mobile_title = get_bloginfo( 'name' );
}
if ( empty( $bingo_ruby_logo_mobile_alt ) ) {
	$bingo_ruby_logo_mobile_alt = get_bloginfo( 'name' );
} ?>
<?php if(!empty($bingo_ruby_logo_mobile['url'])) : ?>
<div class="logo-mobile-wrap is-logo-mobile-image" <?php echo bingo_ruby_schema::markup( 'logo'); ?>>
	<div class="logo-mobile-inner">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $bingo_ruby_logo_mobile_title ) ?>">
            <img height="<?php echo esc_attr($bingo_ruby_logo_mobile['height']); ?>" width="<?php echo esc_attr($bingo_ruby_logo_mobile['width']); ?>" src="<?php echo esc_url( $bingo_ruby_logo_mobile['url'] ) ?>" alt="<?php echo esc_attr($bingo_ruby_logo_mobile_alt); ?>">
        </a>
	</div>
</div>
<?php else : ?>
	<div class="logo-mobile-wrap is-logo-mobile-text">
		<div class="logo-mobile-inner">
			<a class="logo-mobile-text" href="<?php echo  esc_url( home_url( '/' ) ) ; ?>"><span><?php  echo esc_html($bingo_ruby_logo_mobile_title); ?></span></a>
		</div>
	</div>
<?php endif; ?>
