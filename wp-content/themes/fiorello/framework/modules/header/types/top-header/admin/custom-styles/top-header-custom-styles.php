<?php

if ( ! function_exists( 'fiorello_mikado_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function fiorello_mikado_header_top_bar_styles() {
		$top_header_height = fiorello_mikado_options()->getOptionValue( 'top_bar_height' );
		
		if ( ! empty( $top_header_height ) ) {
			echo fiorello_mikado_dynamic_css( '.mkdf-top-bar', array( 'height' => fiorello_mikado_filter_px( $top_header_height ) . 'px' ) );
			echo fiorello_mikado_dynamic_css( '.mkdf-top-bar .mkdf-logo-wrapper a', array( 'max-height' => fiorello_mikado_filter_px( $top_header_height ) . 'px' ) );
		}
		
		echo fiorello_mikado_dynamic_css( '.mkdf-header-box .mkdf-top-bar-background', array( 'height' => fiorello_mikado_get_top_bar_background_height() . 'px' ) );
		
		$top_bar_container_selector = '.mkdf-top-bar > .mkdf-vertical-align-containers';
		$top_bar_container_styles   = array();
		$container_side_padding     = fiorello_mikado_options()->getOptionValue( 'top_bar_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( fiorello_mikado_string_ends_with( $container_side_padding, 'px' ) || fiorello_mikado_string_ends_with( $container_side_padding, '%' ) ) {
				$top_bar_container_styles['padding-left'] = $container_side_padding;
				$top_bar_container_styles['padding-right'] = $container_side_padding;
			} else {
				$top_bar_container_styles['padding-left'] = fiorello_mikado_filter_px( $container_side_padding ) . 'px';
				$top_bar_container_styles['padding-right'] = fiorello_mikado_filter_px( $container_side_padding ) . 'px';
			}
			
			echo fiorello_mikado_dynamic_css( $top_bar_container_selector, $top_bar_container_styles );
		}
		
		if ( fiorello_mikado_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector                = '.mkdf-top-bar .mkdf-grid .mkdf-vertical-align-containers';
			$top_bar_grid_styles                  = array();
			$top_bar_grid_background_color        = fiorello_mikado_options()->getOptionValue( 'top_bar_grid_background_color' );
			$top_bar_grid_background_transparency = fiorello_mikado_options()->getOptionValue( 'top_bar_grid_background_transparency' );
			
			if ( !empty($top_bar_grid_background_color) ) {
				$grid_background_color        = $top_bar_grid_background_color;
				$grid_background_transparency = 1;
				
				if ( $top_bar_grid_background_transparency !== '' ) {
					$grid_background_transparency = $top_bar_grid_background_transparency;
				}
				
				$grid_background_color                   = fiorello_mikado_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}
			
			echo fiorello_mikado_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}
		
		$top_bar_styles   = array();
		$background_color = fiorello_mikado_options()->getOptionValue( 'top_bar_background_color' );
        $background_image = fiorello_mikado_options()->getOptionValue( 'top_bar_background_image' );
		$border_color     = fiorello_mikado_options()->getOptionValue( 'top_bar_border_color' );

		$top_bar_background_selector = array(
		  '.mkdf-header-box .mkdf-top-bar-background'
        );
		$top_bar_background_style = array();

		
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( fiorello_mikado_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = fiorello_mikado_options()->getOptionValue( 'top_bar_background_transparency' );
			}
			
			$background_color                   = fiorello_mikado_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
			$top_bar_background_style['background-color'] = $background_color;
		}

		if($background_image !== '' ){
            $top_bar_styles['background-image'] = 'url('.$background_image.')';
            $top_bar_background_style['background-image'] = 'url('.$background_image.')';
        }

        echo fiorello_mikado_dynamic_css( $top_bar_background_selector, $top_bar_background_style );

        if ( fiorello_mikado_options()->getOptionValue( 'top_bar_border' ) == 'yes' && $border_color != '' ) {
			$top_bar_styles['border-bottom'] = '1px solid ' . $border_color;
		}
		
		echo fiorello_mikado_dynamic_css( '.mkdf-top-bar', $top_bar_styles );
	}
	
	add_action( 'fiorello_mikado_action_style_dynamic', 'fiorello_mikado_header_top_bar_styles' );
}