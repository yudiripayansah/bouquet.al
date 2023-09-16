<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_top_header_area_meta_boxes' ) ) {
	function fiorello_mikado_get_hide_dep_for_top_header_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_top_header_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_top_area_meta_options_map' ) ) {
	function fiorello_mikado_header_top_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_top_header_area_meta_boxes();
		
		$top_header_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_section_title(
			array(
				'parent' => $top_header_container,
				'name'   => 'top_area_style',
				'title'  => esc_html__( 'Top Area', 'fiorello' )
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Top Bar', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show header top bar area', 'fiorello' ),
				'parent'        => $top_header_container,
				'options'       => fiorello_mikado_get_yes_no_select_array(),
			)
		);
		
		$top_bar_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'name'            => 'top_bar_container_no_style',
				'parent'          => $top_header_container,
				'dependency' => array(
					'show' => array(
						'mkdf_top_bar_meta' => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar In Grid', 'fiorello' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'fiorello' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);

        fiorello_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_top_bar_background_color_meta',
				'type'   => 'color',
				'label'  => esc_html__( 'Top Bar Background Color', 'fiorello' ),
				'parent' => $top_bar_container
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_top_bar_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Background Color Transparency', 'fiorello' ),
				'description' => esc_html__( 'Set top bar background color transparenct. Value should be between 0 and 1', 'fiorello' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 3
				)
			)
		);

        fiorello_mikado_create_meta_box_field(
            array(
                'name'          => 'mkdf_top_bar_background_image_meta',
                'type'          => 'image',
                'label'         => esc_html__( 'Top Bar Background Image', 'fiorello' ),
                'description'   => esc_html__( 'Set background image for top bar', 'fiorello' ),
                'parent'        => $top_bar_container,
                'default_value' => ''
            )
        );

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_top_bar_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Top Bar Border', 'fiorello' ),
				'description'   => esc_html__( 'Set border on top bar', 'fiorello' ),
				'parent'        => $top_bar_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		$top_bar_border_container = fiorello_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'show' => array(
						'mkdf_top_bar_border_meta' => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_top_bar_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'fiorello' ),
				'description' => esc_html__( 'Choose color for top bar border', 'fiorello' ),
				'parent'      => $top_bar_border_container
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_additional_header_area_meta_boxes_map', 'fiorello_mikado_header_top_area_meta_options_map', 10, 1 );
}