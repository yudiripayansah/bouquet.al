<?php

if ( ! function_exists( 'fiorello_mikado_footer_options_map' ) ) {
	function fiorello_mikado_footer_options_map() {

		fiorello_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'fiorello' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = fiorello_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'fiorello' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'fiorello' ),
				'parent'        => $footer_panel
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'uncovering_footer',
				'default_value' => 'no',
				'label'         => esc_html__( 'Uncovering Footer', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'fiorello' ),
				'parent'        => $footer_panel,
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'fiorello' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_top_container = fiorello_mikado_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'fiorello' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'fiorello' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
					'3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'fiorello' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'fiorello' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'fiorello' ),
					'left'   => esc_html__( 'Left', 'fiorello' ),
					'center' => esc_html__( 'Center', 'fiorello' ),
					'right'  => esc_html__( 'Right', 'fiorello' )
				),
				'parent'        => $show_footer_top_container,
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set background color for top footer area', 'fiorello' ),
				'parent'      => $show_footer_top_container
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'fiorello' ),
				'parent'        => $footer_panel,
			)
		);

		$show_footer_bottom_container = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'fiorello' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'fiorello' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'fiorello' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'fiorello' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}

	add_action( 'fiorello_mikado_action_options_map', 'fiorello_mikado_footer_options_map', 11 );
}