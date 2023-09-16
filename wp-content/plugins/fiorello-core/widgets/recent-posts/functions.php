<?php

if ( ! function_exists( 'fiorello_mikado_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function fiorello_mikado_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'FiorelloMikadoRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'fiorello_core_filter_register_widgets', 'fiorello_mikado_register_recent_posts_widget' );
}