<?php

if ( ! function_exists( 'fiorello_mikado_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function fiorello_mikado_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'fiorello' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'fiorello' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_additional_title_area_meta_boxes', 'fiorello_mikado_breadcrumbs_title_type_options_meta_boxes' );
}