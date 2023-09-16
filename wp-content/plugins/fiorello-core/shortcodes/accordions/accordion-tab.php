<?php

namespace FiorelloCore\CPT\Shortcodes\AccordionTab;

use FiorelloCore\Lib;

class AccordionTab implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_accordion_tab';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					"name"                    => esc_html__( 'Mikado Accordion Tab', 'fiorello-core' ),
					"base"                    => $this->base,
					"as_child"                => array( 'only' => 'mkdf_accordion' ),
					'is_container'            => true,
					"category"                => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					"icon"                    => "icon-wpb-accordion-tab extended-custom-icon",
					"show_settings_on_create" => true,
					"js_view"                 => 'VcColumnView',
					"params"                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'title',
							'heading'     => esc_html__( 'Title', 'fiorello-core' ),
							'description' => esc_html__( 'Enter accordion section title', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_title_tag( true, array( 'p' => 'p' ) ) ),
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'title'     => 'Section',
			'title_tag' => 'h6'
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['content']   = $content;
		$params['title_tag'] = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		
		$output = fiorello_core_get_shortcode_module_template_part( 'templates/accordion-template', 'accordions', '', $params );
		
		return $output;
	}
}