<?php

if (!function_exists('fiorello_mikado_sidearea_options_map')) {
    function fiorello_mikado_sidearea_options_map() {

        fiorello_mikado_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'fiorello'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = fiorello_mikado_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'fiorello'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'fiorello'),
                'description'   => esc_html__('Choose a type of Side Area', 'fiorello'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'fiorello'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'fiorello'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'fiorello'),
                ),
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'fiorello'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'fiorello'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = fiorello_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'fiorello'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'fiorello'),
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'fiorello'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'fiorello'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_icon_source',
                'default_value' => 'icon_pack',
                'label'         => esc_html__('Select Side Area Icon Source', 'fiorello'),
                'description'   => esc_html__('Choose whether you would like to use icons from an icon pack or SVG icons', 'fiorello'),
                'options'       => fiorello_mikado_get_icon_sources_array()
            )
        );

        $side_area_icon_pack_container = fiorello_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_icon_pack_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'icon_pack'
                    )
                )
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_icon_pack_container,
                'type'          => 'select',
                'name'          => 'side_area_icon_pack',
                'default_value' => 'font_elegant',
                'label'         => esc_html__('Side Area Icon Pack', 'fiorello'),
                'description'   => esc_html__('Choose icon pack for Side Area icon', 'fiorello'),
                'options'       => fiorello_mikado_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'dripicons', 'simple_line_icons'))
            )
        );

        $side_area_svg_icons_container = fiorello_mikado_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_svg_icons_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_icon_source' => 'svg_path'
                    )
                )
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_icon_svg_path',
                'label'       => esc_html__('Side Area Icon SVG Path', 'fiorello'),
                'description' => esc_html__('Enter your Side Area icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'fiorello'),
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'      => $side_area_svg_icons_container,
                'type'        => 'textarea',
                'name'        => 'side_area_close_icon_svg_path',
                'label'       => esc_html__('Side Area Close Icon SVG Path', 'fiorello'),
                'description' => esc_html__('Enter your Side Area close icon SVG path here. Please remove version and id attributes from your SVG path because of HTML validation', 'fiorello'),
            )
        );

        $side_area_icon_style_group = fiorello_mikado_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'fiorello'),
                'description' => esc_html__('Define styles for Side Area icon', 'fiorello')
            )
        );

        $side_area_icon_style_row1 = fiorello_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'fiorello')
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'fiorello')
            )
        );

        $side_area_icon_style_row2 = fiorello_mikado_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'fiorello')
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'fiorello')
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'fiorello'),
                'description' => esc_html__('Choose a background color for Side Area', 'fiorello')
            )
        );

		fiorello_mikado_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__('Background Image', 'fiorello'),
				'description' => esc_html__('Choose a background image for Side Area', 'fiorello')
			)
		);

        fiorello_mikado_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'fiorello'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'fiorello'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        fiorello_mikado_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'fiorello'),
                'description'   => esc_html__('Choose text alignment for side area', 'fiorello'),
                'options'       => array(
                    ''       => esc_html__('Default', 'fiorello'),
                    'left'   => esc_html__('Left', 'fiorello'),
                    'center' => esc_html__('Center', 'fiorello'),
                    'right'  => esc_html__('Right', 'fiorello')
                )
            )
        );
    }

    add_action('fiorello_mikado_action_options_map', 'fiorello_mikado_sidearea_options_map', 5);
}