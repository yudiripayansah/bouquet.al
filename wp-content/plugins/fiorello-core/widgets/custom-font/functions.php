<?php

if ( ! function_exists( 'fiorello_mikado_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function fiorello_mikado_register_custom_font_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_custom_font_widget' );
}