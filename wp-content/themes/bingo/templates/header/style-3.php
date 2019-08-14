<div class="header-wrap header-style-3">
	<div class="header-inner">
		<?php bingo_ruby_render_topbar(); ?>
		<div class="navbar-outer clearfix">
			<div class="navbar-wrap">
				<div class="ruby-container">
					<div class="navbar-inner container-inner clearfix">
						<div class="navbar-left">
							<?php get_template_part( 'templates/header/module', 'logo' ); ?>
							<?php get_template_part( 'templates/header/module', 'menu_main' ); ?>
						</div>

						<div class="navbar-right">
							<?php get_template_part( 'templates/header/navbar', 'search' ); ?>
							<?php get_template_part( 'templates/header/module', 'off_canvas_btn' ); ?>
						</div>
					</div>
				</div>
				<?php get_template_part('templates/header/module','search_popup'); ?>
			</div>
		</div>
        <?php get_template_part( 'templates/header/module', 'ad' ); ?>
	</div>

</div><!--header-->