<?php

if ( ! function_exists( 'fiorello_core_map_portfolio_settings_meta' ) ) {
	function fiorello_core_map_portfolio_settings_meta() {
		$meta_box = fiorello_mikado_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'fiorello-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		fiorello_mikado_create_meta_box_field( array(
			'name'        => 'mkdf_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'fiorello-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'fiorello-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'fiorello-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'fiorello-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'fiorello-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'fiorello-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'fiorello-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'fiorello-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'fiorello-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'fiorello-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'fiorello-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'fiorello-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'fiorello-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'fiorello-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'fiorello-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'fiorello-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'fiorello-core' ),
					'two'   => esc_html__( '2 Columns', 'fiorello-core' ),
					'three' => esc_html__( '3 Columns', 'fiorello-core' ),
					'four'  => esc_html__( '4 Columns', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'fiorello-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'fiorello-core' ),
				'default_value' => '',
				'options'       => fiorello_mikado_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'mkdf_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'mkdf_masonry_type_meta_container'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'fiorello-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'fiorello-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => array(
					''      => esc_html__( 'Default', 'fiorello-core' ),
					'two'   => esc_html__( '2 Columns', 'fiorello-core' ),
					'three' => esc_html__( '3 Columns', 'fiorello-core' ),
					'four'  => esc_html__( '4 Columns', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'fiorello-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'fiorello-core' ),
				'default_value' => '',
				'options'       => fiorello_mikado_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'fiorello-core' ),
				'parent'        => $meta_box,
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'fiorello-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'fiorello-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'fiorello-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'fiorello-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'fiorello-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'fiorello-core' ),
				'parent'      => $meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'fiorello-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'fiorello-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'fiorello-core' ),
					'small'              => esc_html__( 'Small', 'fiorello-core' ),
					'large-width'        => esc_html__( 'Large Width', 'fiorello-core' ),
					'large-height'       => esc_html__( 'Large Height', 'fiorello-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'fiorello-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'fiorello-core' ),
				'default_value' => 'default',
				'parent'        => $meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'fiorello-core' ),
					'large-width' => esc_html__( 'Large Width', 'fiorello-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'fiorello-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'fiorello-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_core_map_portfolio_settings_meta', 41 );
}