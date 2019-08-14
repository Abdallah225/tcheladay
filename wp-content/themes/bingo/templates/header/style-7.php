<?php
$bingo_ruby_header_background_type = bingo_ruby_core::get_option( 'header_background_type' );
$bingo_ruby_header_background_url = bingo_ruby_core::get_option( 'header_background_url' );
?>
<div class="header-wrap header-style-7">
	<div class="header-inner">
		<?php bingo_ruby_render_topbar(); ?>

		<div class="navbar-outer clearfix">
			<div class="navbar-wrap">

				<div class="navbar-inner container-inner clearfix">
					<div class="navbar-left">
						<?php get_template_part( 'templates/header/module', 'off_canvas_btn' ); ?>
						<?php get_template_part( 'templates/header/module', 'logo' ); ?>
						<?php get_template_part( 'templates/header/module', 'logo_mobile' ); ?>
						<?php get_template_part( 'templates/header/module', 'menu_main' ); ?>
					</div>

					<div class="navbar-right">
						<?php get_template_part( 'templates/header/navbar', 'social' ); ?>
						<?php get_template_part( 'templates/header/navbar', 'search' ); ?>
					</div>
				</div>

				<?php get_template_part('templates/header/module','search_popup'); ?>
			</div>
		</div>

		<div class="ruby-container">
            <?php if ( 1 == $bingo_ruby_header_background_type || empty( $bingo_ruby_header_background_url['url'] ) ) {
                get_template_part( 'templates/header/module', 'ad' );
            } ?>
		</div>

	</div>

</div><!--header-->