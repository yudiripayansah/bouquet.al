<?php

if ( ! function_exists( 'fiorello_mikado_include_mobile_header_menu' ) ) {
	function fiorello_mikado_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'fiorello' );
		
		return $menus;
	}
	
	add_filter( 'fiorello_mikado_filter_register_headers_menu', 'fiorello_mikado_include_mobile_header_menu' );
}

if ( ! function_exists( 'fiorello_mikado_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function fiorello_mikado_register_mobile_header_areas() {
		if ( fiorello_mikado_is_responsive_on() ) {
			register_sidebar(
				array(
					'id'            => 'mkdf-mobile-area',
					'name'          => esc_html__( 'Mobile Area', 'fiorello' ),
					'description'   => esc_html__( 'Widgets added here will appear in Mobile Area', 'fiorello' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'fiorello_mikado_register_mobile_header_areas' );
}

if ( ! function_exists( 'fiorello_mikado_mobile_header_class' ) ) {
	function fiorello_mikado_mobile_header_class( $classes ) {
		$classes[] = 'mkdf-default-mobile-header';
		
		$classes[] = 'mkdf-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'fiorello_mikado_mobile_header_class' );
}

if ( ! function_exists( 'fiorello_mikado_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function fiorello_mikado_get_mobile_header( $slug = '', $module = '' ) {
		if ( fiorello_mikado_is_responsive_on() ) {
			$mobile_menu_title = fiorello_mikado_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title,
				'mobile_icon_class'		 => fiorello_mikado_get_mobile_navigation_icon_class()
			);

            $module = apply_filters('fiorello_mikado_filter_mobile_menu_module', 'header/types/mobile-header');
            $slug = apply_filters('fiorello_mikado_filter_mobile_menu_slug', '');
            $parameters = apply_filters('fiorello_mikado_filter_mobile_menu_parameters', $parameters);

            fiorello_mikado_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'fiorello_mikado_action_after_wrapper_inner', 'fiorello_mikado_get_mobile_header', 20 );
}

if ( ! function_exists( 'fiorello_mikado_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function fiorello_mikado_get_mobile_logo() {
		$show_logo_image = fiorello_mikado_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = fiorello_mikado_get_meta_field_intersect( 'logo_image_mobile', fiorello_mikado_get_page_id() );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : fiorello_mikado_get_meta_field_intersect( 'logo_image', fiorello_mikado_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = fiorello_mikado_get_image_dimensions( $logo_image );
			
			$logo_height = '';
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_height'     => $logo_height,
				'logo_styles'     => $logo_styles
			);
			
			fiorello_mikado_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'fiorello_mikado_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function fiorello_mikado_get_mobile_nav() {
		fiorello_mikado_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}

if ( ! function_exists( 'fiorello_mikado_mobile_header_per_page_js_var' ) ) {
    function fiorello_mikado_mobile_header_per_page_js_var( $perPageVars ) {
        $perPageVars['mkdfMobileHeaderHeight'] = fiorello_mikado_set_default_mobile_menu_height_for_header_types();

        return $perPageVars;
    }

    add_filter( 'fiorello_mikado_filter_per_page_js_vars', 'fiorello_mikado_mobile_header_per_page_js_var' );
}

if ( ! function_exists( 'fiorello_mikado_get_mobile_navigation_icon_class' ) ) {
	/**
	 * Loads mobile navigation icon class
	 */
	function fiorello_mikado_get_mobile_navigation_icon_class() {
		$classes = array(
			'mkdf-mobile-menu-opener'
		);

		$classes[] = fiorello_mikado_get_icon_sources_class( 'mobile_icon', 'mkdf-mobile-menu-opener' );

		return $classes;
	}
}