<?php

if ( ! function_exists( 'fiorello_mikado_map_general_meta' ) ) {
	function fiorello_mikado_map_general_meta() {
		
		$general_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'fiorello_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'fiorello' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'fiorello' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'fiorello' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'fiorello' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = fiorello_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'fiorello' ),
				'description' => esc_html__( 'Define styles for Content area', 'fiorello' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = fiorello_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);

				fiorello_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (e.g. 10px 5px 10px 5px)', 'fiorello' ),
						'parent' => $mkdf_content_padding_row,
					)
				);

				fiorello_mikado_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (e.g. 10px 5px 10px 5px)', 'fiorello' ),
						'parent'  => $mkdf_content_padding_row,
					)
				);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'fiorello' ),
				'description' => esc_html__( 'Choose background color for page content', 'fiorello' ),
				'parent'      => $general_meta_box
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'type'          => 'yesno',
				'name'          => 'mkdf_disable_content_background_image_meta',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Content Background Image', 'fiorello' ),
				'description'   => esc_html__( 'Disable content background image', 'fiorello' ),
				'parent'        => $general_meta_box
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'type'          => 'image',
				'name'          => 'mkdf_content_background_image_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image', 'fiorello' ),
				'description'   => esc_html__( 'Choose image to use as content background image', 'fiorello' ),
				'parent'        => $general_meta_box,
				'dependency'	=> array(
					'show' => array(
						'mkdf_disable_content_background_image_meta' => 'no'
					)
				)
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'mkdf_content_background_image_behavior_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Image Behavior', 'fiorello' ),
				'description'   => esc_html__( 'Choose background image behavior', 'fiorello' ),
				'parent'        => $general_meta_box,
				'options'		=> array(
					'' => esc_html__('Default','fiorello'),
					'full-image' => esc_html__('As Full Image','fiorello'),
					'pattern' => esc_html__('As Pattern','fiorello'),
				),
				'dependency'	=> array(
					'show' => array(
						'mkdf_disable_content_background_image_meta' => 'no'
					)
				)
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'fiorello' ),
				'parent'  => $general_meta_box,
				'options' => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = fiorello_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_boxed_meta'  => array('','no')
						)
					)
				)
			);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'fiorello' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'fiorello' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'fiorello' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'fiorello' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'fiorello' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'fiorello' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'fiorello' ),
						'description'   => esc_html__( 'Choose background image attachment', 'fiorello' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'fiorello' ),
							'fixed'  => esc_html__( 'Fixed', 'fiorello' ),
							'scroll' => esc_html__( 'Scroll', 'fiorello' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'fiorello' ),
				'parent'        => $general_meta_box,
				'options'       => fiorello_mikado_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = fiorello_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'fiorello' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'fiorello' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'fiorello' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'fiorello' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'fiorello' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'fiorello' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				fiorello_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'fiorello' ),
						'options'       => fiorello_mikado_get_yes_no_select_array(),
					)
				);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'fiorello' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'fiorello' ),
						'options'       => fiorello_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'fiorello' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'fiorello' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'fiorello' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'fiorello' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'fiorello' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'fiorello' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'fiorello' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'fiorello' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'fiorello' ),
				'parent'        => $general_meta_box,
				'options'       => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = fiorello_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'mkdf_smooth_page_transitions_meta'  => array('','no')
						)
					)
				)
			);
		
				fiorello_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'fiorello' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'fiorello' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => fiorello_mikado_get_yes_no_select_array()
					)
				);
				
				$page_transition_preloader_container_meta = fiorello_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'mkdf_page_transition_preloader_meta'  => array('','no')
							)
						)
					)
				);
				
					fiorello_mikado_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'fiorello' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = fiorello_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'fiorello' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'fiorello' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = fiorello_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					fiorello_mikado_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'fiorello' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'fiorello' ),
								'fiorello'		        => esc_html__( 'Fiorello Loader', 'fiorello' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'fiorello' ),
								'pulse'                 => esc_html__( 'Pulse', 'fiorello' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'fiorello' ),
								'cube'                  => esc_html__( 'Cube', 'fiorello' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'fiorello' ),
								'stripes'               => esc_html__( 'Stripes', 'fiorello' ),
								'wave'                  => esc_html__( 'Wave', 'fiorello' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'fiorello' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'fiorello' ),
								'atom'                  => esc_html__( 'Atom', 'fiorello' ),
								'clock'                 => esc_html__( 'Clock', 'fiorello' ),
								'mitosis'               => esc_html__( 'Mitosis', 'fiorello' ),
								'lines'                 => esc_html__( 'Lines', 'fiorello' ),
								'fussion'               => esc_html__( 'Fussion', 'fiorello' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'fiorello' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'fiorello' )
							)
						)
					);
					
					fiorello_mikado_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'fiorello' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);

					fiorello_mikado_create_meta_box_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'mkdf_smooth_pt_spinner_main_text_meta',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Main Text', 'fiorello' ),
							'parent'        => $row_pt_spinner_animation_meta,
							'dependency'	=> array(
								'show' => array(
									'mkdf_smooth_pt_spinner_type_meta' => 'fiorello'
								)
							)
						)
					);

					fiorello_mikado_create_meta_box_field(
						array(
							'type'          => 'textsimple',
							'name'          => 'mkdf_smooth_pt_spinner_small_text_meta',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Small Text', 'fiorello' ),
							'parent'        => $row_pt_spinner_animation_meta,
							'dependency'	=> array(
								'show' => array(
									'mkdf_smooth_pt_spinner_type_meta' => 'fiorello'
								)
							)
						)
					);

					fiorello_mikado_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'fiorello' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'fiorello' ),
							'options'     => fiorello_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'fiorello' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'fiorello' ),
				'parent'      => $general_meta_box,
				'options'     => fiorello_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_general_meta', 10 );
}