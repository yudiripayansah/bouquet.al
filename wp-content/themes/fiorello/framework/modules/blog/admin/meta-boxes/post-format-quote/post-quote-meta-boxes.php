<?php

if ( ! function_exists( 'fiorello_mikado_map_post_quote_meta' ) ) {
	function fiorello_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'fiorello' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'fiorello' ),
				'description' => esc_html__( 'Enter Quote text', 'fiorello' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'fiorello' ),
				'description' => esc_html__( 'Enter Quote author', 'fiorello' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_post_quote_meta', 25 );
}