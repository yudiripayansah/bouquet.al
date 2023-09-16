<?php

class FiorelloMikadoVerticalSeparatorWidget extends FiorelloMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_vertical_separator_widget',
			esc_html__( 'Mikado Vertical Separator Widget', 'fiorello-core' ),
			array( 'description' => esc_html__( 'Add a vertical separator element to your widget areas', 'fiorello-core' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Holder Height', 'fiorello-core' ),
				'options' => array(
					'full-height'   => esc_html__( 'Full Height', 'fiorello-core' ),
					'custom-height' => esc_html__( 'Custom Height', 'fiorello-core' ),
				)
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'align',
				'title'   => esc_html__( 'Vertical Align', 'fiorello-core' ),
				'options' => array(
					'middle' => esc_html__( 'Middle', 'fiorello-core' ),
					'top'   => esc_html__( 'Top', 'fiorello-core' ),
					'bottom'  => esc_html__( 'Bottom', 'fiorello-core' )
				)
			),
			array(
				'type'  => 'textfield',
				'name'  => 'height',
				'title' => esc_html__( 'Height (px or %)', 'fiorello-core' ),
				'description' => esc_html__('The percentage applies only if the \'Full Holder Height\' is selected','fiorello-core')
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
				'name'  => 'thickness',
				'title' => esc_html__( 'Thickness (px)', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'left_margin',
				'title' => esc_html__( 'Left Margin (px)', 'fiorello-core' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'right_margin',
				'title' => esc_html__( 'Right Margin (px)', 'fiorello-core' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}

		$holder_class = '';

		if ($instance['type'] == 'full-height') {
			$holder_class = 'mkdf-vertical-separator-full-height';
		}

		$style = array();

		if ($instance['align'] !== '') {
			$style[] = 'vertical-align:'.$instance['align'];
		}

		if ($instance['height'] !== '') {
			if (fiorello_mikado_string_ends_with($instance['height'],'%')){
				$height = $instance['height'];
			} else {
				$height = fiorello_mikado_filter_px($instance['height']).'px';
			}
			$style[] = 'height:'.$height;
		}

		if ($instance['border_style'] !== '') {
			$style[] = 'border-left-style:'.$instance['border_style'];
		}

		if ($instance['color'] !== '') {
			$style[] = 'border-color:'.$instance['color'];
		}

		if ($instance['thickness'] !== '') {
			$style[] = 'border-width:'.fiorello_mikado_filter_px($instance['thickness']).'px';
		}

		if ($instance['left_margin'] !== '') {
			$style[] = 'margin-left:'.fiorello_mikado_filter_px($instance['left_margin']).'px';
		}

		if ($instance['right_margin'] !== '') {
			$style[] = 'margin-right:'.fiorello_mikado_filter_px($instance['right_margin']).'px';
		}

		$html = '';
		
		$html .= '<div class="widget mkdf-vertical-separator-widget '.esc_attr($holder_class).'">';
		$html .= '<span class="mkdf-vsw-height-holder"></span>';
		$html .= '<span class="mkdf-vsw" '.fiorello_mikado_get_inline_style($style).'></span>';
		$html .= '</div>';

		echo wp_kses_post($html);
	}
}