<?php

if ( ! function_exists( 'fiorello_mikado_get_title_types_meta_boxes' ) ) {
	function fiorello_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'fiorello_mikado_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'fiorello' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'fiorello_mikado_map_title_meta' ) ) {
	function fiorello_mikado_map_title_meta() {
		$title_type_meta_boxes = fiorello_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'fiorello_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'fiorello' ),
				'name'  => 'title_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'fiorello' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'fiorello' ),
				'parent'        => $title_meta_box,
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = fiorello_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'mkdf_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'fiorello' ),
						'description'   => esc_html__( 'Choose title type', 'fiorello' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'fiorello' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'fiorello' ),
						'options'       => fiorello_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'fiorello' ),
						'description' => esc_html__( 'Set a height for Title Area', 'fiorello' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'fiorello' ),
						'description' => esc_html__( 'Choose a background color for title area', 'fiorello' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'fiorello' ),
						'description' => esc_html__( 'Choose an Image for title area', 'fiorello' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'fiorello' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'fiorello' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'fiorello' ),
							'hide'                => esc_html__( 'Hide Image', 'fiorello' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'fiorello' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'fiorello' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'fiorello' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'fiorello' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'fiorello' )
						)
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'fiorello' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'fiorello' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'fiorello' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'fiorello' ),
							'window-top'    => esc_html__( 'From Window Top', 'fiorello' )
						)
					)
				);

		fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_content_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Content Vertical Alignment', 'fiorello' ),
						'description'   => esc_html__( 'Set title content vertical alignment', 'fiorello' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							'' => esc_html__( 'Default', 'fiorello' ),
							'top' => esc_html__( 'Top', 'fiorello' ),
							'middle'    => esc_html__( 'Middle', 'fiorello' ),
							'bottom'    => esc_html__( 'Bottom', 'fiorello' )
						)
					)
				);
					
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_offset_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Title Vertical Offset', 'fiorello' ),
						'description'   => esc_html__( 'Set title vertical offset relative to its current position', 'fiorello' ),
						'parent'        => $show_title_area_meta_container,
						'args' 			=> array(
							'col_width' => '3',
							'suffix' => 'px'
						)
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'fiorello' ),
						'options'       => fiorello_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'fiorello' ), 
						'description' => esc_html__( 'Choose a color for title text', 'fiorello' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'fiorello' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'fiorello' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'fiorello' ),
						'options'       => fiorello_mikado_get_title_tag( true, array( 'span' => 'span' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'fiorello' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'fiorello' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'fiorello_mikado_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_title_meta', 60 );
}