<?php

if ( ! function_exists( 'fiorello_mikado_logo_options_map' ) ) {
	function fiorello_mikado_logo_options_map() {

		$panel_logo = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Branding', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'fiorello' )
			)
		);
		
		$hide_logo_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'fiorello' ),
				'parent'        => $hide_logo_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'fiorello' ),
				'parent'        => $hide_logo_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'fiorello' ),
				'parent'        => $hide_logo_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'fiorello' ),
				'parent'        => $hide_logo_container
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'fiorello' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'fiorello_mikado_add_general_options_map_first', 'fiorello_mikado_logo_options_map', 2 );
}