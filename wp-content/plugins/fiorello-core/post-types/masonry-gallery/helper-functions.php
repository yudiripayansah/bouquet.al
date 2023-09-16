<?php

if ( ! function_exists( 'fiorello_core_masonry_gallery_meta_box_functions' ) ) {
	function fiorello_core_masonry_gallery_meta_box_functions( $post_types ) {
		$post_types[] = 'masonry-gallery';
		
		return $post_types;
	}
	
	add_filter( 'fiorello_mikado_filter_meta_box_post_types_save', 'fiorello_core_masonry_gallery_meta_box_functions' );
	add_filter( 'fiorello_mikado_filter_meta_box_post_types_remove', 'fiorello_core_masonry_gallery_meta_box_functions' );
}

if ( ! function_exists( 'fiorello_core_register_masonry_gallery_cpt' ) ) {
	function fiorello_core_register_masonry_gallery_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'FiorelloCore\CPT\MasonryGallery\MasonryGalleryRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'fiorello_core_filter_register_custom_post_types', 'fiorello_core_register_masonry_gallery_cpt' );
}

if ( ! function_exists( 'fiorello_core_add_proofing_gallery_to_search_types' ) ) {
	function fiorello_core_add_proofing_gallery_to_search_types( $post_types ) {
		$post_types['masonry-gallery'] = esc_html__( 'Masonry Gallery', 'fiorello-core' );
		
		return $post_types;
	}
	
	add_filter( 'fiorello_mikado_filter_search_post_type_widget_params_post_type', 'fiorello_core_add_proofing_gallery_to_search_types' );
}

// Load masonry gallery shortcodes
if(!function_exists('fiorello_core_include_masonry_gallery_shortcodes_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function fiorello_core_include_masonry_gallery_shortcodes_files() {
        foreach(glob(FIORELLO_CORE_CPT_PATH.'/masonry-gallery/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('fiorello_core_action_include_shortcodes_file', 'fiorello_core_include_masonry_gallery_shortcodes_files');
}