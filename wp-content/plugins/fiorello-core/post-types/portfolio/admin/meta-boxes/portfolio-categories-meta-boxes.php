<?php

if ( ! function_exists( 'fiorello_mikado_portfolio_category_additional_fields' ) ) {
	function fiorello_mikado_portfolio_category_additional_fields() {
		
		$fields = fiorello_mikado_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		fiorello_mikado_add_taxonomy_field(
			array(
				'name'   => 'mkdf_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'fiorello-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_custom_taxonomy_fields', 'fiorello_mikado_portfolio_category_additional_fields' );
}