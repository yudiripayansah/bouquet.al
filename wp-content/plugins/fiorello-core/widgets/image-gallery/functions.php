<?php

if ( ! function_exists( 'fiorello_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function fiorello_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_image_gallery_widget' );
}