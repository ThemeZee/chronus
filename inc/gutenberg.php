<?php
/**
 * Add theme support for the Gutenberg Editor
 *
 * @package Chronus
 */


/**
 * Registers support for various Gutenberg features.
 *
 * @return void
 */
function chronus_gutenberg_support() {

	// Add theme support for wide and full images.
	#add_theme_support( 'align-wide' );

	// Define block color palette.
	$color_palette = apply_filters( 'chronus_color_palette', array(
		'primary_color'    => '#cc5555',
		'secondary_color'  => '#b33c3c',
		'tertiary_color'   => '#992222',
		'accent_color'     => '#91cc56',
		'highlight_color'  => '#239999',
		'light_gray_color' => '#f0f0f0',
		'gray_color'       => '#999999',
		'dark_gray_color'  => '#303030',
	) );

	// Add theme support for block color palette.
	add_theme_support( 'editor-color-palette', apply_filters( 'chronus_editor_color_palette_args', array(
		array(
			'name'  => esc_html_x( 'Primary', 'block color', 'chronus' ),
			'slug'  => 'primary',
			'color' => esc_html( $color_palette['primary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Secondary', 'block color', 'chronus' ),
			'slug'  => 'secondary',
			'color' => esc_html( $color_palette['secondary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Tertiary', 'block color', 'chronus' ),
			'slug'  => 'tertiary',
			'color' => esc_html( $color_palette['tertiary_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Accent', 'block color', 'chronus' ),
			'slug'  => 'accent',
			'color' => esc_html( $color_palette['accent_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Highlight', 'block color', 'chronus' ),
			'slug'  => 'highlight',
			'color' => esc_html( $color_palette['highlight_color'] ),
		),
		array(
			'name'  => esc_html_x( 'White', 'block color', 'chronus' ),
			'slug'  => 'white',
			'color' => '#ffffff',
		),
		array(
			'name'  => esc_html_x( 'Light Gray', 'block color', 'chronus' ),
			'slug'  => 'light-gray',
			'color' => esc_html( $color_palette['light_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Gray', 'block color', 'chronus' ),
			'slug'  => 'gray',
			'color' => esc_html( $color_palette['gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Dark Gray', 'block color', 'chronus' ),
			'slug'  => 'dark-gray',
			'color' => esc_html( $color_palette['dark_gray_color'] ),
		),
		array(
			'name'  => esc_html_x( 'Black', 'block color', 'chronus' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
	) ) );

	// Add theme support for font sizes.
	add_theme_support( 'editor-font-sizes', apply_filters( 'chronus_editor_font_sizes_args', array(
		array(
			'name' => esc_html_x( 'Small', 'block font size', 'chronus' ),
			'size' => 16,
			'slug' => 'small',
		),
		array(
			'name' => esc_html_x( 'Medium', 'block font size', 'chronus' ),
			'size' => 24,
			'slug' => 'medium',
		),
		array(
			'name' => esc_html_x( 'Large', 'block font size', 'chronus' ),
			'size' => 36,
			'slug' => 'large',
		),
		array(
			'name' => esc_html_x( 'Extra Large', 'block font size', 'chronus' ),
			'size' => 48,
			'slug' => 'extra-large',
		),
		array(
			'name' => esc_html_x( 'Huge', 'block font size', 'chronus' ),
			'size' => 64,
			'slug' => 'huge',
		),
	) ) );
}
add_action( 'after_setup_theme', 'chronus_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function chronus_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'chronus-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), '20210806', 'all' );

	// Enqueue Page Template Switcher Editor plugin.
	#wp_enqueue_script( 'chronus-page-template-switcher', get_theme_file_uri( '/assets/js/page-template-switcher.js' ), array( 'wp-blocks', 'wp-element', 'wp-edit-post' ), '20210306' );
}
add_action( 'enqueue_block_editor_assets', 'chronus_block_editor_assets' );


/**
 * Remove inline styling in Gutenberg.
 *
 * @return array $editor_settings
 */
function chronus_block_editor_settings( $editor_settings ) {
	// Remove editor styling.
	if ( ! current_theme_supports( 'editor-styles' ) ) {
		$editor_settings['styles'] = '';
	}

	return $editor_settings;
}
#add_filter( 'block_editor_settings', 'chronus_block_editor_settings', 11 );


/**
 * Add body classes in Gutenberg Editor.
 */
function chronus_block_editor_body_classes( $classes ) {
	global $post;
	$current_screen = get_current_screen();

	// Return early if we are not in the Gutenberg Editor.
	if ( ! ( method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor() ) ) {
		return $classes;
	}

	// Fullwidth Page Template?
	if ( 'templates/template-fullwidth.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' chronus-fullwidth-page-layout ';
	}

	// No Title Page Template?
	if ( 'templates/template-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-left-no-title.php' === get_page_template_slug( $post->ID ) or
		'templates/template-sidebar-right-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' chronus-page-title-hidden ';
	}

	// Full-width / No Title Page Template?
	if ( 'templates/template-fullwidth-no-title.php' === get_page_template_slug( $post->ID ) ) {
		$classes .= ' chronus-fullwidth-page-layout chronus-page-title-hidden ';
	}

	return $classes;
}
#add_filter( 'admin_body_class', 'chronus_block_editor_body_classes' );
