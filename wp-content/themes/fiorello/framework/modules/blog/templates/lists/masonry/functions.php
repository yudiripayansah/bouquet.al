<?php

if ( ! function_exists( 'fiorello_mikado_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function fiorello_mikado_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'fiorello' );
		
		return $templates;
	}
	
	add_filter( 'fiorello_mikado_filter_register_blog_templates', 'fiorello_mikado_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'fiorello_mikado_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function fiorello_mikado_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'fiorello' );
		
		return $options;
	}
	
	add_filter( 'fiorello_mikado_filter_blog_list_type_global_option', 'fiorello_mikado_set_blog_masonry_type_global_option' );
}