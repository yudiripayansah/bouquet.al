<?php

if ( ! function_exists( 'fiorello_core_portfolio_meta_box_functions' ) ) {
	function fiorello_core_portfolio_meta_box_functions( $post_types ) {
		$post_types[] = 'portfolio-item';
		
		return $post_types;
	}
	
	add_filter( 'fiorello_mikado_filter_meta_box_post_types_save', 'fiorello_core_portfolio_meta_box_functions' );
	add_filter( 'fiorello_mikado_filter_meta_box_post_types_remove', 'fiorello_core_portfolio_meta_box_functions' );
}

if ( ! function_exists( 'fiorello_core_portfolio_scope_meta_box_functions' ) ) {
	function fiorello_core_portfolio_scope_meta_box_functions( $post_types ) {
		$post_types[] = 'portfolio-item';
		
		return $post_types;
	}
	
	add_filter( 'fiorello_mikado_filter_set_scope_for_meta_boxes', 'fiorello_core_portfolio_scope_meta_box_functions' );
}

if ( ! function_exists( 'fiorello_core_portfolio_add_social_share_option' ) ) {
	function fiorello_core_portfolio_add_social_share_option( $container ) {
		fiorello_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'enable_social_share_on_portfolio-item',
				'default_value' => 'no',
				'label'         => esc_html__( 'Portfolio Item', 'fiorello-core' ),
				'description'   => esc_html__( 'Show Social Share for Portfolio Items', 'fiorello-core' ),
				'parent'        => $container
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_post_types_social_share', 'fiorello_core_portfolio_add_social_share_option', 10, 1 );
}

if ( ! function_exists( 'fiorello_core_register_portfolio_cpt' ) ) {
	function fiorello_core_register_portfolio_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'FiorelloCore\CPT\Portfolio\PortfolioRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'fiorello_core_filter_register_custom_post_types', 'fiorello_core_register_portfolio_cpt' );
}

if ( ! function_exists( 'fiorello_core_get_archive_portfolio_list' ) ) {
	function fiorello_core_get_archive_portfolio_list( $mkdf_taxonomy_slug = '', $mkdf_taxonomy_name = '' ) {
		
		$number_of_items        = 12;
		$number_of_items_option = fiorello_mikado_options()->getOptionValue( 'portfolio_archive_number_of_items' );
		if ( ! empty( $number_of_items_option ) ) {
			$number_of_items = $number_of_items_option;
		}
		
		$number_of_columns        = 4;
		$number_of_columns_option = fiorello_mikado_options()->getOptionValue( 'portfolio_archive_number_of_columns' );
		if ( ! empty( $number_of_columns_option ) ) {
			$number_of_columns = $number_of_columns_option;
		}
		
		$space_between_items        = 'normal';
		$space_between_items_option = fiorello_mikado_options()->getOptionValue( 'portfolio_archive_space_between_items' );
		if ( ! empty( $space_between_items_option ) ) {
			$space_between_items = $space_between_items_option;
		}
		
		$image_size        = 'landscape';
		$image_size_option = fiorello_mikado_options()->getOptionValue( 'portfolio_archive_image_size' );
		if ( ! empty( $image_size_option ) ) {
			$image_size = $image_size_option;
		}
		
		$item_layout        = 'standard-shader';
		$item_layout_option = fiorello_mikado_options()->getOptionValue( 'portfolio_archive_item_layout' );
		if ( ! empty( $item_layout_option ) ) {
			$item_layout = $item_layout_option;
		}
		
		$category = $mkdf_taxonomy_name === 'portfolio-category' && ! empty( $mkdf_taxonomy_slug ) ? $mkdf_taxonomy_slug : '';
		$tag      = $mkdf_taxonomy_name === 'portfolio-tag' && ! empty( $mkdf_taxonomy_slug ) ? $mkdf_taxonomy_slug : '';
		
		$params = array(
			'type'                => 'gallery',
			'number_of_items'     => $number_of_items,
			'number_of_columns'   => $number_of_columns,
			'space_between_items' => $space_between_items,
			'image_proportions'   => $image_size,
			'category'            => $category,
			'tag'                 => $tag,
			'item_layout'         => $item_layout,
			'pagination_type'     => 'load-more'
		);
		
		$html = fiorello_mikado_execute_shortcode( 'mkdf_portfolio_list', $params );

		echo fiorello_mikado_get_module_part( $html );
	}
}

// Load portfolio shortcodes
if(!function_exists('fiorello_core_include_portfolio_shortcodes_files')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     */
    function fiorello_core_include_portfolio_shortcodes_files() {
        foreach(glob(FIORELLO_CORE_CPT_PATH.'/portfolio/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }
    }

    add_action('fiorello_core_action_include_shortcodes_file', 'fiorello_core_include_portfolio_shortcodes_files');
}

if ( ! function_exists( 'fiorello_core_set_portfolio_single_info_follow_body_class' ) ) {
	/**
	 * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single layouts
	 *
	 * @param $classes array of body classes
	 *
	 * @return array with follow portfolio info class body class added
	 */
	function fiorello_core_set_portfolio_single_info_follow_body_class( $classes ) {
		if ( is_singular( 'portfolio-item' ) && fiorello_mikado_options()->getOptionValue( 'portfolio_single_sticky_sidebar' ) == 'yes' ) {
			$classes[] = 'mkdf-follow-portfolio-info';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'fiorello_core_set_portfolio_single_info_follow_body_class' );
}

if ( ! function_exists( 'fiorello_core_single_portfolio_title_display' ) ) {
	/**
	 * Function that checks option for single portfolio title and overrides it with filter
	 */
	function fiorello_core_single_portfolio_title_display( $show_title_area ) {
		if ( is_singular( 'portfolio-item' ) ) {
			//Override displaying title based on portfolio option
			$show_title_area_meta = fiorello_mikado_get_meta_field_intersect( 'show_title_area_portfolio_single' );
			
			if ( ! empty( $show_title_area_meta ) ) {
				$show_title_area = $show_title_area_meta == 'yes' ? true : false;
			}
		}
		
		return $show_title_area;
	}
	
	add_filter( 'fiorello_mikado_filter_show_title_area', 'fiorello_core_single_portfolio_title_display' );
}

if ( ! function_exists( 'fiorello_core_set_breadcrumbs_output_for_portfolio' ) ) {
	function fiorello_core_set_breadcrumbs_output_for_portfolio( $childContent, $delimiter, $before, $after ) {
		
		if ( is_tax( 'portfolio-category' ) ) {
			$portfolio_category = wp_get_post_terms( get_the_ID(), 'portfolio-category' );
			$portfolio_category = $portfolio_category[0];
			$childContent       = '';
			
			if ( ! empty( $portfolio_category ) ) {
				if ( isset( $portfolio_category->parent ) && $portfolio_category->parent != 0 ) {
					$childContent .= get_category_parents( $portfolio_category->parent, true, ' ' . $delimiter );
				}
				$childContent .= $before . $portfolio_category->name . $after;
			}
			
		} elseif ( is_tax( 'portfolio-tag' ) ) {
			$portfolio_tag = wp_get_post_terms( get_the_ID(), 'portfolio-tag' );
			$portfolio_tag = $portfolio_tag[0];
			
			if ( ! empty( $portfolio_tag ) ) {
				$childContent = $before . $portfolio_tag->name . $after;
			}
			
		} elseif ( is_singular( 'portfolio-item' ) ) {
			$portfolio_categories = wp_get_post_terms( fiorello_mikado_get_page_id(), 'portfolio-category' );
			$childContent         = '';
			
			if ( ! empty( $portfolio_categories ) && count( $portfolio_categories ) ) {
				foreach ( $portfolio_categories as $cat ) {
					$childContent .= '<a itemprop="url" href="' . get_term_link( $cat->term_id ) . '">' . $cat->name . '</a>' . $delimiter;
				}
			}
			
			$childContent .= $before . get_the_title() . $after;
			
		}
		
		return $childContent;
	}
	
	add_filter( 'fiorello_mikado_filter_breadcrumbs_title_child_output', 'fiorello_core_set_breadcrumbs_output_for_portfolio', 10, 4 );
}

if ( ! function_exists( 'fiorello_core_set_single_portfolio_comments_enabled' ) ) {
	function fiorello_core_set_single_portfolio_comments_enabled( $comments ) {
		if ( is_singular( 'portfolio-item' ) && fiorello_mikado_options()->getOptionValue( 'portfolio_single_comments' ) == 'yes' ) {
			$comments = true;
		}
		
		return $comments;
	}
	
	add_filter( 'fiorello_mikado_filter_post_type_comments', 'fiorello_core_set_single_portfolio_comments_enabled', 10, 1 );
}

if ( ! function_exists( 'fiorello_core_get_single_portfolio' ) ) {
	function fiorello_core_get_single_portfolio() {
		$portfolio_template = fiorello_mikado_get_meta_field_intersect( 'portfolio_single_template' );
		
		$params = array(
			'holder_classes' => 'mkdf-ps-' . $portfolio_template . '-layout',
			'item_layout'    => $portfolio_template
		);
		
		fiorello_core_get_cpt_single_module_template_part( 'templates/single/holder', 'portfolio', $portfolio_template, $params );
	}
}

if ( ! function_exists( 'fiorello_core_set_single_portfolio_style' ) ) {
	/**
	 * Function that return padding for content
	 */
	function fiorello_core_set_single_portfolio_style( $style ) {
		$page_id      = fiorello_mikado_get_page_id();
		$class_prefix = fiorello_mikado_get_unique_page_class( $page_id );
		
		$current_styles = '';
		$current_style  = array();
		
		$current_selector = array(
			$class_prefix . ' .mkdf-portfolio-single-holder .mkdf-ps-info-holder'
		);
		
		$info_padding_top = get_post_meta( $page_id, 'portfolio_info_top_padding', true );
		
		if ( ! empty( $info_padding_top ) ) {
			$current_style['padding-top'] = fiorello_mikado_filter_px( $info_padding_top ) . 'px';
			
			$current_styles .= fiorello_mikado_dynamic_css( $current_selector, $current_style );
		}
		
		$current_style = $current_styles . $style;
		
		return $current_style;
	}
	
	add_filter( 'fiorello_mikado_filter_add_page_custom_style', 'fiorello_core_set_single_portfolio_style' );
}

if ( ! function_exists( 'fiorello_core_add_portfolio_attachment_custom_field' ) ) {
	function fiorello_core_add_portfolio_attachment_custom_field( $form_fields, $post = null ) {
		if ( wp_attachment_is_image( $post->ID ) ) {
			$field_value = get_post_meta( $post->ID, 'portfolio_single_masonry_image_size', true );
			
			$form_fields['portfolio_single_masonry_image_size'] = array(
				'input' => 'html',
				'label' => esc_html__( 'Image Size', 'fiorello-core' ),
				'helps' => esc_html__( 'Choose image size for portfolio single item - Masonry layout', 'fiorello-core' )
			);
			
			$form_fields['portfolio_single_masonry_image_size']['html'] = "<select name='attachments[{$post->ID}][portfolio_single_masonry_image_size]'>";
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option ' . selected( $field_value, '', false ) . ' value="">' . esc_html__( 'Default', 'fiorello-core' ) . '</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'small', false ) . ' value="small-box">' . esc_html__( 'Small Box', 'fiorello-core' ) . '</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'large-width', false ) . ' value="large-width">' . esc_html__( 'Large Width', 'fiorello-core' ) . '</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'large-height', false ) . ' value="large-height">' . esc_html__( 'Large Height', 'fiorello-core' ) . '</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '<option ' . selected( $field_value, 'large-width-height', false ) . ' value="large-width-height">' . esc_html__( 'Large Width Height', 'fiorello-core' ) . '</option>';
			$form_fields['portfolio_single_masonry_image_size']['html'] .= '</select>';
		}
		
		return $form_fields;
	}
	
	add_filter( 'attachment_fields_to_edit', 'fiorello_core_add_portfolio_attachment_custom_field', 10, 2 );
}

if ( ! function_exists( 'fiorello_core_save_image_portfolio_attachment_fields' ) ) {
	/**
	 * @param array $post
	 * @param array $attachment
	 *
	 * @return array
	 */
	function fiorello_core_save_image_portfolio_attachment_fields( $post, $attachment ) {
		
		if ( isset( $attachment['portfolio_single_masonry_image_size'] ) ) {
			update_post_meta( $post['ID'], 'portfolio_single_masonry_image_size', $attachment['portfolio_single_masonry_image_size'] );
		}
		
		return $post;
	}
	
	add_filter( 'attachment_fields_to_save', 'fiorello_core_save_image_portfolio_attachment_fields', 10, 2 );
}

if ( ! function_exists( 'fiorello_core_get_portfolio_single_media' ) ) {
	function fiorello_core_get_portfolio_single_media() {
		$image_ids       = get_post_meta( get_the_ID(), 'mkdf-portfolio-image-gallery', true );
		$single_upload   = get_post_meta( get_the_ID(), 'mkdf_portfolio_single_upload', true );
		$portfolio_media = array();
		
		if ( $image_ids !== '' ) {
			$image_ids = explode( ',', $image_ids );
			
			foreach ( $image_ids as $image_id ) {
				$media                   = array();
				$media['title']          = get_the_title( $image_id );
				$media['type']           = 'image';
				$media['description']    = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
				$media['holder_classes'] = '';
				$media_size 			 = 'full';
				
				$image_size = get_post_meta( $image_id, 'portfolio_single_masonry_image_size', true );
				
				if ( ! empty ( $image_size ) ) {
					$media['holder_classes'] = 'mkdf-masonry-size-' . esc_attr( $image_size );

					switch ($image_size) {
						case 'small-box':
							$media_size = 'fiorello_mikado_square';
							break;						
						case 'large-width':
							$media_size = 'fiorello_mikado_landscape';
							break;
						case 'large-height':
							$media_size = 'fiorello_mikado_portrait';
							break;
						case 'large-width-height':
							$media_size = 'fiorello_mikado_huge';
							break;
					}
				}

				$media['image_src']      = wp_get_attachment_image_src( $image_id, $media_size );
				
				$portfolio_media[] = $media;
			}
		}
		
		if ( is_array( $single_upload ) && count( $single_upload ) ) {
			foreach ( $single_upload as $item ) {
				$media = array();
				
				if ( $item['file_type'] == 'video' ) {
					$media['type']        = $item['video_type'];
					$media['description'] = 'video';
					$media['video_url']   = fiorello_core_get_portfolio_video_url( $item );
					
					if ( $item['video_type'] == 'self' ) {
						$media['video_cover'] = ! empty( $item['video_cover_image'] ) ? $item['video_cover_image'] : '';
					}
					
					if ( $item['video_type'] !== 'self' ) {
						$media['video_id'] = $item['video_id'];
					}
				} elseif ( $item['file_type'] == 'image' ) {
					$media['type']      = 'image';
					$media['image_src'] = $item['single_image'];
				}

				//fallback if description is not set for media
				$media['title'] = get_the_title();
				
				$portfolio_media[] = $media;
			}
		}
		
		return $portfolio_media;
	}
}

if ( ! function_exists( 'fiorello_core_get_portfolio_video_url' ) ) {
	function fiorello_core_get_portfolio_video_url( $video ) {
		switch ( $video['video_type'] ) {
			case 'youtube':
				return 'https://www.youtube.com/embed/' . $video['video_id'] . '?wmode=transparent';
				break;
			case 'vimeo';
				return 'https://player.vimeo.com/video/' . $video['video_id'] . '?title=0&amp;byline=0&amp;portrait=0';
				break;
			case 'self':
				$return_array = array();
				
				if ( ! empty( $video['video_mp4'] ) ) {
					$return_array['mp4'] = $video['video_mp4'];
				}
				
				return $return_array;
				
				break;
		}
	}
}

if ( ! function_exists( 'fiorello_core_get_portfolio_single_media_html' ) ) {
	function fiorello_core_get_portfolio_single_media_html( $media ) {
		$params = array();
		
		if ( $media['type'] == 'image' ) {
			$params['lightbox'] = fiorello_mikado_options()->getOptionValue( 'portfolio_single_lightbox_images' ) == 'yes';
			
			$media['image_url'] = is_array( $media['image_src'] ) ? $media['image_src'][0] : $media['image_src'];
			if ( empty( $media['description'] ) ) {
				$media['description'] = $media['title'];
			}
		}
		
		if ( in_array( $media['type'], array( 'youtube', 'vimeo' ) ) ) {
			$params['lightbox'] = fiorello_mikado_options()->getOptionValue( 'portfolio_single_lightbox_videos' ) == 'yes';
			
			if ( $params['lightbox'] ) {
				switch ( $media['type'] ) {
					case 'vimeo':
						$url      = 'https://vimeo.com/api/v2/video/' . $media['video_id'] . '.php';
						$request  = wp_remote_get($url);
						$response = unserialize( wp_remote_retrieve_body( $request ) );
						
						$params['video_title']    = $response[0]['title'];
						$params['lightbox_thumb'] = $response[0]['thumbnail_large'];
						break;
					case 'youtube':
						$params['video_title'] = $media['title'];
						
						$params['lightbox_thumb'] = 'https://img.youtube.com/vi/' . trim( $media['video_id'] ) . '/sddefault.jpg';
						break;
				}
			}
		}
		
		$params['media'] = $media;
		
		fiorello_core_get_cpt_single_module_template_part( 'templates/single/media/' . $media['type'], 'portfolio', '', $params );
	}
}

if ( ! function_exists( 'fiorello_core_get_portfolio_single_related_posts' ) ) {
	/**
	 * Function for returning portfolio single related posts
	 *
	 * @param $post_id
	 *
	 * @return WP_Query
	 */
	function fiorello_core_get_portfolio_single_related_posts( $post_id ) {
		//Get tags
		$tags = wp_get_object_terms( $post_id, 'portfolio-tag' );
		
		//Get categories
		$categories = wp_get_object_terms( $post_id, 'portfolio-category' );
		
		$tag_ids = array();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				$tag_ids[] = $tag->term_id;
			}
		}
		
		$category_ids = array();
		if ( $categories ) {
			foreach ( $categories as $category ) {
				$category_ids[] = $category->term_id;
			}
		}
		
		$hasRelatedByTag = false;
		
		if ( $tag_ids ) {
			$related_by_tag = fiorello_core_get_portfolio_single_related_posts_by_param( $post_id, $tag_ids, 'portfolio-tag' );
			
			if ( ! empty( $related_by_tag->posts ) ) {
				$hasRelatedByTag = true;
				
				return $related_by_tag;
			}
		}
		
		if ( $categories && ! $hasRelatedByTag ) {
			$related_by_category = fiorello_core_get_portfolio_single_related_posts_by_param( $post_id, $category_ids, 'portfolio-category' );
			
			if ( ! empty( $related_by_category->posts ) ) {
				return $related_by_category;
			}
		}
	}
}

