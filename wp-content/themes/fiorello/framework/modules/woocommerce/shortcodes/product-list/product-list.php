<?php

namespace FiorelloCore\CPT\Shortcodes\ProductList;

use FiorelloCore\Lib;

class ProductList implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_product_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Product List', 'fiorello' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list extended-custom-icon',
					'category'                  => esc_html__( 'by FIORELLO', 'fiorello' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Type', 'fiorello' ),
							'value'       => array(
								esc_html__( 'Standard', 'fiorello' ) => 'standard',
								esc_html__( 'Masonry', 'fiorello' )  => 'masonry'
							),
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'info_position',
							'heading'     => esc_html__( 'Product Info Position', 'fiorello' ),
							'value'       => array(
								esc_html__( 'Info On Image Hover', 'fiorello' ) => 'info-on-image',
								esc_html__( 'Info Below Image', 'fiorello' )    => 'info-below-image'
							),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'number_of_posts',
							'heading'    => esc_html__( 'Number of Products', 'fiorello' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'fiorello' ),
							'value'       => array(
								esc_html__( 'One', 'fiorello' )   => '1',
								esc_html__( 'Two', 'fiorello' )   => '2',
								esc_html__( 'Three', 'fiorello' ) => '3',
								esc_html__( 'Four', 'fiorello' )  => '4',
								esc_html__( 'Five', 'fiorello' )  => '5',
								esc_html__( 'Six', 'fiorello' )   => '6'
							),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'fiorello' ),
							'value'       => array_flip( fiorello_mikado_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'show_ordering_filter',
							'heading'     => esc_html__('Show Ordering Filter', 'fiorello'),
							'value'       => array_flip(fiorello_mikado_get_yes_no_select_array(false, false)),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'price_range',
							'heading'     => esc_html__('Price range for pricing filter', 'fiorello'),
							'dependency'  => array('element' => 'show_ordering_filter', 'value' => array('yes')),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'show_category_filter',
							'heading'     => esc_html__('Show Category Filter', 'fiorello'),
							'value'       => array_flip(fiorello_mikado_get_yes_no_select_array(false, false)),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'category_values',
							'heading'     => esc_html__('Enter Category Values', 'fiorello'),
							'description' => esc_html__('Separate values (category slugs) with a comma', 'fiorello'),
							'dependency'  => array('element' => 'show_category_filter', 'value' => array('yes')),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'show_all_item_in_filter',
							'heading'     => esc_html__('Show "All" Item in Filter', 'fiorello'),
							'value'       => array_flip(fiorello_mikado_get_yes_no_select_array(false, true)),
							'dependency'  => array('element' => 'show_category_filter', 'value' => array('yes')),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__('Order By', 'fiorello'),
							'value'       => array_flip( fiorello_mikado_get_query_order_by_array( false, array( 'on-sale' => esc_html__( 'On Sale', 'fiorello' ) ) ) ),
							'save_always' => true,
							'dependency'  => array('element' => 'show_ordering_filter', 'value' => array('no')),
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__('Order', 'fiorello'),
							'value'       => array_flip(fiorello_mikado_get_query_order_array()),
							'save_always' => true,
							'dependency'  => array('element' => 'show_ordering_filter', 'value' => array('no')),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'taxonomy_to_display',
							'heading'    => esc_html__('Choose Sorting Taxonomy', 'fiorello'),
							'value' => array(
								esc_html__('Category', 'fiorello') => 'category',
								esc_html__('Tag', 'fiorello')      => 'tag',
								esc_html__('Id', 'fiorello')       => 'id'
							),
							'save_always' => true,
							'description' => esc_html__('If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'fiorello'),
							'dependency'  => array('element' => 'show_category_filter', 'value' => array('no')),
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'taxonomy_values',
							'heading'     => esc_html__('Enter Taxonomy Values', 'fiorello'),
							'description' => esc_html__('Separate values (category slugs, tags, or post IDs) with a comma', 'fiorello'),
							'dependency'  => array('element' => 'show_category_filter', 'value' => array('no')),
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_size',
							'heading'    => esc_html__( 'Image Proportions', 'fiorello' ),
							'value'      => array(
								esc_html__( 'Default', 'fiorello' )        => '',
								esc_html__( 'Original', 'fiorello' )       => 'full',
								esc_html__( 'Square', 'fiorello' )         => 'square',
								esc_html__( 'Landscape', 'fiorello' )      => 'landscape',
								esc_html__( 'Portrait', 'fiorello' )       => 'portrait',
								esc_html__( 'Medium', 'fiorello' )         => 'medium',
								esc_html__( 'Large', 'fiorello' )          => 'large',
								esc_html__( 'Shop Single', 'fiorello' )    => 'woocommerce_single',
								esc_html__( 'Shop Thumbnail', 'fiorello' ) => 'woocommerce_thumbnail'
							),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'product_info_skin',
							'heading'    => esc_html__( 'Product Info Skin', 'fiorello' ),
							'value'      => array(
								esc_html__( 'Default', 'fiorello' ) => 'default',
								esc_html__( 'Light', 'fiorello' )   => 'light',
								esc_html__( 'Dark', 'fiorello' )    => 'dark'
							),
							'dependency' => array( 'element' => 'info_position', 'value' => array( 'info-on-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'display_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_category',
							'heading'    => esc_html__( 'Display Category', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Product Info', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( true, true ) ),
							'group'      => esc_html__( 'Product Info', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_button',
							'heading'    => esc_html__( 'Display Button', 'fiorello' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'group'      => esc_html__( 'Product Info', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'button_skin',
							'heading'    => esc_html__( 'Button Skin', 'fiorello' ),
							'value'      => array(
								esc_html__( 'Default', 'fiorello' ) => 'default',
								esc_html__( 'Light', 'fiorello' )   => 'light',
								esc_html__( 'Dark', 'fiorello' )    => 'dark'
							),
							'dependency' => array( 'element' => 'display_button', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'shader_background_color',
							'heading'    => esc_html__( 'Shader Background Color', 'fiorello' ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'info_bottom_text_align',
							'heading'    => esc_html__( 'Product Info Text Alignment', 'fiorello' ),
							'value'      => array(
								esc_html__( 'Default', 'fiorello' ) => '',
								esc_html__( 'Left', 'fiorello' )    => 'left',
								esc_html__( 'Center', 'fiorello' )  => 'center',
								esc_html__( 'Right', 'fiorello' )   => 'right'
							),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'info_bottom_margin',
							'heading'    => esc_html__( 'Product Info Bottom Margin (px)', 'fiorello' ),
							'dependency' => array( 'element' => 'info_position', 'value'   => array( 'info-below-image' ) ),
							'group'      => esc_html__( 'Product Info Style', 'fiorello' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'                    => 'standard',
			'info_position'           => 'info-on-image',
			'number_of_posts'         => '8',
			'number_of_columns'       => '4',
			'space_between_items'     => 'normal',
			'show_ordering_filter'	  => 'no',
			'price_range'	  		  => '',
			'orderby'                 => 'date',
			'order'                   => 'ASC',
			'show_category_filter' 	  => 'no',
			'category_values' 	  	  => '',
			'show_all_item_in_filter' => 'yes',
			'taxonomy_to_display'     => 'category',
			'taxonomy_values'         => '',
			'image_size'              => 'full',
			'display_title'           => 'yes',
			'product_info_skin'       => '',
			'title_tag'               => 'h6',
			'title_transform'         => '',
			'display_category'        => 'no',
			'display_rating'          => 'no',
			'display_price'           => 'yes',
			'display_button'          => 'yes',
			'button_skin'             => 'default',
			'shader_background_color' => '',
			'info_bottom_text_align'  => '',
			'info_bottom_margin'      => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['class_name']     = 'pli';
		$params['type']           = ! empty( $params['type'] ) ? $params['type'] : $default_atts['type'];
		$params['info_position']  = ! empty( $params['info_position'] ) ? $params['info_position'] : $default_atts['info_position'];
		$params['title_tag']      = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['layout_classes'] = $this->getLayoutClasses( $params );
		
		$additional_params                   = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		$additional_params['holder_data'] = $this->getHolderData($params);

		$params['category'] = ''; //used for ajax calling in category filter
		$params['meta_key'] = ''; //used for ajax calling in category filter
		$params['min_price'] = ''; //used for ajax calling in ordering filter
		$params['max_price'] = ''; //used for ajax calling in ordering filter
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = fiorello_mikado_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $default_atts ) {
		$holderClasses   = array();
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-' . $params['type'] . '-layout' : 'mkdf-' . $default_atts['type'] . '-layout';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = $this->getColumnNumberClass( $params );
		$holderClasses[] = ! empty( $params['info_position'] ) ? 'mkdf-' . $params['info_position'] : 'mkdf-' . $default_atts['info_position'];
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'mkdf-product-info-' . $params['product_info_skin'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getLayoutClasses( $params ) {
		$layoutClasses   = array();
		//change to true if hover is changed to from bottom
		$btn_from_bottom = false;
		$btn_position_class = '';

		if ( $params['info_position'] == 'info-below-image' && $btn_from_bottom) {
			$btn_position_class = 'mkdf-pli-button-from-bottom';
		} else {
			$btn_position_class = 'mkdf-pli-hover-overlay';
		}

		$layoutClasses[] = $btn_position_class;

		return implode( ' ', $layoutClasses );
	}
	
	private function getColumnNumberClass( $params ) {
		$columnsNumber = '';
		$columns       = $params['number_of_columns'];
		
		switch ( $columns ) {
			case 1:
				$columnsNumber = 'mkdf-one-column';
				break;
			case 2:
				$columnsNumber = 'mkdf-two-columns';
				break;
			case 3:
				$columnsNumber = 'mkdf-three-columns';
				break;
			case 4:
				$columnsNumber = 'mkdf-four-columns';
				break;
			case 5:
				$columnsNumber = 'mkdf-five-columns';
				break;
			case 6:
				$columnsNumber = 'mkdf-six-columns';
				break;
			default:
				$columnsNumber = 'mkdf-four-columns';
				break;
		}
		
		return $columnsNumber;
	}
	
	public function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}

		//used for ajax calling in ordering filter
		if($params['show_ordering_filter'] == 'yes') {
			unset($queryArray['orderby'], $queryArray['order']);

			if ($params['meta_key'] !== ''){
				$queryArray['orderby'] = $params['orderby'];
				$queryArray['order'] = $params['order'];
				$queryArray['meta_key'] = $params['meta_key'];
			}

			if($params['min_price'] !== '' || $params['max_price'] !== ''){
				$queryArray['meta_query'] = array(
					array(
						'key' => '_price',
						'value' => array($params['min_price'], $params['max_price']),
						'compare' => 'BETWEEN',
						'type' => 'NUMERIC'
					),
				);
			}
		}

		//used for ajax calling in category filter
		if($params['show_category_filter'] == 'yes'){
			if($params['category_values'] !== '' && $params['category'] == '') {
				$queryArray['product_cat'] = $params['category_values'];
			}else {
				$queryArray['product_cat'] = $params['category'];
			}
		}

		return $queryArray;
	}
	
	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'mkdf_product_featured_image_size', true );

		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = 'mkdf-woo-fixed-masonry mkdf-masonry-size-' . $image_size_meta;
		}
		
		return implode( ' ', $itemClasses );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . fiorello_mikado_filter_px( $params['info_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	/**
	 * Return product categories
	 *
	 * * @param $params
	 * @return string
	 */
	public function getProductCategoriesList($params) {
		$category_html = '';

		if($params['show_category_filter'] == 'yes') {
			$taxonomy = 'product_cat';
			$orderby = 'name';
			$show_count = 0;      // 1 for yes, 0 for no
			$pad_counts = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title = '';
			$empty = 0;
			$parent = 0;

			$args = array(
				'taxonomy' => $taxonomy,
				'orderby' => $orderby,
				'show_count' => $show_count,
				'pad_counts' => $pad_counts,
				'hierarchical' => $hierarchical,
				'title_li' => $title,
				'hide_empty' => $empty,
				'parent' => $parent
			);

			$all_categories_string = '';
			if($params['category_values'] == ''){

				$all_categories = get_categories($args);

			}else{
				$all_categories = array();
				$categories = explode(',',$params['category_values']);
				foreach ($categories as $cat){
					$all_categories[] = get_term_by( 'slug', $cat, 'product_cat' );
					$all_categories_string .= $cat.',';
				}
			}

			if($params['show_all_item_in_filter'] == 'yes') {
				$category_html .= '<li><a class="mkdf-no-smooth-transitions active" data-category="' . $all_categories_string . '" href="#">' . esc_html__('All', 'fiorello') . '</a></li>';
			}
			foreach ($all_categories as $cat) {
				$category_html .= '<li><a class="mkdf-no-smooth-transitions" data-category="'.$cat->slug.'" href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a></li>';

				$termchildren = get_term_children( $cat->term_id, 'product_cat' );

				if(!empty($termchildren)){
					foreach ( $termchildren as $child ) {
						$cat = get_term_by( 'id', $child, 'product_cat' );
						$category_html .= '<li><a class="mkdf-no-smooth-transitions" data-category="'.$cat->slug.'" href="' . get_term_link($child, 'product_cat') . '">' . $cat->name . '</a></li>';
					}
				}
			}
		}

		return $category_html;
	}

	/**
	 * Return products sort by
	 *
	 * * @param $params
	 * @return string
	 */
	public function getProductOrderingList($params) {
		$sorting_list_html = '';

		if($params['show_ordering_filter'] == 'yes') {
			$orderby_options = apply_filters('woocommerce_catalog_orderby', array(
				'menu_order' => esc_html__('Default', 'fiorello'),
				'popularity' => esc_html__('Popularity', 'fiorello'),
				'rating' => esc_html__('Average rating', 'fiorello'),
				'newness' => esc_html__('Newness', 'fiorello'),
				'price' => esc_html__('Price: Low to High', 'fiorello'),
				'price-desc' => esc_html__('Price: High to Low', 'fiorello')
			));

			if (get_option('woocommerce_enable_review_rating') === 'no') {
				unset($orderby_options['rating']);
			}

			foreach ($orderby_options as $key => $value) {
				$sorting_list_html .= '<li><a class="mkdf-no-smooth-transitions" data-ordering="'. $key .'" href="#">'. $value .'</a></li>';
			}
		}

		return $sorting_list_html;
	}

	/**
	 * Return products sort by
	 *
	 * * @param $params
	 * @return string
	 */
	public function getProductPricingList($params) {
		$pricing_list_html = '';

		if($params['show_ordering_filter'] == 'yes') {
			$range = $params['price_range'] !== '' ? $params['price_range'] : 10;
			$value = 0;

			$pricing_list_html .= '<li><a data-minPrice="" data-maxPrice="" href="#">' . esc_html__('All', 'fiorello') . '</a></li>';
			for ($i = 1; $i <= 5; $i++){
				if($i !== 5){
					$pricing_list_html .= '<li><a data-minPrice="'. $value .'" data-maxPrice="'. ($value+$range) .'" href="#">'. get_woocommerce_currency_symbol().$value .'-'.get_woocommerce_currency_symbol().($value+$range). '</a></li>';

				}else{
					$pricing_list_html .= '<li><a data-minPrice="'. ($value) .'" data-maxPrice="'.(100000000000).'" href="#">'. ($value).get_woocommerce_currency_symbol(). '+</a></li>';
				}

				$value += $range;
			}

		}

		return $pricing_list_html;
	}

	/**
	 * Generates data attributes array
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getHolderData($params){
		$dataString = '';
		unset($params['categories_filter_list'], $params['ordering_filter_list'], $params['pricing_filter_list'] );
		foreach ($params as $key => $value) {
			if($value !== '') {
				$new_key = str_replace( '_', '-', $key );

				$dataString .= ' data-'.$new_key.'="'.esc_attr($value).'"';
			}
		}

		return $dataString;
	}
}