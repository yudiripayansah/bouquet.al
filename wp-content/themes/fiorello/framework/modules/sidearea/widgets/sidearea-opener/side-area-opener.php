<?php

if ( class_exists( 'FiorelloMikadoWidget' ) ) {
	class FiorelloMikadoSideAreaOpener extends FiorelloMikadoWidget {
		public function __construct() {
			parent::__construct(
				'mkdf_side_area_opener',
				esc_html__( 'Mikado Side Area Opener', 'fiorello' ),
				array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'fiorello' ) )
			);

			$this->setParams();
		}

		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_color',
					'title'       => esc_html__( 'Side Area Opener Color', 'fiorello' ),
					'description' => esc_html__( 'Define color for side area opener', 'fiorello' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_hover_color',
					'title'       => esc_html__( 'Side Area Opener Hover Color', 'fiorello' ),
					'description' => esc_html__( 'Define hover color for side area opener', 'fiorello' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'widget_margin',
					'title'       => esc_html__( 'Side Area Opener Margin', 'fiorello' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'fiorello' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Side Area Opener Title', 'fiorello' )
				)
			);
		}

		public function widget( $args, $instance ) {
			$classes = array(
				'mkdf-side-menu-button-opener',
				'mkdf-icon-has-hover'
			);

			$classes[] = fiorello_mikado_get_icon_sources_class( 'side_area', 'mkdf-side-menu-button-opener' );

			$styles = array();
			if ( ! empty( $instance['icon_color'] ) ) {
				$styles[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if ( ! empty( $instance['widget_margin'] ) ) {
				$styles[] = 'margin: ' . $instance['widget_margin'];
			}
			?>

            <a <?php fiorello_mikado_class_attribute( $classes ); ?> <?php echo fiorello_mikado_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?>
                    href="javascript:void(0)" <?php fiorello_mikado_inline_style( $styles ); ?>>
				<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
                    <h5 class="mkdf-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
				<?php } ?>
                <span class="mkdf-side-menu-icon">
				<?php echo fiorello_mikado_get_icon_sources_html( 'side_area' ); ?>
            </span>
            </a>
		<?php }
	}
}