<?php

if ( ! function_exists( 'fiorello_mikado_sidebar_options_map' ) ) {
	function fiorello_mikado_sidebar_options_map() {

		$sidebar_panel = fiorello_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'fiorello' ),
				'name'  => 'sidebar',
				'page'  => '_page_page'
			)
		);
		
		fiorello_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'fiorello' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'fiorello' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => fiorello_mikado_get_custom_sidebars_options()
		) );
		
		$fiorello_custom_sidebars = fiorello_mikado_get_custom_sidebars();
		if ( count( $fiorello_custom_sidebars ) > 0 ) {
			fiorello_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'fiorello' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'fiorello' ),
				'parent'      => $sidebar_panel,
				'options'     => $fiorello_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'fiorello_mikado_action_options_map', 'fiorello_mikado_sidebar_options_map', 9 );
}