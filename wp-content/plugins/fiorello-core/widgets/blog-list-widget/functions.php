<?php

if ( ! function_exists( 'fiorello_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function fiorello_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_blog_list_widget' );
}