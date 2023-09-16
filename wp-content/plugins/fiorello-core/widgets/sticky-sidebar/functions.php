<?php

if(!function_exists('fiorello_mikado_register_sticky_sidebar_widget')) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function fiorello_mikado_register_sticky_sidebar_widget($widgets) {
		$widgets[] = 'FiorelloMikadoStickySidebar';
		
		return $widgets;
	}
	
	add_filter('fiorello_core_filter_register_widgets', 'fiorello_mikado_register_sticky_sidebar_widget');
}