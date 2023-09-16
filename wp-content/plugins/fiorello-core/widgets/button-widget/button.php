<?php

class FiorelloMikadoButtonWidget extends FiorelloMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_button_widget',
			esc_html__( 'Mikado Button Widget', 'fiorello-core' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'fiorello-core' ) )
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
					'solid'   => esc_html__( 'Solid', 'fiorello-core' ),
					'outline' => esc_html__( 'Outline', 'fiorello-core' ),
					'simple'  => esc_html__( 'Simple', 'fiorello-core' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'fiorello-core' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'fiorello-core' ),
					'medium' => esc_html__( 'Medium', 'fiorello-core' ),
					'large'  => esc_html__( 'Large', 'fiorello-core' ),
					'huge'   => esc_html__( 'Huge', 'fiorello-core' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'fiorello-core' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'fiorello-core' ),
				'default' => esc_html__( 'Button Text', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'fiorello-core' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'fiorello-core' ),
				'options' => fiorello_mikado_get_link_target_array()
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'fiorello-core' )
			),
			array(
				'type'  => 'colorpicker',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'fiorello-core' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'fiorello-core' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'fiorello-core' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'fiorello-core' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'fiorello-core' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'fiorello-core' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'fiorello-core' )
			),
			array(
				'type'        => 'colorpicker',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'fiorello-core' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'fiorello-core' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'fiorello-core' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fiorello-core' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}