if ( ! function_exists( 'fiorello_core_get_portfolio_single_related_posts_by_param' ) ) {
	/**
	 * @param $post_id - Post ID
	 * @param $term_ids - Category or Tag IDs
	 * @param $taxonomy
	 *
	 * @return WP_Query
	 */
	function fiorello_core_get_portfolio_single_related_posts_by_param( $post_id, $term_ids, $taxonomy ) {
		$args = array(
			'post_status'    => 'publish',
			'post__not_in'   => array( $post_id ),
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => '4',
			'tax_query'      => array(
				array(
					'taxonomy' => $taxonomy,
					'field'    => 'term_id',
					'terms'    => $term_ids,
				),
			)
		);
		
		$related_by_taxonomy = new WP_Query( $args );
		
		return $related_by_taxonomy;
	}
}

if ( ! function_exists( 'fiorello_core_add_portfolio_to_search_types' ) ) {
	function fiorello_core_add_portfolio_to_search_types( $post_types ) {
		
		$post_types['portfolio-item'] = esc_html__( 'Portfolio', 'fiorello-core' );
		
		return $post_types;
	}
	
	add_filter( 'fiorello_mikado_filter_search_post_type_widget_params_post_type', 'fiorello_core_add_portfolio_to_search_types' );
}

/**
 * Loads more function for portfolio.
 */
