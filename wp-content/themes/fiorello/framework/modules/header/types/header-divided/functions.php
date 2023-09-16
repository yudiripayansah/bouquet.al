<?php

if ( ! function_exists( 'fiorello_mikado_register_header_divided_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function fiorello_mikado_register_header_divided_type( $header_types ) {
		$header_type = array(
			'header-divided' => 'FiorelloMikado\Modules\Header\Types\HeaderDivided'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'fiorello_mikado_init_register_header_divided_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function fiorello_mikado_init_register_header_divided_type() {
		add_filter( 'fiorello_mikado_filter_register_header_type_class', 'fiorello_mikado_register_header_divided_type' );
	}
	
	add_action( 'fiorello_mikado_action_before_header_function_init', 'fiorello_mikado_init_register_header_divided_type' );
}

if ( ! function_exists( 'fiorello_mikado_include_header_divided_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function fiorello_mikado_include_header_divided_menu( $menus ) {
		$menus['divided-left-navigation']  = esc_html__( 'Divided Left Navigation', 'fiorello' );
		$menus['divided-right-navigation'] = esc_html__( 'Divided Right Navigation', 'fiorello' );
		
		return $menus;
	}
	
	if ( fiorello_mikado_check_is_header_type_enabled( 'header-divided' ) ) {
		add_filter( 'fiorello_mikado_filter_register_headers_menu', 'fiorello_mikado_include_header_divided_menu' );
	}
}

if ( ! function_exists( 'fiorello_mikado_get_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function fiorello_mikado_get_divided_left_main_menu( $additional_class = 'mkdf-default-nav' ) {
		fiorello_mikado_get_module_template_part( 'templates/divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'fiorello_mikado_get_sticky_divided_left_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function fiorello_mikado_get_sticky_divided_left_main_menu( $additional_class = 'mkdf-default-nav' ) {
		fiorello_mikado_get_module_template_part( 'templates/sticky-divided-left-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'fiorello_mikado_get_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function fiorello_mikado_get_divided_right_main_menu( $additional_class = 'mkdf-default-nav' ) {
		fiorello_mikado_get_module_template_part( 'templates/divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'fiorello_mikado_get_sticky_divided_right_main_menu' ) ) {
	/**
	 * Loads main menu HTML
	 *
	 * @param string $additional_class addition class to pass to template
	 */
	function fiorello_mikado_get_sticky_divided_right_main_menu( $additional_class = 'mkdf-default-nav' ) {
		fiorello_mikado_get_module_template_part( 'templates/sticky-divided-right-navigation', 'header/types/header-divided', '', array( 'additional_class' => $additional_class ) );
	}
}

if ( ! function_exists( 'fiorello_mikado_register_header_divided_widgets' ) ) {
	/**
	 * Registers additional widget areas for this header type
	 */
	function fiorello_mikado_register_header_divided_widgets() {
		register_sidebar(
			array(
				'id'            => 'mkdf-header-divided-left-widget-area',
				'name'          => esc_html__( 'Header Divided Left Widget Area', 'fiorello' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-divided-left-widget-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear left of the Header Divided left menu area', 'fiorello' )
			)
		);

		register_sidebar(
			array(
				'id'            => 'mkdf-header-divided-right-widget-area',
				'name'          => esc_html__( 'Header Divided Right Widget Area', 'fiorello' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-header-divided-right-widget-area">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear right of the Header Divided right menu area', 'fiorello' )
			)
		);
	}

	if ( fiorello_mikado_check_is_header_type_enabled( 'header-divided' ) ) {
		add_action( 'widgets_init', 'fiorello_mikado_register_header_divided_widgets' );
	}
}


if ( ! function_exists( 'fiorello_mikado_get_divided_left_widget_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function fiorello_mikado_get_divided_left_widget_area() {
		$page_id                 = fiorello_mikado_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'mkdf_custom_divided_left_area_sidebar_meta', true );

		if ( get_post_meta( $page_id, 'mkdf_disable_divided_left_widget_area_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'mkdf-header-divided-left-widget-area' ) && empty( $custom_menu_widget_area ) ) {
				dynamic_sidebar( 'mkdf-header-divided-left-widget-area' );
			} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
				dynamic_sidebar( $custom_menu_widget_area );
			}
		}
	}
}

if ( ! function_exists( 'fiorello_mikado_get_divided_right_widget_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function fiorello_mikado_get_divided_right_widget_area() {
		$page_id                 = fiorello_mikado_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'mkdf_custom_divided_right_area_sidebar_meta', true );

		if ( get_post_meta( $page_id, 'mkdf_disable_divided_right_widget_area_meta', 'true' ) !== 'yes' ) {
			if ( is_active_sidebar( 'mkdf-header-divided-right-widget-area' ) && empty( $custom_menu_widget_area ) ) {
				dynamic_sidebar( 'mkdf-header-divided-right-widget-area' );
			} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
				dynamic_sidebar( $custom_menu_widget_area );
			}
		}
	}
}