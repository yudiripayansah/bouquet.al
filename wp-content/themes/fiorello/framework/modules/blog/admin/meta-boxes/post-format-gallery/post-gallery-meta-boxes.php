<?php

if ( ! function_exists( 'fiorello_mikado_map_post_gallery_meta' ) ) {
	
	function fiorello_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'fiorello' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		fiorello_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'fiorello' ),
				'description' => esc_html__( 'Choose your gallery images', 'fiorello' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_post_gallery_meta', 21 );
}
