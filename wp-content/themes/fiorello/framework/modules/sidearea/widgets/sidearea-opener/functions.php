<?php

if ( ! function_exists( 'fiorello_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function fiorello_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_sidearea_opener_widget' );
}