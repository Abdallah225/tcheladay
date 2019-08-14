<?php
$bingo_ruby_ad_style  = bingo_ruby_core::get_option( 'header_ad_type' );
$bingo_ruby_ad_script = bingo_ruby_core::get_option( 'header_ad_script' );
$bingo_ruby_ad_image  = bingo_ruby_core::get_option( 'header_ad_image' );
$bingo_ruby_ad_url    = bingo_ruby_core::get_option( 'header_ad_url' ); ?>

<?php if ( ! empty( $bingo_ruby_ad_image['url'] ) || ! empty( $bingo_ruby_ad_script ) ) : ?>
	<div class="banner-ad-wrap">
		<div class="banner-ad-inner">
            <?php if ( 'script' == $bingo_ruby_ad_style && ! empty( $bingo_ruby_ad_script )  ) : ?>
                <?php echo html_entity_decode( stripslashes( bingo_ruby_ad_render_script( $bingo_ruby_ad_script, 'header_ad' ) ) ); ?>
            <?php elseif ( ! empty( $bingo_ruby_ad_image['url'] ) ) : ?>
                <?php if ( ! empty( $bingo_ruby_ad_url ) ) : ?>
                    <a class="banner-ad-image" href="<?php echo esc_url( $bingo_ruby_ad_url ) ?>" target="_blank">
                        <img src="<?php echo esc_url( $bingo_ruby_ad_image['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </a>
                <?php else : ?>
                    <div class="banner-ad-image">
                        <img src="<?php echo esc_url( $bingo_ruby_ad_image['url'] ) ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </div>
                <?php endif; ?>
            <?php endif; ?>
		</div>
	</div>
<?php endif; ?>
