<?php

if ( ! function_exists( 'fiorello_mikado_register_blog_standard_template_file' ) ) {
	/**
	 * Function that register blog standard template
	 */
	function fiorello_mikado_register_blog_standard_template_file( $templates ) {
		$templates['blog-standard'] = esc_html__( 'Blog: Standard', 'fiorello' );
		
		return $templates;
	}
	
	add_filter( 'fiorello_mikado_filter_register_blog_templates', 'fiorello_mikado_register_blog_standard_template_file' );
}

if ( ! function_exists( 'fiorello_mikado_set_blog_standard_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function fiorello_mikado_set_blog_standard_type_global_option( $options ) {
		$options['standard'] = esc_html__( 'Blog: Standard', 'fiorello' );
		
		return $options;
	}
	
	add_filter( 'fiorello_mikado_filter_blog_list_type_global_option', 'fiorello_mikado_set_blog_standard_type_global_option' );
}