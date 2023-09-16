<?php

if ( !function_exists('fiorello_core_load_widget_class') ) {
	/**
	 * Loades widget class file.
	 */
	function fiorello_core_load_widget_class() {
		include_once FIORELLO_CORE_ABS_PATH . '/widgets/lib/widget-class.php';
	}
	
	add_action('fiorello_mikado_action_before_options_map', 'fiorello_core_load_widget_class');
}

if ( !function_exists('fiorello_core_load_widgets') ) {
	/**
	 * Loades all widgets by going through all folders that are placed directly in widgets folder
	 * and loads load.php file in each. Hooks to fiorello_mikado_action_after_options_map action
	 */
	function fiorello_core_load_widgets() {
		
		if ( fiorello_core_theme_installed() ) {
			foreach ( glob(FIORELLO_CORE_ABS_PATH . '/widgets/*/load.php') as $widget_load ) {
				include_once $widget_load;
			}
		}
		
		include_once FIORELLO_CORE_ABS_PATH . '/widgets/lib/widget-loader.php';
	}
	
	add_action('fiorello_mikado_action_before_options_map', 'fiorello_core_load_widgets');
}