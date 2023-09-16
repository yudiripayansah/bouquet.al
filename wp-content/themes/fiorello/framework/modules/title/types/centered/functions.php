<?php

if ( ! function_exists( 'fiorello_mikado_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function fiorello_mikado_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'fiorello' );
		
		return $type;
	}
	
	add_filter( 'fiorello_mikado_filter_title_type_global_option', 'fiorello_mikado_set_title_centered_type_for_options' );
	add_filter( 'fiorello_mikado_filter_title_type_meta_boxes', 'fiorello_mikado_set_title_centered_type_for_options' );
}