<?php

if ( ! function_exists( 'fiorello_core_add_dropcaps_shortcodes' ) ) {
	function fiorello_core_add_dropcaps_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'FiorelloCore\CPT\Shortcodes\Dropcaps\Dropcaps'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'fiorello_core_filter_add_vc_shortcode', 'fiorello_core_add_dropcaps_shortcodes' );
}