<?php

if ( ! function_exists( 'fiorello_mikado_map_post_video_meta' ) ) {
	function fiorello_mikado_map_post_video_meta() {
		$video_post_format_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'fiorello' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'fiorello' ),
				'description'   => esc_html__( 'Choose video type', 'fiorello' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'fiorello' ),
					'self'            => esc_html__( 'Self Hosted', 'fiorello' )
				)
			)
		);
		
		$mkdf_video_embedded_container = fiorello_mikado_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'mkdf_video_embedded_container'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'fiorello' ),
				'description' => esc_html__( 'Enter Video URL', 'fiorello' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'fiorello' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'fiorello' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'fiorello' ),
				'description' => esc_html__( 'Enter video image', 'fiorello' ),
				'parent'      => $mkdf_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_post_video_meta', 22 );
}