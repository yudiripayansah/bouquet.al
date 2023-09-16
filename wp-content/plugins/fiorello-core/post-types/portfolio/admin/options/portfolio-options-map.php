<?php

if ( ! function_exists( 'fiorello_mikado_portfolio_options_map' ) ) {
	function fiorello_mikado_portfolio_options_map() {
		
		fiorello_mikado_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'fiorello-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = fiorello_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'fiorello-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'fiorello-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'fiorello-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'fiorello-core' ),
				'default_value' => '4',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is 4 columns', 'fiorello-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'2' => esc_html__( '2 Columns', 'fiorello-core' ),
					'3' => esc_html__( '3 Columns', 'fiorello-core' ),
					'4' => esc_html__( '4 Columns', 'fiorello-core' ),
					'5' => esc_html__( '5 Columns', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'fiorello-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'fiorello-core' ),
				'default_value' => 'normal',
				'options'       => fiorello_mikado_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'fiorello-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'fiorello-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'fiorello-core' ),
					'landscape' => esc_html__( 'Landscape', 'fiorello-core' ),
					'portrait'  => esc_html__( 'Portrait', 'fiorello-core' ),
					'square'    => esc_html__( 'Square', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'fiorello-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'fiorello-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'fiorello-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'fiorello-core' )
				)
			)
		);
		
		$panel = fiorello_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'fiorello-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'fiorello-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'fiorello-core' ),
				'parent'        => $panel,
				'options'       => array(
					'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'fiorello-core' ),
					'images'            => esc_html__( 'Portfolio Images', 'fiorello-core' ),
					'small-images'      => esc_html__( 'Portfolio Small Images', 'fiorello-core' ),
					'slider'            => esc_html__( 'Portfolio Slider', 'fiorello-core' ),
					'small-slider'      => esc_html__( 'Portfolio Small Slider', 'fiorello-core' ),
					'gallery'           => esc_html__( 'Portfolio Gallery', 'fiorello-core' ),
					'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'fiorello-core' ),
					'masonry'           => esc_html__( 'Portfolio Masonry', 'fiorello-core' ),
					'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'fiorello-core' ),
					'custom'            => esc_html__( 'Portfolio Custom', 'fiorello-core' ),
					'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'fiorello-core' )
				)
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'fiorello-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'fiorello-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'fiorello-core' ),
					'three' => esc_html__( '3 Columns', 'fiorello-core' ),
					'four'  => esc_html__( '4 Columns', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'fiorello-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'fiorello-core' ),
				'default_value' => 'normal',
				'options'       => fiorello_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = fiorello_mikado_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'fiorello-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'fiorello-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'fiorello-core' ),
					'three' => esc_html__( '3 Columns', 'fiorello-core' ),
					'four'  => esc_html__( '4 Columns', 'fiorello-core' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'fiorello-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'fiorello-core' ),
				'default_value' => 'normal',
				'options'       => fiorello_mikado_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'fiorello-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'fiorello-core' ),
					'yes' => esc_html__( 'Yes', 'fiorello-core' ),
					'no'  => esc_html__( 'No', 'fiorello-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'fiorello-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'fiorello-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'fiorello-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'fiorello-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'fiorello-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_options_map', 'fiorello_mikado_portfolio_options_map', 14 );
}