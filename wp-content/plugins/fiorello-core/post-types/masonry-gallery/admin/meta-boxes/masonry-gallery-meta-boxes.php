<?php

if ( ! function_exists( 'fiorello_core_map_masonry_gallery_meta' ) ) {
	function fiorello_core_map_masonry_gallery_meta() {
		
		$masonry_gallery_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'masonry-gallery' ),
				'title' => esc_html__( 'Masonry Gallery General', 'fiorello-core' ),
				'name'  => 'masonry_gallery_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_title_tag',
				'type'          => 'select',
				'default_value' => 'h4',
				'label'         => esc_html__( 'Title Tag', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => fiorello_mikado_get_title_tag()
			)
		);
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_title_color',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__( 'Title Color', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box

			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_item_text',
				'type'   => 'text',
				'label'  => esc_html__( 'Text', 'fiorello-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_text_tag',
				'type'          => 'select',
				'default_value' => 'p',
				'label'         => esc_html__( 'Text Tag', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => fiorello_mikado_get_title_tag(false, array('p' => 'p')),
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_text_color',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box

			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_text_align',
				'type'          => 'select',
				'default_value' => 'center',
				'label'         => esc_html__( 'Content Align', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'center'              => esc_html__( 'Center', 'fiorello-core' ),
					'left'        => esc_html__( 'Left', 'fiorello-core' ),
					'right'       => esc_html__( 'Right', 'fiorello-core' ),
				)
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_item_image',
				'type'   => 'image',
				'label'  => esc_html__( 'Custom Item Icon', 'fiorello-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'   => 'mkdf_masonry_gallery_item_link',
				'type'   => 'text',
				'label'  => esc_html__( 'Link', 'fiorello-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_link_target',
				'type'          => 'select',
				'default_value' => '_self',
				'label'         => esc_html__( 'Link Target', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => fiorello_mikado_get_link_target_array()
			)
		);
		
		fiorello_mikado_add_admin_section_title( array(
			'name'   => 'mkdf_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__( 'Masonry Gallery Item Style', 'fiorello-core' )
		) );
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_size',
				'type'          => 'select',
				'default_value' => 'square-small',
				'label'         => esc_html__( 'Size', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'fiorello-core' ),
					'large-width'        => esc_html__( 'Large Width', 'fiorello-core' ),
					'large-height'       => esc_html__( 'Large Height', 'fiorello-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_item_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__( 'Type', 'fiorello-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'standard'    => esc_html__( 'Standard', 'fiorello-core' ),
					'with-hover' => esc_html__( 'With Hover', 'fiorello-core' ),
					'simple'      => esc_html__( 'Simple', 'fiorello-core' )
				)
			)
		);
		
		$masonry_gallery_item_button_type_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_button_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_masonry_gallery_item_type'  => array( 'standard', 'simple' )
					)
				)
			)
		);
		
	
		$masonry_gallery_item_simple_type_container = fiorello_mikado_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_simple_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_masonry_gallery_item_type'  => array( 'standard', 'with-hover' )
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_masonry_gallery_simple_content_background_skin',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Skin', 'fiorello-core' ),
				'parent'        => $masonry_gallery_item_simple_type_container,
				'options'       => array(
					'default' => esc_html__( 'Default', 'fiorello-core' ),
					'light'   => esc_html__( 'Light', 'fiorello-core' ),
					'dark'    => esc_html__( 'Dark', 'fiorello-core' )
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_core_map_masonry_gallery_meta', 45 );
}