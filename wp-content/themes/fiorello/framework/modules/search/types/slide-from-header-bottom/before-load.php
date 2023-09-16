<?php

if ( ! function_exists( 'fiorello_mikado_set_search_slide_from_hb_global_option' ) ) {
    /**
     * This function set search type value for search options map
     */
    function fiorello_mikado_set_search_slide_from_hb_global_option( $search_type_options ) {
        $search_type_options['slide-from-header-bottom'] = esc_html__( 'Slide From Header Bottom', 'fiorello' );

        return $search_type_options;
    }

    add_filter( 'fiorello_mikado_filter_search_type_global_option', 'fiorello_mikado_set_search_slide_from_hb_global_option' );
}