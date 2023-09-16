<?php

if ( ! function_exists( 'fiorello_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function fiorello_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_button_widget' );
}