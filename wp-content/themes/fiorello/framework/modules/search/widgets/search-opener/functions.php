<?php

if ( ! function_exists( 'fiorello_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function fiorello_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_search_opener_widget' );
}