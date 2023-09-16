<?php

if ( ! function_exists( 'fiorello_mikado_map_woocommerce_meta' ) ) {
	function fiorello_mikado_map_woocommerce_meta() {
		
		$woocommerce_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'fiorello' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'fiorello' ),
				'description' => esc_html__( 'Choose image layout when it appears in Mikado Product List - Masonry layout shortcode', 'fiorello' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'fiorello' ),
					'small'              => esc_html__( 'Small', 'fiorello' ),
					'large-width'        => esc_html__( 'Large Width', 'fiorello' ),
					'large-height'       => esc_html__( 'Large Height', 'fiorello' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'fiorello' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'fiorello' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'fiorello' ),
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'fiorello' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_woocommerce_meta', 99 );
}