<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_menu_area_meta_boxes' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_menu_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_menu_area_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_menu_area_widgets_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_menu_area_meta_options_map' ) ) {
	function fiorello_mikado_header_menu_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_header_menu_area_meta_boxes();
		$hide_dep_widgets = fiorello_mikado_get_hide_dep_for_header_menu_area_widgets_meta_boxes();
		
		$menu_area_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'type'       => 'container',
				'name'       => 'menu_area_container',
				'parent'     => $header_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_options
					)
				),
				'args'       => array(
					'enable_panels_for_default_value' => true
				)
			)
		);
		
		fiorello_mikado_add_admin_section_title(
			array(
				'parent' => $menu_area_container,
				'name'   => 'menu_area_style',
				'title'  => esc_html__( 'Menu Area Style', 'fiorello' )
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_header_widget_menu_area_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Menu Area Widget', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will hide widget area from the menu area', 'fiorello' ),
				'parent'        => $menu_area_container,
				'dependency' => array(
					'hide' => array(
						'mkdf_header_type_meta' => $hide_dep_widgets
					)
				)
			)
		);
		
		$fiorello_custom_sidebars = fiorello_mikado_get_custom_sidebars();
		if ( count( $fiorello_custom_sidebars ) > 0 ) {
			fiorello_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_menu_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Menu Area', 'fiorello' ),
					'description' => esc_html__( 'Choose custom widget area to display in header menu area"', 'fiorello' ),
					'parent'      => $menu_area_container,
					'options'     => $fiorello_custom_sidebars,
					'dependency' => array(
						'hide' => array(
							'mkdf_header_type_meta' => $hide_dep_widgets
						)
					)
				)
			);
		}
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area In Grid', 'fiorello' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'fiorello' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_container = fiorello_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_meta'  => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set grid background color for menu area', 'fiorello' ),
				'parent'      => $menu_area_in_grid_container
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_grid_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'fiorello' ),
				'description' => esc_html__( 'Set grid background transparency for menu area (0 = fully transparent, 1 = opaque)', 'fiorello' ),
				'parent'      => $menu_area_in_grid_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Shadow', 'fiorello' ),
				'description'   => esc_html__( 'Set shadow on grid menu area', 'fiorello' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_in_grid_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Grid Area Border', 'fiorello' ),
				'description'   => esc_html__( 'Set border on grid menu area', 'fiorello' ),
				'parent'        => $menu_area_in_grid_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_in_grid_border_container = fiorello_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_in_grid_border_container',
				'parent'          => $menu_area_in_grid_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_in_grid_border_meta'  => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_in_grid_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'fiorello' ),
				'description' => esc_html__( 'Set border color for grid area', 'fiorello' ),
				'parent'      => $menu_area_in_grid_border_container
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'fiorello' ),
				'description' => esc_html__( 'Choose a background color for menu area', 'fiorello' ),
				'parent'      => $menu_area_container
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_background_transparency_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Transparency', 'fiorello' ),
				'description' => esc_html__( 'Choose a transparency for the menu area background color (0 = fully transparent, 1 = opaque)', 'fiorello' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Shadow', 'fiorello' ),
				'description'   => esc_html__( 'Set shadow on menu area', 'fiorello' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_menu_area_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Menu Area Border', 'fiorello' ),
				'description'   => esc_html__( 'Set border on menu area', 'fiorello' ),
				'parent'        => $menu_area_container,
				'default_value' => '',
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		$menu_area_border_bottom_color_container = fiorello_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'menu_area_border_bottom_color_container',
				'parent'          => $menu_area_container,
				'dependency' => array(
					'show' => array(
						'mkdf_menu_area_border_meta'  => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_menu_area_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'fiorello' ),
				'description' => esc_html__( 'Choose color of header bottom border', 'fiorello' ),
				'parent'      => $menu_area_border_bottom_color_container
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'mkdf_menu_area_height_meta',
				'label'       => esc_html__( 'Height', 'fiorello' ),
				'description' => esc_html__( 'Enter header height', 'fiorello' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'type'        => 'text',
				'name'        => 'mkdf_menu_area_side_padding_meta',
				'label'       => esc_html__( 'Menu Area Side Padding', 'fiorello' ),
				'description' => esc_html__( 'Enter value in px or percentage to define menu area side padding', 'fiorello' ),
				'parent'      => $menu_area_container,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => esc_html__( 'px or %', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'parent'        => $menu_area_container,
				'type'          => 'text',
				'name'          => 'mkdf_dropdown_top_position_meta',
				'label'         => esc_html__( 'Dropdown Position', 'fiorello' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'fiorello' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		do_action( 'fiorello_mikado_header_menu_area_additional_meta_boxes_map', $menu_area_container );
	}
	
	add_action( 'fiorello_mikado_action_header_menu_area_meta_boxes_map', 'fiorello_mikado_header_menu_area_meta_options_map', 10, 1 );
}