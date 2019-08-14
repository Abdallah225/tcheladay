<?php get_header(); ?>
<?php echo bingo_ruby_dimox_breadcrumb(); ?>
<div class="ruby-container">
	<div class="content-404">
		<div class="content-404-inner">
			<h1 class="page-title post-title is-big-title"><?php echo esc_html__( 'Oops! That page can&rsquo;t be found.', 'bingo' ); ?></h1>
			<div class="entry-content entry">
				<p><?php echo esc_html__( 'It looks like nothing was found at this location. Maybe try a search?', 'bingo'); ?></p>
				<div class="page-search-form">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>


