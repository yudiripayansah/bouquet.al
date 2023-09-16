<?php

if ( fiorello_core_is_woocommerce_installed() ) {
	include_once FIORELLO_CORE_ABS_PATH . '/widgets/woocommerce-dropdown-cart/functions.php';
	include_once FIORELLO_CORE_ABS_PATH . '/widgets/woocommerce-dropdown-cart/woocommerce-dropdown-cart.php';
	include_once FIORELLO_CORE_ABS_PATH . '/widgets/woocommerce-dropdown-cart/admin/options-map/woocommerce-dropdown-cart-map.php';
	include_once FIORELLO_CORE_ABS_PATH . '/widgets/woocommerce-dropdown-cart/admin/custom-styles/woocommerce-dropdown-cart-custom-styles.php';
}
