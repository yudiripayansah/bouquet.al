<?php

if ( ! function_exists( 'fiorello_mikado_add_product_info_shortcode' ) ) {
	function fiorello_mikado_add_product_info_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'FiorelloCore\CPT\Shortcodes\ProductInfo\ProductInfo',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( fiorello_mikado_core_plugin_installed() ) {
		add_filter( 'fiorello_core_filter_add_vc_shortcode', 'fiorello_mikado_add_product_info_shortcode' );
	}
}

if ( ! function_exists( 'fiorello_mikado_add_product_info_into_shortcodes_list' ) ) {
	function fiorello_mikado_add_product_info_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'mkdf_product_info';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'fiorello_mikado_filter_woocommerce_shortcodes_list', 'fiorello_mikado_add_product_info_into_shortcodes_list' );
}