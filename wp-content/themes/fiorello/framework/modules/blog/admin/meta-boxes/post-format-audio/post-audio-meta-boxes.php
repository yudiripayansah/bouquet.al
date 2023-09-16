<?php

if ( ! function_exists( 'fiorello_mikado_map_post_audio_meta' ) ) {
	function fiorello_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = fiorello_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'fiorello' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'fiorello' ),
				'description'   => esc_html__( 'Choose audio type', 'fiorello' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'fiorello' ),
					'self'            => esc_html__( 'Self Hosted', 'fiorello' )
				)
			)
		);
		
		$mkdf_audio_embedded_container = fiorello_mikado_add_admin_container(
			array(
				'parent' => $audio_post_format_meta_box,
				'name'   => 'mkdf_audio_embedded_container'
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'fiorello' ),
				'description' => esc_html__( 'Enter audio URL', 'fiorello' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		fiorello_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'fiorello' ),
				'description' => esc_html__( 'Enter audio link', 'fiorello' ),
				'parent'      => $mkdf_audio_embedded_container,
				'dependency' => array(
					'show' => array(
						'mkdf_audio_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'fiorello_mikado_action_meta_boxes_map', 'fiorello_mikado_map_post_audio_meta', 23 );
}