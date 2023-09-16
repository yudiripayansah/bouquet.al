<?php

if ( ! function_exists( 'fiorello_mikado_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function fiorello_mikado_dropdown_cart_icon_styles() {
		$icon_color       = fiorello_mikado_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = fiorello_mikado_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo fiorello_mikado_dynamic_css( '.mkdf-shopping-cart-holder .mkdf-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo fiorello_mikado_dynamic_css( '.mkdf-shopping-cart-holder .mkdf-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_dropdown_cart_icon_styles' );
}