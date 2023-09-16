<?php

if ( ! function_exists( 'fiorello_mikado_like' ) ) {
	/**
	 * Returns FiorelloMikadoLike instance
	 *
	 * @return FiorelloMikadoLike
	 */
	function fiorello_mikado_like() {
		return FiorelloMikadoLike::get_instance();
	}
}

function fiorello_mikado_get_like() {
	
	echo wp_kses( fiorello_mikado_like()->add_like(), array(
		'span' => array(
			'class'       => true,
			'aria-hidden' => true,
			'style'       => true,
			'id'          => true
		),
		'i'    => array(
			'class' => true,
			'style' => true,
			'id'    => true
		),
		'a'    => array(
			'href'  => true,
			'class' => true,
			'id'    => true,
			'title' => true,
			'style' => true
		)
	) );
}