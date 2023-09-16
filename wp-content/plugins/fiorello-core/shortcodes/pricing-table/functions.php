<?php

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
	class WPBakeryShortCode_Mkdf_Pricing_Table extends WPBakeryShortCodesContainer {}
}

if ( ! function_exists( 'fiorello_core_add_pricing_tables_shortcodes' ) ) {
	function fiorello_core_add_pricing_tables_shortcodes( $shortcodes_class_name ) {
		$shortcodes = array(
			'FiorelloCore\CPT\Shortcodes\PricingTable\PricingTable',
			'FiorelloCore\CPT\Shortcodes\PricingTable\PricingTableItem'
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'fiorello_core_filter_add_vc_shortcode', 'fiorello_core_add_pricing_tables_shortcodes' );
}

if ( ! function_exists( 'fiorello_core_set_pricing_table_custom_style_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom css style for pricing table shortcode
	 */
	function fiorello_core_set_pricing_table_custom_style_for_vc_shortcodes( $style ) {
		$current_style = '.wpb_content_element.wpb_mkdf_pricing_table_item > .wpb_element_wrapper { 
			background-color: #f4f4f4; 
		}';
		
		$style .= $current_style;
		
		return $style;
	}
	
	add_filter( 'fiorello_core_filter_add_vc_shortcodes_custom_style', 'fiorello_core_set_pricing_table_custom_style_for_vc_shortcodes' );
}

if ( ! function_exists( 'fiorello_core_set_pricing_table_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for pricing table shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function fiorello_core_set_pricing_table_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-pricing-table';
		$shortcodes_icon_class_array[] = '.icon-wpb-pricing-table-item';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'fiorello_core_filter_add_vc_shortcodes_custom_icon_class', 'fiorello_core_set_pricing_table_icon_class_name_for_vc_shortcodes' );
}