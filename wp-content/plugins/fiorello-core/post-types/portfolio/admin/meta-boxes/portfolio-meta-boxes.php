<?php

if ( ! function_exists( 'fiorello_core_map_portfolio_meta' ) ) {
	function fiorello_core_map_portfolio_meta() {
		global $fiorello_mikado_Framework;
		
		$mkd_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$mkd_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$mkdPortfolioImages = new FiorelloMikadoMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'fiorello-core' ), '', '', 'portfolio_images' );
		$fiorello_mikado_Framework->mkdMetaBoxes->addMetaBox( 'portfolio_images', $mkdPortfolioImages );
		
		$mkdf_portfolio_image_gallery = new FiorelloMikadoMultipleImages( 'mkdf-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'fiorello-core' ), esc_html__( 'Choose your portfolio images', 'fiorello-core' ) );
		$mkdPortfolioImages->addChild( 'mkdf-portfolio-image-gallery', $mkdf_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$mkdf_portfolio_images_videos = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'fiorello-core' ),
				'name'  => 'mkdf_portfolio_images_videos'
			)
		);
		fiorello_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_single_upload',
				'parent'      => $mkdf_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'fiorello-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'fiorello-core' ),
						'options' => array(
							'image' => esc_html__('Image','fiorello-core'),
							'video' => esc_html__('Video','fiorello-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'fiorello-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'fiorello-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'fiorello-core'),
							'vimeo' => esc_html__('Vimeo', 'fiorello-core'),
							'self' => esc_html__('Self Hosted', 'fiorello-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'fiorello-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'fiorello-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'fiorello-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$mkdAdditionalSidebarItems = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'fiorello-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		fiorello_mikado_add_repeater_field(
			array(
				'name'        => 'mkdf_portfolio_properties',
				'parent'      => $mkdAdditionalSidebarItems,
				'button_text' => esc_html__( 'Add New Item', 'fiorello-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'fiorello-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'fiorello-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'fiorello-core' )
					)
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_core_map_portfolio_meta', 40 );
}