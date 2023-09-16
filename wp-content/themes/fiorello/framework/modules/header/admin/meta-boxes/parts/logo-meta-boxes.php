<?php

if ( ! function_exists( 'fiorello_mikado_logo_meta_box_map' ) ) {
	function fiorello_mikado_logo_meta_box_map() {
		
		$logo_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'fiorello_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'fiorello' ),
				'name'  => 'logo_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'fiorello' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'fiorello' ),
				'parent'      => $logo_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'fiorello' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'fiorello' ),
				'parent'      => $logo_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'fiorello' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'fiorello' ),
				'parent'      => $logo_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'fiorello' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'fiorello' ),
				'parent'      => $logo_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'fiorello' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'fiorello' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_logo_meta_box_map', 47 );
}