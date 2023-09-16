<?php
/*
Plugin Name: Fiorello Instagram Feed
Description: Plugin that adds Instagram feed functionality to our theme
Author: Mikado Themes
Version: 2.0.1
*/
$theme = wp_get_theme();
if ( 'Fiorello' == $theme->name || 'Fiorello' == $theme->parent_theme ) {
	define( 'FIORELLO_INSTAGRAM_FEED_VERSION', '2.0.1' );
	define( 'FIORELLO_INSTAGRAM_ABS_PATH', dirname( __FILE__ ) );
	define( 'FIORELLO_INSTAGRAM_REL_PATH', dirname( plugin_basename( __FILE__ ) ) );

	include_once 'load.php';

	if ( ! function_exists( 'fiorello_instagram_feed_text_domain' ) ) {
		/**
		 * Loads plugin text domain so it can be used in translation
		 */
		function fiorello_instagram_feed_text_domain() {
			load_plugin_textdomain( 'fiorello-instagram-feed', false, FIORELLO_INSTAGRAM_REL_PATH . '/languages' );
		}

		add_action( 'plugins_loaded', 'fiorello_instagram_feed_text_domain' );
	}
}