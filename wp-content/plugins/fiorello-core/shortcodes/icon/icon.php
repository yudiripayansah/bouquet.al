<?php
namespace FiorelloCore\CPT\Shortcodes\Icon;

use FiorelloCore\Lib;

class Icon implements Lib\ShortcodeInterface {
	
    public function __construct() {
        $this->base = 'mkdf_icon';

        add_action('vc_before_init', array($this, 'vcMap'));
    }
	
    public function getBase() {
        return $this->base;
    }

    public function vcMap() {
	    if(function_exists('vc_map')) {
		    vc_map(
		    	array(
				    'name'                      => esc_html__( 'Mikado Icon', 'fiorello-core' ),
				    'base'                      => $this->base,
				    'category'                  => esc_html__( 'by FIORELLO', 'fiorello-core' ),
				    'icon'                      => 'icon-wpb-icon extended-custom-icon',
				    'allowed_container_element' => 'vc_row',
				    'params'                    => array_merge(
				    	array(
						    array(
							    'type'        => 'textfield',
							    'param_name'  => 'custom_class',
							    'heading'     => esc_html__( 'Custom CSS Class', 'fiorello-core' ),
							    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'fiorello-core' )
						    )
					    ),
						fiorello_mikado_icon_collections()->getVCParamsArray(),
					    array(
						    array(
							    'type'       => 'dropdown',
							    'param_name' => 'size',
							    'heading'    => esc_html__( 'Size', 'fiorello-core' ),
							    'value'      => array(
								    esc_html__( 'Tiny', 'fiorello-core' )   => 'mkdf-icon-tiny',
								    esc_html__( 'Small', 'fiorello-core' )  => 'mkdf-icon-small',
								    esc_html__( 'Medium', 'fiorello-core' ) => 'mkdf-icon-medium',
								    esc_html__( 'Large', 'fiorello-core' )  => 'mkdf-icon-large',
								    esc_html__( 'Huge', 'fiorello-core' )   => 'mkdf-icon-huge'
							    )
						    ),
						    array(
							    'type'       => 'textfield',
							    'param_name' => 'custom_size',
							    'heading'    => esc_html__( 'Custom Size (px)', 'fiorello-core' )
						    ),
						    array(
							    'type'       => 'dropdown',
							    'param_name' => 'type',
							    'heading'    => esc_html__( 'Type', 'fiorello-core' ),
							    'value'      => array(
								    esc_html__( 'Normal', 'fiorello-core' ) => 'mkdf-normal',
								    esc_html__( 'Circle', 'fiorello-core' ) => 'mkdf-circle',
								    esc_html__( 'Square', 'fiorello-core' ) => 'mkdf-square'
							    ),
							    'save_always' => true
						    ),
						    array(
							    'type'        => 'textfield',
							    'param_name'  => 'border_radius',
							    'heading'     => esc_html__( 'Border Radius', 'fiorello-core' ),
							    'description' => esc_html__( 'Please insert border radius(Rounded corners) in px. For example: 4 ', 'fiorello-core' ),
							    'dependency'  => array( 'element' => 'type', 'value' => array( 'mkdf-square' ) )
						    ),
						    array(
							    'type'       => 'textfield',
							    'param_name' => 'shape_size',
							    'heading'    => esc_html__( 'Shape Size (px)', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'type', 'value' => array( 'mkdf-circle', 'mkdf-square' ) )
						    ),
						    array(
							    'type'       => 'colorpicker',
							    'param_name' => 'icon_color',
							    'heading'    => esc_html__( 'Icon Color', 'fiorello-core' )
						    ),
						    array(
							    'type'       => 'colorpicker',
							    'param_name' => 'border_color',
							    'heading'    => esc_html__( 'Border Color', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'type', 'value' => array( 'mkdf-circle', 'mkdf-square' ) )
						    ),
						    array(
							    'type'       => 'textfield',
							    'param_name' => 'border_width',
							    'heading'    => esc_html__( 'Border Width', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'type', 'value'   => array( 'mkdf-circle', 'mkdf-square' ) )
						    ),
						    array(
							    'type'       => 'colorpicker',
							    'param_name' => 'background_color',
							    'heading'    => esc_html__( 'Background Color', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'type', 'value' => array( 'mkdf-circle', 'mkdf-square' ) )
						    ),
						    array(
							    'type'       => 'colorpicker',
							    'param_name' => 'hover_icon_color',
							    'heading'    => esc_html__( 'Hover Icon Color', 'fiorello-core' )
						    ),
						    array(
							    'type'       => 'colorpicker',
							    'param_name' => 'hover_border_color',
							    'heading'    => esc_html__( 'Hover Border Color', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'type', 'value' => array( 'mkdf-circle', 'mkdf-square' ) )
						    ),
						    array(
							    'type'       => 'colorpicker',
							    'param_name' => 'hover_background_color',
							    'heading'    => esc_html__( 'Hover Background Color', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'type', 'value' => array( 'mkdf-circle', 'mkdf-square' ) )
						    ),
						    array(
							    'type'        => 'textfield',
							    'param_name'  => 'margin',
							    'heading'     => esc_html__( 'Margin', 'fiorello-core' ),
							    'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fiorello-core' )
						    ),
						    array(
							    'type'       => 'dropdown',
							    'param_name' => 'icon_switch',
							    'heading'    => esc_html__( 'Icon Switch', 'fiorello-core' ),
							    'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) )
						    ),
						    array(
							    'type'       => 'dropdown',
							    'param_name' => 'icon_animation',
							    'heading'    => esc_html__( 'Icon Animation', 'fiorello-core' ),
							    'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) )
						    ),
						    array(
							    'type'       => 'textfield',
							    'param_name' => 'icon_animation_delay',
							    'heading'    => esc_html__( 'Icon Animation Delay (ms)', 'fiorello-core' ),
							    'dependency' => array( 'element' => 'icon_animation', 'value' => 'yes' )
						    ),
						    array(
							    'type'       => 'textfield',
							    'param_name' => 'link',
							    'heading'    => esc_html__( 'Link', 'fiorello-core' )
						    ),
						    array(
							    'type'        => 'checkbox',
							    'param_name'  => 'anchor_icon',
							    'heading'     => esc_html__( 'Use Link as Anchor', 'fiorello-core' ),
							    'value'       => array( 'Use this icon as Anchor?' => 'yes' ),
							    'description' => esc_html__( 'Check this box to use icon as anchor link (eg. #contact)', 'fiorello-core' ),
							    'dependency'  => Array( 'element' => 'link', 'not_empty' => true )
						    ),
						    array(
							    'type'       => 'dropdown',
							    'param_name' => 'target',
							    'heading'    => esc_html__( 'Target', 'fiorello-core' ),
							    'value'      => array_flip( fiorello_mikado_get_link_target_array() ),
							    'dependency' => array( 'element' => 'link', 'not_empty' => true )
						    )
					    )
				    )
			    )
		    );
	    }
    }
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'           => '',
			'size'                   => '',
			'custom_size'            => '',
			'type'                   => 'mkdf-normal',
			'border_radius'          => '',
			'shape_size'             => '',
			'icon_color'             => '',
			'border_color'           => '',
			'border_width'           => '',
			'background_color'       => '',
			'hover_icon_color'       => '',
			'hover_border_color'     => '',
			'hover_background_color' => '',
			'margin'                 => '',
			'icon_switch'            => '',
			'icon_animation'         => '',
			'icon_animation_delay'   => '',
			'link'                   => '',
			'anchor_icon'            => '',
			'target'                 => '_self'
		);
		$default_atts = array_merge( $default_atts, fiorello_mikado_icon_collections()->getShortcodeParams() );
		$params       = shortcode_atts( $default_atts, $atts );
		
		$iconPackName = fiorello_mikado_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
		
		$params['icon']                         = $params[ $iconPackName ];
		$params['icon_holder_classes']          = $this->generateIconHolderClasses( $params );
		$params['icon_holder_styles']           = $this->generateIconHolderStyles( $params );
		$params['icon_background_styles']       = $this->generateIconBackgroundStyles( $params );
		$params['icon_holder_data']             = $this->generateIconHolderData( $params );
		$params['icon_params']                  = $this->generateIconParams( $params, true);
		$params['icon_double_params']           = $this->generateIconParams( $params, false );
		$params['icon_animation_holder']        = isset( $params['icon_animation'] ) && $params['icon_animation'] == 'yes';
		$params['icon_animation_holder_styles'] = $this->generateIconAnimationHolderStyles( $params );
		$params['link_class']                   = $this->getLinkClass( $params );
		$params['target']                       = ! empty( $params['target'] ) ? $params['target'] : $default_atts['target'];
		
		$html = fiorello_core_get_shortcode_module_template_part( 'templates/icon', 'icon', '', $params );
		
		return $html;
	}
	
	private function generateIconHolderClasses( $params ) {
		$holderClasses = array( 'mkdf-icon-shortcode', $params['type'] );
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['icon_switch'] == 'yes' ? 'mkdf-icon-switch' : '';
		$holderClasses[] = $params['icon_animation'] == 'yes' ? 'mkdf-icon-animation' : '';
		$holderClasses[] = ! empty( $params['size'] ) ? $params['size'] : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function generateIconParams( $params, $original_icon = true) {
		$iconParams = array( 'icon_attributes' => array() );
		
		$iconParams['icon_attributes']['style'] = $this->generateIconStyles( $params );
		$iconParams['icon_attributes']['class'] = 'mkdf-icon-element';
		if ($params['icon_switch'] == 'yes' && $original_icon) {
			$iconParams['icon_attributes']['class'] .= ' mkdf-icon-original';
		}
		
		return $iconParams;
	}
	
	private function generateIconStyles( $params ) {
		$iconStyles = array();
		
		if ( ! empty( $params['icon_color'] ) ) {
			$iconStyles[] = 'color: ' . $params['icon_color'];
		}
		
		if ( ( $params['type'] !== 'mkdf-normal' && ! empty( $params['shape_size'] ) ) || ( $params['type'] == 'mkdf-normal' ) ) {
			if ( ! empty( $params['custom_size'] ) ) {
				$iconStyles[] = 'font-size:' . fiorello_mikado_filter_px( $params['custom_size'] ) . 'px';
			}
		}
		
		return implode( ';', $iconStyles );
	}
	
	private function generateIconHolderStyles( $params ) {
		$iconHolderStyles = array();
		
		if ( $params['margin'] !== '' ) {
			$iconHolderStyles[] = 'margin: ' . $params['margin'];
		}
		
		if ( $params['type'] !== 'mkdf-normal' ) {
			
			$shapeSize = '';
			if ( ! empty( $params['shape_size'] ) ) {
				$shapeSize = $params['shape_size'];
			} elseif ( ! empty( $params['custom_size'] ) ) {
				$shapeSize = $params['custom_size'];
			}
			
			if ( ! empty( $shapeSize ) ) {
				$iconHolderStyles[] = 'width: ' . fiorello_mikado_filter_px( $shapeSize ) . 'px';
				$iconHolderStyles[] = 'height: ' . fiorello_mikado_filter_px( $shapeSize ) . 'px';
				$iconHolderStyles[] = 'line-height: ' . fiorello_mikado_filter_px( $shapeSize ) . 'px';
			}
			
			if ( $params['type'] == 'mkdf-square' ) {
				if ( isset( $params['border_radius'] ) && $params['border_radius'] !== '' ) {
					$iconHolderStyles[] = 'border-radius: ' . fiorello_mikado_filter_px( $params['border_radius'] ) . 'px';
				}
			}
		}
		
		return $iconHolderStyles;
	}

	private function generateIconBackgroundStyles( $params ) {
		$backgroundStyles = array();
		
		if ( $params['type'] !== 'mkdf-normal' ) {
			
			if ( ! empty( $params['background_color'] ) ) {
				$backgroundStyles[] = 'background-color: ' . $params['background_color'];
			}
			
			if ( ! empty( $params['border_color'] ) && ( isset( $params['border_width'] ) && $params['border_width'] !== '' ) ) {
				$backgroundStyles[] = 'border-style: solid';
				$backgroundStyles[] = 'border-color: ' . $params['border_color'];
				$backgroundStyles[] = 'border-width: ' . fiorello_mikado_filter_px( $params['border_width'] ) . 'px';

				$backgroundStyles[] = 'width: calc(100% - ' . 2*fiorello_mikado_filter_px( $params['border_width'] ) . 'px)';
				$backgroundStyles[] = 'height: calc(100% - ' . 2*fiorello_mikado_filter_px( $params['border_width'] ) . 'px)';
			} else if ( isset( $params['border_width'] ) && $params['border_width'] !== '' ) {
				$backgroundStyles[] = 'border-style: solid';
				$backgroundStyles[] = 'border-width: ' . fiorello_mikado_filter_px( $params['border_width'] ) . 'px';

				$backgroundStyles[] = 'width: calc(100% - ' . 2*fiorello_mikado_filter_px( $params['border_width'] ) . 'px)';
				$backgroundStyles[] = 'height: calc(100% - ' . 2*fiorello_mikado_filter_px( $params['border_width'] ) . 'px)';
			} else if ( ! empty( $params['border_color'] ) ) {
				$backgroundStyles[] = 'border-color: ' . $params['border_color'];
			}
			
			if ( $params['type'] == 'mkdf-square' ) {
				if ( isset( $params['border_radius'] ) && $params['border_radius'] !== '' ) {
					$backgroundStyles[] = 'border-radius: ' . fiorello_mikado_filter_px( $params['border_radius'] ) . 'px';
				}
			}
		}
		
		return $backgroundStyles;
	}
	
	private function generateIconHolderData( $params ) {
		$iconHolderData = array();
		
		if ( isset( $params['type'] ) && $params['type'] !== 'mkdf-normal' ) {
			if ( ! empty( $params['hover_border_color'] ) ) {
				$iconHolderData['data-hover-border-color'] = $params['hover_border_color'];
			}
			
			if ( ! empty( $params['hover_background_color'] ) ) {
				$iconHolderData['data-hover-background-color'] = $params['hover_background_color'];
			}
		}
		
		if ( ( isset( $params['icon_animation'] ) && $params['icon_animation'] == 'yes' )
		     && ( isset( $params['icon_animation_delay'] ) && $params['icon_animation_delay'] !== '' )
		) {
			$iconHolderData['data-animation-delay'] = $params['icon_animation_delay'];
		}
		
		if ( ! empty( $params['hover_icon_color'] ) ) {
			$iconHolderData['data-hover-color'] = $params['hover_icon_color'];
		}
		
		if ( ! empty( $params['icon_color'] ) ) {
			$iconHolderData['data-color'] = $params['icon_color'];
		}
		
		return $iconHolderData;
	}
	
	private function generateIconAnimationHolderStyles( $params ) {
		$styles = array();
		
		if ( ( isset( $params['icon_animation'] ) && $params['icon_animation'] == 'yes' ) && ( isset( $params['icon_animation_delay'] ) && $params['icon_animation_delay'] !== '' ) ) {
			$styles[] = '-webkit-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
			$styles[] = '-moz-transition-delay: ' . $params['icon_animation_delay'] . 'ms';
			$styles[] = 'transition-delay: ' . $params['icon_animation_delay'] . 'ms';
		}
		
		return $styles;
	}
	
	private function getLinkClass( $params ) {
		$class = '';
		
		if ( $params['anchor_icon'] != '' && $params['anchor_icon'] == 'yes' ) {
			$class .= 'mkdf-anchor';
		}
		
		return $class;
	}
}