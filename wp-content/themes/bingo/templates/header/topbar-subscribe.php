<?php
$bingo_ruby_topbar_subscribe           = bingo_ruby_core::get_option( 'topbar_subscribe' );
$bingo_ruby_subscribe_button_text       = bingo_ruby_core::get_option( 'subscribe_button_text' );
$bingo_ruby_subscribe_text_style       = bingo_ruby_core::get_option( 'subscribe_text_style' );
$bingo_ruby_topbar_subscribe_shortcode = bingo_ruby_core::get_option( 'topbar_subscribe_shortcode' );
$bingo_ruby_subscribe_background       = bingo_ruby_core::get_option( 'topbar_subscribe_background' );
$bingo_ruby_subscribe_title            = bingo_ruby_core::get_option( 'subscribe_title' );
$bingo_ruby_subscribe_text             = bingo_ruby_core::get_option( 'subscribe_text' );
$bingo_ruby_subscribe_logo             = bingo_ruby_core::get_option( 'subscribe_logo' );
$bingo_ruby_subscribe_social           = bingo_ruby_core::get_option( 'subscribe_social_bar' );
$bingo_ruby_subscribe_social_color     = bingo_ruby_core::get_option( 'subscribe_social_color' );

//check
if ( empty( $bingo_ruby_topbar_subscribe ) || empty( $bingo_ruby_topbar_subscribe_shortcode ) ) {
	return false;
}

//create class
$bingo_ruby_class_name   = array();
$bingo_ruby_class_name[] = 'ruby-subscribe-form-inner';
$bingo_ruby_class_name[] = 'subscribe-wrap';
$bingo_ruby_class_name[] = esc_attr( $bingo_ruby_subscribe_text_style );

if ( ! empty( $bingo_ruby_subscribe_logo['url'] ) ) {
	$bingo_ruby_class_name[] = 'has-bg-image';
}
$bingo_ruby_class_name = implode( ' ', $bingo_ruby_class_name ); ?>
<?php if ( ! empty( $bingo_ruby_topbar_subscribe ) ) : ?>
	<div class="topbar-subscribe-button">
		<a href="#" id="ruby-subscribe" class="ruby-subscribe-button" data-mfp-src="#ruby-subscribe-form" data-effect="mpf-ruby-effect" title="<?php esc_attr_e('subscribe', 'bingo'); ?>">
			<span class="button-text">
                <?php if ( ! empty($bingo_ruby_subscribe_button_text)) : ?>
                    <?php echo esc_attr( $bingo_ruby_subscribe_button_text ); ?>
                <?php else : ?>
                    <?php esc_html_e( 'subscribe','bingo' ) ?>
                <?php endif; ?>
            </span>
		</a>
	</div>
	<div id="ruby-subscribe-form" class="ruby-subscribe-form-wrap mfp-hide mfp-animation">
		<div class="<?php echo esc_attr( $bingo_ruby_class_name ); ?>" <?php if( !empty($bingo_ruby_subscribe_background['url'])) : ?>style="background-image: url(<?php echo esc_url( $bingo_ruby_subscribe_background['url'] ) ?>);"<?php endif; ?>>
			<div class="subscribe-header">
				<?php if( !empty($bingo_ruby_subscribe_logo['url'])) : ?>
					<span class="subscribe-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url( $bingo_ruby_subscribe_logo['url'] ) ?>" height="<?php echo esc_attr($bingo_ruby_subscribe_logo['height']); ?>" width="<?php echo esc_attr($bingo_ruby_subscribe_logo['width']); ?>" alt="<?php get_bloginfo( 'name' ); ?>">
						</a>
					</span>
				<?php endif; ?>
				<span class="mfp-close"></span>
			</div>
			<div class="subscribe-body">
                <?php if ( ! empty( $bingo_ruby_subscribe_title ) ) : ?>
				    <div class="subscribe-title-wrap"><h3><?php echo esc_html( $bingo_ruby_subscribe_title ) ?></h3></div>
                <?php endif; ?>
				<?php if ( ! empty( $bingo_ruby_subscribe_text ) ) : ?>
					<div class="subscribe-text-wrap">
						<p><?php echo html_entity_decode( esc_html( $bingo_ruby_subscribe_text ) ) ?></p>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $bingo_ruby_topbar_subscribe_shortcode ) ) : ?>
					<div class="subscribe-content-wrap">
						<div class="subscribe-form-wrap">
						<?php echo do_shortcode( $bingo_ruby_topbar_subscribe_shortcode ); ?>
						</div>
					</div>
				<?php endif; ?>
				<?php if ( ! empty( $bingo_ruby_subscribe_social ) ) : ?>
					<div class="subscribe-social-wrap">
						<?php $bingo_ruby_social_profile = bingo_ruby_social_profile_web(); ?>
						<?php echo bingo_ruby_render_social_icon( $bingo_ruby_social_profile, $bingo_ruby_subscribe_social_color, true, false, true ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>
