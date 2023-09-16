<?php

if ( ! function_exists( 'fiorello_core_import_object' ) ) {
	function fiorello_core_import_object() {
		$fiorello_core_import_object = new FiorelloCoreImport();
	}
	
	add_action( 'init', 'fiorello_core_import_object' );
}

if ( ! function_exists( 'fiorello_core_data_import' ) ) {
	function fiorello_core_data_import() {
		$importObject = FiorelloCoreImport::getInstance();
		
		if ( $_POST['import_attachments'] == 1 ) {
			$importObject->attachments = true;
		} else {
			$importObject->attachments = false;
		}
		
		$folder = "fiorello/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_content( $folder . $_POST['xml'] );
		
		die();
	}
	
	add_action( 'wp_ajax_fiorello_core_data_import', 'fiorello_core_data_import' );
}

if ( ! function_exists( 'fiorello_core_widgets_import' ) ) {
	function fiorello_core_widgets_import() {
		$importObject = FiorelloCoreImport::getInstance();
		
		$folder = "fiorello/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_fiorello_core_widgets_import', 'fiorello_core_widgets_import' );
}

if ( ! function_exists( 'fiorello_core_options_import' ) ) {
	function fiorello_core_options_import() {
		$importObject = FiorelloCoreImport::getInstance();
		
		$folder = "fiorello/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		
		die();
	}
	
	add_action( 'wp_ajax_fiorello_core_options_import', 'fiorello_core_options_import' );
}

if ( ! function_exists( 'fiorello_core_other_import' ) ) {
	function fiorello_core_other_import() {
		$importObject = FiorelloCoreImport::getInstance();
		
		$folder = "fiorello/";
		if ( ! empty( $_POST['example'] ) ) {
			$folder = $_POST['example'] . "/";
		}
		
		$importObject->import_options( $folder . 'options.txt' );
		$importObject->import_widgets( $folder . 'widgets.txt', $folder . 'custom_sidebars.txt' );
		$importObject->import_menus( $folder . 'menus.txt' );
		$importObject->import_settings_pages( $folder . 'settingpages.txt' );

		$importObject->mkdf_update_meta_fields_after_import($folder);
		$importObject->mkdf_update_options_after_import($folder);

		if ( fiorello_core_is_revolution_slider_installed() ) {
			$importObject->rev_slider_import( $folder );
		}
		
		die();
	}
	
	add_action( 'wp_ajax_fiorello_core_other_import', 'fiorello_core_other_import' );
}