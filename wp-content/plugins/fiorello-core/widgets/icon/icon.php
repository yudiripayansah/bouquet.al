<?php

class FiorelloMikadoIconWidget extends FiorelloMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_icon_widget',
			esc_html__( 'Mikado Icon Widget', 'fiorello-core' ),
			array( 'description' => esc_html__( 'Add icons to widget areas', 'fiorello-core' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array_merge(
			fiorello_mikado_icon_collections()->getIconWidgetParamsArray(),
			array(
				array(
					'type'  => 'textfield',
					'name'  => 'icon_text',
					'title' => esc_html__( 'Icon Text', 'fiorello-core' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'fiorello-core' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Target', 'fiorello-core' ),
					'options' => fiorello_mikado_get_link_target_array()
				),
				array(
					'type'  => 'textfield',
					'name'  => 'icon_size',
					'title' => esc_html__( 'Icon Size (px)', 'fiorello-core' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'icon_color',
					'title' => esc_html__( 'Icon Color', 'fiorello-core' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'icon_hover_color',
					'title' => esc_html__( 'Icon Hover Color', 'fiorello-core' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'icon_margin',
					'title'       => esc_html__( 'Icon Margin', 'fiorello-core' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fiorello-core' )
				)
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$holder_classes = array( 'mkdf-icon-widget-holder' );
		if ( ! empty( $instance['icon_hover_color'] ) ) {
			$holder_classes[] = 'mkdf-icon-has-hover';
		}
		
		$data   = array();
		$data[] = ! empty( $instance['icon_hover_color'] ) ? fiorello_mikado_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ) : '';
		$data   = implode( ' ', $data );
		
		$holder_styles = array();
		if ( ! empty( $instance['icon_color'] ) ) {
			$holder_styles[] = 'color: ' . $instance['icon_color'];
		}
		
		if ( ! empty( $instance['icon_size'] ) ) {
			$holder_styles[] = 'font-size: ' . fiorello_mikado_filter_px( $instance['icon_size'] ) . 'px';
		}
		
		if ( $instance['icon_margin'] !== '' ) {
			$holder_styles[] = 'margin: ' . $instance['icon_margin'];
		}
		
		$link   = ! empty( $instance['link'] ) ? $instance['link'] : '#';
		$target = ! empty( $instance['target'] ) ? $instance['target'] : '_self';
		
		$icon_holder_html = '';
		if ( ! empty( $instance['icon_pack'] ) ) {
			$icon_class   = array();
			$icon_class[] = ! empty( $instance['fa_icon'] ) && $instance['icon_pack'] === 'font_awesome' ? $instance['fa_icon'] : '';
			$icon_class[] = ! empty( $instance['fe_icon'] ) && $instance['icon_pack'] === 'font_elegant' ? $instance['fe_icon'] : '';
			$icon_class[] = ! empty( $instance['ion_icon'] ) && $instance['icon_pack'] === 'ion_icons' ? $instance['ion_icon'] : '';
			$icon_class[] = ! empty( $instance['linea_icon'] ) && $instance['icon_pack'] === 'linea_icons' ? $instance['linea_icon'] : '';
			$icon_class[] = ! empty( $instance['linear_icon'] ) && $instance['icon_pack'] === 'linear_icons' ? 'lnr ' . $instance['linear_icon'] : '';
			$icon_class[] = ! empty( $instance['simple_line_icon'] ) && $instance['icon_pack'] === 'simple_line_icons' ? $instance['simple_line_icon'] : '';
			$icon_class[] = ! empty( $instance['dripicon'] ) && $instance['icon_pack'] === 'dripicons' ? $instance['dripicon'] : '';
			
			$icon_class = array_filter( $icon_class, function ( $value ) {
				return $value !== '';
			} );
			
			if ( ! empty( $icon_class ) ) {
				$icon_class = implode( ' ', $icon_class );
				
				$icon_holder_html = '<span class="mkdf-icon-element ' . esc_attr( $icon_class ) . '"></span>';
			}
		}
		
		$icon_text_html  = '';
		$icon_text_class = ! empty( $icon_holder_html ) ? '' : 'mkdf-no-icon';
		if ( ! empty( $instance['icon_text'] ) ) {
			$icon_text_html = '<span class="mkdf-icon-text ' . esc_attr( $icon_text_class ) . '">' . esc_html( $instance['icon_text'] ) . '</span>';
		}
		?>
		
		<a <?php fiorello_mikado_class_attribute( $holder_classes ); ?> <?php echo wp_kses_post( $data ); ?> href="<?php echo esc_url( $link ); ?>" target="<?php echo esc_attr( $target ); ?>" <?php echo fiorello_mikado_get_inline_style( $holder_styles ); ?>>
			<?php echo wp_kses( $icon_holder_html, array(
				'span' => array(
					'class' => true
				)
			) ); ?>
			<?php echo wp_kses( $icon_text_html, array(
				'span' => array(
					'class' => true
				)
			) ); ?>
		</a>
		<?php
	}
}