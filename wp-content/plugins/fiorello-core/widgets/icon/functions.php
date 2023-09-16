<?php

if ( ! function_exists( 'fiorello_mikado_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function fiorello_mikado_register_icon_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_icon_widget' );
}