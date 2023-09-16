<?php
namespace FiorelloCore\CPT\Shortcodes\Banner;

use FiorelloCore\Lib;

class Banner implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_banner';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Banner', 'fiorello-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'icon'                      => 'icon-wpb-banner extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'fiorello-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'fiorello-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'fiorello-core' ),
							'description' => esc_html__( 'Select image from media library', 'fiorello-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'overlay_color',
							'heading'    => esc_html__( 'Image Overlay Color', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'hover_behavior',
							'heading'     => esc_html__( 'Hover Behavior', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Visible on Hover', 'fiorello-core' )   => 'mkdf-visible-on-hover',
								esc_html__( 'Visible on Default', 'fiorello-core' ) => 'mkdf-visible-on-default',
								esc_html__( 'Disabled', 'fiorello-core' )           => 'mkdf-disabled'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'hover_type',
							'heading'     => esc_html__( 'Hover Type', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Default', 'fiorello-core' )   => '',
								esc_html__( 'Shader', 'fiorello-core' )   => 'shader',
								esc_html__( 'Zoom', 'fiorello-core' )     => 'zoom',
								esc_html__( 'Zoom with Shader', 'fiorello-core' ) => 'zoom-shader'
							),
							'dependency'  => array('element' => 'hover_behavior', 'value' => array('mkdf-visible-on-default'))
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Info Position', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Default', 'fiorello-core' )  => 'default',
								esc_html__( 'Centered', 'fiorello-core' ) => 'centered'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'info_content_padding',
							'heading'     => esc_html__( 'Info Content Padding', 'fiorello-core' ),
							'description' => esc_html__( 'Please insert padding in format top right bottom left', 'fiorello-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'subtitle',
							'heading'    => esc_html__( 'Subtitle', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'subtitle_tag',
							'heading'     => esc_html__( 'Subtitle Tag', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'subtitle', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'subtitle_color',
							'heading'    => esc_html__( 'Subtitle Color', 'fiorello-core' ),
							'dependency' => array( 'element' => 'subtitle', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_highlight_words',
							'heading'     => esc_html__( 'Words with Highlight color', 'fiorello-core' ),
							'description' => esc_html__( 'Enter the positions of the words you would like to display in the highlight color. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have the highlight color, you would enter "1,3,4")', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'fiorello-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'fiorello-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link',
							'heading'    => esc_html__( 'Link', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'target',
							'heading'    => esc_html__( 'Target', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_link_target_array() ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link_text',
							'heading'    => esc_html__( 'Link Text', 'fiorello-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'link_color',
							'heading'    => esc_html__( 'Link Text Color', 'fiorello-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'link_top_margin',
							'heading'    => esc_html__( 'Link Text Top Margin (px)', 'fiorello-core' ),
							'dependency' => array( 'element' => 'link', 'not_empty' => true )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'         => '',
			'image'                => '',
			'overlay_color'        => '',
			'hover_behavior'       => 'mkdf-visible-on-hover',
			'hover_type'		   => 'zoom',
			'info_position'        => 'default',
			'info_content_padding' => '',
			'subtitle'             => '',
			'subtitle_tag'         => 'h5',
			'subtitle_color'       => '',
			'title'                => '',
			'title_tag'            => 'h2',
			'title_highlight_words'    => '',
			'title_color'          => '',
			'title_top_margin'     => '',
			'link'                 => '',
			'target'               => '_self',
			'link_text'            => '',
			'link_color'           => '',
			'link_top_margin'      => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']  = $this->getHolderClasses( $params, $args );
		$params['overlay_styles']  = $this->getOverlayStyles( $params );
		$params['subtitle_tag']    = ! empty( $params['subtitle_tag'] ) ? $params['subtitle_tag'] : $args['subtitle_tag'];
		$params['subtitle_styles'] = $this->getSubitleStyles( $params );
		$params['title']           = $this->getModifiedTitle( $params );
		$params['title_tag']       = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['link_styles']     = $this->getLinkStyles( $params );
		
		$html = fiorello_core_get_shortcode_module_template_part( 'templates/banner', 'banner', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['hover_behavior'] ) ? $params['hover_behavior'] : $args['hover_behavior'];
		$holderClasses[] = ! empty( $params['hover_type'] ) ? 'mkdf-banner-hover-'.$params['hover_type'] : 'mkdf-banner-hover-'.$args['hover_behavior'];
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'mkdf-banner-info-' . $params['info_position'] : 'mkdf-banner-info-' . $args['info_position'];
		
		return implode( ' ', $holderClasses );
	}
	
	private function getOverlayStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['overlay_color'] ) ) {
			$styles[] = 'background-color: ' . $params['overlay_color'];
		}
		
		if ( ! empty( $params['info_content_padding'] ) ) {
			$styles[] = 'padding: ' . $params['info_content_padding'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getSubitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}
		
		return implode( ';', $styles );
	}
	
	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_highlight_words = str_replace( ' ', '', $params['title_highlight_words'] );
		
		if ( ! empty( $title ) ) {
			$light_words = explode( ',', $title_highlight_words );
			$split_title = explode( ' ', $title );
			
			if ( ! empty( $title_highlight_words ) ) {
				foreach ( $light_words as $value ) {
                    $value = intval($value);
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="mkdf-banner-title-highlight">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			$title = implode( ' ', $split_title );
		}
		
		return $title;
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . fiorello_mikado_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
	
	private function getLinkStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['link_color'] ) ) {
			$styles[] = 'color: ' . $params['link_color'];
		}
		
		if ( ! empty( $params['link_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . fiorello_mikado_filter_px( $params['link_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}