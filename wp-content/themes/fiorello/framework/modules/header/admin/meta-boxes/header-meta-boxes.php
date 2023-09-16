<?php

if ( ! function_exists( 'fiorello_mikado_header_types_meta_boxes' ) ) {
	function fiorello_mikado_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'fiorello_mikado_filter_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'fiorello' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( MIKADO_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'fiorello_mikado_map_header_meta' ) ) {
	function fiorello_mikado_map_header_meta() {
		$header_type_meta_boxes              = fiorello_mikado_header_types_meta_boxes();
		$header_behavior_meta_boxes_hide_dep = fiorello_mikado_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'fiorello_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'header_meta' ),
				'title' => esc_html__( 'Header', 'fiorello' ),
				'name'  => 'header_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'fiorello' ),
				'description'   => esc_html__( 'Select header type layout', 'fiorello' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'fiorello' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'fiorello' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'fiorello' ),
					'light-header' => esc_html__( 'Light', 'fiorello' ),
					'dark-header'  => esc_html__( 'Dark', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'mkdf_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'fiorello' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'fiorello' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'fiorello' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'fiorello' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'fiorello' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'fiorello' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'fiorello' )
				),
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $header_behavior_meta_boxes_hide_dep
					)
				)
			)
		);
		
		//additional area
		do_action( 'fiorello_mikado_action_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'fiorello_mikado_action_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'fiorello_mikado_action_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'fiorello_mikado_action_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_header_meta', 50 );
}