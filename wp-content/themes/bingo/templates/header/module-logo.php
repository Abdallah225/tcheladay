<?php
$bingo_ruby_logo        = bingo_ruby_core::get_option( 'header_logo' );
$bingo_ruby_logo_retina = bingo_ruby_core::get_option( 'header_logo_retina' );
$bingo_ruby_logo_alt    = bingo_ruby_core::get_option( 'header_logo_alt' );
$bingo_ruby_logo_title  = bingo_ruby_core::get_option( 'header_logo_title' );

if ( empty( $bingo_ruby_logo_title ) ) {
	$bingo_ruby_logo_title = get_bloginfo( 'name' );
}
if ( empty( $bingo_ruby_logo_alt ) ) {
	$bingo_ruby_logo_alt = get_bloginfo( 'name' );
} ?>
<?php if(!empty($bingo_ruby_logo['url'])) : ?>
<div class="logo-wrap is-logo-image" <?php echo bingo_ruby_schema::markup( 'logo'); ?>>
	<div class="logo-inner">
			<?php if ( empty( $bingo_ruby_logo_retina['url'] ) ) : ?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr( $bingo_ruby_logo_title ) ?>">
				<img data-no-retina src="<?php echo esc_url( $bingo_ruby_logo['url'] ) ?>" height="<?php echo esc_attr($bingo_ruby_logo['height']); ?>" width="<?php echo esc_attr($bingo_ruby_logo['width']); ?>"  alt="<?php echo esc_attr($bingo_ruby_logo_alt); ?>">
			</a>
			<?php else : ?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" title="<?php echo esc_attr($bingo_ruby_logo_title); ?>">
                <img height="<?php echo esc_attr($bingo_ruby_logo['height']); ?>" width="<?php echo esc_attr($bingo_ruby_logo['width']); ?>" src="<?php echo esc_url( $bingo_ruby_logo['url'] ) ?>" srcset="<?php echo esc_url( $bingo_ruby_logo['url'] ) ?> 1x, <?php echo esc_url($bingo_ruby_logo_retina['url']); ?> 2x" alt="<?php echo esc_attr($bingo_ruby_logo_alt); ?>" style="max-height: 85px;">
			</a>
			<?php endif; ?>
		<?php get_template_part( 'templates/header/header', 'social' ); ?>
	</div><!--#logo inner-->
    <?php if( is_front_page() ) : ?>
        <h1 class="logo-title"><?php echo esc_html( $bingo_ruby_logo_title ); ?></h1>
        <meta itemprop="name" content="<?php echo esc_attr( $bingo_ruby_logo_title ); ?>">
    <?php endif; ?>
</div>
<?php else : ?>
	<div class="logo-wrap is-logo-text">
		<div class="logo-inner">
			<a class="logo-text" href="<?php echo  esc_url( home_url( '/' ) ) ; ?>"><h1><?php echo esc_html( $bingo_ruby_logo_title ); ?></h1></a>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<h5 class="site-tagline"><?php bloginfo( 'description' ); ?></h5>
			<?php endif; ?>
			<?php get_template_part( 'templates/header/header', 'social' ); ?>
		</div>
	</div>
<?php endif; ?>
