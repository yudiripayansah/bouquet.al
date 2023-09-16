<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_top_header_options' ) ) {
	function fiorello_mikado_get_hide_dep_for_top_header_options() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_top_header_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_top_options_map' ) ) {
	function fiorello_mikado_header_top_options_map( $panel_header ) {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_top_header_options();
		
		$top_header_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'top_header_container',
				'parent'          => $panel_header,
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'top_bar',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Top Bar', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show top bar area', 'fiorello' ),
				'parent'        => $top_header_container,
			)
		);
		
		$top_bar_container = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'top_bar_container',
				'parent'          => $top_header_container,
				'dependency' => array(
					'hide' => array(
						'top_bar'  => 'no'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'top_bar_in_grid',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar in Grid', 'fiorello' ),
				'description'   => esc_html__( 'Set top bar content to be in grid', 'fiorello' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_in_grid_container = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'top_bar_in_grid_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_in_grid'  => 'no'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Grid Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set grid background color for top bar', 'fiorello' ),
				'parent'      => $top_bar_in_grid_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_grid_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Grid Background Transparency', 'fiorello' ),
				'description' => esc_html__( 'Set grid background transparency for top bar', 'fiorello' ),
				'parent'      => $top_bar_in_grid_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set background color for top bar', 'fiorello' ),
				'parent'      => $top_bar_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_background_transparency',
				'type'        => 'text',
				'label'       => esc_html__( 'Background Transparency', 'fiorello' ),
				'description' => esc_html__( 'Set background transparency for top bar', 'fiorello' ),
				'parent'      => $top_bar_container,
				'args'        => array( 'col_width' => 3 )
			)
		);
        fiorello_mikado_add_admin_field(
            array(
                'name'        => 'top_bar_background_image',
                'type'        => 'image',
                'label'       => esc_html__( 'Background Image', 'fiorello' ),
                'description' => esc_html__( 'Set background image for top bar', 'fiorello' ),
                'parent'      => $top_bar_container
            )
        );
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'top_bar_border',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Top Bar Border', 'fiorello' ),
				'description'   => esc_html__( 'Set top bar border', 'fiorello' ),
				'parent'        => $top_bar_container
			)
		);
		
		$top_bar_border_container = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'top_bar_border_container',
				'parent'          => $top_bar_container,
				'dependency' => array(
					'hide' => array(
						'top_bar_border'  => 'no'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_border_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Top Bar Border Color', 'fiorello' ),
				'description' => esc_html__( 'Set border color for top bar', 'fiorello' ),
				'parent'      => $top_bar_border_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'top_bar_height',
				'type'        => 'text',
				'label'       => esc_html__( 'Top Bar Height', 'fiorello' ),
				'description' => esc_html__( 'Enter top bar height (Default is 46px)', 'fiorello' ),
				'parent'      => $top_bar_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'   => 'top_bar_side_padding',
				'type'   => 'text',
				'label'  => esc_html__( 'Top Bar Side Padding', 'fiorello' ),
				'parent' => $top_bar_container,
				'args'   => array(
					'col_width' => 2,
					'suffix'    => esc_html__( 'px or %', 'fiorello' )
				)
			)
		);

	}
	
	add_action( 'fiorello_mikado_action_header_top_options_map', 'fiorello_mikado_header_top_options_map', 10, 1 );
}