<?php
namespace FiorelloCore\CPT\Shortcodes\ImageGallery;

use FiorelloCore\Lib;

class ImageGallery implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'mkdf_image_gallery';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Image Gallery', 'fiorello-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by FIORELLO', 'fiorello-core' ),
					'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'fiorello-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'type',
							'heading'     => esc_html__( 'Gallery Type', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Image Grid', 'fiorello-core' )		=> 'grid',
								esc_html__( 'Masonry', 'fiorello-core' )    		=> 'masonry',
								esc_html__( 'Masonry Fixed', 'fiorello-core' )		=> 'masonry-fixed',
								esc_html__( 'Slider', 'fiorello-core' )			=> 'slider',
								esc_html__( 'Carousel', 'fiorello-core' )			=> 'carousel'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'attach_images',
							'param_name'  => 'images',
							'heading'     => esc_html__( 'Images', 'fiorello-core' ),
							'description' => esc_html__( 'Select images from media library', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'fiorello-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'fiorello-core' ),
							'dependency'  => array('element' => 'type', 'value' => array('grid','masonry','slider','carousel'))
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_image_shadow',
							'heading'     => esc_html__( 'Enable Image Shadow', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_behavior',
							'heading'    => esc_html__( 'Image Behavior', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'None', 'fiorello-core' )             => '',
								esc_html__( 'Open Lightbox', 'fiorello-core' )    => 'lightbox',
								esc_html__( 'Open Custom Link', 'fiorello-core' ) => 'custom-link'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_hover',
							'heading'    => esc_html__( 'Image Hover', 'fiorello-core' ),
							'value'      => array(
								esc_html__( 'Shader', 'fiorello-core' )           => 'shader',
								esc_html__( 'Zoom', 'fiorello-core' )             => 'zoom',
								esc_html__( 'Zoom and Shader', 'fiorello-core' )    => 'zoom-shader',
								esc_html__( 'Grayscale', 'fiorello-core' )        => 'grayscale'
							),
							'dependency' => array('element' => 'image_behavior', 'value' => array('lightbox','custom-link') )
						),
						array(
							'type'        => 'textarea',
							'param_name'  => 'custom_links',
							'heading'     => esc_html__( 'Custom Links', 'fiorello-core' ),
							'description' => esc_html__( 'Delimit links by comma', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'image_behavior', 'value' => array( 'custom-link' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'fiorello-core' ),
							'value'      => array_flip( fiorello_mikado_get_link_target_array() ),
							'dependency' => array( 'element' => 'image_behavior', 'value' => array( 'custom-link' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'number_of_columns',
							'heading'     => esc_html__( 'Number of Columns', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'Two', 'fiorello-core' )   => 'two',
								esc_html__( 'Three', 'fiorello-core' ) => 'three',
								esc_html__( 'Four', 'fiorello-core' )  => 'four',
								esc_html__( 'Five', 'fiorello-core' )  => 'five',
								esc_html__( 'Six', 'fiorello-core' )   => 'six'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'grid', 'masonry', 'masonry-fixed' ) )
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
							'param_name'  => 'number_of_visible_items',
							'heading'     => esc_html__( 'Number Of Visible Items', 'fiorello-core' ),
							'value'       => array(
								esc_html__( 'One', 'fiorello-core' )   => '1',
								esc_html__( 'Two', 'fiorello-core' )   => '2',
								esc_html__( 'Three', 'fiorello-core' ) => '3',
								esc_html__( 'Four', 'fiorello-core' )  => '4',
								esc_html__( 'Five', 'fiorello-core' )  => '5',
								esc_html__( 'Six', 'fiorello-core' )   => '6'
							),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_autoplay',
							'heading'     => esc_html__( 'Enable Slider Autoplay', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed',
							'heading'     => esc_html__( 'Slide Duration', 'fiorello-core' ),
							'description' => esc_html__( 'Default value is 5000 (ms)', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'slider_speed_animation',
							'heading'     => esc_html__( 'Slide Animation Duration', 'fiorello-core' ),
							'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'fiorello-core' ),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_padding',
							'heading'     => esc_html__( 'Enable Slider Padding', 'fiorello-core' ),
							'description' => esc_html__( 'Padding left and right on stage (can see neighbours).', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_navigation',
							'heading'     => esc_html__( 'Enable Slider Navigation Arrows', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'slider_pagination',
							'heading'     => esc_html__( 'Enable Slider Pagination', 'fiorello-core' ),
							'value'       => array_flip( fiorello_mikado_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'slider', 'carousel' ) ),
							'group'       => esc_html__( 'Slider Settings', 'fiorello-core' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'            => '',
			'type'                    => 'grid',
			'images'                  => '',
			'image_size'              => 'thumbnail',
			'enable_image_shadow'     => 'no',
			'image_behavior'          => '',
			'image_hover'			  => 'shader',
			'custom_links'            => '',
			'custom_link_target'      => '_self',
			'number_of_columns'       => 'three',
			'space_between_items'     => 'normal',
			'number_of_visible_items' => '1',
			'slider_autoplay'         => 'yes',
			'slider_speed'            => '5000',
			'slider_speed_animation'  => '600',
			'slider_padding'          => 'no',
			'slider_navigation'       => 'yes',
			'slider_pagination'       => 'yes'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['inner_classes']  = $this->getInnerClasses( $params, $args );
		$params['slider_data']    = $this->getSliderData( $params );
		
		$params['type']               = ! empty( $params['type'] ) ? $params['type'] : $args['type'];
		$params['images']             = $this->getGalleryImages( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['image_behavior']     = ! empty( $params['image_behavior'] ) ? $params['image_behavior'] : $args['image_behavior'];
		$params['custom_links']       = $this->getCustomLinks( $params );
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];

		$slug = $params['type'];
		if ($params['type'] == 'masonry-fixed'){
			$slug = 'masonry';
		}
		
		$html = fiorello_core_get_shortcode_module_template_part( 'templates/' . $slug, 'image-gallery', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'mkdf-ig-' . $params['type'] . '-type' : 'mkdf-ig-' . $args['type'] . '-type';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'mkdf-' . $params['space_between_items'] . '-space' : 'mkdf-' . $args['space_between_items'] . '-space';
		$holderClasses[] = $params['enable_image_shadow'] === 'yes' ? 'mkdf-has-shadow' : '';
		$holderClasses[] = ! empty( $params['image_behavior'] ) ? 'mkdf-image-behavior-' . $params['image_behavior'] : '';
		$holderClasses[] = ! empty( $params['image_hover'] ) ? 'mkdf-image-hover-' . $params['image_hover'] : '';

		if ($params['type'] == 'masonry-fixed') {
			$holderClasses[] = 'mkdf-ig-masonry-type';
		}
		
		return implode( ' ', $holderClasses );
	}
	
	private function getInnerClasses( $params, $args ) {
		$holderClasses = array();
		
		$holderClasses[] = $params['type'] === 'masonry' || $params['type'] == 'masonry-fixed' ? 'mkdf-ig-masonry' : 'mkdf-ig-grid';
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'mkdf-ig-' . $params['number_of_columns'] . '-columns' : 'mkdf-ig-' . $args['number_of_columns'] . '-columns';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = $params['number_of_visible_items'] !== '' && $params['type'] === 'carousel' ? $params['number_of_visible_items'] : '1';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-slider-padding']         = ! empty( $params['slider_padding'] ) ? $params['slider_padding'] : '';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		
		return $slider_data;
	}
	
	private function getGalleryImages( $params ) {
		$image_ids = array();
		$images    = array();
		$i         = 0;
		
		if ( $params['images'] !== '' ) {
			$image_ids = explode( ',', $params['images'] );
		}
		
		foreach ( $image_ids as $id ) {
			
			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['title']    = get_the_title( $id );
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
			
			$images[ $i ] = $image;
			$i ++;
		}
		
		return $images;
	}
	
	private function getImageSize( $image_size ) {
		$image_size = trim( $image_size );
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
			return $image_size;
		} elseif ( ! empty( $matches[0] ) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}
	
	private function getCustomLinks( $params ) {
		$custom_links = array();
		
		if ( ! empty( $params['custom_links'] ) ) {
			$custom_links = array_map( 'trim', explode( ',', $params['custom_links'] ) );
		}
		
		return $custom_links;
	}
}