<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'fiorello_mikado_map_blog_meta' ) ) {
	function fiorello_mikado_map_blog_meta() {
		$mkd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'fiorello' ),
				'name'  => 'blog_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'fiorello' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'fiorello' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'fiorello' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'fiorello' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'fiorello' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'fiorello' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'fiorello' ),
					'in-grid'    => esc_html__( 'In Grid', 'fiorello' ),
					'full-width' => esc_html__( 'Full Width', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'fiorello' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'fiorello' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'fiorello' ),
					'two'   => esc_html__( '2 Columns', 'fiorello' ),
					'three' => esc_html__( '3 Columns', 'fiorello' ),
					'four'  => esc_html__( '4 Columns', 'fiorello' ),
					'five'  => esc_html__( '5 Columns', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'fiorello' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'fiorello' ),
				'options'     => fiorello_mikado_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'fiorello' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'fiorello' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'fiorello' ),
					'fixed'    => esc_html__( 'Fixed', 'fiorello' ),
					'original' => esc_html__( 'Original', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'fiorello' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'fiorello' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'fiorello' ),
					'standard'        => esc_html__( 'Standard', 'fiorello' ),
					'load-more'       => esc_html__( 'Load More', 'fiorello' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'fiorello' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'fiorello' )
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'fiorello' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'fiorello' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_blog_meta', 30 );
}