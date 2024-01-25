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

	// Add theme support for dimension controls.
	add_theme_support( 'custom-spacing' );

	// Add theme support for custom line heights.
	add_theme_support( 'custom-line-height' );

	// Define block color palette.
	$color_palette = apply_filters(
		'chronus_color_palette',
		array(
			'primary_color'    => '#cc5555',
			'secondary_color'  => '#b33c3c',
			'tertiary_color'   => '#992222',
			'accent_color'     => '#91cc56',
			'highlight_color'  => '#239999',
			'light_gray_color' => '#f0f0f0',
			'gray_color'       => '#999999',
			'dark_gray_color'  => '#303030',
		)
	);

	// Add theme support for block color palette.
	add_theme_support(
		'editor-color-palette',
		apply_filters(
			'chronus_editor_color_palette_args',
			array(
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
			)
		)
	);

	// Add theme support for font sizes.
	add_theme_support(
		'editor-font-sizes',
		apply_filters(
			'chronus_editor_font_sizes_args',
			array(
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
			)
		)
	);

	// Check if block style functions are available.
	if ( function_exists( 'register_block_style' ) ) {

		// Register Widget Title Block style.
		register_block_style(
			'core/heading',
			array(
				'name'         => 'widget-title',
				'label'        => esc_html__( 'Widget Title', 'chronus' ),
				'style_handle' => 'chronus-stylesheet',
			)
		);
	}
}
add_action( 'after_setup_theme', 'chronus_gutenberg_support' );


/**
 * Enqueue block styles and scripts for Gutenberg Editor.
 */
function chronus_block_editor_assets() {

	// Enqueue Editor Styling.
	wp_enqueue_style( 'chronus-editor-styles', get_theme_file_uri( '/assets/css/editor-styles.css' ), array(), '20210806', 'all' );
}
add_action( 'enqueue_block_editor_assets', 'chronus_block_editor_assets' );
