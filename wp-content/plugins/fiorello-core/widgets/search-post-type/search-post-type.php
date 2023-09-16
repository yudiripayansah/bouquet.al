<?php

class FiorelloMikadoSearchPostType extends FiorelloMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_search_post_type',
			esc_html__( 'Mikado Search Post Type', 'fiorello-core' ),
			array( 'description' => esc_html__( 'Select post type that you want to be searched for', 'fiorello-core' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$post_types = apply_filters( 'fiorello_mikado_filter_search_post_type_widget_params_post_type', array( 'post' => esc_html__( 'Post', 'fiorello-core' ) ) );
		
		$this->params = array(
			array(
				'type'        => 'dropdown',
				'name'        => 'post_type',
				'title'       => esc_html__( 'Post Type', 'fiorello-core' ),
				'description' => esc_html__( 'Choose post type that you want to be searched for', 'fiorello-core' ),
				'options'     => $post_types
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$search_type_class = 'mkdf-search-post-type';
		$post_type         = $instance['post_type'];
		?>
		
		<div class="widget mkdf-search-post-type-widget">
			<div data-post-type="<?php echo esc_attr( $post_type ); ?>" <?php fiorello_mikado_class_attribute( $search_type_class ); ?>>
				<input class="mkdf-post-type-search-field" value="" placeholder="<?php esc_attr_e( 'Search here', 'fiorello-core' ) ?>">
				<i class="mkdf-search-icon icon_search" aria-hidden="true"></i>
				<i class="mkdf-search-loading fa fa-spinner fa-spin mkdf-hidden" aria-hidden="true"></i>
			</div>
			<div class="mkdf-post-type-search-results"></div>
		</div>
	<?php }
}