<?php
namespace FiorelloCore\CPT\Shortcodes\FullScreenSections;

use FiorelloCore\Lib;

class FullScreenSections implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_full_screen_sections';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'      => esc_html__( 'Mikado Full Screen Sections', 'fiorello-core' ),
					'base'      => $this->base,
					'icon'      => 'icon-wpb-full-screen-sections extended-custom-icon',
					'category'  => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'as_parent' => array( 'only' => 'mkdf_full_screen_sections_item' ),
					'js_view'   => 'VcColumnView',
					'params'    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_continuous_vertical',
							'heading'     => esc_html__( 'Enable Continuous Scrolling', 'fiorello-core' ),
							'description' => esc_html__( 'Defines whether scrolling down in the last section or should scroll down to the first one and if scrolling up in the first section should scroll up to the last one', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_navigation',
							'heading'     => esc_html__( 'Enable Navigation Arrows', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_pagination',
							'heading'     => esc_html__( 'Enable Pagination Dots', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'enable_continuous_vertical' => 'no',
			'enable_navigation'          => 'yes',
			'enable_pagination'          => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderData( $params );
		$params['content']        = $content;
		
		$html = fiorello_core_get_shortcode_module_template_part( 'templates/full-screen-sections', 'full-screen-sections', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['enable_navigation'] === 'yes' ? 'mkdf-fss-has-nav' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getHolderData( $params ) {
		$data = array();
		
		if ( ! empty( $params['enable_continuous_vertical'] ) ) {
			$data['data-enable-continuous-vertical'] = $params['enable_continuous_vertical'];
		}
		
		if ( ! empty( $params['enable_navigation'] ) ) {
			$data['data-enable-navigation'] = $params['enable_navigation'];
		}
		
		if ( ! empty( $params['enable_pagination'] ) ) {
			$data['data-enable-pagination'] = $params['enable_pagination'];
		}
		
		return $data;
	}
}
