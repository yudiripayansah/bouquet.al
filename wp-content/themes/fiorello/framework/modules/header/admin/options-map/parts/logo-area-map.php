<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_logo_area_options' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_logo_area_options() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_logo_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_logo_area_options_map' ) ) {
	function fiorello_mikado_header_logo_area_options_map( $panel_header ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_header_logo_area_options();
		
		$logo_area_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__( 'Logo Area', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area In Grid', 'fiorello' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'fiorello' )
			)
		);
		
		$logo_area_in_grid_container = fiorello_mikado_add_admin_container(
			array(
				'parent'     => $logo_area_container,
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid' => 'no'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'fiorello' ),
				'description'   => esc_html__( 'Set grid background color for logo area', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'fiorello' ),
				'description'   => esc_html__( 'Set grid background transparency', 'fiorello' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'fiorello' ),
				'description'   => esc_html__( 'Set border on grid area', 'fiorello' )
			)
		);
		
		$logo_area_in_grid_border_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_container,
				'name'            => 'logo_area_in_grid_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_in_grid_border'  => 'no'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $logo_area_in_grid_border_container,
				'type'        => 'color',
				'name'        => 'logo_area_in_grid_border_color',
				'label'       => esc_html__( 'Border Color', 'fiorello' ),
				'description' => esc_html__( 'Set border color for grid area', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $logo_area_container,
				'type'        => 'color',
				'name'        => 'logo_area_background_color',
				'label'       => esc_html__( 'Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set background color for logo area', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'fiorello' ),
				'description'   => esc_html__( 'Set background transparency for logo area', 'fiorello' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area Border', 'fiorello' ),
				'description'   => esc_html__( 'Set border on logo area', 'fiorello' )
			)
		);
		
		$logo_area_border_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'dependency' => array(
					'hide' => array(
						'logo_area_border'  => 'no'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'color',
				'name'          => 'logo_area_border_color',
				'label'         => esc_html__( 'Border Color', 'fiorello' ),
				'description'   => esc_html__( 'Set border color for logo area', 'fiorello' ),
				'parent'        => $logo_area_border_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'label'         => esc_html__( 'Height', 'fiorello' ),
				'description'   => esc_html__( 'Enter logo area height (default is 100px)', 'fiorello' ),
				'parent'        => $logo_area_container,
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'fiorello_mikado_header_logo_area_additional_options', $logo_area_container );
	}
	
	add_action( 'fiorello_mikado_action_header_logo_area_options_map', 'fiorello_mikado_header_logo_area_options_map', 10, 1 );
}