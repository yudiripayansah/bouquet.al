<?php
namespace FiorelloCore\CPT\Shortcodes\ElementsHolder;

use FiorelloCore\Lib;

class ElementsHolderItem implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_elements_holder_item';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Mikado Elements Holder Item', 'fiorello-core' ),
					'base'                    => $this->base,
					'as_child'                => array( 'only' => 'mkdf_elements_holder' ),
					'as_parent'               => array( 'except' => 'vc_row, vc_accordion' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'icon'                    => 'icon-wpb-elements-holder-item extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'fiorello-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Width', 'fiorello-core'),
							'param_name'  => 'item_width',
							'value'       => array(
								'' => '',
								'1/1' => '1-1',
								'1/2' => '1-2',
								'1/3' => '1-3',
								'2/3' => '2-3',
								'1/4' => '1-4',
								'3/4' => '3-4',
								'1/5' => '1-5',
								'2/5' => '2-5',
								'3/5' => '3-5',
								'4/5' => '4-5',
								'1/6' => '1-6',
								'5/6' => '5-6',
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'fiorello-core' ),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'link_target',
							'heading'    => esc_html__( 'Link Target', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_link_target_array() ),
							'dependency' => Array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_color',
							'heading'    => esc_html__( 'Background Color', 'fiorello-core' )
						),
						array(
							'type'       => 'attach_image',
							'param_name' => 'background_image',
							'heading'    => esc_html__( 'Background Image', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'background_image_zoom',
							'heading'    => esc_html__( 'Enable Background Image Zoom', 'fiorello-core' ),
							'dependency' => array('element' => 'background_image', 'not_empty' => true),
							'value'      => array(
								esc_html__('No','fiorello-core') => 'no',
								esc_html__('Yes','fiorello-core') => 'yes'
							)
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding',
							'heading'     => esc_html__( 'Padding', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'horizontal_alignment',
							'heading'    => esc_html__( 'Horizontal Alignment', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Left', 'fiorello-core' )   => 'left',
								esc_html__( 'Right', 'fiorello-core' )  => 'right',
								esc_html__( 'Center', 'fiorello-core' ) => 'center'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'vertical_alignment',
							'heading'    => esc_html__( 'Vertical Alignment', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Middle', 'fiorello-core' ) => 'middle',
								esc_html__( 'Top', 'fiorello-core' )    => 'top',
								esc_html__( 'Bottom', 'fiorello-core' ) => 'bottom'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'animation',
							'heading'    => esc_html__( 'Animation Type', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Default (No Animation)', 'fiorello-core' )   => '',
								esc_html__( 'Element Grow In', 'fiorello-core' )          => 'mkdf-grow-in',
								esc_html__( 'Element Fade In Down', 'fiorello-core' )     => 'mkdf-fade-in-down',
								esc_html__( 'Element From Fade', 'fiorello-core' )        => 'mkdf-element-from-fade',
								esc_html__( 'Element From Left', 'fiorello-core' )        => 'mkdf-element-from-left',
								esc_html__( 'Element From Right', 'fiorello-core' )       => 'mkdf-element-from-right',
								esc_html__( 'Element From Top', 'fiorello-core' )         => 'mkdf-element-from-top',
								esc_html__( 'Element From Bottom', 'fiorello-core' )      => 'mkdf-element-from-bottom',
								esc_html__( 'Element Flip In', 'fiorello-core' )          => 'mkdf-flip-in',
								esc_html__( 'Element X Rotate', 'fiorello-core' )         => 'mkdf-x-rotate',
								esc_html__( 'Element Z Rotate', 'fiorello-core' )         => 'mkdf-z-rotate',
								esc_html__( 'Element Y Translate', 'fiorello-core' )      => 'mkdf-y-translate',
								esc_html__( 'Element Fade In X Rotate', 'fiorello-core' ) => 'mkdf-fade-in-left-x-rotate',
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'animation_delay',
							'heading'    => esc_html__( 'Animation Delay (ms)', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1366_1600',
							'heading'     => esc_html__( 'Padding on screen size between 1366px-1600px', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'fiorello-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_1024_1366',
							'heading'     => esc_html__( 'Padding on screen size between 1024px-1366px', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left. For example 10px 0 10px 0', 'fiorello-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_768_1024',
							'heading'     => esc_html__( 'Padding on screen size between 768px-1024px', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'fiorello-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_680_768',
							'heading'     => esc_html__( 'Padding on screen size between 680px-768px', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'fiorello-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'item_padding_680',
							'heading'     => esc_html__( 'Padding on screen size bellow 680px', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'fiorello-core' ),
							'group'       => esc_html__( 'Width & Responsiveness', 'fiorello-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'           => '',
			'item_width'             => '',
			'link'					 => '',
			'link_target'			 => '_self',
			'background_image_zoom'  => 'no',
			'background_color'       => '',
			'background_image'       => '',
			'item_padding'           => '',
			'horizontal_alignment'   => '',
			'vertical_alignment'     => '',
			'animation'              => '',
			'animation_delay'        => '',
			'item_padding_1366_1600' => '',
			'item_padding_1024_1366' => '',
			'item_padding_768_1024'  => '',
			'item_padding_680_768'   => '',
			'item_padding_680'       => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['content']           = $content;
		$params['link_target'] 		 = ! empty( $params['link_target'] ) ? $params['link_target'] : $args['link_target'];
		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_rand_class'] = 'mkdf-eh-custom-' . mt_rand( 1000, 10000 );
		$params['holder_styles']     = $this->getHolderStyles( $params );
		$params['background_image_styles'] = $this->getHolderBackgroundImageStyles( $params );
		$params['content_styles']    = $this->getContentStyles( $params );
		$params['holder_data']       = $this->getHolderData( $params );
		
		$html = fiorello_core_get_shortcode_module_template_part( 'templates/elements-holder-item-template', 'elements-holder', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['vertical_alignment'] ) ? 'mkdf-vertical-alignment-' . $params['vertical_alignment'] : '';
		$holderClasses[] = ! empty( $params['horizontal_alignment'] ) ? 'mkdf-horizontal-alignment-' . $params['horizontal_alignment'] : '';
		$holderClasses[] = ! empty( $params['animation'] ) ? $params['animation'] : '';
		$holderClasses[] = ! empty( $params['item_width'] ) ? 'mkdf-width-' .$params['item_width'] : '';
		$holderClasses[] = ( $params['background_image_zoom'] == 'yes') ? 'mkdf-ei-background-zoom' : '';

		return implode( ' ', $holderClasses );
	}
	
	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		}
		
		return implode( ';', $styles );
	}

	private function getHolderBackgroundImageStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['background_image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image'] ) . ')';
		}

		return implode( ';', $styles );
	}
	
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['item_padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['item_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getHolderData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['holder_rand_class'];
		
		if ( ! empty( $params['animation'] ) ) {
			$data['data-animation'] = $params['animation'];
		}
		
		if ( $params['animation_delay'] !== '' ) {
			$data['data-animation-delay'] = esc_attr( $params['animation_delay'] );
		}
		
		if ( $params['item_padding_1366_1600'] !== '' ) {
			$data['data-1366-1600'] = $params['item_padding_1366_1600'];
		}
		
		if ( $params['item_padding_1024_1366'] !== '' ) {
			$data['data-1024-1366'] = $params['item_padding_1024_1366'];
		}
		
		if ( $params['item_padding_768_1024'] !== '' ) {
			$data['data-768-1024'] = $params['item_padding_768_1024'];
		}
		
		if ( $params['item_padding_680_768'] !== '' ) {
			$data['data-680-768'] = $params['item_padding_680_768'];
		}
		
		if ( $params['item_padding_680'] !== '' ) {
			$data['data-680'] = $params['item_padding_680'];
		}
		
		return $data;
	}
}
