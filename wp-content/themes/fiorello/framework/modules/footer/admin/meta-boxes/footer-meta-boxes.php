<?php

if ( ! function_exists( 'fiorello_mikado_map_footer_meta' ) ) {
	function fiorello_mikado_map_footer_meta() {

		$footer_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'fiorello_mikado_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'fiorello' ),
				'name'  => 'footer_meta'
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'fiorello' ),
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);

		$show_footer_meta_container = fiorello_mikado_add_admin_container(
			array(
				'name'       => 'mkdf_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'mkdf_disable_footer_meta' => 'yes'
					)
				)
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_footer_in_grid_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Footer in Grid', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'fiorello' ),
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_uncovering_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Uncovering Footer', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'fiorello' ),
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'fiorello' ),
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_footer_top_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Footer Top Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set background color for top footer area', 'fiorello' ),
				'parent'      => $show_footer_meta_container,
				'dependency' => array(
					'show' => array(
						'mkdf_show_footer_top_meta' => array( '', 'yes' )
					)
				)
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'fiorello' ),
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'parent'        => $show_footer_meta_container
			)
		);

		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_footer_bottom_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Footer Bottom Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'fiorello' ),
				'parent'      => $show_footer_meta_container,
				'dependency' => array(
					'show' => array(
						'mkdf_show_footer_bottom_meta' => array( '', 'yes' )
					)
				)
			)
		);
	}

	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_footer_meta', 70 );
}