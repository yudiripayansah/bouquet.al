<?php

if ( ! function_exists( 'fiorello_mikado_get_hide_dep_for_header_main_menu_options' ) ) {
	function fiorello_mikado_get_hide_dep_for_header_main_menu_options() {
		$hide_dep_options = apply_filters( 'fiorello_mikado_filter_header_main_menu_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_header_main_navigation_options_map' ) ) {
	function fiorello_mikado_header_main_navigation_options_map() {
		$hide_dep_options = fiorello_mikado_get_hide_dep_for_header_main_menu_options();
		
		$panel_main_menu = fiorello_mikado_add_admin_panel(
			array(
				'title'           => esc_html__( 'Main Menu', 'fiorello' ),
				'name'            => 'panel_main_menu',
				'page'            => '_header_page',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name'   => 'main_menu_area_title',
				'title'  => esc_html__( 'Main Menu General Settings', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'wide_dropdown_style',
				'default_value' => 'full-width',
				'label'         => esc_html__( 'Wide Dropdown Style', 'fiorello' ),
				'options'		=> array(
					'full-width' => esc_html__('Full Width','fiorello'),
					'in-grid'	 => esc_html__('In Grid', 'fiorello'),
					'centered'	 => esc_html__('Centered', 'fiorello'),
				)
			)
		);
		
		$drop_down_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'drop_down_group',
				'title'       => esc_html__( 'Main Dropdown Menu', 'fiorello' ),
				'description' => esc_html__( 'Choose a color and transparency for the main menu background (0 = fully transparent, 1 = opaque)', 'fiorello' )
			)
		);
		
		$drop_down_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $drop_down_group,
				'name'   => 'drop_down_row1',
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $drop_down_row1,
				'type'          => 'textsimple',
				'name'          => 'dropdown_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'select',
				'name'          => 'menu_dropdown_appearance',
				'default_value' => 'dropdown-animate-height',
				'label'         => esc_html__( 'Main Dropdown Menu Appearance', 'fiorello' ),
				'description'   => esc_html__( 'Choose appearance for dropdown menu', 'fiorello' ),
				'options'       => array(
					'dropdown-default'        => esc_html__( 'Default', 'fiorello' ),
					'dropdown-animate-height' => esc_html__( 'Animate Height', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $panel_main_menu,
				'type'          => 'text',
				'name'          => 'dropdown_top_position',
				'default_value' => '',
				'label'         => esc_html__( 'Dropdown Position', 'fiorello' ),
				'description'   => esc_html__( 'Enter value in percentage of entire header height', 'fiorello' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => '%'
				)
			)
		);
		
		$first_level_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'first_level_group',
				'title'       => esc_html__( '1st Level Menu', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 1st level in Top Navigation Menu', 'fiorello' )
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
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover Text Color', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'menu_activecolor',
				'default_value' => '',
				'label'         => esc_html__( 'Active Text Color', 'fiorello' ),
			)
		);
		
		$first_level_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row3',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Light Menu Hover Text Color', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row3,
				'type'          => 'colorsimple',
				'name'          => 'menu_light_activecolor',
				'default_value' => '',
				'label'         => esc_html__( 'Light Menu Active Text Color', 'fiorello' ),
			)
		);
		
		$first_level_row4 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row4',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Dark Menu Hover Text Color', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row4,
				'type'          => 'colorsimple',
				'name'          => 'menu_dark_activecolor',
				'default_value' => '',
				'label'         => esc_html__( 'Dark Menu Active Text Color', 'fiorello' ),
			)
		);
		
		$first_level_row5 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row5',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'fontsimple',
				'name'          => 'menu_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' ),
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row5,
				'type'          => 'textsimple',
				'name'          => 'menu_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row6 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row6',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'textsimple',
				'name'          => 'menu_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row6,
				'type'          => 'selectblanksimple',
				'name'          => 'menu_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);
		
		$first_level_row7 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row7',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_padding_left_right',
				'default_value' => '',
				'label'         => esc_html__( 'Padding Left/Right', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $first_level_row7,
				'type'          => 'textsimple',
				'name'          => 'menu_margin_left_right',
				'default_value' => '',
				'label'         => esc_html__( 'Margin Left/Right', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_group',
				'title'       => esc_html__( '2nd Level Menu', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 2nd level in Top Navigation Menu', 'fiorello' )
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
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'fiorello' )
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
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row3',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);
		
		$second_level_wide_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'second_level_wide_group',
				'title'       => esc_html__( '2nd Level Wide Menu', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 2nd level in Wide Menu', 'fiorello' )
			)
		);
		
		$second_level_wide_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row1'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'fiorello' )
			)
		);
		
		$second_level_wide_row2 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row2',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_wide_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $second_level_wide_group,
				'name'   => 'second_level_wide_row3',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $second_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);
		
		$third_level_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_group',
				'title'       => esc_html__( '3nd Level Menu', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 3nd level in Top Navigation Menu', 'fiorello' )
			)
		);
		
		$third_level_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row1'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'fiorello' )
			)
		);
		
		$third_level_row2 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row2',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_font_size_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_line_height_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => 'third_level_row3',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_font_style_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_font_weight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_letter_spacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_text_transform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);
		
		$third_level_wide_group = fiorello_mikado_add_admin_group(
			array(
				'parent'      => $panel_main_menu,
				'name'        => 'third_level_wide_group',
				'title'       => esc_html__( '3rd Level Wide Menu', 'fiorello' ),
				'description' => esc_html__( 'Define styles for 3rd level in Wide Menu', 'fiorello' )
			)
		);
		
		$third_level_wide_row1 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row1'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_color_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Color', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row1,
				'type'          => 'colorsimple',
				'name'          => 'dropdown_wide_hovercolor_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Hover/Active Color', 'fiorello' )
			)
		);
		
		$third_level_wide_row2 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row2',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'fontsimple',
				'name'          => 'dropdown_wide_google_fonts_thirdlvl',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'fiorello' )
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_font_size_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row2,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_line_height_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_wide_row3 = fiorello_mikado_add_admin_row(
			array(
				'parent' => $third_level_wide_group,
				'name'   => 'third_level_wide_row3',
				'next'   => true
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_font_style_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_style_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_font_weight_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'fiorello' ),
				'options'       => fiorello_mikado_get_font_weight_array()
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'textsimple',
				'name'          => 'dropdown_wide_letter_spacing_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'fiorello' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'parent'        => $third_level_wide_row3,
				'type'          => 'selectblanksimple',
				'name'          => 'dropdown_wide_text_transform_thirdlvl',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'fiorello' ),
				'options'       => fiorello_mikado_get_text_transform_array()
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_header_main_navigation_options_map', 'fiorello_mikado_header_main_navigation_options_map', 10, 1 );
}