if ( ! function_exists( 'fiorello_core_portfolio_ajax_load_more' ) ) {
	function fiorello_core_portfolio_ajax_load_more() {
		$shortcode_params = array();
		
		if ( ! empty( $_POST ) ) {
			foreach ( $_POST as $key => $value ) {
				if ( $key !== '' ) {
					$addUnderscoreBeforeCapitalLetter = preg_replace( '/([A-Z])/', '_$1', $key );
					$setAllLettersToLowercase         = strtolower( $addUnderscoreBeforeCapitalLetter );
					
					$shortcode_params[ $setAllLettersToLowercase ] = $value;
				}
			}
		}
		
		$port_list = new \FiorelloCore\CPT\Shortcodes\Portfolio\PortfolioList();
		
		$query_array                     = $port_list->getQueryArray( $shortcode_params );
		$query_results                   = new \WP_Query( $query_array );
		$shortcode_params['this_object'] = $port_list;
		
		$html = '';
		if ( $query_results->have_posts() ):
			while ( $query_results->have_posts() ) : $query_results->the_post();
				$html .= fiorello_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-list', 'portfolio-item', $shortcode_params['item_type'], $shortcode_params );
			endwhile;
		else:
			$html .= fiorello_core_get_cpt_shortcode_module_template_part( 'portfolio', 'portfolio-list', 'parts/posts-not-found', '', $shortcode_params );
		endif;
		
		wp_reset_postdata();
		
		$return_obj = array(
			'html' => $html,
		);
		
		echo json_encode( $return_obj );
		exit;
	}
}

add_action( 'wp_ajax_nopriv_fiorello_core_portfolio_ajax_load_more', 'fiorello_core_portfolio_ajax_load_more' );
add_action( 'wp_ajax_fiorello_core_portfolio_ajax_load_more', 'fiorello_core_portfolio_ajax_load_more' );