<?php
$bingo_ruby_data_query          = bingo_ruby_breaking_news::get_data();
$bingo_ruby_headline            = bingo_ruby_core::get_option( 'breaking_news_title' );
$bingo_ruby_breaking_news_right = bingo_ruby_core::get_option( 'breaking_news_right' ); ?>

<div class="breaking-news-wrap">
	<div class="ruby-container">
		<div class="breaking-news-inner container-inner clearfix">
			<div class="breaking-news-left">
				<div class="breaking-news-title">
					<span><?php echo esc_attr( $bingo_ruby_headline ) ?></span>
                    <i class="mobile-headline fa fa-bolt"></i>
				</div>
				<div class="breaking-news-content">
					<?php if ( $bingo_ruby_data_query->have_posts() ) : ?>
						<div class="breaking-news-loader"></div>
						<div id="ruby-breaking-news" class="breaking-news-content-inner slider-init">

							<?php while ( $bingo_ruby_data_query->have_posts() ) : ?>
								<?php $bingo_ruby_data_query->the_post(); ?>
								<article class="post-wrap post-breaking-news">
									<?php echo bingo_ruby_post_title( 'is-size-6' ); ?>
								</article>
							<?php endwhile; ?>

						</div>
					<?php else : ?>
						<p class="ruby-error"><?php esc_attr_e( 'No enough post for this section, try to select another query', 'bingo' ); ?></p>
					<?php endif; ?>
				</div>
			</div>

			<?php if ( ! empty( $bingo_ruby_breaking_news_right ) ) : ?>

				<?php
				$bingo_ruby_data_right_popular       = '';
				$bingo_ruby_data_right_custom        = '';
				$bingo_ruby_breaking_news_right_type = bingo_ruby_core::get_option( 'breaking_news_right_type' );
				if ( 1 == $bingo_ruby_breaking_news_right_type ) {
					$bingo_ruby_data_right_popular = bingo_ruby_breaking_news::get_popular_tag();
				} else {
					$bingo_ruby_data_right_custom = bingo_ruby_core::get_option( 'breaking_news_right_custom' );
				}
				?>
				<div class="breaking-news-right">
					<?php if ( ! empty( $bingo_ruby_data_right_popular ) && is_array( $bingo_ruby_data_right_popular ) ) : ?>
						<?php foreach ($bingo_ruby_data_right_popular as $bingo_ruby_data_right_el) : ?>
							<?php if ( ! empty ( $bingo_ruby_data_right_el->name ) && ! empty( $bingo_ruby_data_right_el->term_id ) ) : ?>
								<a class="breaking-news-tag-el" href="<?php echo esc_html( get_tag_link( $bingo_ruby_data_right_el->term_id ) ); ?>" title="<?php esc_attr( $bingo_ruby_data_right_el->name ); ?>" target="_blank">
									<?php echo esc_html( $bingo_ruby_data_right_el->name ); ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>

					<?php if ( ! empty( $bingo_ruby_data_right_custom ) && is_array( $bingo_ruby_data_right_custom ) ) : ?>
						<?php foreach ( $bingo_ruby_data_right_custom as $bingo_ruby_data_right_el ) : ?>
							<?php $bingo_ruby_tag_term = get_term( $bingo_ruby_data_right_el, 'post_tag' ); ?>
							<?php if ( ! empty ( $bingo_ruby_tag_term->name ) && ! empty( $bingo_ruby_tag_term->term_id ) ) : ?>
								<a class="breaking-news-tag-el" href="<?php echo esc_html( get_tag_link( $bingo_ruby_tag_term->term_id ) ); ?>" title="<?php esc_attr( $bingo_ruby_tag_term->name ); ?>" target="_blank">
									<?php echo esc_html( $bingo_ruby_tag_term->name ); ?>
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div><!--#breaking news-->

<?php wp_reset_postdata(); ?>