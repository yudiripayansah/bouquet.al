<?php

if ( ! function_exists( 'fiorello_mikado_set_header_divided_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function fiorello_mikado_set_header_divided_type_global_option( $header_types ) {
		$header_types['header-divided'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-divided/assets/img/header-divided.png',
			'label' => esc_html__( 'Divided', 'fiorello' )
		);
		
		return $header_types;
	}
	
	add_filter( 'fiorello_mikado_filter_header_type_global_option', 'fiorello_mikado_set_header_divided_type_global_option' );
}

if ( ! function_exists( 'fiorello_mikado_set_header_divided_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function fiorello_mikado_set_header_divided_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-divided'] = esc_html__( 'Divided', 'fiorello' );
		
		return $header_type_options;
	}
	
	add_filter( 'fiorello_mikado_filter_header_type_meta_boxes', 'fiorello_mikado_set_header_divided_type_meta_boxes_option' );
}

if ( ! function_exists( 'fiorello_mikado_set_hide_dep_options_header_divided' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function fiorello_mikado_set_hide_dep_options_header_divided( $hide_dep_options ) {
		$hide_dep_options[] = 'header-divided';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'fiorello_mikado_filter_header_logo_area_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	
	// header global panel meta boxes
	add_filter( 'fiorello_mikado_filter_header_logo_area_hide_meta_boxes', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	
	// header types panel options
	add_filter( 'fiorello_mikado_filter_full_screen_menu_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_centered_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_standard_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_vertical_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_vertical_menu_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_vertical_closed_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_vertical_sliding_hide_global_option', 'fiorello_mikado_set_hide_dep_options_header_divided' );

	// header types panel meta boxes
	add_filter( 'fiorello_mikado_filter_header_centered_hide_meta_boxes', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_standard_hide_meta_boxes', 'fiorello_mikado_set_hide_dep_options_header_divided' );
	add_filter( 'fiorello_mikado_filter_header_vertical_hide_meta_boxes', 'fiorello_mikado_set_hide_dep_options_header_divided' );
}