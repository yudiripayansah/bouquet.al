<?php

if ( ! function_exists( 'fiorello_mikado_error_404_options_map' ) ) {
	function fiorello_mikado_error_404_options_map() {

		fiorello_mikado_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'fiorello' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);

		$panel_404_header = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'fiorello' ),
				'description' => esc_html__( 'Choose a background color for header area', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'fiorello' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'fiorello' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_border_color_header',
				'label'       => esc_html__( 'Border Color', 'fiorello' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'fiorello' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'fiorello' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'fiorello' ),
					'light-header' => esc_html__( 'Light', 'fiorello' ),
					'dark-header'  => esc_html__( 'Dark', 'fiorello' )
				)
			)
		);

		$panel_404_options = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'fiorello' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'fiorello' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'fiorello' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'fiorello' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'fiorello' )
			)
		);

		$first_level_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'fiorello' )
			)
		);

		$first_level_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_title_color',
				'label'  => esc_html__( 'Text Color', 'fiorello' ),
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' ),
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_row2 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);

		$first_level_group_responsive = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group_responsive',
				'title'       => esc_html__( 'Title Style Responsive', 'fiorello' ),
				'description' => esc_html__( 'Define responsive styles for 404 page title (under 680px)', 'fiorello' )
			)
		);

		$first_level_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group_responsive,
				'name'   => 'first_level_row3'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_title_responsive_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_title_responsive_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_title_responsive_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle', 'fiorello' ),
				'description'   => esc_html__( 'Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'fiorello' )
			)
		);

		$second_level_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Subtitle Style', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 404 page subtitle', 'fiorello' )
			)
		);

		$second_level_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_subtitle_color',
				'label'  => esc_html__( 'Text Color', 'fiorello' ),
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' ),
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_row2 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);

		$second_level_group_responsive = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group_responsive',
				'title'       => esc_html__( 'Subtitle Style Responsive', 'fiorello' ),
				'description' => esc_html__( 'Define responsive styles for 404 page subtitle (under 680px)', 'fiorello' )
			)
		);

		$second_level_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_group_responsive,
				'name'   => 'second_level_row3'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_responsive_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_responsive_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_responsive_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'fiorello' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'fiorello' )
			)
		);

		$third_level_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'fiorello' )
			)
		);

		$third_level_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_text_color',
				'label'  => esc_html__( 'Text Color', 'fiorello' ),
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' ),
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_row2 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);

		$third_level_group_responsive = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'third_level_group_responsive',
				'title'       => esc_html__( 'Text Style Responsive', 'fiorello' ),
				'description' => esc_html__( 'Define responsive styles for 404 page text (under 680px)', 'fiorello' )
			)
		);

		$third_level_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_group_responsive,
				'name'   => 'third_level_row3'
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_text_responsive_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_text_responsive_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => '404_text_responsive_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
	}

	add_action( 'fiorello_mikado_action_options_map', 'fiorello_mikado_error_404_options_map', 19 );
}