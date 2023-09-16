<?php

if ( ! function_exists( 'fiorello_mikado_register_vertical_separator_widget' ) ) {
	/**
	 * Function that register vertical separator widget
	 */
	function fiorello_mikado_register_vertical_separator_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoVerticalSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_vertical_separator_widget' );
}