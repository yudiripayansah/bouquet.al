<?php

if ( ! function_exists( 'fiorello_mikado_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function fiorello_mikado_register_author_info_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_author_info_widget' );
}