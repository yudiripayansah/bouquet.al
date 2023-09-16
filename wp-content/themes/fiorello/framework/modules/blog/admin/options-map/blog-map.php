<?php

if ( ! function_exists( 'fiorello_mikado_get_blog_list_types_options' ) ) {
	function fiorello_mikado_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'fiorello_mikado_filter_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'fiorello_mikado_blog_options_map' ) ) {
	function fiorello_mikado_blog_options_map() {
		$blog_list_type_options = fiorello_mikado_get_blog_list_types_options();
		
		fiorello_mikado_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'fiorello' ),
				'icon'  => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'blog_list_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'fiorello' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for blog post lists. Default value is large', 'fiorello' ),
				'options'     => fiorello_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_blog_lists
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'fiorello' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'fiorello' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'fiorello' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'fiorello' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
                'options'       => fiorello_mikado_get_custom_sidebars_options(),
			)
		);
		
		$fiorello_custom_sidebars = fiorello_mikado_get_custom_sidebars();
		if ( count( $fiorello_custom_sidebars ) > 0 ) {
			fiorello_mikado_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'fiorello' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'fiorello' ),
					'parent'      => $panel_blog_lists,
					'options'     => fiorello_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'fiorello' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'fiorello' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'fiorello' ),
					'full-width' => esc_html__( 'Full Width', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'fiorello' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'fiorello' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'fiorello' ),
					'three' => esc_html__( '3 Columns', 'fiorello' ),
					'four'  => esc_html__( '4 Columns', 'fiorello' ),
					'five'  => esc_html__( '5 Columns', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'fiorello' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'fiorello' ),
				'default_value' => 'normal',
				'options'       => fiorello_mikado_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'fiorello' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'fiorello' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'fiorello' ),
					'original' => esc_html__( 'Original', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'fiorello' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'fiorello' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'fiorello' ),
					'load-more'       => esc_html__( 'Load More', 'fiorello' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'fiorello' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'fiorello' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'fiorello' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = fiorello_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'fiorello' )
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'name'        => 'blog_single_grid_space',
				'type'        => 'select',
				'label'       => esc_html__( 'Grid Layout Space', 'fiorello' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for Blog Single pages. Default value is large', 'fiorello' ),
				'options'     => fiorello_mikado_get_space_between_items_array( true ),
				'parent'      => $panel_blog_single
			)
		);

		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'fiorello' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'fiorello' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
                'options'       => fiorello_mikado_get_custom_sidebars_options()
			)
		);
		
		if ( count( $fiorello_custom_sidebars ) > 0 ) {
			fiorello_mikado_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'fiorello' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'fiorello' ),
					'parent'      => $panel_blog_single,
					'options'     => fiorello_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'fiorello' ),
				'parent'        => $panel_blog_single,
				'options'       => fiorello_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'fiorello' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'fiorello' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'fiorello' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'fiorello' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'fiorello' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_navigation_container = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_navigation_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_single_navigation' => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'fiorello' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'fiorello' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'fiorello' ),
				'parent'        => $panel_blog_single
			)
		);
		
		$blog_single_author_info_container = fiorello_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_author_info_container',
				'parent'          => $panel_blog_single,
				'dependency' => array(
					'show' => array(
						'blog_author_info' => 'yes'
					)
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'fiorello' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'fiorello' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'fiorello' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'fiorello_mikado_action_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'fiorello_mikado_action_options_map', 'fiorello_mikado_blog_options_map', 13 );
}