<?php

if ( ! function_exists( 'fiorello_core_include_custom_post_types_files' ) ) {
	/**
	 * Loads all custom post types by going through all folders that are placed directly in post types folder
	 */
	function fiorello_core_include_custom_post_types_files() {
		if ( fiorello_core_theme_installed() ) {
			foreach ( glob( FIORELLO_CORE_CPT_PATH . '/*/load.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}
	
	add_action( 'after_setup_theme', 'fiorello_core_include_custom_post_types_files', 1 );
}

if ( ! function_exists( 'fiorello_core_include_custom_post_types_meta_boxes' ) ) {
	/**
	 * Loads all meta boxes functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function fiorello_core_include_custom_post_types_meta_boxes() {
		if ( fiorello_core_theme_installed() ) {
			foreach ( glob( FIORELLO_CORE_CPT_PATH . '/*/admin/meta-boxes/*.php' ) as $meta_boxes_map ) {
				include_once $meta_boxes_map;
			}
		}
	}
	
	add_action( 'fiorello_mikado_action_before_meta_boxes_map', 'fiorello_core_include_custom_post_types_meta_boxes' );
}

if ( ! function_exists( 'fiorello_core_include_custom_post_types_global_options' ) ) {
	/**
	 * Loads all global otpions functions for custom post types by going through all folders that are placed directly in post types folder
	 */
	function fiorello_core_include_custom_post_types_global_options() {
		if ( fiorello_core_theme_installed() ) {
			foreach ( glob( FIORELLO_CORE_CPT_PATH . '/*/admin/options/*.php' ) as $global_options ) {
				include_once $global_options;
			}
		}
	}
	
	add_action( 'fiorello_mikado_action_before_options_map', 'fiorello_core_include_custom_post_types_global_options', 1 );
}