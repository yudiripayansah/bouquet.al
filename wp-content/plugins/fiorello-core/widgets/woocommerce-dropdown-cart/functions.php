<?php

if ( ! function_exists( 'fiorello_mikado_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function fiorello_mikado_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoWooCommerceDropdownCart';

		return $widgets;
	}

	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'fiorello_mikado_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function fiorello_mikado_get_dropdown_cart_icon_class() {
		$classes = array(
			'mkdf-header-cart'
		);

		$classes[] = fiorello_mikado_get_icon_sources_class( 'dropdown_cart', 'mkdf-header-cart' );

		return $classes;
	}
}