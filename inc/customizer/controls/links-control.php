<?php
/**
 * Theme Links Control for the Customizer
 *
 * @package Chronus
 */

/**
 * Make sure that custom controls are only defined in the Customizer
 */
if ( class_exists( 'WP_Customize_Control' ) ) :

	/**
	 * Displays the theme links in the Customizer.
	 */
	class Chronus_Customize_Links_Control extends WP_Customize_Control {
		/**
		 * Render Control
		 */
		public function render_content() {
			?>

			<div class="theme-links">

				<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'chronus' ); ?></span>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/themes/chronus/', 'chronus' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=chronus&utm_content=theme-page" target="_blank">
						<?php esc_html_e( 'Theme Page', 'chronus' ); ?>
					</a>
				</p>

				<p>
					<a href="http://preview.themezee.com/?demo=chronus&utm_source=customizer&utm_campaign=chronus" target="_blank">
						<?php esc_html_e( 'Theme Demo', 'chronus' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/docs/chronus-documentation/', 'chronus' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=chronus&utm_content=documentation" target="_blank">
						<?php esc_html_e( 'Theme Documentation', 'chronus' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://themezee.com/changelogs/?action=themezee-changelog&type=theme&slug=chronus/', 'chronus' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Theme Changelog', 'chronus' ); ?>
					</a>
				</p>

				<p>
					<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/chronus/reviews/', 'chronus' ) ); ?>" target="_blank">
						<?php esc_html_e( 'Rate this theme', 'chronus' ); ?>
					</a>
				</p>

			</div>

			<?php
		}
	}

endif;
