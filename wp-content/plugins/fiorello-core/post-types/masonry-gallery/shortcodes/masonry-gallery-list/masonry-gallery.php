<?php

namespace FiorelloCore\CPT\Shortcodes\MasonryGallery;

use FiorelloCore\Lib;

class MasonryGallery implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_masonry_gallery';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
		
		//Masonry Gallery category filter
		add_filter( 'vc_autocomplete_mkdf_masonry_gallery_category_callback', array( &$this, 'masonryGalleryCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array
		
		//Masonry Gallery category render
		add_filter( 'vc_autocomplete_mkdf_masonry_gallery_category_render', array( &$this, 'masonryGalleryCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Masonry Gallery', 'fiorello-core' ),
					'base'                      => $this->base,
					'category'                  => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'icon'                      => 'icon-wpb-masonry-gallery extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'textfield',
							'param_name' => 'number',
							'heading'    => esc_html__( 'Number of Items', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'space_between_items',
							'heading'     => esc_html__( 'Space Between Items', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_space_between_items_array() ),
							'save_always' => true
						),
						array(
							'type'        => 'autocomplete',
							'param_name'  => 'category',
							'heading'     => esc_html__( 'Category', 'fiorello-core' ),
							'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'fiorello-core' )
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
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_args = array(
			'number'              => -1,
			'space_between_items' => 'normal',
			'category'            => '',
			'orderby'             => 'date',
			'order'               => 'ASC'
		);
		extract( shortcode_atts( $default_args, $atts ) );
		
		/* Query for items */
		$query_args = array(
			'post_type'      => 'masonry-gallery',
			'orderby'        => $orderby,
			'order'          => $order,
			'posts_per_page' => $number
		);
		
		if ( ! empty( $category ) ) {
			$query_args['masonry-gallery-category'] = $category;
		}
		
		$holder_classes = '';
		if ( ! empty( $space_between_items ) ) {
			$holder_classes = 'mkdf-' . $space_between_items . '-space';
		}
		
		$query = new \WP_Query( $query_args );
		
		$html = '<div class="mkdf-masonry-gallery-holder mkdf-disable-bottom-space ' . esc_attr( $holder_classes ) . '">';
			$html .= '<div class="mkdf-mg-inner mkdf-outer-space">';
				$html .= '<div class="mkdf-mg-grid-sizer"></div>';
				$html .= '<div class="mkdf-mg-grid-gutter"></div>';
				
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$itemID         = get_the_ID();
						$typeOption     = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_type', true );
						$title          = get_the_title( $itemID );
						$titleTagOption = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_title_tag', true );
						$text           = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_text', true );
						$textTagOption  = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_text_tag', true );
						$link           = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_link', true );
						$target         = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_link_target', true );
						$button_label   = get_post_meta( $itemID, 'mkdf_masonry_gallery_button_label', true );
						$title_color    = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_title_color', true );
						$text_color     = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_text_color', true );
						$text_align     = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_text_align', true );

						$type                           = ! empty( $typeOption ) ? $typeOption : 'standard';
						$params['item_title']           = ! empty( $title ) ? $title : '';
						$params['item_title_tag']       = ! empty( $titleTagOption ) ? $titleTagOption : 'h4';
						$params['item_title_color']     = ! empty( $title_color ) ? $title_color : '';
						$params['item_text']            = ! empty( $text ) ? $text : '';
						$params['item_text_tag']        = ! empty( $textTagOption ) ? $textTagOption : 'p';
						$params['item_text_color']      = ! empty( $text_color ) ? $text_color : '';
						$params['item_text_align']      = ! empty( $text_align ) ? $text_align : '';
						$params['item_link']            = ! empty( $link ) ? $link : '';
						$params['item_link_target']     = ! empty( $target ) ? $target : '_self';
						$params['item_button_label']    = ! empty( $button_label ) ? $button_label : '';
						$params['current_id']           = $itemID;
						$params['item_classes']         = $this->getItemClasses();
						$params['item_image']           = $this->getItemImage( $params );
						$params['background_image_url'] = $this->getBackgroundImage( $params );
						$params['item_title_style']     = $this->getTitleStyles( $params );
						$params['item_text_style']      = $this->getTextStyles( $params );
						$params['item_text_align']      = $this->getContentStyles( $params );
						
						$html .= fiorello_core_get_cpt_shortcode_module_template_part( 'masonry-gallery', 'masonry-gallery-list', 'masonry-gallery-' . $type . '-template', '', $params );
					
					endwhile;
				else:
					$html .= esc_html__( 'Sorry, no posts matched your criteria.', 'fiorello-core' );
				endif;
				wp_reset_postdata();
			$html .= '</div>';
		$html .= '</div>';
		
		return $html;
	}
	
	private function getItemClasses() {
		$classes = array( 'mkdf-mg-item' );
		
		$itemID          = get_the_ID();
		$type            = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_type', true );
		$image_size      = get_post_meta( $itemID, 'mkdf_masonry_gallery_item_size', true );
		$background_skin = get_post_meta( $itemID, 'mkdf_masonry_gallery_simple_content_background_skin', true );
		
		if ( ! empty( $type ) ) {
			$classes[] = 'mkdf-mg-' . $type;
		}
		
		if ( ! empty( $image_size ) ) {
			$classes[] = 'mkdf-masonry-size-' . $image_size;
		}
		
		if ( ! empty( $background_skin ) ) {
			$classes[] = 'mkdf-mg-skin-' . $background_skin;
		}
		
		return implode( ' ', $classes );
	}

	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['item_title_color'] ) ) {
			$styles[] = 'color: ' . $params['item_title_color'];
		}
		
		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['item_text_color'] ) ) {
			$styles[] = 'color: ' . $params['item_text_color'];
		}
		
		return implode( ';', $styles );
	}
	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['item_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['item_text_align'];
		}
		
		return implode( ';', $styles );
	}


	public function getItemImage( $params ) {
		$id          = $params['current_id'];
		$imageOption = get_post_meta( $id, 'mkdf_masonry_gallery_item_image', true );
		$item_image  = array();
		
		if ( ! empty( $imageOption ) ) {
			$image_url = $imageOption;
			$image_id  = fiorello_mikado_get_attachment_id_from_url( $image_url );
			
			$image['url'] = $image_url;
			$image['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			$item_image   = $image;
		}
		
		return $item_image;
	}
	
	public function getBackgroundImage( $params ) {
		$masonry_image_url = wp_get_attachment_url( get_post_thumbnail_id( $params['current_id'] ) );
		
		return $masonry_image_url;
	}
	
	/**
	 * Filter masonry gallery categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function masonryGalleryCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS masonry_gallery_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'masonry-gallery-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['masonry_gallery_category_title'] ) > 0 ) ? esc_html__( 'Category', 'fiorello-core' ) . ': ' . $value['masonry_gallery_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}
	
	/**
	 * Find masonry gallery category by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function masonryGalleryCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$masonry_gallery_category = get_term_by( 'slug', $query, 'masonry-gallery-category' );
			if ( is_object( $masonry_gallery_category ) ) {
				
				$masonry_gallery_category_slug  = $masonry_gallery_category->slug;
				$masonry_gallery_category_title = $masonry_gallery_category->name;
				
				$masonry_gallery_category_title_display = '';
				if ( ! empty( $masonry_gallery_category_title ) ) {
					$masonry_gallery_category_title_display = esc_html__( 'Category', 'fiorello-core' ) . ': ' . $masonry_gallery_category_title;
				}
				
				$data          = array();
				$data['value'] = $masonry_gallery_category_slug;
				$data['label'] = $masonry_gallery_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}
	
}