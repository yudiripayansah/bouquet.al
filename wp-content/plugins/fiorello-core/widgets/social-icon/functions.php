<?php

if ( ! function_exists( 'fiorello_mikado_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function fiorello_mikado_register_social_icon_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_social_icon_widget' );
}