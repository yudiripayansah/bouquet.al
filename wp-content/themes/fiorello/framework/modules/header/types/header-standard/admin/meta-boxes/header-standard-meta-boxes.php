<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_standard_meta_map' ) ) {
	function fiorello_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		fiorello_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'fiorello' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'fiorello' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'fiorello' ),
					'left'   => esc_html__( 'Left', 'fiorello' ),
					'right'  => esc_html__( 'Right', 'fiorello' ),
					'center' => esc_html__( 'Center', 'fiorello' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_additional_header_area_meta_boxes_map', 'fiorello_mikado_header_standard_meta_map' );
}