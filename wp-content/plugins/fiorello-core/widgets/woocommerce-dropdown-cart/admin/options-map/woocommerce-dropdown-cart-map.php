<?php

if ( ! function_exists( 'fiorello_mikado_woocommerce_dropdown_cart_options_map' ) ) {
	
	/**
	 * Add WooCommerce dropdown cart options to WooCommerce options page
	 */
	function fiorello_mikado_woocommerce_dropdown_cart_options_map() {
		
		/**
		 * WooCommerce Dropdown Cart Settings
		 */
		$panel_dropdown_cart = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_dropdown_cart',
				'title' => esc_html__( 'Dropdown Cart', 'fiorello-core' )
			)
		);	

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_dropdown_cart,
				'type'          => 'select',
				'name'          => 'dropdown_cart_icon_source',
				'default_value' => 'icon_pack',
				'label'         => esc_html__( 'Select Drodown Cart Icon Source', 'fiorello-core' ),
				'description'   => esc_html__( 'Choose whether you would like to use icons from an icon pack or SVG icons', 'fiorello-core' ),
				'options'       => fiorello_mikado_get_icon_sources_array(false, false)
			)
		);

		$dropdwon_cart_icon_pack_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $panel_dropdown_cart,
				'name'            => 'dropdwon_cart_icon_pack_container',
				'dependency' => array(
					'show' => array(
						'dropdown_cart_icon_source' => 'icon_pack'
					)
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $dropdwon_cart_icon_pack_container,
				'type'          => 'select',
				'name'          => 'dropdown_cart_icon_pack',
				'default_value' => 'dripicons',
				'label'         => esc_html__( 'Dropdown Cart Icon Pack', 'fiorello-core' ),
				'description'   => esc_html__( 'Choose icon pack for dropdown cart icon', 'fiorello-core' ),
				'options'       => fiorello_mikado_icon_collections()->getIconCollectionsExclude( array( 'linea_icons', 'simple_line_icons' ) )
			)
		);

		$dropdwon_cart_icon_svg_path_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $panel_dropdown_cart,
				'name'            => 'dropdwon_cart_icon_svg_path_container',
				'dependency' => array(
					'show' => array(
						'dropdown_cart_icon_source' => 'svg_path'
					)
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $dropdwon_cart_icon_svg_path_container,
				'type'        => 'textarea',
				'name'        => 'dropdown_cart_icon_svg_path',
				'label'       => esc_html__( 'Dropdown Cart Icon SVG Path', 'fiorello-core' ),
				'description' => esc_html__( 'Enter your dropdown cart icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'fiorello-core' ),
			)
		);

		$icon_style_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_dropdown_cart,
				'name'        => 'dropdown_cart_icon_style_group',
				'title'       => esc_html__( 'Dropdown Cart Icon Style', 'fiorello-core' ),
				'description' => esc_html__( 'Define styles for dropdown cart icon', 'fiorello-core' )
			)
		);
		
		$icon_colors_row = fiorello_mikado_add_admin_row(
			array(
				'parent' => $icon_style_group,
				'name'   => 'icon_colors_row'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'   => 'dropdown_cart_icon_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Icon Color', 'fiorello-core' ),
				'parent' => $icon_colors_row
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'   => 'dropdown_cart_hover_color',
				'type'   => 'colorsimple',
				'label'  => esc_html__( 'Icon Hover Color', 'fiorello-core' ),
				'parent' => $icon_colors_row
			)
		);
	}
	
	add_action( 'fiorello_mikado_woocommerce_additional_options_map', 'fiorello_mikado_woocommerce_dropdown_cart_options_map');
}