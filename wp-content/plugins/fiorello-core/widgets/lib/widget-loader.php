<?php

if ( ! function_exists( 'fiorello_mikado_register_widgets' ) ) {
	function fiorello_mikado_register_widgets() {
		$widgets = apply_filters( 'fiorello_core_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}

	add_action( 'widgets_init', 'fiorello_mikado_register_widgets' );
}