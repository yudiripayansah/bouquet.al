<?php

namespace FiorelloCore\CPT\Shortcodes\Portfolio;

use FiorelloCore\Lib;

class PortfolioList implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_portfolio_list';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
		
		//Portfolio category filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio category render
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio selected projects filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio selected projects render
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)
		
		//Portfolio tag filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_tag_callback', array( &$this, 'portfolioTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio tag render
		add_filter( 'vc_autocomplete_mkdf_portfolio_list_tag_render', array( &$this, 'portfolioTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
					'name'     => esc_html__( 'Mikado Portfolio List', 'fiorello-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'icon'     => 'icon-wpb-portfolio extended-custom-icon',
					'params'   => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Portfolio List Template', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Gallery', 'fiorello-core' ) => 'gallery',
								esc_html__( 'Masonry', 'fiorello-core' ) => 'masonry'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_type',
							'heading'    => esc_html__( 'Click Behavior', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Open portfolio single page on click', 'fiorello-core' )   => '',
								esc_html__( 'Open gallery in Pretty Photo on click', 'fiorello-core' ) => 'gallery'
							)
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Default', 'fiorello-core' ) => '',
								esc_html__( 'One', 'fiorello-core' )     => '1',
								esc_html__( 'Two', 'fiorello-core' )     => '2',
								esc_html__( 'Three', 'fiorello-core' )   => '3',
								esc_html__( 'Four', 'fiorello-core' )    => '4',
								esc_html__( 'Five', 'fiorello-core' )    => '5'
							),
							'description' => esc_html__( 'Default value is Three', 'fiorello-core' ),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__( 'Number of Portfolios Per Page', 'fiorello-core' ),
							'description' => esc_html__( 'Set number of items for your portfolio list. Enter -1 to show all.', 'fiorello-core' ),
							'value'       => '-1'
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'image_proportions',
							'heading'     => esc_html__( 'Image Proportions', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Original', 'fiorello-core' )  => 'full',
								esc_html__( 'Square', 'fiorello-core' )    => 'square',
								esc_html__( 'Landscape', 'fiorello-core' ) => 'landscape',
								esc_html__( 'Portrait', 'fiorello-core' )  => 'portrait',
								esc_html__( 'Medium', 'fiorello-core' )    => 'medium',
								esc_html__( 'Large', 'fiorello-core' )     => 'large'
							),
							'description' => esc_html__( 'Set image proportions for your portfolio list.', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'gallery' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_fixed_proportions',
							'heading'     => esc_html__( 'Enable Fixed Image Proportions', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'description' => esc_html__( 'Set predefined image proportions for your masonry portfolio list. This option will apply image proportions you set in Portfolio Single page - dimensions for masonry option.', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'masonry' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_image_shadow',
							'heading'     => esc_html__( 'Enable Image Shadow', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'One-Category Portfolio List', 'fiorello-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'fiorello-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'selected_projects',
							'heading'     => esc_html__( 'Show Only Projects with Listed IDs', 'fiorello-core' ),
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true
							),
							'description' => esc_html__( 'Delimit ID numbers by comma (leave empty for all)', 'fiorello-core' )
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'tag',
							'heading'     => esc_html__( 'One-Tag Portfolio List', 'fiorello-core' ),
							'description' => esc_html__( 'Enter one tag slug (leave empty for showing all tags)', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'orderby',
							'heading'     => esc_html__( 'Order By', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_query_order_by_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order',
							'heading'     => esc_html__( 'Order', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_query_order_array() ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_style',
							'heading'    => esc_html__( 'Item Style', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Standard - Shader', 'fiorello-core' )                 => 'standard-shader',
								esc_html__( 'Standard - Zoom', 'fiorello-core' )                   => 'standard-zoom',
								esc_html__( 'Standard - Zoom and Shader', 'fiorello-core' )        => 'standard-zoom-shader',
								esc_html__( 'Standard - Switch Featured Images', 'fiorello-core' ) => 'standard-switch-images',
                                esc_html__( 'Gallery - Slide From Bottom Left', 'fiorello-core' )   => 'gallery-slide-from-bottom-left',
								esc_html__( 'Gallery - Overlay', 'fiorello-core' )                 => 'gallery-overlay',
								esc_html__( 'Gallery - Overlay with Icon', 'fiorello-core' )       => 'gallery-overlay-icon',
								esc_html__( 'Gallery - Overlay With Zoom', 'fiorello-core' )       => 'gallery-overlay-zoom',
								esc_html__( 'Gallery - Slide From Image Bottom', 'fiorello-core' ) => 'gallery-slide-from-image-bottom'
							),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_top_margin',
							'heading'    => esc_html__( 'Content Top Margin (px or %)', 'fiorello-core' ),
							'dependency' => array( 'element' => 'item_style', 'value' => array( 'standard-shader', 'standard-switch-images', 'standard-zoom', 'standard-zoom-shader' ) ),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'content_bottom_margin',
							'heading'    => esc_html__( 'Content Bottom Margin (px or %)', 'fiorello-core' ),
							'dependency' => array( 'element' => 'item_style', 'value' => array( 'standard-shader', 'standard-switch-images', 'standard-zoom', 'standard-zoom-shader' ) ),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_title',
							'heading'    => esc_html__( 'Enable Title', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'dependency' => array('element' => 'item_style', 'value' => array('standard-shader','standard-zoom','standard-zoom-shader','standard-switch-images','gallery-overlay','gallery-overlay-zoom','gallery-slide-from-bottom-left','gallery-slide-from-image-bottom')),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_tag',
							'heading'    => esc_html__( 'Title Tag', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_title_tag( true ) ),
							'dependency' => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'title_text_transform',
							'heading'    => esc_html__( 'Title Text Transform', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'enable_title', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_category',
							'heading'    => esc_html__( 'Enable Category', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'dependency' => array('element' => 'item_style', 'value' => array('standard-shader','standard-zoom','standard-zoom-shader','standard-switch-images','gallery-overlay','gallery-overlay-zoom','gallery-slide-from-bottom-left','gallery-slide-from-image-bottom')),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_count_images',
							'heading'    => esc_html__( 'Enable Number of Images', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'dependency' => array( 'element' => 'type', 'value' => array( 'gallery' ) ),
							'description'=> esc_html__('This info will be shown if chosen item style supports it','fiorello-core'),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'enable_excerpt',
							'heading'    => esc_html__( 'Enable Excerpt', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'dependency' => array('element' => 'item_style', 'value' => array('standard-shader','standard-zoom','standard-zoom-shader','standard-switch-images')),
							'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'excerpt_length',
							'heading'     => esc_html__( 'Excerpt Length', 'fiorello-core' ),
							'description' => esc_html__( 'Number of characters', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'enable_excerpt', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Content Layout', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'pagination_type',
							'heading'    => esc_html__( 'Pagination Type', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'None', 'fiorello-core' )            => 'no-pagination',
								esc_html__( 'Standard', 'fiorello-core' )        => 'standard',
								esc_html__( 'Load More', 'fiorello-core' )       => 'load-more',
								esc_html__( 'Infinite Scroll', 'fiorello-core' ) => 'infinite-scroll'
							),
							'group'      => esc_html__( 'Additional Features', 'fiorello-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'load_more_top_margin',
							'heading'    => esc_html__( 'Load More Top Margin (px or %)', 'fiorello-core' ),
							'dependency' => array( 'element' => 'pagination_type', 'value' => array( 'load-more' ) ),
							'group'      => esc_html__( 'Additional Features', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter',
							'heading'    => esc_html__( 'Enable Category Filter', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'group'      => esc_html__( 'Additional Features', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter_order_by',
							'heading'    => esc_html__( 'Filter Order By', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Name', 'fiorello-core' )  => 'name',
								esc_html__( 'Count', 'fiorello-core' ) => 'count',
								esc_html__( 'Id', 'fiorello-core' )    => 'id',
								esc_html__( 'Slug', 'fiorello-core' )  => 'slug'
							),
							'dependency' => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Additional Features', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'filter_text_transform',
							'heading'    => esc_html__( 'Filter Text Transform', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_text_transform_array( true ) ),
							'dependency' => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Additional Features', 'fiorello-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'filter_bottom_margin',
							'heading'    => esc_html__( 'Filter Bottom Margin (px or %)', 'fiorello-core' ),
							'dependency' => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Additional Features', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_article_animation',
							'heading'     => esc_html__( 'Enable Article Animation', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'description' => esc_html__( 'Enabling this option you will enable appears animation for your portfolio list items', 'fiorello-core' ),
							'group'       => esc_html__( 'Additional Features', 'fiorello-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'type'                     => 'gallery',
			'item_type'                => '',
			'number_of_columns'        => '3',
			'space_between_items'      => 'normal',
			'number_of_items'          => '-1',
			'image_proportions'        => 'full',
			'enable_fixed_proportions' => 'no',
			'enable_image_shadow'      => 'no',
			'category'                 => '',
			'selected_projects'        => '',
			'tag'                      => '',
			'orderby'                  => 'date',
			'order'                    => 'ASC',
			'item_style'               => 'standard-shader',
			'content_top_margin' 	   => '',
			'content_bottom_margin'    => '',
			'enable_title'             => 'yes',
			'title_tag'                => 'h6',
			'title_text_transform'     => '',
			'enable_category'          => 'yes',
			'enable_count_images'      => 'yes',
			'enable_excerpt'           => 'no',
			'excerpt_length'           => '20',
			'pagination_type'          => 'no-pagination',
			'load_more_top_margin'     => '',
			'filter'                   => 'no',
			'filter_order_by'          => 'name',
			'filter_text_transform'    => '',
			'filter_bottom_margin'     => '',
			'enable_article_animation' => 'no',
			'portfolio_slider_on'      => 'no',
			'enable_loop'              => 'yes',
			'enable_autoplay'          => 'yes',
			'slider_speed'             => '5000',
			'slider_speed_animation'   => '600',
			'enable_navigation'        => 'yes',
			'navigation_skin'          => '',
			'enable_pagination'        => 'yes',
			'pagination_skin'          => '',
			'pagination_position'      => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		/***
		 * @params query_results
		 * @params holder_data
		 * @params holder_classes
		 * @params holder_inner_classes
		 */
		$additional_params = array();
		
		$query_array                        = $this->getQueryArray( $params );
		$query_results                      = new \WP_Query( $query_array );
		$additional_params['query_results'] = $query_results;
		
		$additional_params['holder_data']          = fiorello_mikado_get_holder_data_for_cpt( $params, $additional_params );
		$additional_params['holder_classes']       = $this->getHolderClasses( $params, $args );
		$additional_params['holder_inner_classes'] = $this->getHolderInnerClasses( $params );
		
		$params['this_object'] = $this;
		
		$html = fiorello_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-list', 'portfolio-holder', $params['type'], $params, $additional_params );
		
		return $html;
	}
	
	public function getQueryArray( $params ) {
		$query_array = array(
			'post_status'    => 'publish',
			'post_type'      => 'portfolio-item',
			'posts_per_page' => $params['number_of_items'],
			'orderby'        => $params['orderby'],
			'order'          => $params['order']
		);
		
		if ( ! empty( $params['category'] ) ) {
			$query_array['portfolio-category'] = $params['category'];
		}
		
		$project_ids = null;
		if ( ! empty( $params['selected_projects'] ) ) {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['post__in'] = $project_ids;
		}
		
		if ( ! empty( $params['tag'] ) ) {
			$query_array['portfolio-tag'] = $params['tag'];
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}
		
		return $query_array;
	}
	
	public function getHolderClasses( $params, $args ) {
		$classes = array();
		
		$classes[] = ! empty( $params['type'] ) ? 'mkdf-pl-' . $params['type'] : 'mkdf-pl-' . $args['type'];
		$classes[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $args['space_between_items'] . '-space';
		
		$number_of_columns = $params['number_of_columns'];
		switch ( $number_of_columns ):
			case '1':
				$classes[] = 'mkdf-pl-one-column';
				break;
			case '2':
				$classes[] = 'mkdf-pl-two-columns';
				break;
			case '3':
				$classes[] = 'mkdf-pl-three-columns';
				break;
			case '4':
				$classes[] = 'mkdf-pl-four-columns';
				break;
			case '5':
				$classes[] = 'mkdf-pl-five-columns';
				break;
			default:
				$classes[] = 'mkdf-pl-three-columns';
				break;
		endswitch;
		
		$classes[] = ! empty( $params['item_style'] ) ? 'mkdf-pl-' . $params['item_style'] : '';
		$classes[] = $params['enable_fixed_proportions'] === 'yes' ? 'mkdf-masonry-images-fixed' : '';
		$classes[] = $params['enable_image_shadow'] === 'yes' ? 'mkdf-pl-has-shadow' : '';
		$classes[] = $params['enable_title'] === 'no' && $params['enable_category'] === 'no' && $params['enable_excerpt'] === 'no' ? 'mkdf-pl-no-content' : '';
		$classes[] = ! empty( $params['pagination_type'] ) ? 'mkdf-pl-pag-' . $params['pagination_type'] : '';
		$classes[] = $params['filter'] === 'yes' ? 'mkdf-pl-has-filter' : '';
		$classes[] = $params['enable_article_animation'] === 'yes' ? 'mkdf-pl-has-animation' : '';
		$classes[] = ! empty( $params['navigation_skin'] ) ? 'mkdf-nav-' . $params['navigation_skin'] . '-skin' : '';
		$classes[] = ! empty( $params['pagination_skin'] ) ? 'mkdf-pag-' . $params['pagination_skin'] . '-skin' : '';
		$classes[] = ! empty( $params['pagination_position'] ) ? 'mkdf-pag-' . $params['pagination_position'] : '';
		
		return implode( ' ', $classes );
	}
	
	public function getHolderInnerClasses( $params ) {
		$classes = array();
		
		$classes[] = $params['portfolio_slider_on'] === 'yes' ? 'mkdf-owl-slider mkdf-pl-is-slider' : '';
		
		return implode( ' ', $classes );
	}
	
	public function getArticleClasses( $params ) {
		$classes = array();
		
		$type       = $params['type'];
		$item_style = $params['item_style'];
		
		if ( get_post_meta( get_the_ID(), "mkdf_portfolio_featured_image_meta", true ) !== "" && $item_style === 'standard-switch-images' ) {
			$classes[] = 'mkdf-pl-has-switch-image';
		} elseif ( get_post_meta( get_the_ID(), "mkdf_portfolio_featured_image_meta", true ) === "" && $item_style === 'standard-switch-images' ) {
			$classes[] = 'mkdf-pl-no-switch-image';
		}
		
		$image_proportion = $params['enable_fixed_proportions'] === 'yes' ? 'fixed' : 'original';
		$masonry_size     = get_post_meta( get_the_ID(), 'mkdf_portfolio_masonry_' . $image_proportion . '_dimensions_meta', true );

		$classes[] = ! empty( $masonry_size ) && $type === 'masonry' ? 'mkdf-masonry-size-' . esc_attr( $masonry_size ) : '';

		$article_classes = get_post_class( $classes );
		
		return implode( ' ', $article_classes );
	}
	
	public function getImageSize( $params ) {
		$thumb_size = 'full';
		
		if ( ! empty( $params['image_proportions'] ) && $params['type'] == 'gallery' ) {
			$image_size = $params['image_proportions'];
			
			switch ( $image_size ) {
				case 'landscape':
					$thumb_size = 'fiorello_mikado_landscape';
					break;
				case 'portrait':
					$thumb_size = 'fiorello_mikado_portrait';
					break;
				case 'square':
					$thumb_size = 'fiorello_mikado_square';
					break;
				case 'medium':
					$thumb_size = 'medium';
					break;
				case 'large':
					$thumb_size = 'large';
					break;
				case 'full':
					$thumb_size = 'full';
					break;
			}
		}
		
		if ( $params['type'] == 'masonry' && $params['enable_fixed_proportions'] === 'yes' ) {
			$fixed_image_size = get_post_meta( get_the_ID(), 'mkdf_portfolio_masonry_fixed_dimensions_meta', true );
			
			switch ( $fixed_image_size ) {
				case 'small' :
					$thumb_size = 'fiorello_mikado_square';
					break;
				case 'large-width':
					$thumb_size = 'fiorello_mikado_landscape';
					break;
				case 'large-height':
					$thumb_size = 'fiorello_mikado_portrait';
					break;
				case 'large-width-height':
					$thumb_size = 'fiorello_mikado_huge';
					break;
				default :
					$thumb_size = 'full';
					break;
			}
		}
		
		return $thumb_size;
	}

	public function getStandardContentStyles( $params ) {
		$styles = array();

		$margin_top    = isset( $params['content_top_margin'] ) ? $params['content_top_margin'] : '';
		$margin_bottom = isset( $params['content_bottom_margin'] ) ? $params['content_bottom_margin'] : '';

		if ( ! empty( $margin_top ) ) {
			if ( fiorello_mikado_string_ends_with( $margin_top, '%' ) || fiorello_mikado_string_ends_with( $margin_top, 'px' ) ) {
				$styles[] = 'margin-top: ' . $margin_top;
			} else {
				$styles[] = 'margin-top: ' . fiorello_mikado_filter_px( $margin_top ) . 'px';
			}
		}

		if ( ! empty( $margin_bottom ) ) {
			if ( fiorello_mikado_string_ends_with( $margin_bottom, '%' ) || fiorello_mikado_string_ends_with( $margin_bottom, 'px' ) ) {
				$styles[] = 'margin-bottom: ' . $margin_bottom;
			} else {
				$styles[] = 'margin-bottom: ' . fiorello_mikado_filter_px( $margin_bottom ) . 'px';
			}
		}

		return implode( ';', $styles );
	}
	
	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_text_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getSwitchFeaturedImage() {
		$featured_image_meta = get_post_meta( get_the_ID(), 'mkdf_portfolio_featured_image_meta', true );
		
		$featured_image = ! empty( $featured_image_meta ) ? esc_url( $featured_image_meta ) : '';
		
		return $featured_image;
	}
	
	public function getLoadMoreStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['load_more_top_margin'] ) ) {
			$margin = $params['load_more_top_margin'];
			
			if ( fiorello_mikado_string_ends_with( $margin, '%' ) || fiorello_mikado_string_ends_with( $margin, 'px' ) ) {
				$styles[] = 'margin-top: ' . $margin;
			} else {
				$styles[] = 'margin-top: ' . fiorello_mikado_filter_px( $margin ) . 'px';
			}
		}
		
		return implode( ';', $styles );
	}
	
	public function getFilterCategories( $params ) {
		$cat_id = 0;
		
		if ( ! empty( $params['category'] ) ) {
			$top_category = get_term_by( 'slug', $params['category'], 'portfolio-category' );
			
			if ( isset( $top_category->term_id ) ) {
				$cat_id = $top_category->term_id;
			}
		}
		
		$order = $params['filter_order_by'] === 'count' ? 'DESC' : 'ASC';
		
		$args = array(
			'taxonomy' => 'portfolio-category',
			'child_of' => $cat_id,
			'orderby'  => $params['filter_order_by'],
			'order'    => $order
		);
		
		$filter_categories = get_terms( $args );
		
		return $filter_categories;
	}
	
	public function getFilterHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['filter_bottom_margin'] ) ) {
			$margin = $params['filter_bottom_margin'];
			
			if ( fiorello_mikado_string_ends_with( $margin, '%' ) || fiorello_mikado_string_ends_with( $margin, 'px' ) ) {
				$styles[] = 'margin-bottom: ' . $margin;
			} else {
				$styles[] = 'margin-bottom: ' . fiorello_mikado_filter_px( $margin ) . 'px';
			}
		}
		
		return implode( ';', $styles );
	}
	
	public function getFilterStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['filter_text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['filter_text_transform'];
		}
		
		return implode( ';', $styles );
	}
	
	public function getItemLink() {
		$portfolio_link_meta = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link      = ! empty( $portfolio_link_meta ) ? $portfolio_link_meta : get_permalink( get_the_ID() );
		
		return apply_filters( 'fiorello_mikado_filter_portfolio_external_link', $portfolio_link );
	}
	
	public function getItemLinkTarget() {
		$portfolio_link_meta   = get_post_meta( get_the_ID(), 'portfolio_external_link', true );
		$portfolio_link_target = ! empty( $portfolio_link_meta ) ? '_blank' : '_self';
		
		return apply_filters( 'fiorello_mikado_filter_portfolio_external_link_target', $portfolio_link_target );
	}
	
	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'fiorello-core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {
				
				$portfolio_category_slug  = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;
				
				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'fiorello-core' ) . ': ' . $portfolio_category_title;
				}
				
				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
	
	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'fiorello-core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'fiorello-core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {
				
				$portfolio_id    = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;
				
				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'fiorello-core' ) . ': ' . $portfolio_title;
				}
				
				$portfolio_id_display = esc_html__( 'Id', 'fiorello-core' ) . ': ' . $portfolio_id;
				
				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
	
	/**
	 * Filter portfolio tags
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioTagAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_tag_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-tag' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_tag_title'] ) > 0 ) ? esc_html__( 'Tag', 'fiorello-core' ) . ': ' . $value['portfolio_tag_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find portfolio tag by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioTagAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_tag = get_term_by( 'slug', $query, 'portfolio-tag' );
			if ( is_object( $portfolio_tag ) ) {
				
				$portfolio_tag_slug  = $portfolio_tag->slug;
				$portfolio_tag_title = $portfolio_tag->name;
				
				$portfolio_tag_title_display = '';
				if ( ! empty( $portfolio_tag_title ) ) {
					$portfolio_tag_title_display = esc_html__( 'Tag', 'fiorello-core' ) . ': ' . $portfolio_tag_title;
				}
				
				$data          = array();
				$data['value'] = $portfolio_tag_slug;
				$data['label'] = $portfolio_tag_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
}