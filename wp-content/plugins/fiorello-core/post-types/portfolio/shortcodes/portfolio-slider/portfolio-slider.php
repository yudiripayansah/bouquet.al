<?php

namespace FiorelloCore\CPT\Shortcodes\Portfolio;

use FiorelloCore\Lib;

class PortfolioSlider implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_portfolio_slider';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
		
		//Portfolio category filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_slider_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio category render
		add_filter( 'vc_autocomplete_mkdf_portfolio_slider_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio selected projects filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_slider_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio selected projects render
		add_filter( 'vc_autocomplete_mkdf_portfolio_slider_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)
		
		//Portfolio tag filter
		add_filter( 'vc_autocomplete_mkdf_portfolio_slider_tag_callback', array( &$this, 'portfolioTagAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Portfolio tag render
		add_filter( 'vc_autocomplete_mkdf_portfolio_slider_tag_render', array( &$this, 'portfolioTagAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Mikado Portfolio Slider', 'fiorello-core' ),
					'base'     => $this->base,
					'category' => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'icon'     => 'icon-wpb-portfolio-slider extended-custom-icon',
					'params'   => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'number_of_items',
							'heading'     => esc_html__( 'Number of Portfolios Items', 'fiorello-core' ),
							'admin_label' => true,
							'description' => esc_html__( 'Set number of items for your portfolio slider. Enter -1 to show all', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'item_type',
							'heading'    => esc_html__( 'Click Behavior', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Open portfolio single page on click', 'fiorello-core' )   => '',
								esc_html__( 'Open gallery in Pretty Photo on click', 'fiorello-core' ) => 'gallery',
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
							'description' => esc_html__( 'Number of portfolios that are showing at the same time in slider (on smaller screens is responsive so there will be less items shown). Default value is Four', 'fiorello-core' ),
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
							'description' => esc_html__( 'Set image proportions for your portfolio slider.', 'fiorello-core' ),
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
                            'param_name' => 'enable_fullscreen',
                            'heading'    => esc_html__( 'Enable Fullscreen mode', 'fiorello-core' ),
                            'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
                            'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'fullscreen_minus_header',
                            'heading'    => esc_html__( 'Subtract header and pagination height from slider height', 'fiorello-core' ),
                            'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
                            'dependency' => array( 'element' => 'enable_fullscreen', 'value' => array( 'yes' ) ),
                            'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'fullscreen_scrollable',
                            'heading'    => esc_html__( 'Enable slide navigation on mousewheel scroll', 'fiorello-core' ),
                            'value'      => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
                            'dependency' => array( 'element' => 'enable_fullscreen', 'value' => array( 'yes' ) ),
                            'group'      => esc_html__( 'Content Layout', 'fiorello-core' )
                        ),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'item_style',
							'heading'     => esc_html__( 'Item Style', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Standard - Shader', 'fiorello-core' )                 => 'standard-shader',
								esc_html__( 'Standard - Zoom', 'fiorello-core' )                   => 'standard-zoom',
								esc_html__( 'Standard - Zoom and Shader', 'fiorello-core' )        => 'standard-zoom-shader',
								esc_html__( 'Standard - Switch Featured Images', 'fiorello-core' ) => 'standard-switch-images',
                                esc_html__( 'Gallery - Slide From Bottom Left', 'fiorello-core' )  => 'gallery-slide-from-bottom-left',
								esc_html__( 'Gallery - Overlay', 'fiorello-core' )                 => 'gallery-overlay',
								esc_html__( 'Gallery - Overlay with Icon', 'fiorello-core' )       => 'gallery-overlay-icon',
								esc_html__( 'Gallery - Overlay With Zoom', 'fiorello-core' )       => 'gallery-overlay-zoom',
								esc_html__( 'Gallery - Slide From Image Bottom', 'fiorello-core' ) => 'gallery-slide-from-image-bottom'
							),
							'save_always' => true,
							'group'       => esc_html__( 'Content Layout', 'fiorello-core' )
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
							'dependency' => array( 'element' => 'item_type', 'value' => array( 'gallery' ) ),
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
							'type'        => 'dropdown',
							'param_name'  => 'enable_loop',
							'heading'     => esc_html__( 'Enable Slider Loop', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, false ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'item_type', 'value' => array( '' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'fiorello-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'fiorello-core' ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'fiorello-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'fiorello-core' ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'navigation_skin',
							'heading'    => esc_html__( 'Navigation Skin', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Default', 'fiorello-core' ) => '',
								esc_html__( 'Light', 'fiorello-core' )   => 'light',
								esc_html__( 'Dark', 'fiorello-core' )    => 'dark'
							),
							'dependency' => array( 'element' => 'enable_navigation', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'pagination_skin',
							'heading'    => esc_html__( 'Pagination Skin', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Default', 'fiorello-core' ) => '',
								esc_html__( 'Light', 'fiorello-core' )   => 'light',
								esc_html__( 'Dark', 'fiorello-core' )    => 'dark'
							),
							'dependency' => array( 'element' => 'enable_pagination', 'value' => array( 'yes' ) ),
							'group'      => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'pagination_position',
							'heading'     => esc_html__( 'Pagination Position', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Below Slider', 'fiorello-core' ) => 'below-slider',
								esc_html__( 'On Slider', 'fiorello-core' )    => 'on-slider'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'enable_pagination', 'value' => array( 'yes' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'number_of_items'        => '9',
			'item_type'              => '',
			'number_of_columns'      => '4',
			'space_between_items'    => 'normal',
			'image_proportions'      => 'full',
			'category'               => '',
			'selected_projects'      => '',
			'tag'                    => '',
			'orderby'                => 'date',
			'order'                  => 'ASC',
			'item_style'             => 'standard-shader',
			'content_top_margin'	 => '',
			'content_bottom_margin'	 => '',
			'enable_title'           => 'yes',
			'title_tag'              => 'h4',
			'title_text_transform'   => '',
			'enable_category'        => 'yes',
			'enable_count_images'    => 'yes',
			'enable_excerpt'         => 'no',
			'excerpt_length'         => '20',
			'enable_loop'            => 'no',
			'enable_autoplay'        => 'yes',
			'slider_speed'           => '5000',
			'slider_speed_animation' => '600',
			'enable_navigation'      => 'yes',
			'navigation_skin'        => '',
			'enable_pagination'      => 'yes',
            'enable_fullscreen'      => 'no',
            'fullscreen_minus_header'=> '',
            'fullscreen_scrollable'=> 'yes',
			'pagination_skin'        => '',
			'pagination_position'    => 'below-slider'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['type']                = 'gallery';
		$params['portfolio_slider_on'] = 'yes';

		$holder_classes = $this->getHolderClasses($params);

		$html = '<div class="'.esc_attr($holder_classes).'">';
			$html .= fiorello_mikado_execute_shortcode( 'mkdf_portfolio_list', $params );
		$html .= '</div>';
		
		return $html;
	}

	private function getHolderClasses($params){
	    $classes = array();
	    $classes[] = 'mkdf-portfolio-slider-holder';

	    if ($params['enable_fullscreen'] == 'yes') {
	        $classes[] = 'mkdf-ps-fullscreen';

	        if ($params['fullscreen_minus_header'] == 'yes') {
	            $classes[] = 'mkdf-ps-minus-header';
            }
            if ($params['fullscreen_scrollable'] == 'yes') {
                $classes[] = 'mkdf-ps-scrollable';
            }

        }

        return implode(' ', $classes);
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