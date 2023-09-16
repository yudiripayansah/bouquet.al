<?php
get_header();
fiorello_mikado_get_title();
do_action( 'fiorello_mikado_action_before_main_content' ); ?>
<div class="mkdf-container mkdf-default-page-template">
	<?php do_action( 'fiorello_mikado_action_after_container_open' ); ?>
	<div class="mkdf-container-inner clearfix">
		<?php
			$mkdf_taxonomy_id   = get_queried_object_id();
			$mkdf_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$mkdf_taxonomy      = ! empty( $mkdf_taxonomy_id ) ? get_term_by( 'id', $mkdf_taxonomy_id, $mkdf_taxonomy_type ) : '';
			$mkdf_taxonomy_slug = ! empty( $mkdf_taxonomy ) ? $mkdf_taxonomy->slug : '';
			$mkdf_taxonomy_name = ! empty( $mkdf_taxonomy ) ? $mkdf_taxonomy->taxonomy : '';
			
			fiorello_core_get_archive_portfolio_list( $mkdf_taxonomy_slug, $mkdf_taxonomy_name );
		?>
	</div>
	<?php do_action( 'fiorello_mikado_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
