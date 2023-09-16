<?php

class FiorelloMikadoSeparatorWidget extends FiorelloMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_separator_widget',
			esc_html__( 'Mikado Separator Widget', 'fiorello-core' ),
			array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'fiorello-core' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'fiorello-core' ),
				'options' => array(
					'normal'     => esc_html__( 'Normal', 'fiorello-core' ),
					'full-width' => esc_html__( 'Full Width', 'fiorello-core' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'position',
				'title'   => esc_html__( 'Position', 'fiorello-core' ),
				'options' => array(
					'center' => esc_html__( 'Center', 'fiorello-core' ),
					'left'   => esc_html__( 'Left', 'fiorello-core' ),
					'right'  => esc_html__( 'Right', 'fiorello-core' )
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'border_style',
				'title'   => esc_html__( 'Style', 'fiorello-core' ),
				'options' => array(
					'solid'  => esc_html__( 'Solid', 'fiorello-core' ),
					'dashed' => esc_html__( 'Dashed', 'fiorello-core' ),
					'dotted' => esc_html__( 'Dotted', 'fiorello-core' )
				)
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'width',
				'title' => esc_html__( 'Width (px or %)', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'top_margin',
				'title' => esc_html__( 'Top Margin (px or %)', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'bottom_margin',
				'title' => esc_html__( 'Bottom Margin (px or %)', 'fiorello-core' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		//prepare variables
		$params = '';
		
		//is instance empty?
		if ( is_array( $instance ) && count( $instance ) ) {
			//generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}
		}
		
		echo '<div class="widget mkdf-separator-widget">';
			echo do_shortcode( "[mkdf_separator $params]" ); // XSS OK
		echo '</div>';
	}
}