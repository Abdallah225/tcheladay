<?php
$bingo_ruby_header_background_type  = bingo_ruby_core::get_option( 'header_background_type' );
$bingo_ruby_header_background_color = bingo_ruby_core::get_option( 'header_background_color' );
$bingo_ruby_header_background_url   = bingo_ruby_core::get_option( 'header_background_url' );
$bingo_ruby_header_parallax         = bingo_ruby_core::get_option( 'header_parallax' );

$bingo_ruby_class_name   = array();
$bingo_ruby_class_name[] = 'banner-wrap';

if ( 1 == $bingo_ruby_header_background_type ) {
	$bingo_ruby_class_name[] = 'banner-background-color';
} elseif ( 0 == $bingo_ruby_header_background_type && ! empty( $bingo_ruby_header_background_url['url'] ) ) {
	$bingo_ruby_class_name[] = 'banner-background-image';
	if ( 1 == $bingo_ruby_header_parallax ) {
		$bingo_ruby_class_name[] = 'is-header-parallax';
	}
}

$bingo_ruby_class_name = implode( ' ', $bingo_ruby_class_name ); ?>
<div class="header-wrap header-style-4">
	<div class="header-inner">
		<?php bingo_ruby_render_topbar(); ?>

		<div class="navbar-outer clearfix">
			<div class="navbar-wrap">
				<div class="ruby-container">
					<div class="navbar-inner container-inner clearfix">
						<div class="navbar-left">
							<?php get_template_part( 'templates/header/module', 'off_canvas_btn' ); ?>
							<?php get_template_part( 'templates/header/module', 'logo_mobile' ); ?>
							<?php get_template_part( 'templates/header/module', 'menu_main' ); ?>
						</div>

						<div class="navbar-right">
							<?php get_template_part( 'templates/header/navbar', 'social' ); ?>
							<?php get_template_part( 'templates/header/navbar', 'search' ); ?>
						</div>
					</div>
				</div>
				<?php get_template_part('templates/header/module','search_popup'); ?>
			</div>
		</div>

		<div class="<?php echo esc_attr( $bingo_ruby_class_name ) ?>">

			<?php if ( 0 == $bingo_ruby_header_background_type && ! empty( $bingo_ruby_header_background_url['url'] ) ) : ?>
				<div class="header-parallax-wrap"><div id="header-image-parallax"></div></div>
				<img id="background-image-url" src="<?php echo esc_url( $bingo_ruby_header_background_url['url'] ) ?>" alt="header parallax image" data-no-retina style="display:none;"/>
			<?php endif; ?>

			<div class="ruby-container">
				<div class="banner-inner container-inner clearfix">
					<?php get_template_part( 'templates/header/module', 'logo' ); ?>
				</div>
			</div>
		</div>

		<?php get_template_part( 'templates/header/module', 'ad' ); ?>
	</div>

</div><!--header-->