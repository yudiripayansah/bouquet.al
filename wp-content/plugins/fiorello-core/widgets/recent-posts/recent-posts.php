<?php

class FiorelloMikadoRecentPosts extends FiorelloMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_recent_posts',
			esc_html__( 'Mikado Recent Posts', 'fiorello-core' ),
			array( 'description' => esc_html__( 'Select recent posts that you would like to display', 'fiorello-core' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'fiorello_mikado_filter_search_post_type_widget_params_post_type', array( 'post' => esc_html__( 'Post', 'fiorello-core' ) ) );
		
		$this->params = array(
            array(
                'type'  => 'textfield',
                'name'  => 'widget_title',
                'title' => esc_html__( 'Widget Title', 'fiorello-core' )
            ),
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'fiorello-core' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'fiorello-core' ),
				'options'     => $post_types
			),
            array(
                'type'        => 'dropdown',
                'name'        => 'title_tag',
                'title'       => esc_html__( 'Title Tag', 'fiorello-core' ),
                'options'     => fiorello_mikado_get_title_tag(true, array('p' => 'p'))
            )
		);
	}
	
	public function widget( $args, $instance ) {

        if ( ! is_array( $instance ) ) {
            $instance = array();
        }

        if($instance['post_type'] !== ''){
            $type = $instance['post_type'];
        }
        else{
            $type = 'post';
        }

        if(empty($instance['title_tag'])){
            $instance['title_tag'] = 'h6';
        }

        $params = array(
            'post_type'      => $type,
            'post_status'    => 'publish',
            'order'          => 'DESC',
            'orderby'        => 'date',
            'posts_per_page' => 3
        );


        $query = new WP_Query( $params );

        $html = '';
        $html .= '<div class="widget mkdf-recent-post-widget">';

        if ( ! empty( $instance['widget_title'] ) ) {
            $html .= wp_kses_post( $args['before_title'] ) . esc_html( $instance['widget_title'] ) . wp_kses_post( $args['after_title'] );
        }

        if ( $query->have_posts() ) {
            $html .= '<ul class="mkdf-recent-posts">';
            while ( $query->have_posts() ) {
                $query->the_post();
				$html .= '<li class="mkdf-rp-item">';
				$html .= '<a href="' . get_the_permalink() . '">';
				if (has_post_thumbnail(get_the_ID())) {
					$html .= '<div class="mkdf-rp-image">' . get_the_post_thumbnail(get_the_ID(), 'thumbnail') . '</div>';
				}
				$html .= '<div class="mkdf-recent-posts-info">';
				$html .= '<'.$instance['title_tag'].' class="mkdf-rp-title">' . get_the_title() . '</'.$instance['title_tag'].'>';
				$html .= '<span class="mkdf-rp-date">'.get_the_date().'</span>';
				$html .= '</div>';
				$html .= '</a>';
				$html .= '</li>';
            }
            $html .= '</ul>';
        }

        else {
            $html .= esc_html__('Sorry, there are no posts matching your criteria', 'fiorello-core');
        }

        $html .= '</div>';

        wp_reset_postdata();

		echo fiorello_mikado_get_module_part( $html );
    }
}