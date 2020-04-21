<?php
/**
 * Implement theme options in the Customizer
 *
 * @package Chronus
 */

// Load Sanitize Functions.
require( get_template_directory() . '/inc/customizer/sanitize-functions.php' );

// Load Custom Controls.
require( get_template_directory() . '/inc/customizer/controls/category-dropdown-control.php' );
require( get_template_directory() . '/inc/customizer/controls/headline-control.php' );
require( get_template_directory() . '/inc/customizer/controls/links-control.php' );
require( get_template_directory() . '/inc/customizer/controls/magazine-widget-area-control.php' );
require( get_template_directory() . '/inc/customizer/controls/plugin-control.php' );
require( get_template_directory() . '/inc/customizer/controls/upgrade-control.php' );

// Load Customizer Sections.
require( get_template_directory() . '/inc/customizer/sections/customizer-layout.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-blog.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-magazine.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-featured.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-info.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-website.php' );

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function chronus_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'chronus_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'chronus' ),
	) );

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section = 'background_image';
	$wp_customize->get_section( 'background_image' )->title   = esc_html__( 'Background', 'chronus' );
}
add_action( 'customize_register', 'chronus_customize_register_options' );


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function chronus_customize_preview_js() {
	wp_enqueue_script( 'chronus-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), '20191022', true );
}
add_action( 'customize_preview_init', 'chronus_customize_preview_js' );


/**
 * Embed JS for Customizer Controls.
 */
function chronus_customizer_controls_js() {
	wp_enqueue_script( 'chronus-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array(), '20191022', true );
}
add_action( 'customize_controls_enqueue_scripts', 'chronus_customizer_controls_js' );


/**
 * Embed CSS styles Customizer Controls.
 */
function chronus_customizer_controls_css() {
	wp_enqueue_style( 'chronus-customizer-controls', get_template_directory_uri() . '/assets/css/customizer-controls.css', array(), '20191022' );
}
add_action( 'customize_controls_print_styles', 'chronus_customizer_controls_css' );
