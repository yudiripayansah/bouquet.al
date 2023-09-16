<?php

if ( ! function_exists( 'fiorello_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function fiorello_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_separator_widget' );
}