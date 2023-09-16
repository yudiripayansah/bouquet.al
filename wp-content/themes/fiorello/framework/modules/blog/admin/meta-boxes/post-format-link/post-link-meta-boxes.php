<?php

if ( ! function_exists( 'fiorello_mikado_map_post_link_meta' ) ) {
	function fiorello_mikado_map_post_link_meta() {
		$link_post_format_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'fiorello' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'fiorello' ),
				'description' => esc_html__( 'Enter link', 'fiorello' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_post_link_meta', 24 );
}