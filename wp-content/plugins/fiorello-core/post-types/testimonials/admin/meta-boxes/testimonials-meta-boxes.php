<?php

if ( ! function_exists( 'fiorello_core_map_testimonials_meta' ) ) {
	function fiorello_core_map_testimonials_meta() {
		$testimonial_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'fiorello-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'fiorello-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'fiorello-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'fiorello-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'fiorello-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'fiorello-core' ),
				'description' => esc_html__( 'Enter author name', 'fiorello-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'fiorello-core' ),
				'description' => esc_html__( 'Enter author job position', 'fiorello-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_core_map_testimonials_meta', 95 );
}