<div class="mkdf-portfolio-list-holder <?php echo esc_attr($holder_classes); ?>" <?php echo wp_kses($holder_data, array('data')); ?>>
	<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/filter', '', $params); ?>
	<div class="mkdf-pl-inner mkdf-outer-space clearfix">
		<div class="mkdf-pl-grid-sizer"></div>
		<div class="mkdf-pl-grid-gutter"></div>
		<?php 
			if($query_results->have_posts()):
				while ( $query_results->have_posts() ) : $query_results->the_post();
					echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'portfolio-item', $item_type, $params);
				endwhile;
			else:
				echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'parts/posts-not-found');
			endif;
		
			wp_reset_postdata();
		?>
	</div>
	
	<?php echo fiorello_core_get_cpt_shortcode_module_template_part('portfolio', 'portfolio-list', 'pagination/'.$pagination_type, '', $params, $additional_params); ?>
</div>