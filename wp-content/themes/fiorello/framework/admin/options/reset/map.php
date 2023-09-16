<?php

if ( ! function_exists( 'fiorello_mikado_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function fiorello_mikado_reset_options_map() {
		
		fiorello_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'fiorello' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'fiorello' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'fiorello' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_options_map', 'fiorello_mikado_reset_options_map', 100 );
}