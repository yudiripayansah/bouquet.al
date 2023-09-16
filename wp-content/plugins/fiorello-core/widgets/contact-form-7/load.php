<?php

if ( fiorello_mikado_contact_form_7_installed() ) {
	include_once FIORELLO_CORE_ABS_PATH . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_cf7_widget' );
}

if ( ! function_exists( 'fiorello_mikado_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function fiorello_mikado_register_cf7_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoContactForm7Widget';
		
		return $widgets;
	}
}