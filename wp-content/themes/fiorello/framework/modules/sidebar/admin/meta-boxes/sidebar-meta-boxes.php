<?php

if ( ! function_exists( 'fiorello_mikado_map_sidebar_meta' ) ) {
	function fiorello_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'fiorello_mikado_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'fiorello' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'fiorello' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'fiorello' ),
				'parent'      => $mkdf_sidebar_meta_box,
                'options'       => fiorello_mikado_get_custom_sidebars_options( true )
			)
		);
		
		$mkdf_custom_sidebars = fiorello_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			fiorello_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'fiorello' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'fiorello' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_sidebar_meta', 31 );
}