<?php
/**
 * Main Navigation
 *
 * @version 1.2
 * @package Chronus
 */
?>

<?php if ( has_nav_menu( 'primary' ) ) : ?>

	<div id="main-navigation-wrap" class="primary-navigation-wrap">

		<button class="primary-menu-toggle menu-toggle" aria-controls="primary-menu" aria-expanded="false" <?php chronus_amp_menu_toggle(); ?>>
			<?php
			echo chronus_get_svg( 'menu' );
			echo chronus_get_svg( 'close' );
			?>
			<span class="menu-toggle-text"><?php esc_html_e( 'Menu', 'chronus' ); ?></span>
		</button>

		<div class="primary-navigation">

			<nav id="site-navigation" class="main-navigation" role="navigation" <?php chronus_amp_menu_is_toggled(); ?> aria-label="<?php esc_attr_e( 'Primary Menu', 'chronus' ); ?>">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .primary-navigation -->

	</div>

<?php endif; ?>

<?php do_action( 'chronus_after_navigation' ); ?>
