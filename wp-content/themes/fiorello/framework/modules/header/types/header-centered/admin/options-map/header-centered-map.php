<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_centered_options' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_centered_options() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_centered_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_centered_logo_map' ) ) {
	function fiorello_mikado_header_centered_logo_map( $parent ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_header_centered_options();
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'text',
				'name'            => 'logo_wrapper_padding_header_centered',
				'default_value'   => '',
				'label'           => esc_html__( 'Logo Padding', 'fiorello' ),
				'description'     => esc_html__( 'Insert padding in format: 0px 0px 1px 0px', 'fiorello' ),
				'args'            => array(
					'col_width' => 3
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_header_logo_area_additional_options', 'fiorello_mikado_header_centered_logo_map' );
}

if ( ! function_exists( 'fiorello_mikado_header_centered_map' ) ) {
	function fiorello_mikado_header_centered_map( $parent ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_header_centered_options();

		fiorello_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'widgets_position_header_centered',
				'default_value'   => 'apart',
				'label'           => esc_html__( 'Widgets Position for Header Centered', 'fiorello' ),
				'description'     => esc_html__( 'Choose position for widgets for header centered', 'fiorello' ),
				'options' => array(
					'apart' => esc_html__('Apart from Menu','fiorello'),
					'beside' => esc_html__('Beside Menu','fiorello'),
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				),
			)
		);
	}

	add_action( 'fiorello_mikado_header_menu_area_additional_options', 'fiorello_mikado_header_centered_map' );
}