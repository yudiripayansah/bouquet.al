<?php

/*** Masonry Gallery Settings ***/

if ( ! function_exists( 'fiorello_mikado_map_masonry_gallery_meta' ) ) {
	function fiorello_mikado_map_masonry_gallery_meta( $post_meta_box ) {

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry Gallery List - Dimensions for Fixed Proportion', 'fiorello' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'fiorello' ),
				'default_value' => 'small',
				'parent'        => $post_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'fiorello' ),
					'large-width'        => esc_html__( 'Large Width', 'fiorello' ),
					'large-height'       => esc_html__( 'Large Height', 'fiorello' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'fiorello' )
				)
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry Gallery List - Dimensions for Original Proportion', 'fiorello' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'fiorello' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'fiorello' ),
					'large-width' => esc_html__( 'Large Width', 'fiorello' )
				)
			)
		);
	}

	add_action( 'fiorello_mikado_action_blog_post_meta', 'fiorello_mikado_map_masonry_gallery_meta' );
}
